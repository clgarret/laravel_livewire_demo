<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'id' => 1,
                'user_id' => 1
            ],
            [
                'id' => 2,
                'user_id' => 1
            ],
            [
                'id' => 3,
                'user_id' => 1
            ],
            [
                'id' => 4,
                'user_id' => 1
            ]
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'iphone11',
                'manufacturer_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'iphone10',
                'manufacturer_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'galaxy s10',
                'manufacturer_id' => 2
            ]
        ]);
    }
}
