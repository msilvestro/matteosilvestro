# Università

## Indice

* Tesi triennale: [MCTS e videogiochi: un'applicazione per le Gare Pokémon Live](#trithesis)
* Saggio: [Coupling from the past](#sdscftp)
* Tesi magistrale: [Computer-Assisted Evaluation of Story-Driven Interactive Storytelling Systems](#sdsthesis)

## Tesi triennale: **MCTS e videogiochi: un'applicazione per le Gare Pokémon Live** {#trithesis}

Questa è la sezione dedicata al lavoro effettuato per la mia tesi di Laurea Triennale in Matematica all'Università degli Studi di Torino.

### Sommario

L'algoritmo MCTS è stato utilizzato con successo per giochi come Go, simulando molte partite in modo casuale e creando un albero di gioco. Può essere ulteriormente migliorato utilizzando l’UCT, un algoritmo di selezione delle mosse, trovando un compromesso tra esplorazione di nuove strategie e sfruttamento delle migliori.

In questa tesi viene spiegato il principio di funzionamento dell'algoritmo. Inoltre, si discute come possa essere applicato con successo anche ai videogiochi e se ne mostra un utilizzo pratico.

Il gioco scelto come applicazione sono le Gare Pokémon Live, in cui quattro giocatori si sfidano in una esibizione che dura cinque turni. Ogni turno i partecipanti eseguono una mossa per impressionare il pubblico o per infastidire gli avversari. Essendo un gioco a turni ma con scelta contemporanea delle mosse e elementi casuali, è utile per mostrare l'efficienza dell'MCTS anche al di fuori di giochi a turni sequenziali deterministici come il Go.

Infine, se ne analizza l'efficienza, confrontando le prestazioni dell'algoritmo contro giocatori casuali, giocatori MCTS di livello diverso (in base al numero di simulazioni effettuate) e giocatori dell'intelligenza artificiale del gioco originale.

### Documenti

Qui sono disponibili alcuni documenti relativi alla tesi.

* [Tesi](/files/uni/tri/tesi.pdf).
* [Presentazione](/files/uni/tri/diapositive.pdf) usata durante la dissertazione.
* [Mosse Gare Pokémon Live](/files/uni/tri/MosseGarePokemonLive.pdf), una lista esaustiva di mosse implementate nel programma di simulazione per le Gare Pokémon Live, complete di effetto e descrizione.

### Programma e codice sorgente

È possibile scaricare il programma realizzato per questa tesi in diverse versioni.

* [Versione Windows](/files/uni/tri/contest.zip), formata da un archivio zip al cui interno è presente il file `contest.exe` che, una volta avviato, farà partire il programma.
* [Versione universale](/files/uni/tri/contest.love), formata dal file `contest.love`, che però richiede prima l'installazione del programma [LÖVE](https://love2d.org/) nel computer. LÖVE funziona su Windows, Mac OS X e Linux e ne permette quindi l'utilizzo su tutte queste piattaforme.
* [Codice sorgente](/files/uni/tri/contest_source.zip) con alcuni commenti per renderne più facile la lettura. È rilasciato sotto licenza MIT, per maggiori informazioni consultare il file `LICENSE`.


## Saggio: **Coupling from the past** {#sdscftp}

I metodi *Markov Chain Monte Carlo* permettono di calcolare integrali difficili e di campionare da distribuzioni complicate, aprendo nuove possibilità. Il campionamento di Gibbs è riuscito a raggiungere una notevole popolarità, occupandosi di problemi multidimensionali. Il problema principale riguarda la possibilità di campionare direttamente dalla distribuzione stazionaria della catena di Markov, ovvero di ottenere campioni perfetti.

Un algoritmo efficiente per ottenere questo risultato si chiama *coupling from the past* (CFTP). In questo saggio, verrà descritto e dimostrato il funzionamento dell'algoritmo CFTP. Inoltre, è mostrata un'applicazione pratica per il recupero di un'immagine, applicando il CFTP a un campionatore di Gibbs.

* [Saggio](/files/uni/sds/cftp.pdf) sull'algoritmo CFTP.
* [Implementazione](/files/uni/sds/image_restore.R) dell'algoritmo di recupero dell'immagine in R.


## Tesi magistrale: **Computer-Assisted Evaluation of Story-Driven Interactive Storytelling Systems** {#sdsthesis}

Questa è la sezione dedicata al lavoro effettuato per la mia tesi magistrale per il Master's Degree in Stochastics and Data Science all'Università degli Studi di Torino.

### Sommario

La valutazione della narrazione che risulta da un sistema di storytelling non è un compito semplice, nemmeno nel caso di sistemi lineari. Per una storia interattiva, lo spazio dei possibili sviluppi può crescere molto velocemente e diventare difficile da gestire. Il creatore della storia non ha a sua disposizione pressoché alcun aiuto in questo processo.

Viene proposta, partendo da altri articoli, una metodologia generale per valutare i sistemi di storia interattiva basati sulla storia utilizzando clustering, estrazione di curve di tensione e sondaggi. Questa procedura restituisce un insieme di cluster, ognuno con la sua propria curva di tensione e il suo proprio punteggio qualitativo medio. Il creatore della storia può ispezionare il clustering ottenuto e iterare sul suo sistema di storytelling alla luce delle nuove conoscenze acquisite. Ciò potrebbe portare anche a un'associazione tra la forma della curva di tensiona e la qualità di una storia.

Questa metodologia viene applicata a un sistema di storytelling interattivo basato sulla storia per mostrare i suoi conseguimenti attuali e potenziali, rispettivamente. I risultati indicano che i cluster, anche se non ben formati, mostrano punteggi qualitativi differenti e che alcune curve di tensione sono associate a storie migliori. Anche se il metodo si è dimostrato valido, c'è spazio per miglioramenti.

### Documenti e codice

Qui sono disponibili alcuni documenti relativi alla tesi e il codice sorgente dell'implementazione della metodologia, Dupin.

* [Tesi](/files/uni/sds/thesis.pdf).
* [Presentazione](/files/uni/sds/slides.pdf) usata durante la dissertazione.
* [Dupin](https://github.com/msilvestro/dupin) (Detective UPon INteractive stories), l'implementazione della metodologia sviluppata nella tesi.
