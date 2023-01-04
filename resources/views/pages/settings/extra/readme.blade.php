<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>{{__('Upustvo za CSV | Online biblioteka')}}</title>
    <link rel="icon" type="image/x-icon"
          href="{{asset('library-favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('readme/readme.css')}}">
    {{-- Font awesome v.5.15. --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

<body id="preview">
<div class="headerr">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</div>
<div class="body2">
    <h1 style="color: #4558BE" class="code-line" data-line-start="0"
        data-line-end="1"><a id="Online_Biblioteka_0"></a>Online biblioteka</h1>
    <h4 class="code-line" data-line-start="1" data-line-end="2"><a
                id="Upustvo_za_CSV_1"></a>Upustvo za CSV</h4>
    <p class="has-line-data" data-line-start="3" data-line-end="4">
        <strong>CSV</strong> (comma-separated values) su zarezom odvojene
        vrijednosti. Svaki red ove datoteke je zapis nekih podataka.</p>
    <p class="has-line-data" data-line-start="5" data-line-end="6"> Svaki zapis
        se sastoji od jednog ili više polja, odvojenih zarezima. Upotreba zareza
        kao separatora polja je izvor imena za ovaj format datoteke. CSV
        datoteka obično skladišti tabelarne podatke (brojeve i tekst) u običnom
        tekstu, u kom slučaju
        će svaki red imati isti broj polja. </p>
    <p class="has-line-data" data-line-start="7" data-line-end="8"> Format CSV
        datoteke nije u <strong>potpunosti</strong> standardizovan. Razdvajanje
        polja zarezima je osnova, ali zarezima u podacima ili ugrađenim
        prelomima redova treba posebno postupati. Neke implementacije
        onemogućavaju takav sadržaj, dok
        druge okružuju polje navodnicima, što opet stvara potrebu za
        izbjegavanjem ako su navodnici prisutni u podacima. </p>
    <h4 class="code-line" data-line-start="9" data-line-end="10"><a
                id="Primjer_9"></a>Primjer</h4>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Tabela</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Autori</td>
            <td><a target="_blank"
                   href="https://www.mediafire.com/file/fn7ixgo327fkddq/autori.csv/file">Kliknite
                    ovdje -&gt; otvorite kao .txt</a></td>
        </tr>
        </tbody>
    </table>
    <h4 class="code-line" data-line-start="15" data-line-end="16"><a
                id="Tabelarni_prikaz_15"></a>Tabelarni prikaz</h4>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Kolone</th>
            <th>Podaci</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>NameSurname</td>
            <td>Kornej Čukovski</td>
        </tr>
        <tr>
            <td>photo</td>
            <td>null</td>
        </tr>
        <tr>
            <td>biography</td>
            <td>Korney Ivanovič Čukovski bio je jedan od najpopularnijih dječjih
                pjesnika na ruskom jeziku.
            </td>
        </tr>
        <tr>
            <td>wikipedia</td>
            <td><a target="_blank"
                   href="https://sr.wikipedia.org/wiki/%D0%9A%D0%BE%D1%80%D0%BD%D0%B5%D1%98_%D0%A7%D1%83%D0%BA%D0%BE%D0%B2%D1%81%D0%BA%D0%B8">https://sr.wikipedia.org/wiki/Корнеј_Чуковски</a>
            </td>
        </tr>
        </tbody>
    </table>
    <h2 class="code-line" data-line-start="22" data-line-end="23"><a
                id="Napomene_22"></a>Napomene</h2>
    <ul>
        <li class="has-line-data" data-line-start="24" data-line-end="27"> u
            prvom redu Vaše CSV datoteke uvijek moraju biti nazivi kolona koji
            se nalaze u tabeli koju želite da popunite i to na sledeći
            način:<br/> <code>NameSurname,photo,biography,wikipedia</code><br/>
            <strong>P.S.</strong> Nakon naziva poslednje kolone
            se ne stavlja znak odvajanja (najčešće zarez)
        </li>
        <li class="has-line-data" data-line-start="27" data-line-end="28">ne
            morate nabrajati kolonu/e koja/e imaju <code>&quot;auto increment&quot;</code>
            (najčešće kolona <code>&quot;id&quot;</code>)
        </li>
        <li class="has-line-data" data-line-start="28" data-line-end="29">
            navedeni nazivi kolona moraju biti <strong>identični</strong> sa
            onima iz tabele u bazi podataka
        </li>
        <li class="has-line-data" data-line-start="29" data-line-end="31">
            preporuka je da se za znak odvajanja koristi zarez
        </li>
    </ul>
    <blockquote>
        <p class="has-line-data" data-line-start="31" data-line-end="32">Za još
            informacija, pišete nam na email:</p>
    </blockquote>
    <a href="mailto:nullable@gmail.com"> nullable@gmail.com </a> <br><br>
    <h4 class="code-line" data-line-start="37" data-line-end="38"><a
                id="Elektrotehnika_kola_Vaso_Aligrudi_37"></a>Elektrotehnička
        škola “Vaso Aligrudić”</h4> <img width="590px"
                                         src="https://i.postimg.cc/50KQf8Wf/elektro.jpg"><br/>
    <a href="https://elektropg.online" target="_blank">Website</a><br/> <a
            href="https://www.facebook.com/elektropg"
            target="_blank">Facebook</a><br/> <a
            href="https://www.instagram.com/elektrotehnicka_skola_pg/"
            target="_blank">Instagram</a><br/> <a
            href="https://www.youtube.com/channel/UC6eH4gJ0xKDJYwpNgbON8VQ"
            target="_blank">YouTube</a><br/> ✉️Email:
    <a
            href="mailto:nullable@gmail.com"> nullable@gmail.com </a> <br/>
    📞Kontakt: <a href="tel:+382 20 237 120">+382 20 237 120</a> <br/>
    📌Lokacija: Vasa Raičkovića 26, Podgorica, Crna Gora </p>
    <p class="has-line-data" data-line-start="47" data-line-end="48"><strong><a
                    target="_blank"
                    href="https://perisicnikola37.github.io/nullable/">nullable()</a></strong>
        🚀 </p>
    <script data-cfasync="false"
            src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
</div>
<button style="display: none" onclick="topFunction()" id="myBtn"
        title="Idi na vrh"><i class="fas fa-angle-up fa-2x"></i></button>
<script src="{{asset('readme/readme.js')}}"></script>

</html>