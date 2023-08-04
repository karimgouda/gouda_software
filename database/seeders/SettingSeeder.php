<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testImage = 'assets/images/l-gallery2.jpg';

        DB::table('settings')->truncate();

        $array = [
            ['key' => 'app_logo', 'value' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbbCmKPUDYik8-Ol9Q6O6FmvDlyUk7STHZLwx1ek0Lqw&s', 'name' => 'App logo', 'rules' => 'required|mimes:jpeg,png,jpg,gif,webp,svg', 'type' => 'file', 'order' => 1],
            ['key' => 'app_favicon', 'value' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbbCmKPUDYik8-Ol9Q6O6FmvDlyUk7STHZLwx1ek0Lqw&s', 'name' => 'Favicon', 'rules' => 'required|mimes:jpeg,png,jpg,gif,webp,svg', 'type' => 'file', 'order' => 3],
            ['key' => 'app_name_en', 'value' => 'Base Project', 'name' => 'App name en', 'rules' => 'required|string|max:20', 'type' => 'text', 'order' => 4],
            ['key' => 'app_name_ar', 'value' => 'Base Project', 'name' => 'App name ar', 'rules' => 'required|string|max:20', 'type' => 'text', 'order' => 5],
            ['key' => 'app_description_en', 'value' => 'Base description', 'name' => 'App description en', 'rules' => 'required|string', 'type' => 'text', 'order' => 6],
            ['key' => 'app_description_ar', 'value' => 'Base description', 'name' => 'App description ar', 'rules' => 'required|string', 'type' => 'text', 'order' => 7],
            ['key' => 'email', 'value' => 'email@example.com', 'name' => 'Email', 'rules' => 'required|email', 'type' => 'text', 'order' => 8],
            ['key' => 'phone', 'value' => '2010********', 'name' => 'Phone', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'address_en', 'value' => 'address example en', 'name' => 'address_en', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'address_ar', 'value' => 'address example ar', 'name' => 'address_ar', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'whatsapp', 'value' => '2010********', 'name' => 'whatsapp', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'map_link', 'value' => 'https://example.map', 'name' => 'map_link', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'head_manager_script', 'value' => '<script></script>', 'name' => 'Head Manager Script', 'rules' => 'nullable|string', 'type' => 'textarea', 'order' => 9],
            ['key' => 'body_manager_script', 'value' => '<script></script>', 'name' => 'Body Manager Script', 'rules' => 'nullable|string', 'type' => 'textarea', 'order' => 9],
            ['key' => 'seo', 'value' => '80', 'name' => 'seo', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'dev', 'value' => '90', 'name' => 'dev', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'exp', 'value' => '2', 'name' => 'exp', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'team', 'value' => '2', 'name' => 'team', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'client', 'value' => '8', 'name' => 'client', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'project', 'value' => '20', 'name' => 'project', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],


            ['key' => 'ceo_title_en', 'value' => 'In DoniaZad', 'name' => 'CEO title en', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'ceo_title_ar', 'value' => 'نحن في دنيا زاد', 'name' => 'CEO title ar', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'ceo_description_en', 'value' => 'CEO description en', 'name' => 'CEO description en', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'ceo_description_ar', 'value' => 'عربي', 'name' => 'CEO description ar', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'ceo_image', 'value' => "$testImage", 'name' => 'CEO Image', 'rules' => 'required|mimes:jpeg,png,jpg,gif,webp,svg', 'type' => 'file', 'order' => 9],


            ['key' => 'manager_title_en', 'value' => 'In DoniaZad', 'name' => 'Chairman of Board of Directors title en', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'manager_title_ar', 'value' => 'نحن في دنيا زاد', 'name' => 'Chairman of Board of Directors title ar', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'manager_description_en', 'value' => 'Chairman of Board of Directors description en', 'name' => 'Chairman of Board of Directors description en', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'manager_description_ar', 'value' => 'عربي', 'name' => 'Chairman of Board of Directors description ar', 'rules' => 'required|string', 'type' => 'text', 'order' => 9],
            ['key' => 'manager_image', 'value' => "$testImage", 'name' => 'Chairman of Board of Directors image', 'rules' => 'required|mimes:jpeg,png,jpg,gif,webp,svg', 'type' => 'file', 'order' => 9],
        ];

        foreach ($array as $list) {
            Setting::create($list);
        }
    }



}
