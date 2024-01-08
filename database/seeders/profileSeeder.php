<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class profileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Profile::factory(200)->create();

        // Profile::factory()->create([
        //     'name' => Str::random(20),
        //     'email' => Str::random().'@gmail.com',
        //     'password' => Hash::make('password'),
        //     'bio' => Str::random(255)
        // ]);

        // DB::table('profiles')->insert([
        //     'name' => Str::random(20),
        //     'email' => Str::random().'@gmail.com',
        //     'password' => Hash::make('password'),
        //     'bio' => Str::random(255),
        // ]);
    }
}
