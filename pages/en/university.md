## University

I'm Matteo Silvestro, a scatterbrained wanderer always looking for new routes. Here are the project I worked on during my university studies.


### Master's Degree thesis

@ September 13, 2017

This thesis, **Computer-Assisted Evaluation of Story-Driven Interactive Storytelling Systems**, was my latest effort in which I managed to weave together *storytelling* and *machine learning*. I wanted to get as closer as possible to the field of videogame studies and working on creating a clustering of interactive stories through tension curves was quite a good topic nonetheless.

#### Abstract

The evaluation of the narrative emerging from storytelling systems is not a trivial task, not even for linear ones. For interactive stories, the space of possible developments may grow very quickly and become easily unmanageable. The story designer has hardly any assistance at all in this process.

We propose, expanding on previous attempts, a general methodology to evaluate story-driven interactive storytelling systems via clustering, tension curve extraction and user surveys. This procedure outputs a set of clusters, each with its own specific tension curve shape and average quality score. The story designer may inspect the resulting clustering and iterate over his/her storytelling system using the new knowledge acquired. This may also lead to an association between tension curves and quality of a story.

We apply this methodology to our story-driven interactive storytelling system to show its current and potential achievements, respectively. Our results indicate that clusters, even if not well-formed, display different quality scores and that some tension curves seem to be associated with better stories. While the method has proven to be valid, there is room for improvements.

---

![Cluster with its own tension curve][img_sds]

* [Thesis][tesi_sds]
* [Slides for the final defense][pres_sds]
* [Dupin — Source code][dupin]

[img_sds]: /img/uni/sds_tension.png

[tesi_sds]: /files/uni/sds/thesis.pdf
[pres_sds]: /files/uni/sds/slides.pdf
[dupin]: https://github.com/msilvestro/dupin


### Coupling from the past

@ June 22, 2016

Markov chain Monte Carlo methods allow to compute difficult integrals and sample from complex distributions, opening new possibilities. Gibbs sampler gained a lot of popularity, dealing with multidimensional problems. The main issue is to be able to sample directly from the stationary distribution of the Markov chain, that is to get perfect samples.

An efficient algorithm to accomplish that is the coupling from the past (CFTP) algorithm. In this essay, we will describe and prove the functionality of CFTP algorithm. Furthermore, a practical application in image restoration is given, applying CFTP to a Gibbs sampler.

---

![CFTP algorithm results][img_cftp]

* [Essay][cftp]
* [Algorithm implementation][image_restore]

[img_cftp]: /img/uni/cftp.png

[cftp]: /files/uni/sds/cftp.pdf
[image_restore]: /files/uni/sds/image_restore.R


### Bachelor's thesis

@ October 10, 2015

This thesis, **MCTS e videogiochi: un'applicazione per le Gare Pokémon Live**, was an amusing and almost reckless adventure, but in the end the results were very interesting and promising. Furthermore, I succeeded in combining Pokémon with mathematics, and I'm quite proud of that.

#### Abstract

MCTS algorithm has been used with success for games like Go, simulating a number of games randomly and creating a game tree. It can be enhanced further with UCT, a move selection strategy making a trade-off between exploration of new strategies and exploitation of better ones.

In this thesis, the algorithm working principle is explained. Moreover, it is discussed how it may be applied successfully also to videogames and an applied use is shown.

The chosen game is *Pokémon Contest Spectacular*, in which four players challenge themselves in a five-turn exhibition. Each turn the participants make a move to appeal the public or to jam opponents. Being a turn-based game with simultaneous moves and random elements, it is useful to show MCTS efficiency even outside turn-based sequential deterministic games such as Go.

Finally, the efficiency of the algorithm is analyzed, comparing its performance against random players, MCTS players of different levels (varying depending on the number of simulations performed), original game AI player and human players.

---

![Simulation screenshot][img_contest]

* [Thesis][tesi_tri]
* [Slides for the final defense][pres_tri]
* [Pokémon Contest Spectacular moves][mosse]
* [Simulation — Windows version][contest_exe]
* [Simulation — Universal version][contest_love]
* [Simulation — Source code][contest_source]

[img_contest]: /img/uni/tri_contest.png

[tesi_tri]: /files/uni/tri/tesi.pdf
[pres_tri]: /files/uni/tri/diapositive.pdf
[mosse]: /files/uni/tri/MosseGarePokemonLive.pdf

[contest_exe]: /files/uni/tri/contest.zip
[contest_love]: /files/uni/tri/contest.love
[contest_source]: /files/uni/tri/contest_source.zip
