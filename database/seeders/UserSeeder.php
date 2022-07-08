<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = ["Luxembourg", "Belgique", "Allemagne", "France"];
        $category = ["plumbery", "hvac", "electricity"];
        $type = ["client", "company"];

        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'profile_picture' => Str::random(10),
            'phone_number' => Str::random(9),
            'address_number' => Str::random(2),
            'address_road' => Str::random(12),
            'town' => Str::random(12),
            'zip_code' => Str::random(4),
            'country' => Arr::random($country),
            'company_name' => Str::random(10),
            'tva_number' => Str::random(10),
            'category' => Arr::random($category),
            'type' => Arr::random($type),
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
