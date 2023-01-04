<?php

use App\Models\GlobalVariable;
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
        Schema::create('global_variables', function (Blueprint $table) {
            $table->id();
            $table->string('variable', 256);
            $table->string('value', 256);
        });

        $data = array(
            ['variable' => 'Rok za rezervaciju', 'value' => 30],
            ['variable' => 'Rok vraćanja', 'value' => 30],
            ['variable' => 'Rok konflikta', 'value' => 30],
            ['variable' => 'Paginacija', 'value' => 5],
            ['variable' => 'Status', 'value' => 0],
        );

        GlobalVariable::insert($data);
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
