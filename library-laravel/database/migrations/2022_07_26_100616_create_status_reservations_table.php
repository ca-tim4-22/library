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
        Schema::create('status_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        DB::table('status_reservations')->insert([
            ['status' => 'true'],
            ['status' => 'false'],
            ['status' => 'await'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_reservations');
    }
};
