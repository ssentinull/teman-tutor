<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TutorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $date = Carbon::create(1997, 5, 28, 0, 0, 0);
      
      DB::table('tutors')->insert([
          'email' => str_random(10).'@gmail.com',
          'password' => app('hash')->make('secret'),
          'name' => str_random(10),
          'gender' => 'male',
          'birth_date' => $date->addWeeks(rand(1,52))->format('Y-m-d H:i:s'),
          'address' => 'Jl.'.str_random(7),
          'price_rate' => 20000 ,
          'ipk' => 3.45,
          'course_id' => 1,
          'api_token' => str_random(10),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 

      DB::table('tutors')->insert([
          'email' => str_random(10).'@gmail.com',
          'password' => app('hash')->make('12345'),
          'name' => str_random(10),
          'gender' => 'female',
          'birth_date' => $date->addWeeks(rand(1,52))->format('Y-m-d H:i:s'),
          'address' => 'Jl.'.str_random(7),
          'price_rate' => 34000 ,
          'ipk' => 3.98,
          'course_id' => 2,
          'api_token' => str_random(10),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 
    }
}
