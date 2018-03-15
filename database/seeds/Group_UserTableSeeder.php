<?php

use Illuminate\Database\Seeder;

class Group_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('group_user')->insert([
          'is_admin' => 0,
          'user_id' => 1,
          'group_id' => 1,
      ]); 

      DB::table('group_user')->insert([
          'is_admin' => 1,
          'user_id' => 2,
          'group_id' => 1,
      ]); 
    }
}
