# University

Most important university projects.

## Index

* Bachelor's thesis: [MCTS and videogames: an application for Pokémon Contest Spectacular](#trithesis)
* Essay: [Coupling from the past](#sdscftp)
* Master's thesis: [Computer-Assisted Evaluation of Story-Driven Interactive Storytelling Systems](#sdsthesis)


## MCTS and videogames: an application for Pokémon Contest Spectacular {#trithesis}

This is the section about the work done for my bachelor's thesis in Mathematics at the University of Turin.

### Abstract

MCTS algorithm has been used with success for games like Go, simulating a number of games randomly and creating a game tree. It can be enhanced further with UCT, a move selection strategy making a trade-off between exploration of new strategies and exploitation of better ones.

In this thesis, the algorithm working principle is explained. Moreover, it is discussed how it may be applied successfully also to videogames and an applied use is shown.

The game chosen as application is Pokémon Contest Spectacular, in which four players challenge themselves in a five-turn exhibition. Each turn the participants make a move to appeal the public or to jam opponents. Being a turn-based game with simultaneous moves and random elements, this is useful to show MCTS efficiency even outside turn-based sequential deterministic games such as Go.

Finally, it is analysed the efficiency of the algorithm, comparing its performance against random players, MCTS players of different levels (varying depending on the number of simulations performed), original game AI player and human players.

### Documents

Here are some documents about the thesis. Please note that all the material is in Italian.

* [Thesis](/files/uni/tri/tesi.pdf).
* [Slides](/files/uni/tri/diapositive.pdf) used during the thesis final defence.
* [Pokémon Contest Spectacular moves](/files/uni/tri/MosseGarePokemonLive.pdf), an exhaustive list of moves implemented in the simulation software for Pokémon Contest Spectacular, including effect and description.

### Software and source code

It is possible to download the software made for this thesis in different versions. Please note that all the material is in Italian.

* [Windows version](/files/uni/tri/contest.zip), made up of a zip archive that contains the `contest.exe` file, which will run the software.
* [Universal version](/files/uni/tri/contest.love), made up of the `contest.love` file, which however requires the setup of the [LÖVE](https://love2d.org/) framework on the computer. LÖVE works on Windows, Mac OS X and Linux and allows this software to be run on all these platforms.
* [Source code](/files/uni/tri/contest_source.zip) with some comments to make code more readable. It is released under MIT license, for more information read the `LICENSE` file.


## Coupling from the past {#sdscftp}

Markov chain Monte Carlo methods allow to compute difficult integrals and sample from complex distributions, opening new possibilities. Gibbs sampler gained a lot of popularity, dealing with multidimensional problems. The main issue is to be able to sample directly from the stationary distribution of the Markov chain, that is to get perfect samples.

An efficient algorithm to accomplish that is the coupling from the past (CFTP) algorithm. In this essay, we will describe and prove the functionality of CFTP algorithm. Furthermore, a practical application in image restoration is given, applying CFTP to a Gibbs sampler.

* [Essay](/files/uni/sds/cftp.pdf) about the CFTP algorithm.
* [Implementation](/files/uni/sds/image_restore.R) of the image restoration algorithm in R.


## Computer-Assisted Evaluation of Story-Driven Interactive Storytelling Systems {#sdsthesis}

This is the section about the work done for my thesis for the Master's Degree in Stochastics and Data Science at the University of Turin.

### Abstract

The evaluation of the narrative emerging from storytelling systems is not a trivial task, not even for linear ones. For interactive stories, the space of possible developments may grow very quickly and become easily unmanageable. The story designer has hardly any assistance at all in this process.

We propose, expanding on previous attempts, a general methodology to evaluate story-driven interactive storytelling systems via clustering, tension curve extraction and user surveys. This procedure outputs a set of clusters, each with its own specific tension curve shape and average quality score. The story designer may inspect the resulting clustering and iterate over his/her storytelling system using the new knowledge acquired. This may also lead to an association between tension curves and quality of a story.

We apply this methodology to our story-driven interactive storytelling system to show its current and potential achievements, respectively. Our esults indicate that clusters, even if not well-formed, display different quality scores and that some tension curves seems to be associated with better stories. While the method has proven to be valid, there is room for improvements.


### Documents and source code

Here are some documents about the thesis and the source code of the implementation of the methodology, Dupin.

* [Thesis](/files/uni/sds/thesis.pdf).
* [Slides](/files/uni/sds/slides.pdf) used during the thesis final defence.
* [Dupin](https://github.com/msilvestro/dupin) (Detective UPon INteractive stories), the implementation of the methodology developed in the thesis.
