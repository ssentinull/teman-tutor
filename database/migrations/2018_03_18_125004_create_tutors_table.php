<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 255);
            $table->string('name');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('address');
            $table->string('phone_num');
            $table->integer('price_rate');
            $table->double('ipk', 3, 2);
            $table->integer('course_id')->unsigned();
            $table->string('api_token', 60)->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutors');
    }
}
