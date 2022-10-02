<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
        });

        DB::table('publishers')->insert([
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
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publishers');
    }
};
