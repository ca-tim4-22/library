<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'NameSurname' => 'Ivo Andrić',
                'wikipedia' => 'https://sr.wikipedia.org/wiki/%D0%98%D0%B2%D0%BE_%D0%90%D0%BD%D0%B4%D1%80%D0%B8%D1%9B',
                'biography' => '<p><strong>Ivan Ivo Andrić </strong>bosanskohercegovački, hrvatski i srpski književnik te diplomat iz Bosne i Hercegovine, dobitnik Nobelove nagrade za književnost 1961. godine.</p>',
            ],
            [
                'NameSurname' => 'Mihailo Lalić',
                'wikipedia' => 'https://sh.wikipedia.org/wiki/Mihailo_Lali%C4%87',
                'biography' => '<p><strong>Mihailo Lalić</strong> je crnogorski pisac poznat po nizu romana koji su opisivali partizansku borbu za vrijeme drugog svjetskog rata u Crnoj Gori. Započeo je knjigom pjesama Stazama slobode (1948), ali se brzo okrenuo prozi, koja će postati isključiva forma umjetničkog sagledavanja vremena, događaja i ljudskih sudbina.</p>',
            ],
            [
                'NameSurname' => 'Đovani Bokačo',
                'wikipedia' => 'https://sr.m.wikipedia.org/sr-el/%D0%82%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8_%D0%91%D0%BE%D0%BA%D0%B0%D1%87%D0%BE',
                'biography' => '<p><strong>Đovani Bokačo </strong>je bio italijanski pisac, pjesnik, Petrarkin dopisnik i značajan renesansni humanista.',
            ],
            [
                'NameSurname' => 'Alber Kami',
                'wikipedia' => 'https://sr.wikipedia.org/wiki/%D0%90%D0%BB%D0%B1%D0%B5%D1%80_%D0%9A%D0%B0%D0%BC%D0%B8',
                'biography' => '<p><strong>Alber Kami </strong>je bio francuski filozof, pisac, dramaturg i novinar. Dobitnik je Nobelove nagrade za književnost.',
            ],
            [
                'NameSurname' => 'Borislav Pekić',
                'wikipedia' => 'https://bs.wikipedia.org/wiki/Borislav_Peki%C4%87',
                'biography' => '<p><strong>Borislav Pekić</strong>&nbsp;bio je srpski&nbsp;pisac rođen u Podgorici, romanopisac, dramski pisac, filmski scenarista&nbsp;i jedan od glavnih osnivača postkomunističke srbijanske Demokratske stranke.</p>',
            ],
        );

        Author::insert($data);
    }
}