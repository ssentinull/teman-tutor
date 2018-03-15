<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => str_random(10),
          'email' => str_random(10).'@gmail.com',
          'password' => 'secret',
          'api_token' => str_random(10),
      ]); 

      DB::table('users')->insert([
          'name' => str_random(10),
          'email' => str_random(10).'@gmail.com',
          'password' => '12345',
          'api_token' => str_random(10),
      ]); 
    }
}
