## Codice

Sono Matteo Silvestro, un errante con la testa fra le nuvole in cerca di strade non battute. Qui è presente una raccolta dei miei progetti in codice.

### Qlik Butler

@ 5 febbraio 2020

Ho lavorato per un periodo come amministratore di sistema su server Qlik Sense e NPrinting. Per ridurre i tediosi e ripetitivi compiti tipici di questo lavoro, ho sfruttato la potenzialità delle [Qlik-Cli][qcli], per creare una suite di script volta all'automazione. Da questo piccolo nucleo ho poi posto le basi per un progetto più grande, che comprende anche un'interfaccia grafica, il tutto scritto in PowerShell.

Il pacchetto si compone di due programmi:
* **Qlik Butler**, presente su tutti nodo di ogni cluster, permette di effettuare diverse operazioni, come riavvio dei servizi, importazione app e extension, backup.
* **Qlik Butler Manager**, presente su un server di gestione, permette di tenere sotto controllo tutti i cluster in un'unica interfaccia e di installare, disinstallare e aggiornare in massa le versioni di Qlik Butler installate.

[qcli]: https://github.com/ahaydon/Qlik-Cli

---

* [Repository su Github][repo]

[repo]: https://github.com/msilvestro/QlikButler
