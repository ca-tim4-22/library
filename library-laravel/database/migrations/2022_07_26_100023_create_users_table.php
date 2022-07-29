<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_type_id')->default(1);
            $table->string('name', 128);
            $table->string('JMBG', 14)->unique()->nullable();
            $table->string('email')->unique();
            $table->string('username', 64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 256);
            $table->string('photo', 256)->default('no-photo');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
        });

        DB::table('users')->insert([
            'user_type_id' => 2,
            'name' => 'Admin',
            'JMBG' => 98763285743269,
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'username' => 'admin',
            'password' => bcrypt('password'),
            'photo' => 'profileImg-default.jpg',
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
