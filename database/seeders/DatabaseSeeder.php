<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     CategorySeeder::class,
        //     TaskSeeder::class,
        // ]);
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo('view posts');
        $adminRole->givePermissionTo('create posts');

        $userRole = Role::findByName('user');
        $userRole->givePermissionTo('view posts');
        $user = User::find(2); // misal pengguna dengan ID 1
        $user->assignRole('admin');
    }
}
