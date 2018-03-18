<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->insert([
          'name' => "Kimia",
          'desc' => "Matakuliah tentang Atom, Molekul, dll",
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 

      DB::table('courses')->insert([
          'name' => "Teknik Informatika",
          'desc' => "Matakuliah tentang ngoding berbagai bahasa pemrograman",
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]); 
    }
}
