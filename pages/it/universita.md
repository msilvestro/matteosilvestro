## Università

Sono Matteo Silvestro, un errante con la testa fra le nuvole in cerca di strade non battute. Qui sono presenti tutti i progetti che ho realizzato durante il mio percorso universitario.


### Tesi magistrale

@ 13 settembre 2017

La tesi, dal titolo **Computer-Assisted Evaluation of Story-Driven Interactive Storytelling Systems**, è stata la mia ultima fatica ed è riuscita ad intrecciare *storytelling* e *machine learning*. Ho tentato di avvicinarmi il più vicino possibile al dominio dei videogiochi e il clustering di una storia interattiva utilizzando le curve di tensione è stato un ottimo compromesso.

#### Sommario

La valutazione della narrazione che risulta da un sistema di storytelling non è un compito semplice, nemmeno nel caso di sistemi lineari. Per una storia interattiva, lo spazio dei possibili sviluppi può crescere molto velocemente e diventare difficile da gestire. Il creatore della storia non ha a sua disposizione pressoché alcun aiuto in questo processo.

Viene proposta, partendo da articoli precedenti, una metodologia generale per valutare i sistemi di storytelling interattivi basati sulla storia utilizzando clustering, estrazione di curve di tensione e sondaggi. Questa procedura restituisce un insieme di cluster, ognuno con la sua curva di tensione e il suo punteggio qualitativo medio. Il creatore della storia può ispezionare il clustering ottenuto e iterare sul suo sistema di storytelling alla luce delle nuove conoscenze acquisite. Ciò potrebbe portare anche a un'associazione tra la forma della curva di tensiona e la qualità di una storia.

Questa metodologia viene applicata a un sistema di storytelling interattivo basato sulla storia per mostrare i suoi conseguimenti attuali e potenziali, rispettivamente. I risultati indicano che i cluster, anche se non ben formati, mostrano punteggi qualitativi differenti e che alcune curve di tensione sono associate a storie migliori. Anche se il metodo si è dimostrato valido, c'è spazio per miglioramenti.

---

![Cluster con curva di tensione][img_sds]

* [Tesi][tesi_sds]
* [Presentazione per la dissertazione][pres_sds]
* [Dupin — Codice sorgente][dupin]

[img_sds]: /img/uni/sds_tension.png

[tesi_sds]: /files/uni/sds/thesis.pdf
[pres_sds]: /files/uni/sds/slides.pdf
[dupin]: https://github.com/msilvestro/dupin


### Coupling from the past

@ 22 giugno 2016

I metodi *Markov Chain Monte Carlo* permettono di calcolare integrali difficili e di campionare da distribuzioni complicate, aprendo nuove possibilità. Il campionamento di Gibbs è riuscito a raggiungere una notevole popolarità, occupandosi di problemi multidimensionali. Il problema principale riguarda la possibilità di campionare direttamente dalla distribuzione stazionaria della catena di Markov, ovvero di ottenere campioni perfetti.

Un algoritmo efficiente per ottenere questo risultato si chiama *coupling from the past* (CFTP). In questo saggio, verrà descritto e dimostrato il funzionamento dell'algoritmo CFTP. Inoltre, è mostrata un'applicazione pratica per il recupero di un'immagine, applicando il CFTP a un campionatore di Gibbs.

---

![Risultati dell'algoritmo CFTP][img_cftp]

* [Saggio][cftp]
* [Implementazione dell'algoritmo][image_restore]

[img_cftp]: /img/uni/cftp.png

[cftp]: /files/uni/sds/cftp.pdf
[image_restore]: /files/uni/sds/image_restore.R


### Tesi triennale

@ 10 ottobre 2015

La tesi, dal titolo **MCTS e videogiochi: un'applicazione per le Gare Pokémon Live**, è stata un'esperienza divertente e sicuramente un po' sconsiderata, ma i risultati si sono rivelati molto interessanti e incoraggianti. Oltrettutto, essere riuscito a coniugare i Pokémon e la matematica è un'impresa di cui sono piuttosto fiero.

#### Sommario

L'algoritmo MCTS è stato utilizzato con successo per giochi come il Go, simulando molte partite in modo casuale e creando un albero di gioco. Può essere ulteriormente migliorato utilizzando l’UCT, un algoritmo di selezione delle mosse, trovando un compromesso tra esplorazione di nuove strategie e sfruttamento delle migliori.

In questa tesi viene spiegato il principio di funzionamento dell'algoritmo. Inoltre, si discute su come possa essere applicato con successo anche ai videogiochi e se ne mostra un utilizzo pratico.

Il gioco scelto come applicazione sono le Gare Pokémon Live, in cui quattro giocatori si sfidano in una esibizione che dura cinque turni. Ogni turno i partecipanti eseguono una mossa per impressionare il pubblico o per infastidire gli avversari. Essendo un gioco a turni ma con scelta contemporanea delle mosse e elementi casuali, è utile per mostrare l'efficienza dell'MCTS anche al di fuori di giochi a turni sequenziali deterministici come il Go.

Infine, se ne analizza l'efficienza, confrontando le prestazioni dell'algoritmo contro giocatori casuali, giocatori MCTS di livello diverso (in base al numero di simulazioni effettuate) e giocatori dell'intelligenza artificiale del gioco originale.

---

![Schermata della simulazione][img_contest]

* [Tesi][tesi_tri]
* [Presentazione per la dissertazione][pres_tri]
* [Mosse Gare Pokémon Live][mosse]
* [Simulazione — Versione Windows][contest_exe]
* [Simulazione — Versione universale][contest_love]
* [Simulazione — Codice sorgente][contest_source]

[img_contest]: /img/uni/tri_contest.png

[tesi_tri]: /files/uni/tri/tesi.pdf
[pres_tri]: /files/uni/tri/diapositive.pdf
[mosse]: /files/uni/tri/MosseGarePokemonLive.pdf

[contest_exe]: /files/uni/tri/contest.zip
[contest_love]: /files/uni/tri/contest.love
[contest_source]: /files/uni/tri/contest_source.zip
