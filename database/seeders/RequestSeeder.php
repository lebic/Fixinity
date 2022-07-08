<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = ["interior", "exterior", "both"];
        $categories = ["plumbery", "hvac", "electricity"];
        $status = ["open", "pending", "close"];

        DB::table('request')->insert([
            'title' => Str::random(10),
            'description' => Str::random(10),
            'pictures' => Str::random(10),
            'type' => Arr::random($type),
            'categories' => Arr::random($categories),
            'date' => date("l jS \of F Y"),
            'status' => Arr::random($status),
        ]);
    }
}
