<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            "domain" => "",
            "sitename" => "",
            "title" => "",
            "description" => "",
            "keywords" => "",
            "image" => "",
            "image_w" => "",
            "image_h" => "",
            "tagline" => "",
            "canonical" => "",
            "timezone" => "",
            "timeformat" => ""
        ]);
    }
}
