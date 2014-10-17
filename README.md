# PHP API Framework Skeleton

Questo progetto è un esempio di progetto PHP che mette a disposizione dei servizi Rest.



## Install Composer

Il progetto richiede Composer per la gestione dei componenti esterni:

<http://getcomposer.org/doc/00-intro.md#installation>

## Installare l'applicazione

Dopo aver installato Composer:

* Scaricare il codice dell'applicazione: git clone https://github.com/mondora/slim-skel.git
* Installare le dipendenze con il comando: php composer.phar install
* Configurare un nuovo VirtualHost di Apache per puntare alla directory delle pagine nel progetto slim-skel
* Assicurarsi che le direcotory `logs/` e `templates/cache` abbiamo i permessi di scrittura
* Verificare la connessione al DB

## How to Contribute

### Pull Requests

1. Fork the Slim Skeleton repository
2. Create a new branch for each feature or improvement
3. Send a pull request from each feature branch to the **develop** branch

It is very important to separate new features or improvements into separate feature branches, and to send a
pull request for each branch. This allows us to review and pull in new features or improvements individually.

### Style Guide

All pull requests must adhere to the [PSR-2 standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).
