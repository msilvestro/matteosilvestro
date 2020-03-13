## Codice

Sono Matteo Silvestro, un errante con la testa fra le nuvole in cerca di strade non battute. Qui è presente una raccolta dei miei progetti in codice.

### Qlik Butler

@ 5 febbraio 2020

Ho lavorato per un periodo come amministratore di sistema su server Qlik Sense e NPrinting. Per ridurre i tediosi e ripetitivi compiti tipici di questo lavoro, ho sfruttato la potenzialità delle [Qlik-Cli][qcli] per creare una suite di script volta all'automazione. Da questo piccolo nucleo ho poi posto le basi per un progetto più grande, che comprende anche un'interfaccia grafica, il tutto scritto in PowerShell.

È composto da due programmi:
* **Qlik Butler**, che permette di effettuare diverse operazioni su tutti i nodi di ogni cluster, tra cui:
    * riavvio dei servizi;
    * importazione di app ed extension;
    * backup.
* **Qlik Butler Manager**, che permette di tenere sotto controllo tutti i cluster in un'unica interfaccia e di installare, disinstallare e aggiornare in blocco le versioni di Qlik Butler installate su di essi. Deve essere installato su un server collegato a tutti i cluster.

[qcli]: https://github.com/ahaydon/Qlik-Cli

---

![Schermata di Qlik Butler][img_qb]

* [Repository su Github][repo]

[img_qb]: /img/code/qlik_butler.png

[repo]: https://github.com/msilvestro/QlikButler
