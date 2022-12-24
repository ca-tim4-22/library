<?php

use App\Models\Format;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('formats', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
        });

        $data = array(
            ['name' => 'A6'],
            ['name' => 'A5'],
            ['name' => 'A2'],
            ['name' => 'A4'],
            ['name' => 'A3'],
            ['name' => 'A1'],
        );

        Format::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formats');
    }
};
