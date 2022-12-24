<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name' => 'Roman', 'icon' => '/img/default_images_while_migrations/genres/roman.png',  'description' => 'Roman je najopširnija prozna književna vrsta, a u današnje vrijeme i najpopularnija. Prvobitno se tako nazivao svaki spis koji je pisan pučkim (romanskim) jezikom (za razliku od latinskog).', 'default' => 'true'],
            ['name' => 'Pripovjetka', 'icon' => '/img/default_images_while_migrations/genres/fairytale.png',  'description' => 'Pripovijetka (engleski: short story) je posebna, moderna literarna forma kratke proze, čija je glavna osobina u jakoj kompresiji (zgušnjivanju) sadržaja.', 'default' => 'true'],
            ['name' => 'Dramska poezija', 'icon' => '/img/default_images_while_migrations/genres/poetry.png',  'description' => 'Drama je žanr u književnosti, koji je nastao za vrijeme antičke Grčke i koji se i danas razvija. Drama je književno djelo, koje uglavnom služi javnom izvođenju u pozorištu.', 'default' => 'true'],
            ['name' => 'Lirska poezija', 'icon' => '/img/default_images_while_migrations/genres/lyrics.png',  'description' => 'Lirska poezija je formalna vrsta poezije koja izražava lične emocije ili osjećaje, tipično izgovorene u prvom licu. Dobila je naziv po obliku antičke lirske grčke književnosti, koja je definisana muzičkom pratnjom, obično na žičanom instrumentu poznatom kao lira.', 'default' => 'true'],
            ['name' => 'Stručna literatura', 'icon' => '/img/default_images_while_migrations/genres/literature.png',  'description' => 'Stručna literatura je skup tekstova i članaka iz svih polja nauke (društvenih i prirodnih) izdanih u nekoj naučnoj knjizi, časopisu ili na World Wide web-u. To mogu biti članci objavljeni u naučnim časopisima, monografije koje je napisao jedan autor ili više njih.', 'default' => 'true'],
            ['name' => 'Epska poezija', 'icon' => '/img/default_images_while_migrations/genres/epic.png', 'description' => 'Epska pjesma obrađuje redovno neki pojedini događaj, a ne neko sudbonosno zbivanje za neki narod u cjelini.', 'default' => 'true'],
            ['name' => 'Fantastika', 'icon' => '/img/default_images_while_migrations/genres/fantasy.png', 'description' => 'Fantastika je oblik umjetničkog izražavanja u prvom redu književnosti i slikarstva, za kojeg su značajni elementi natprirodnog i izmišljenog. Ovim postupcima stvara se dojam začudnosti i očaranja kod čitatelja i gledatelja.', 'default' => 'true'],
            ['name' => 'Putopis', 'icon' => '/img/default_images_while_migrations/genres/travel.png', 'description' => 'Putopis je prozna književna vrsta u kojoj su putovanje i izgled proputovanih predjela ili zemalja povod za umjetničko oblikovanje zapažanja, dojmova i razmišljanja o svemu što je putopisca zaokupilo na putovanju.', 'default' => 'true'],
            ['name' => 'Kriminalistika', 'icon' => '/img/default_images_while_migrations/genres/criminalistics.png', 'description' => 'Kriminalistika je žanr koja proučava, pronalazi i usavršava naučne i na praktičnom iskustvu zasnovane metode i sredstva, koja su najpogodnija da se otkrije i razjasni krivično djelo, otkrije i privede krivičnoj sankciji učinilac, obezbijede i fiksiraju svi dokazi radi utvrđivanja istine.', 'default' => 'true'],
        );

        Genre::insert($data);
    }
}
