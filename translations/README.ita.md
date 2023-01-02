<kbd>[<img title="Serbo" alt="Serbo" src="https://cdn.staticaly.com/gh/hjnilsson/country-flags/master/svg/rs.svg" width="22">](../README.md)</kbd>
<kbd>[<img title="Inglese" alt="Inglese" src="https://cdn.staticaly.com/gh/hjnilsson/country-flags/master/svg/gb.svg" width="22">](README.en.md)</kbd>

## Libreria in linea | Applicazione Web & API | Laravel 9  <img height="25" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" />
### Cos'è una "Biblioteca online"?
>La biblioteca online è un progetto della ICT Cortex Academy destinato agli studenti delle scuole superiori per prepararsi al meglio e in modo più efficiente a tutte le sfide future che li attendono. Maggiori informazioni sono di seguito...

![dahboard-pagina](https://i.postimg.cc/VLj9MD8R/dashboard.png)
![libro](https://i.postimg.cc/gJHd8Cgp/knjiga.png)
![crop](https://i.postimg.cc/qv6Tjh1j/image-crop.png)

## Necessario
* PHP >= v.8.0 
* Composer >= v.2.4
* Ti suggeriamo di visitare il sito ufficiale di Laravel

#### GD - Estensione PHP per la manipolazione delle foto
In questo progetto vengono utilizzati pacchetti per manipolare dinamicamente le foto allegate, quindi è possibile che appaia un errore se il tuo file "php.ini" non è configurato correttamente. Per impostazione predefinita, questo file disabilita alcune estensioni e questi pacchetti (dipendenze) che abbiamo utilizzato nel progetto. Tutto quello che serve è:
<br>
->  Apri il tuo file "php.ini" come documento di testo (utilizzando Blocco note o altro software simile)
<br>
->  Trova la riga `;extension=gd` e cambiala in `extension=gd`
<br>
->  Riavvia il tuo server Apache
> Se non sai come trovare il file "php.ini"... il percorso più comune è `C:\php`. Puoi anche digitare il comando: `php --ini' nel prompt dei comandi per ottenere maggiori informazioni

#### Possibile errore: 
-> "Crittografia non supportata o lunghezza della chiave errata. Le crittografie supportate sono..."
<br>
È un APP_KEY generato in modo errato, ad es. una chiave di crittografia dell'applicazione. Apri il file ".env" che si trova nella radice del progetto. Elimina il valore inserito ed esegui il comando:
> php artisan key:generate

-> "SQLSTATE[HY000] [2002] Non è stato possibile stabilire alcuna connessione perché la macchina di destinazione l'ha rifiutata attivamente"
<br>
Potresti non aver avviato il tuo server locale. A seconda del software che stai utilizzando come pacchetto server, avvialo insieme al server Apache e riprova. Software conosciuto: WAMP, XAMPP, ampss e così via.

## Installazione
* Clona questo repository usando questo comando:
```shell
git clone https://github.com-tim4-22/library.git
 ```
* Entra nella cartella principale se non ci sei già

* Installa/aggiorna i pacchetti del compositore:
```shell
composer install | composer update
```
* Copia il file .env.example nel file .env e configura le variabili in base al tuo ambiente
* Puoi farlo con il seguente comando:
```shell
cp .env.example .env
```
* Poiché questa applicazione utilizza Algolia per la ricerca, sarà necessario chiedere all'amministratore le chiavi delle seguenti variabili:
```shell
SCOUT_DRIVER | SCOUT_QUEUE | ALGOLIA_APP_ID | ALGOLIA_SECRET
```
* Inoltre, poiché questa app utilizza Laravel Socialite per la registrazione/l'accesso utilizzando un'app/piattaforma di terze parti come Google, GitHub, ecc., dovrai chiedere all'amministratore le chiavi delle seguenti varianti:
```shell
GITHUB_CLIENT_ID | GITHUB_CLIENT_SECRET | GITHUB_REDIRECT_URL

* Se vuoi integrare la newsletter, puoi definire i tuoi valori per le variabili specificate:
```shell
MAILCHIMP_APIKEY | MAILCHIMP_LIST_ID
```
Utilizziamo un servizio di posta newsletter: Mailchimp

* Se vuoi visitare il tuo database locale in modo rapido, efficiente e moderno, puoi farlo facilmente con l'amministratore che abbiamo integrato insieme all'applicazione. Puoi visitare l'interfaccia utente di amministrazione andando a:
```shell
{{base_url}}/adminer
```
Usiamo il tema: Hydra Dark

```
* Genera chiave di crittografia:
```shell
php artisan key:generate
``` 
* Esegui migrazioni:
```shell
php artisan migrate 
```
* Se il tuo database è già pieno usa questo comando:
```shell
php artisan migrate:fresh
```     
* A scopo di test, puoi utilizzare il server già integrato di Laravel con il comando:
```shell
php artisan serve
```

Dopo aver eseguito tutti i comandi precedenti, dovresti eseguire l'applicazione e vederla su http::/localhost del tuo dominio a seconda della tua configurazione.

> Nota 1.1: Se vuoi scrivere/eseguire test già esistenti, assicurati di cambiare la variabile env: APP_ENV=local -> APP_ENV=testing

> Note 1.2: se si desidera eseguire il backup del database, farlo utilizzando il comando pacchetto integrato:
```shell
php artisan backup:run
```

## Organizzazione del progetto
> Tutti i progressi vengono monitorati sulla seguente piattaforma di gestione dei progetti:
- Trello
- monday.com
- Asana
#### Tutte le schede sono sincronizzate.
> per i link contattare l'amministratore

## Credenziali
* Puoi accedere con le seguenti credenziali:
    * Indirizzo e-mail: admin@gmail.com
    * gli password: nekalozinka
    
* Flusso di lavoro del progetto
    - All'avvio dell'applicazione, ti verrà mostrata una pagina di "benvenuto" con informazioni aggiuntive
    - Quando accedi, verrai reindirizzato alla pagina "dashboard" dove puoi vedere più cose come le ultime attività (lo stesso giorno), le ultime prenotazioni di libri, le statistiche sui libri e così via
    - In questa pagina puoi andare ad altre pagine utilizzando il menu laterale (barra laterale), inserire il tuo profilo, uscire e altro
    - Clicca sull'immagine nell'angolo in alto a destra per entrare nel tuo profilo o uscire
    - Ogni utente può eliminare il proprio account, con conferma preventiva (finestra di dialogo) dopodiché l'applicazione lo reindirizza ad una apposita pagina di "Arrivederci"
    
* Ci sono tre ruoli:
- `amministratore`, `bibliotecario` and `alunno`

## Ruoli

### Amministratore
* L'amministratore ha accesso a tutto sull'applicazione

### Bibliotecario
* Possibilità di creare, modificare ed eliminare:
- alunno
- prenotare
- autore
- categoria, genere, editore, rilegatura, formato, lettera
* **Operazioni** disponibili:
- Per rilasciare una copia del libro
- Per cancellare una copia del libro
- Per restituire una copia del libro
- Per prenotare una copia del libro

### Alunno
* **Operazioni** disponibili:
- Per rilasciare una copia del libro e **solo una al momento**
* Se lo studente ha:
- una prenotazione attiva o una prenotazione in sospeso, non è possibile inviare una richiesta di prenotazione del libro
- se hai una prenotazione rifiutata o scaduta, puoi inviare una richiesta di prenotazione del libro

## Vista tabulare:

| Funzionalità     | Amministratore        | Bibliotecario      | Alunno  |
| ------------- |:-------------:|:-------------:| -----:|
| Chiusura dell'applicazione | ✔️ | ❌ | ❌ |
| Attivazione dell'applicazione | ✔️ | ❌ | ❌ |
| Gestione database - CSV | ✔️ | ❌ | ❌ |
| Alterazione delle meta informazioni| ✔️ | ❌ | ❌ |
| Modifica delle variabili globali | ✔️ | ❌ | ❌ |
| CRUD su amministratori | ✔️ | ❌ | ❌ |
| CRUD sui bibliotecari | ✔️ | ✔️ | ❌ |
| CRUD sugli studenti | ✔️ | ✔️ | ❌ |
| CRUD sui libri | ✔️ | ✔️ | ❌ |
| CRUD sugli autori | ✔️ | ✔️ | ❌ |
| CRUD sulle impostazioni | ✔️ | ✔️ | ❌ |
| Modifica il tuo profilo | ✔️ | ✔️ | ✔️ |
| Visualizzazione dei libri disponibili | ✔️ | ✔️ | ✔️ |
| Libri in affitto | ✔️ | ✔️ | ❌ |
| Libri restituiti | ✔️ | ✔️ | ❌ |
| Libri scaduti | ✔️ | ✔️ | ❌ |
| Prenotazioni di libri attivi | ✔️ | ✔️ | ✔️ |
| Prenotazioni di libri archiviati | ✔️ | ✔️ | ✔️ |
| Prenota prenotazioni | ✔️ | ✔️ | ✔️ |

## Nota:
> Se la prenotazione è effettuata da un bibliotecario, assume immediatamente lo stato "Accettata", mentre se è effettuata da uno studente, assume lo stato "In attesa" finché il bibliotecario non l'accetta.

## Restituzione del libro
> Azione - l'operazione di restituzione libretto è disponibile solo se il libretto è stato emesso

## Cancellare il libro
> Azione - l'operazione di cancellazione del libro è disponibile solo se il libro è scoperto

## Prenotazioni - stati
> Le prenotazioni hanno 5 stati:
- Accettato
- Respinto
- In attesa
- Archiviato
- Scaduto
## Sessioni - messaggi flash - stati
- Informazioni
- Con successo
- Fallito

## Protezione e sicurezza
- Protezione del middleware su tutti i percorsi (web e API)
- Token CSRF - protezione
- Politiche utilizzate
- Hashing delle password - bcrypt
- Protezione su tre livelli... per ruoli -> amministratore, bibliotecario e studente
- Honeypot 
- Protezione XSS

## Lavori cron: attività pianificate
> Ci sono 3 compiti:
- La prima attività che viene eseguita su base giornaliera e che archivia automaticamente le prenotazioni attive scadute
- Un'altra attività che viene eseguita su base mensile ed elimina automaticamente gli utenti che non hanno effettuato l'accesso per più di 365 giorni
- La terza attività viene eseguita due volte al giorno e cambia automaticamente lo stato della biblioteca in termini di lavoro. Quando la libreria è chiusa, lo stato è '0' e quando è aperta è '1'. Con orari di lavoro definiti, inizio e fine in ore, questa attività viene eseguita in tali orari e cambia lo stato

## Modalità di spegnimento
> L'amministratore può "inviare" l'applicazione alla cosiddetta modalità "spegnimento". Laravel ha un comando "php artigiano down" integrato che "chiude" l'applicazione.
La nostra applicazione funziona utilizzando il percorso web "/shutdown" che è protetto.

### Passaggi:
1. Quando vuoi chiudere l'applicazione -> Vai all'URL "{{base_url}}/shutdown"! nota: devi essere loggato ed essere un "amministratore"
2. Quando vuoi avviare l'applicazione -> Vai all'URL "{{base_url}}/live.php" dopo di che apparirà una pagina di "reindirizzamento"

## Aggiuntivo
* Distribuzione automatica - cPanel
* Lavori Cron
* Ajax requests
* Messaggi di sessione flash dettagliati
* Utenti, categorie e generi hanno una foto standard (predefinita).
* Statistiche dinamiche sulla pagina "dashboard".
* Implementata l'impaginazione Tailwind con un elenco a discesa
* Eventi e ascoltatori di Laravel (ultimo accesso alle, conteggio degli accessi)
* Accessori Laravel
* Pianificazione delle attività di Laravel
* Laravel Eloquente / Costruttore di query
* Regole di convalida Laravel personalizzate
* Componenti Laravel
* Politica di impaginazione
* Percorsi organizzati per cartelle
* Conteggio delle notifiche
* Indicatore password - funzionalità
* Ricerca a testo integrale | Algolia | Esploratore Laravel
* Eliminazione multipla
* Campi di completamento automatico per e-mail, nome utente - funzionalità
* Aggiunto CKEditor come editor di testo "ricco".
* Comprimere e ridimensionare (adattando automaticamente la larghezza) alle foto caricate
* Ritaglio di immagini
* Modalità di manutenzione e relativa pagina
* Prestazioni ottimali (242 ms) Grado GTmetrix
* Pagina "Non trovato".
* Pagina "Non consentito".
* Titolo e meta tag appropriati
* Informazioni individuali durante la selezione
* Il token API scade -> 1h -> 3600s
* Revoca del token API dopo la modifica della password
* Risorse e raccolte API
* Convalida dell'indirizzo e-mail (e-mail della scuola)
* Preloader - animazione
* Sessi degli utenti
* Password occhio - funzionalità
* Allegato PDF per i libri
* Corrispondenza di parole (1 copia, 4 copie)
* Percorsi web personalizzati per l'accesso e la registrazione
* Manuale CSV
* 3 tentativi di accesso consentiti
* Multi filtri
* Dati standard (predefiniti) durante le migrazioni
* Indicatore di scorrimento - funzionalità
* Scorri verso l'alto - funzionalità
* Codice strutturato, percorsi e cartelle
* Codici di stato HTTP corretti
* Schermo intero - funzionalità
* Ordinamento in entrambe le direzioni (asc,desc) - funzionalità
* Percorsi ottimizzati SEO
* Codice minimizzato
* Carica di più - animazione
* Messaggi di convalida personalizzati
* Anteprima immagine - Lightbox - funzionalità
* Convalida del modulo

## RESTful API - Passaporto

[Documentazione - Postino](https://tinyurl.com/bdz4jar6)

[Documentazione - Spavalderia](https://tinyurl.com/44yz58v2)

Questa API contiene:

77 richieste, di cui:

* 46 richieste GET
* 11 richieste POST
* 10 richieste PUT
* 10 richieste di CANCELLAZIONE

Ogni richiesta deve essere preceduta da "v1" -> versione 1.0.
### Possibili errori

errore-0001 -> Non trovato, 404

errore-0002 -> Richiesta errata, 400

errore-0003 -> Errore di convalida, 422

error-0004 -> Ruolo errato, 406

error-0005 -> Il libro non ha autore, categoria o genere, 406

Trovato un bug?
-------------
[Invia problema](https://github.com/ca-tim4-22/library/issues) (richiede un account GitHub)

## Contribuisci al progetto
[CONTRIBUTING.md](/CONTRIBUTING.md)

## 🚀 Tecnologie usate

* PHP v.8.1.
* Laravel v.9.32 / Laravel Blade
* MySQL
* Ajax
* HTML v.5 / CSS v.3 / Tailwind CSS v.3
* JavaScript / JQuery v.3.6
* cdnjs
* Tippy.js
* Sweet Alert v.2
* Popper.js
* Font Awesome v.5.15
* Flowbite

## 🚀 Strumenti e pacchetti aggiuntivi
* Mailtrap
* Algolia
* Laravel UI
* Laravel Sluggable
* Laravel Debugbar
* Laravel Telescope
* Laravel Socialite
* Laravel Backup
* Laravel IDE helper
* CKEditor 
* Composer
* Tinker
* Enlightn
* Git/GitHub
* Swift Mailer
* Heroku
* Laravel Scout
* GitHub Actions / FTP Deploy
* HTML Laravel Collective v.6
* FakerPHP
* Guzzle
* Intervention Image
* ijaboCrop Tool
* Passport authentication
* Query detector
* Postman
* Swagger
* Insomnia
* GTmetrix
* Visual Studio Code
* phpMyAdmin
* Git/GitHub
* Adminer
* HeidiSQL
* XAMPP
* Honeypot
* Mailchimp integration
* reCAPTCHA

## 🚀 Azioni GitHub
* GitHub pages
* Auto deployment on hosting
* Image Compressing
* Enlightn checks
* Dependabot
* First interaction

> team nullable()
<div>
<a href="https://perisicnikola37.github.io/nullable" target="_blank"><img src="https://i.postimg.cc/LXgdny5s/nullable.jpg" width="35"></a>
<a href="https://ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/CMHZTdSJ/cortex.jpg" width="35"></a>
<a href="https://academy.ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/h46syRT4/cortex-academy-logo.png" width="35"></a>
<a href="https://www.elektropg.online/" target="_blank"><img src="https://i.postimg.cc/cHNTcVzk/elektro-logo.png" width="35"></a>
<a href="https://cg.cobiss.net/" target="_blank"><img src="https://i.postimg.cc/152Vp9xP/cobiss-logo.png" width="35"></a>
<a href="https://coinis.com/" target="_blank"><img src="https://i.postimg.cc/ZnhJsPWZ/coinis.jpg" width="35"></a>
</div>





