<?php

use App\Models\Letter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
        });

        $data = array(
            ['name' => 'Rimska abeceda'],
            ['name' => 'Mongolska abeceda'],
            ['name' => 'Grčka abeceda'],
            ['name' => 'Kinesko pismo'],
            ['name' => 'Arapski alfabet'],
            ['name' => 'Fonetsko pismo'],
            ['name' => 'Ćirilica'],
            ['name' => 'Latinica'],
        );

        Letter::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letters');
    }
};
