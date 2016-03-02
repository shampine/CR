<?php

use Illuminate\Database\Seeder;

class CharitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('charities')->insert([
        [
          "name" => "Kitten Rescue",
          "ein"  => "135791113"
        ],
        [
          "name" => "Red Cross",
          "ein"  => "171923293"
        ],
        [
          "name" => "Salvation Army",
          "ein"  => "137434751"
        ],
      ]);
    }


}
