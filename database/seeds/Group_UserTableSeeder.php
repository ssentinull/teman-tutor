<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
          'group_id' => 1,
          'user_id' => 1,
          'is_admin' => 1,
          'is_accepted' => 1,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 

      DB::table('group_user')->insert([
          'group_id' => 1,
          'user_id' => 2,
          'is_admin' => 0,
          'is_accepted' => 0,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 
    }
}
