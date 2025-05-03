<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // Membuat akun khusus dengan semua field yang diperlukan
        \App\Models\User::create([
            'name' => 'Code with Afin',
            'email' => 'test@example.com',
            'phone' => '081234567890',
            'roles' => 'ADMIN', // Memberikan peran ADMIN untuk akun khusus
            'password' => Hash::make('12345678')
        ]);

        $this->call([
            ProductSeeder::class
        ]);
    }
}
