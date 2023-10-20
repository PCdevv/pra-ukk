<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
          [
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'level' => 'admin',
            'telp' => '12345678'
          ],  
          [
            'name' => 'Petugas',
            'email' => 'petugas@mail.com',
            'password' => Hash::make('87654321'),
            'level' => 'petugas',
            'telp' => '87654321'
          ],  
          [
            'name' => 'Masyarakat',
            'email' => 'masyarakat@mail.com',
            'password' => Hash::make('12121212'),
            'level' => 'masyarakat',
            'telp' => '12121212'
          ],  
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}