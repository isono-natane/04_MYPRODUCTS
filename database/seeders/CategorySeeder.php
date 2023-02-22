<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create(["name" => "チョコレート"]);
        category::create(["name" => "スナック"]);
        category::create(["name" => "アイス"]);
        category::create(["name" => "駄菓子"]);
  
    }
}
