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
            $table->unsignedBigInteger('user_gender_id')->nullable();
            $table->string('name', 128);
            $table->string('JMBG', 13)->unique()->nullable();
            $table->string('email')->unique();
            $table->string('username', 64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 256);
            $table->string('photo', 256)->default('placeholder');
            $table->rememberToken();
            $table->timestamp('last_login_at')->useCurrent();
            $table->integer('login_count')->default(0);
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')->on('user_types')
                ->onDelete('cascade');
            $table->foreign('user_gender_id')->references('id')
                ->on('user_genders')->onDelete('cascade');
        });

        DB::table('users')->insert([
            'user_type_id' => 3,
            'user_gender_id' => 1,
            'name' => 'Administrator',
            'JMBG' => 9876328574326,
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'username' => 'admin',
            'password' => bcrypt('password'),
            'photo' => 'placeholder',
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'last_login_at' => Carbon::now(),
            'login_count' => 0,
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
