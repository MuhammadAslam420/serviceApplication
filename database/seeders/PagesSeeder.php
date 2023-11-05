<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $pages = [
            'home' => [
                'title' => 'Home Page',
                'description' => 'Welcome to our home page.',
                'status' => 1,
                'routename' => 'home',
                'route' => '/',
            ],
            'services' => [
                'title' => 'Services Page',
                'description' => 'Explore our services.',
                'status' => 1,
                'routename' => 'services',
                'route' => '/services',
            ],
            'about' => [
                'title' => 'About Page',
                'description' => 'Get to know about us.',
                'status' => 1,
                'routename' => 'about',
                'route' => '/about',
            ],
            'contact-us' => [
                'title' => 'Contact Us Page',
                'description' => 'Reach out to us.',
                'status' => 1,
                'routename' => 'contact',
                'route' => '/contact-us',
            ],
            'privacy' => [
                'title' => 'Privacy Policy Page',
                'description' => 'Read our privacy policy.',
                'status' => 1,
                'routename' => 'privacy',
                'route' => '/privacy',
            ],
            'terms' => [
                'title' => 'Terms of Service Page',
                'description' => 'View our terms of service.',
                'status' => 1,
                'routename' => 'terms',
                'route' => '/terms-conditions',
            ],
            'categories' => [
                'title' => 'All Categires Page',
                'description' => 'View our categories of service.',
                'status' => 1,
                'routename' => 'categories',
                'route' => '/categories',
            ],
            'cart' => [
                'title' => 'Cart Page',
                'description' => 'View our Cart.',
                'status' => 1,
                'routename' => 'cart',
                'route' => '/cart',
            ],
            'vip' => [
                'title' => 'Vip Page',
                'description' => 'View our Vip Services.',
                'status' => 1,
                'routename' => 'vip',
                'route' => '/vip',
            ],
            'providers' => [
                'title' => 'providers Page',
                'description' => 'View our providers Services.',
                'status' => 1,
                'routename' => 'providers',
                'route' => '/providers',
            ],
            'blogs' => [
                'title' => 'blogs Page',
                'description' => 'View our blogs Services.',
                'status' => 1,
                'routename' => 'blogs',
                'route' => '/blogs',
            ],
            // Add more pages based on your routes
        ];

        foreach ($pages as $name => $data) {
            DB::table('pages')->insert([
                'name' => $name,
                'route' => $data['route'],
                'routename' => $data['routename'],
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => $data['status'],
                
            ]);
        }
    }
}
