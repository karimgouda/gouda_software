<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title'=>['en'=>'title_en','ar'=>'title_ar'],
            'description'=>['en'=>'desc_en','ar'=>'desc_ar'],
            'image'=>'gouda/logo.png',
        ]);
    }
}
