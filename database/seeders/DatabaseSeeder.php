<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ✅ Create a default admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Make sure to hash the password
            'role' => 'Admin', // ✅ Assign Admin role explicitly
        ]);

        // ✅ Create additional users as regular Users
        User::factory()->count(10)->create([
            'role' => 'User', // ✅ Ensure factory users are normal users
        ]);
    }
}
