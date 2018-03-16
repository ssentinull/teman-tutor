<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('groups')->insert([
          'name' => str_random(10),
          'desc' => str_random(30),
          'course_id' => 2,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 

      DB::table('groups')->insert([
          'name' => str_random(10),
          'desc' => str_random(30),
          'course_id' => 3,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 
    }
}
