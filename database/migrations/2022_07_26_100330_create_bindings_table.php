<?php

use App\Models\Binding;
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
        Schema::create('bindings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
        });

        $data =  array(
            ['name' => 'Francuski povez'],
            ['name' => 'Umjetnički povez'],
            ['name' => 'Kožni povez'],
            ['name' => 'Klamovanje'],
            ['name' => 'Koričenje spiralom'],
            ['name' => 'Meki povez'],
            ['name' => 'Tvrdi povez'],
        );

        Binding::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bindings');
    }
};
