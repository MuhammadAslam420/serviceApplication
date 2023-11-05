<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            'web-banner',
            'web-featured-categories',
            'featured-services',
            'top-services',
            'offering',
            'work',
            'popular-services',
            'packages',
            'user-reviews',
            'blog',
            'partner',
            'location',
            'app',
        ];
          $i =1;
        foreach ($sections as $section) {
            DB::table('home_page_sections')->insert([
                'name' => $section,
                'status' =>'active',
                'position' => $i,
            ]);
            ++$i;
        }
    }
}
