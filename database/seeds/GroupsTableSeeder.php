<?php

use Illuminate\Database\Seeder;

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
      ]); 

      DB::table('groups')->insert([
          'name' => str_random(10),
          'desc' => str_random(30),
          'course_id' => 3,
      ]); 
    }
}
