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
* Cambiare il path assoluto in MyAutoloader.php