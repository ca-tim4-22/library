<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name' => 'Građevinska knjiga'],
            ['name' => 'Darkwood'],
            ['name' => 'Dedić'],
            ['name' => 'Digital'],
            ['name' => 'Esotheria'],
            ['name' => 'Bijeli put'],
            ['name' => 'Agencija Obradović'],
            ['name' => 'Plavi krug'],
            ['name' => 'Biblioner'],
            ['name' => 'Albatros plus'],
            ['name' => 'Algoritam media'],
            ['name' => 'Biblijsko društvo'],
            ['name' => 'Draslar'],
            ['name' => 'Evro book'],
            ['name' => 'Filip Višnjić'],
            ['name' => 'Forma B'],
            ['name' => 'Geopoetika'],
            ['name' => 'Glosarijum'],
            ['name' => 'Jutarnji list Zagreb'],
            ['name' => 'Admiral Books'],
            ['name' => 'Adižes'],
            ['name' => 'Agencija Matić'],
            ['name' => 'Obodsko Slovo'],
            ['name' => 'Akademska knjiga'],
            ['name' => 'Akruks Book'],
            ['name' => 'Čarobna knjiga'],
        );

        Publisher::insert($data);
    }
}
