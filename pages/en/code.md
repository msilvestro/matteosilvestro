## Code

I'm Matteo Silvestro, a scatterbrained wanderer always looking for new routes. Here is my collection of coding projects.

### Qlik Butler

@ February 5, 2020

I worked for some time as a Qlik Sense and NPrinting system administrator. To ease the need for trivial and recurring tasks characteristic of this job, I harnessed the power of [Qlik-Cli][qcli] to create an automation scripts suite. From this small core I started to build the foundation of a bigger project, that also included a graphical user interface, written in PowerShell.

It is composed of two parts:
* **Qlik Butler**, which performs various tasks on every node of each cluster, such as (but not limited to):
    * services restart;
    * app and extension import;
    * backup.
* **Qlik Butler Manager**, which keeps under control all clusters from a single interface and allows to install, uninstall and update all Qlik Butler installations. Must be installed on a server that has access to all of the above clusters.

[qcli]: https://github.com/ahaydon/Qlik-Cli

---

![Qlik Butler screenshot][img_qb]

* [Github repository][repo]

[img_qb]: /img/code/qlik_butler.png

[repo]: https://github.com/msilvestro/QlikButler
