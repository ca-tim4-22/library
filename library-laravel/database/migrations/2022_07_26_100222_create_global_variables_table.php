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
        Schema::create('global_variables', function (Blueprint $table) {
            $table->id();
            $table->string('variable', 256);
            $table->string('value', 256);
        });

        DB::table('global_variables')->insert([
            ['variable' => 'Rok za rezervaciju', 'value' => 30],
            ['variable' => 'Rok vraćanja', 'value' => 30],
            ['variable' => 'Rok konflikta', 'value' => 30],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_variables');
    }
};
