<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $roles = [
            [
                'name' => 'admin',
                'display_name' => "Admin"
            ],
            [
                'name' => 'user',
                'display_name' => "User"
            ]
        ];   
        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
    }
}
