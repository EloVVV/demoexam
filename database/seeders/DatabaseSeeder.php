<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::query()->create([
            'name' => 'Алан',
            'surname' => 'Богов',
            'midname' => 'Андреевич',
            'login' => 'admin',
            'email' => 'avavionmvm@gmail.com',
            'password' => Hash::make('admin11'),
            'role' => 'admin',
        ]);

//        Collection::factory(20)->create();
//        Product::factory(666)->create();
    }
}
