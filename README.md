## Online Biblioteka | Laravel 9  <img height="25" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" />

> Online biblioteka predstavlja projekat ICT Cortex akademije namijenjen učenicima srednjih škola, kako bi se što bolje i efikasnije spremili za sve buduće izazove koje ih čekaju. Više informacija ispod...

![dahboard-page](https://i.postimg.cc/VLj9MD8R/dashboard.png)
![page](https://i.postimg.cc/FKchsdc7/page.png)
![book](https://i.postimg.cc/gJHd8Cgp/knjiga.png)
![crop](https://i.postimg.cc/qv6Tjh1j/image-crop.png)

## Obavezno 
* PHP >= v.8.0 
* Composer >= v.2.4
* Predlažemo da posjetite Laravel-ov oficijalni vebsajt

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

* Kopirajte .env.example fajl u .env fajl i konfigurišite varijable u skladu sa vašim okruženjem(eng. environment).
* To možete uraditi sledećom komandom:
```shell
cp .env.example .env
```
* S obzirom da ova aplikacija koristi platformu "Algolia" za pretraživanje moraćete pitati administratora za ključeve sledećih varijabli:
```shell
SCOUT_DRIVER | SCOUT_QUEUE | ALGOLIA_APP_ID | ALGOLIA_SECRET
```
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
* Za testne potrebe, možete iskoristiti Laravel-ov već ugrađeni(eng. built-in) server komandom:
```shell
php artisan serve
```

Nakon izvršenja svih gore navedenih komandi, trebalo bi da možete pokrenuti aplikaciju i vidjeti je na http::/localhost Vašeg domena u zavisnosti od konfiguracije.

## Kredencijali
* Možete se ulogovati sledećim kredencijalima:
    * Email adresa: admin@gmail.com
    * Lozinka: nekalozinka
    
* Projektni Workflow
    - Prilikom startovanja aplikacije prikazaće Vam se "welcome" stranica sa dodatnim informacijama
    - Kada se ulogujete, bićete redirektovani ka "dashboard" stranici gdje možete vidjeti više stvari poput najnovijih aktivnosti(isti dan), najnovije rezervacije knjige, statistiku knjiga i slično
    - Na ovoj stranici možete otići na druge stranice koristeći meni sa strane(eng. sidebar), ući u svoj profil, odjaviti se i tako dalje
    - Kliknite na sliku u gornjem desnom ćošku kako biste ušli u Vaš profil ili se odjavili
    - Svaki korisnik može da izbriše svoj nalog, uz prethodno potvrđeni (eng. dialog box) nakon čega ga aplikacija redirektuje na posebnu stranicu "good-bye"
    
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

### Napomena:
> Ukoliko rezervaciju izvrši bibliotekar/ka, ona odmah dobija status "Prihvaćena", a ukoliko je izvrši učenik/ca dobija status "Na čekanju" sve dok je bibliotekar/ka ne prihvati

### Vraćanje knjige
> Radnja - operacija vraćanja knjige je dostupna samo ukoliko je knjiga izdata

### Otpisivanje knjige
> Radnja - operacija otpisivanja knjige je dostupna samo ukoliko je knjiga u prekoračenju

### Rezervacije - statusi
> Rezervacije imaju 5 statusa:
- Prihvaćena
- Odbijena
- Na čekanju
- Arhivirana
- Istekla

### Session - flash poruke - statusi
- Info
- Uspješno
- Bezuspješno

## Dodatno
* Dodata CSRF protekcija
* Dodata middleware zaštita na svim rutama(web i api)
* Dodate detaljne flash-session poruke sa nekoliko statusa
* Svaki korisnik ima standardnu(eng. default) fotografiju
* Implementirana statistika na "dashboard" stranici
* Implementirana paginacija sa padajućom listom 
* Dodat CKEditor kao bogati tekstualni editor
* Validacija formi

## RESTful API - Passport

[Dokumentacija - Postman](https://tinyurl.com/bdz4jar6)

[Dokumentacija - Swagger](https://tinyurl.com/44yz58v2)

Ovaj API sadrži:

77 zahtjeva, od čega:

* 46 GET zahtjeva
* 11 POST zahtjeva
* 10 PUT zahtjeva
* 10 DELETE zahtjeva

Svaki zahtjev mora imati prefiks "v1".

### Očekivane greške

error-0001 -> Nije pronađeno, 404

error-0002 -> Neispravan zahtjev, 400

error-0003 -> Greška prilikom validacije, 422

error-0004 -> Pogrešan role, 406

error-0005 -> Knjiga nema autora, kategoriju ili žanr, 406


## 🚀 Korišćene tehnologije

* PHP v.8.1.
* Laravel v.9.32 / Laravel Blade
* MySQL
* HTML v.5 / CSS v.3 / Tailwind CSS v.3
* JavaScript / JQuery v.3.6
* cdnjs
* Tippy.js
* Sweet Alert v.2
* Popper.js
* Font Awesome v.5.15
* Flowbite

## 🚀 Dodatni alati i paketi
* CKEditor 
* Mailtrap
* HTML Laravel Collective v.6
* Laravel Debugbar
* Laravel Telescope
* Tinker
* Algolia
* GitHub Actions / FTP Deploy
* FakerPHP
* Guzzle
* Intervention Image
* ijaboCrop Tool
* Passport authentication
* Postman
* Swagger
* Visual Studio Code
* phpMyAdmin
* HeidiSQL

> tim nullable()
<div>
<a href="https://github.com/ca-tim4-22/library" target="_blank"><img src="https://i.postimg.cc/LXf55bzz/nullable-logo.jpg" width="35"></a>
<a href="https://ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/CMHZTdSJ/cortex.jpg" width="35"></a>
<a href="https://academy.ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/h46syRT4/cortex-academy-logo.png" width="35"></a>
<a href="https://www.elektropg.online/" target="_blank"><img src="https://i.postimg.cc/cHNTcVzk/elektro-logo.png" width="35"></a>
<a href="https://cg.cobiss.net/" target="_blank"><img src="https://i.postimg.cc/152Vp9xP/cobiss-logo.png" width="35"></a>
<a href="https://coinis.com/" target="_blank"><img src="https://i.postimg.cc/ZnhJsPWZ/coinis.jpg" width="35"></a>
</div>





