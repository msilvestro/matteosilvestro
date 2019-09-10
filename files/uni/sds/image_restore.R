# Created by Matteo Silvestro for an essay about CFTP algorithm # 16/06/2016 # CC BY

library(pixmap) # to extract a matrix of zeros and ones from a binary image
library(grid) # to display a matrix of zeros and ones in R

# I define as one-line-matrix a square matrix with all elements in a single vector.
# It is easy to get a virtual matrix from such vector by setting number of cols/rows = sqrt(length of vector)

# draw the one-line-matrix of -1 and +1 as an image in R
drawImage <- function(image) {
  N <- sqrt(length(image)) # compute the size of the squared image
  grid.newpage() # delete all previous stuff on the drawing surface
  imagen <- matrix(1-(image+1)/2, ncol=N) # change of values from -1 -> 0, +1 -> 1
  grid.raster(imagen, interp=F) # with a matrix of 0 and 1, the grid package can draw the image correctly
}

# return a vector with the neighbour elements of the k-th element of the one-line-matrix x
neighbour <- function(x, k) {
  N <- sqrt(length(x)) # compute the size of the virtual matrix
  neigh <- NULL # this will be the vector of all neighbours
  # here there is a bit of algebra to get the right elements, remember that x is a one-line-matrix
  # (one-line-matrix vector index) k -> (floor(k/N), k % N) (virtual matrix index)
  # soppose (i, j) are the coordinate of x[k], then the neighbours are
  # (i, j-1), (i, j+1), (i-1, j), (i+1, j) if 1 <= i, j <= N
  if (k-N >= 1) neigh <- c(neigh, x[k-N])
  if (k+N <= N*N) neigh <- c(neigh, x[k+N])
  if (k %% N != 1) neigh <- c(neigh, x[k-1])
  if (k %% N != 0) neigh <- c(neigh, x[k+1])
  return(neigh)
}

fullcond <- function(x, y, k, beta, p) {
  return(1 / ( 1 + exp(-2*beta*sum(neighbour(x, k)) - log((1-p)/p)*y[k] ) ))
}

# apply the Propp-Wilson algorithm
rimage <- function(y, beta, p, N, seed) {
  Time <- -0.5 # actual starting time is -1, since it is doubled immediately
  xmax <- rep(1, N*N)
  xmin <- rep(-1, N*N)
  while (!all(xmax == xmin)) { # continue until convergence does occur
    xmax <- rep(1, N*N) # image with all black pixels
    xmin <- rep(-1, N*N) # image with all white pixels
    Time <- Time*2 # double the time, as suggested by Propp-Wilson
    set.seed(seed) # seed must be fixes, since we use random mappings
    utot <- runif(N*N*(-Time)) # create the needed random mappings random numbers
    for (t in Time:-1) {
      u <- utot[ (N*N*(-t-1)+1) : (N*N*(-t)) ] # extract the random numbers to be used is this iteration
      for (k in 1:(N*N)) { # apply the Gibbs sampler, updating a pixel at a time
        xmax[k] = (u[k] < fullcond(xmax, y, k, beta, p))*2-1
        xmin[k] = (u[k] < fullcond(xmin, y, k, beta, p))*2-1
      }
    }
  }
  print(c(seed, Time))
  return(xmax)
}

restoreImage <- function(file, p, beta, simn) {
  image <- read.pnm(file, cellres=1) # cellres is to avoid the warning
  image <- 1-as.vector(image@grey)
  N <- sqrt(length(image))
  
  # make an array with the binary original binary image, with +1 as black and -1 as white
  x <- image*2-1
  drawImage(x)
  
  # degrade the image with a Bernoulli noise with p as probability to degrade
  y <- x * (rbinom(N*N, 1, 1-p)*2-1) # apply Bernoulli noise
  drawImage(y)
  
  # apply the restoring algorithm, based on Gibbs sampler with CFTP
  sample <- NULL
  for (i in 1:simn) {
    sample <- c(sample, rimage(y, beta, p, N, i)) # make one long vector with all samples
  }
  sample <- matrix(sample, nrow=simn, ncol=N*N, byrow=T) # and then split it in a matrix with as each row a sample
  
  # MPM (marginal posterior mode) estimator
  mode <- rep(0, N*N)
  for (i in 1:(N*N)) {
    mode[i] <- (sum(sample[,i]) > 0)*2-1 # make the mode of each pixel, i.e. for each column of the matrix take the most frequent value (+1 or -1)
  }
  drawImage(mode)
  
  # compute the misclassification rate
  mis <- sum(mode != x)/(N*N)
  
  # return a list with all informations
  return(list(original=x, degraded=y, restored=mode, error=mis))
}

# ptm <- proc.time()
# result <- restoreImage("img/penguin.pbm", p=0.3, beta=0.45, simn=1)
# time <- proc.time() - ptm