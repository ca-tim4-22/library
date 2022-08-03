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
            ['name' => 'Admiral Books'],
            ['name' => 'Adižes'],
            ['name' => 'Agencija Matić'],
            ['name' => 'Agencija Obradović'],
            ['name' => 'Akruks Book'],
            ['name' => 'Čarobna knjiga'],
            ['name' => 'Obodsko Slovo'],
            ['name' => 'Građevinska knjiga'],
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
