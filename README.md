<kbd>[<img title="Engleski" alt="Engleski" src="https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png" width="22">](translations/README.en.md)</kbd>
<kbd>[<img title="Italijanski" alt="Italijanski" src="https://upload.wikimedia.org/wikipedia/en/thumb/0/03/Flag_of_Italy.svg/1500px-Flag_of_Italy.svg.png" width="22">](translations/README.ita.md)</kbd>

## Online biblioteka | Veb aplikacija & API | Laravel 9  <img height="25" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" />
### Šta je "Online biblioteka"?
> Online biblioteka predstavlja projekat ICT Cortex akademije namijenjen učenicima srednjih škola kako bi se što bolje i efikasnije spremili za sve buduće izazove koje ih čekaju. Više informacija ispod...

Naša platforma se može pohvaliti širokim spektrom najsavremenijih funkcija, a sve su dizajnirane da revolucionišu proces upravljanja bibliotekom i podignu korisničko iskustvo na sledeći nivo.

Uz naš sistem, uživaćete u fleksibilnosti dodjeljivanja uloga i dozvola, obezbjeđujući optimalnu bezbjednost i kontrolu pristupa. Naša funkcija pretraživanja punog teksta omogućava brzo i lako otkrivanje sadržaja, dok naša API integracija pojednostavljuje upravljanje podacima.

Pored toga, naš sistem nudi neuporedive mogućnosti obrade slika, uključujući isjecanje, kompresovanje i kropovanje, što olakšava upravljanje slikama. Za lak pristup i pogodnost korisnika, nudimo besprekornu integraciju GitHub prijave i registracije, a uvoz podataka je brz zahvaljujući našoj funkciji uvoza CSV-a.

Ostanite povezani i držite svoje korisnike u toku pomoću naše funkcije biltena i osigurajte optimalnu sigurnost uz našu najsavremeniju reCAPTCHA integraciju. Sa našim inovativnim višejezičnim sistemom upravljanja školskim bibliotekama, mogućnosti su beskrajne!

![dahboard-page](https://i.postimg.cc/VLj9MD8R/dashboard.png)
![book](https://i.postimg.cc/gJHd8Cgp/knjiga.png)
![crop](https://i.postimg.cc/qv6Tjh1j/image-crop.png)

## Obavezno 
* PHP >= v.8.0 
* Composer >= v.2.4
* Predlažemo da posjetite Laravel-ov oficijalni vebsajt

#### GD - php ekstenzija za manipulaciju fotografija
S obzirom da su korišćeni paketi za dinamično manipulisanje priloženih fotografija moguće je da se pojavi greška ukoliko Vam fajl "php.ini" nije ispravno konfigurisan. Ovaj fajl po default-u onemogućava određene ekstenzije, a time i pakete (dependencies) koje smo koristili u projektu. Sve što je potrebno jeste:
<br>
-> Da otvorite Vaš "php.ini" fajl kao tekstualni dokument (koristeći Notepad ili neki drugi slični softver)
<br>
->  Pronađite liniju `;extension=gd` i izmijenite je u `extension=gd`
<br>
->  Restartujte Vaš apache server
> Ukoliko ne znate da pronađete "php.ini" fajl.. najčešći path je `C:\php`. Možete ukucati i komandu: `php --ini` u command promt-u kako biste dobili još informacija

#### Moguća greška: 
-> "Unsupported cipher or incorrect key length. Supported ciphers are..."
<br>
U pitanju je loše izgenerisani APP_KEY tj. enkripcioni ključ aplikacije. Otvorite ".env" fajl koji se nalazi u root-u projekta. Izbrišite upisanu vrijednost i pokrenite komandu:
> php artisan key:generate

-> "SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it"
<br>
Moguće je da niste startovali Vaš lokalni server. U zavisnosti koji softver koristite kao serverski paket pokrenite ga kao i Apache server i pokušajte ponovo. Poznati softveri: WAMP, XAMPP, ampps i tako dalje.

#### Moguća greška: 
-> "Could not find driver (SQL: SHOW FULL TABLES WHERE table_type = 'BASE TABLE').."
<br>
Poruka o grešci "Nije moguće pronaći drajver“ obično ukazuje na to da PHP ekstenzija za drajver baze podataka koju koristite nije instalirana ili omogućena na Vašem sistemu.
Otvorite datoteku "php.ini" u uređivaču teksta i potražite red koji počinje sa ekstenzijom=. Dekomentarišite red tako što ćete ukloniti tačku i zarez (;) na početku reda i zamijenite <ime-ekstenzije> imenom PHP ekstenzije koju ste instalirali u koraku 2.
> extension=mysql

## Instalacija
* Klonirajte ovaj repozitorijum sledećom komandom:
```shell
git clone https://github.com/ca-tim4-22/library.git
 ```
* Uđite u root folder ukoliko već niste u njemu

* Instalirajte/apdejtujte composer pakete
```shell
composer install | composer update
```

* Kopirajte .env.example fajl u .env fajl i konfigurišite varijable u skladu sa vašim okruženjem (environment).
* To možete uraditi sledećom komandom:
```shell
cp .env.example .env
```
* S obzirom da ova aplikacija koristi Algoliu za pretraživanje moraćete pitati administratora za ključeve sledećih varijabli:
```shell
SCOUT_DRIVER | SCOUT_QUEUE | ALGOLIA_APP_ID | ALGOLIA_SECRET
```
* Takođe, s obzirom da ova aplikacija koristi Laravel Socialite za registraciju/logovanje pomoću third party aplikacija/platformi poput Google-a, GitHub-a i sl. moraćete pitati administratora za ključeve sledećih varijabli:
```shell
GITHUB_CLIENT_ID | GITHUB_CLIENT_SECRET | GITHUB_REDIRECT_URL
```

* Ukoliko želite da integrišete newsletter možete definisati svoje vrijednosti za navedene varijable:
```shell
MAILCHIMP_APIKEY | MAILCHIMP_LIST_ID
```
Koristimo newsletter mail servis: Mailchimp

* Ukoliko želite da posjetite Vašu lokalnu bazu podataka na brz, efikasan i moderan način to možete veoma lako izvršiti pomoću adminera kojeg smo integrisali zajedno uz aplikaciju. Adminer UI možete posjetiti odlaskom na:
```shell
{{base_url}}/adminer
```
Koristimo temu: Hydra Dark

* Generišite enkripcioni ključ:
```shell
php artisan key:generate
```
* Izvršite migracije
```shell
php artisan migrate 
```
* Ukoliko Vam je baza podataka već ispunjena
```shell
php artisan migrate:fresh
```     
* Za testne potrebe, možete iskoristiti Laravel-ov već ugrađeni (built-in) server komandom:
```shell
php artisan serve
```

Nakon izvršenja svih gore navedenih komandi, trebalo bi da možete pokrenuti aplikaciju i vidjeti je na http::/localhost Vašeg domena u zavisnosti od konfiguracije.

> Napomena 1.1: Ukoliko želite da pišete/izvršavate već postojeće testove budite sigurni da ste izmijenili env varijablu: APP_ENV=local -> APP_ENV=testing

> Napomena 1.2: Ukoliko želite da napravite backup Vaše baze podataka, to možete uraditi pomoću integrisanog paketa komandom:
```shell
php artisan backup:run
```

## Organizacija projekta
> Cijeli progres se prati na sledećim platformama za project management:
- Trello
- monday.com
- Asana
#### Svi board-ovi su sinhronizovani.
> za link-ove kontaktirati administratora 

## Kredencijali
* Možete se ulogovati sledećim kredencijalima:
    * Email adresa: admin@gmail.com
    * Lozinka: nekalozinka
    
* Projektni Workflow
    - Prilikom startovanja aplikacije prikazaće Vam se "welcome" stranica sa dodatnim informacijama
    - Kada se ulogujete, bićete redirektovani ka "dashboard" stranici gdje možete vidjeti više stvari poput najnovijih aktivnosti (isti dan), najnovije rezervacije knjige, statistiku knjiga i slično
    - Na ovoj stranici možete otići na druge stranice koristeći meni sa strane (sidebar), ući u svoj profil, odjaviti se i tako dalje
    - Kliknite na sliku u gornjem desnom ćošku kako biste ušli u Vaš profil ili se odjavili
    - Svaki korisnik može da izbriše svoj nalog, uz prethodno potvrđeni (dialog box) nakon čega ga aplikacija redirektuje na posebnu stranicu "good-bye"
    
* Dostupne su tri role: 
- `administrator`, `bibliotekar` i `učenik`

## Role

### Administrator/ka
* Administrator ima pristup svemu na aplikaciji

### Bibliotekar/ka
* Mogućnost kreiranja, izmjene i brisanja:
- učenika / učenice
- knjige
- autora / autorke
- kategorija, žanrova, izdavača, poveza, formata, pisama 
* Dostupne **radnje** - **operacije**:
- Da izda primjerak knjige
- Da otpiše primjerak knjige
- Da vrati primjerak knjige
- Da rezerviše primjerak knjige

### Učenik/ca
* Dostupne **radnje** - **operacije**:
- Da rezerviše primjerak knjige i **to samo jednu u jednom momentu**
* Ukoliko učenik/ca ima:
- aktivnu rezervaciju ili rezervaciju na čekanju, ne može poslati zahtjev za rezervaciju knjige
- ukoliko ima odbijenu ili isteklu rezervaciju, može poslati zahtjev za rezervaciju knjige

## Tabelarni prikaz:

| Funckionalnost     | Administrator/ka        | Bibliotekar/ka      | Učenik/ca  |
| ------------- |:-------------:|:-------------:| -----:|
| Gašenje aplikacije           | ✔️ | ❌ | ❌ |
| Aktivacija aplikacije        | ✔️ | ❌ | ❌ |
| Upravljanje bazom - CSV      | ✔️ | ❌ | ❌ |
| Izmjena meta informacija     | ✔️ | ❌ | ❌ |
| Izmjena globalnih varijabli  | ✔️ | ❌ | ❌ |
| CRUD nad administratorima    | ✔️ | ❌ | ❌ |
| CRUD nad bibliotekarima      | ✔️ | ✔️ | ❌ |
| CRUD nad učenicima           | ✔️ | ✔️ | ❌ |
| CRUD nad knjigama            | ✔️ | ✔️ | ❌ |
| CRUD nad autorima            | ✔️ | ✔️ | ❌ |
| CRUD nad podešavanjima       | ✔️ | ✔️ | ❌ |
| Izmjena svog profila         | ✔️ | ✔️ | ✔️ |
| Prikaz dostupnih knjiga      | ✔️ | ✔️ | ✔️ |
| Izdate knjige                | ✔️ | ✔️ | ❌ |
| Vraćene knjige               | ✔️ | ✔️ | ❌ |
| Knjige u prekoračenju        | ✔️ | ✔️ | ❌ |
| Aktivne rezervacije knjiga   | ✔️ | ✔️ | ✔️ |
| Arhivirane rezervacije knjiga| ✔️ | ✔️ | ✔️ |
| Rezervacija knjige           | ✔️ | ✔️ | ✔️ |

## Napomena:
> Ukoliko rezervaciju izvrši bibliotekar/ka, ona odmah dobija status "Prihvaćena", a ukoliko je izvrši učenik/ca dobija status "Na čekanju" sve dok je bibliotekar/ka ne prihvati

## Vraćanje knjige
> Radnja - operacija vraćanja knjige je dostupna samo ukoliko je knjiga izdata

## Otpisivanje knjige
> Radnja - operacija otpisivanja knjige je dostupna samo ukoliko je knjiga u prekoračenju

## Rezervacije - statusi
> Rezervacije imaju 5 statusa:
- Prihvaćena
- Odbijena
- Na čekanju
- Arhivirana
- Istekla

## Session - flash poruke - statusi
- Info
- Uspješno
- Bezuspješno

## Zaštita
- Middleware zaštita na svim rutama (web i api)
- CSRF token - protekcija
- Korišćene polise
- Hash-ovanje lozinki - bcrypt
- Zaštita na tri nivoa.. po rolama -> administrator/ka, bibliotekar/ka i učenik/ca
- Honeypot 
- XSS zaštita

## Cron jobs
> Postoje 3 "zadatka":
- Prvi zadatak koji se izvršava na dnevnom nivou i koji aktivne istekle rezervacije automatski arhivira
- Drugi zadatak koji se izvršava na mjesečnom nivou i koji automatski briše korisnike koji se nisu ulogovali duže od 365 dana
- Treći zadatak se izvršava dvaput dnevno i automatski mijenja status biblioteke u radnom smislu. Kada je biblioteka zatvorena status je '0', a kada je otvorena '1'. Sa definisanim radnim vremenom, početak i kraj u satima, ovaj zadatak se izvršava u tim terminima i mijenja status

## Shutdown mode
> Administrator može "poslati" aplikaciju u tzv. "shutdown" mode. Laravel u sebi ima ugrađenu komandu "php artisan down" koja "gasi" aplikaciju. 
Na našoj aplikaciji to radimo pomoću web rute "/shutdown" koja je zaštićena.
### Koraci:
1. Kada želite ugasiti aplikaciju -> Otići na URL "{{base_url}}/shutdown" ! napomena: morate biti ulogovani i biti "administrator"
2. Kada želite upaliti aplikaciju -> Otići na URL "{{base_url}}/live.php" nakon čega će vam se pojaviti "redirect" stranica

## Dodatno
* Auto deployment - cPanel
* Cron jobs
* Ajax requests
* Detaljne flash-session poruke 
* Korisnici, kategorije i žanrovi imaju standardnu (default) fotografiju
* Dinamična statistika na "dashboard" stranici
* Implementirana Tailwind paginacija sa padajućom listom 
* Laravel Events & Listeners (last login at, login count)
* Laravel Accessors
* Laravel Task Scheduling
* Laravel Eloquent / Query Builder
* Custom Laravel Validation rules
* Laravel components
* Polisa za paginaciju
* Organizovane rute po folderima
* Notification count 
* Password indicator - funkcionalnost
* Full text search | Algolia | Laravel Scout
* Multiple delete
* Autocomplete fields for email, username - funkcionalnost
* Dodat CKEditor kao "bogati" tekstualni editor
* Kompresovanje i resize(auto fit width) fotografija
* Kropovanje fotografija
* Maintenance mode i stranica za isti
* Optimalne performanse (242ms) GTmetrix Grade
* "Not found" stranica
* "Not allowed" stranica
* Odgovarajući title i meta tagovi
* Single info prilikom selektovanja
* API Token expire -> 1h -> 3600s
* API Token revoke nakon izmjene lozinke
* API Resources i Collections
* Validacija email adrese (školski email)
* Preloader - animacija
* Polovi za korisnike 
* Password eye - funkcionalnost
* PDF attachment za knjige
* Prilagođavanje riječi (1 primjerak, 4 primjerka)
* Custom web rute za login i register
* Upustvo za CSV
* Dozvoljena 3 pokušaja logovanja
* Brisanje fotografija nakon brisanja korisnika, knjige itd.
* Multi filteri
* Default podaci prilikom migracija
* Scroll indicator - funkcionalnost
* Scroll to top - funkcionalnost
* Struktuiran kod, rute i folderi
* Tačni HTTP status kodovi
* Fullscreen - funkcionalnost
* Sortiranje u oba smjera (asc,desc) - funkcionalnost
* SEO optimizovane rute
* Minified code
* Load more - animacija
* Custom validation messages
* Image preview - Lightbox - funkcionalnost
* Validacija formi

## RESTful API - Passport

[Dokumentacija - Postman](https://tinyurl.com/mu8sszvy)

[Dokumentacija - Swagger](https://tinyurl.com/44yz58v2)

Ovaj API sadrži:

77 zahtjeva, od čega:

* 46 GET zahtjeva
* 11 POST zahtjeva
* 10 PUT zahtjeva
* 10 DELETE zahtjeva

Svaki zahtjev mora imati prefiks "v1" -> version 1.0.

### Moguće greške

error-0001 -> Nije pronađeno, 404

error-0002 -> Neispravan zahtjev, 400

error-0003 -> Greška u validaciji, 422

error-0004 -> Pogrešan role, 406

error-0005 -> Knjiga nema autora, kategoriju ili žanr, 406

Pronašli ste bug?
-------------
[Pošaljite problem](https://github.com/ca-tim4-22/library/issues) (zahtijeva GitHub nalog)

## Doprinesi projektu
[CONTRIBUTING.md](CONTRIBUTING.md)

## 🚀 Korišćene tehnologije

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

## 🚀 Dodatni alati i paketi
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

## 🚀 GitHub akcije
* GitHub pages
* Auto deployment on hosting
* Image Compressing
* Enlightn checks
* Dependabot
* First interaction

> tim nullable()
<div>
<a href="https://perisicnikola37.github.io/nullable" target="_blank"><img src="https://i.postimg.cc/LXgdny5s/nullable.jpg" width="35"></a>
<a href="https://ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/CMHZTdSJ/cortex.jpg" width="35"></a>
<a href="https://academy.ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/h46syRT4/cortex-academy-logo.png" width="35"></a>
<a href="https://www.elektropg.online/" target="_blank"><img src="https://i.postimg.cc/cHNTcVzk/elektro-logo.png" width="35"></a>
<a href="https://cg.cobiss.net/" target="_blank"><img src="https://i.postimg.cc/152Vp9xP/cobiss-logo.png" width="35"></a>
<a href="https://coinis.com/" target="_blank"><img src="https://i.postimg.cc/ZnhJsPWZ/coinis.jpg" width="35"></a>
</div>





