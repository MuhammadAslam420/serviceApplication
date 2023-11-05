<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'superAdmin']);
        $admin = Role::create(['name' => 'Admin']);
        $finance = Role::create(['name' => 'Finance']);
        $accountant = Role::create(['name' => 'Accountant']);
        $supervisor = Role::create(['name' => 'Supervisor']);
        $editor = Role::create(['name' => 'Editor']);

        // Define permissions
        $permissions = [
            'create', 'delete', 'edit','view',
        ];

        $models = [
            'categories', 'service_types', 'sub_categories', 'services', 'users',
            'packages', 'settings', 'pages', 'questions', 'menu', 'bookings',
            'transactions', 'reviews', 'chats', 'contact_messages', 'Booking_items',
            'home_page_sections','abouts','contacts','news_letter','seos','additonal_services',
            'coupons','partners','offers','packages_purchase','service_availabilities','user_package_details',
            'messages','service_views','blogs','banners','currencies','languages','payments','countries',''
        ];

        foreach ($models as $model) {
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission . ' ' . $model]);
            }
        }

        // Assign permissions to roles
        $superAdmin->syncPermissions(Permission::all());
        $admin->syncPermissions(Permission::all());
        $finance->syncPermissions(Permission::whereIn('name', ['view services'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view dashboard'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view users'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view bookings'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view booking items'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view transactions'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view packages'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view package_details'])->get());
        $finance->syncPermissions(Permission::whereIn('name', ['view package purchase'])->get());
        
        // ... Repeat the above line for other roles as needed
    }
    
}
