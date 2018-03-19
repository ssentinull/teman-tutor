<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Query to create a new 'Users' table
        Schema::create('users', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('password', 255);
                $table->string('name');
                $table->string('gender');
                $table->date('birth_date');
                $table->string('address');
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
        // If 'Users' table exists, a rollback
        // will undo it
        Schema::dropIfExists('users');
    }
}
