<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin.opena@gmail.com',
                'password' => bcrypt('$+V6&ZNs,DAD-ZK'),
            ],
            [
                'name' => 'user1',
                'email' => 'user1.openap@gmail.com',
                'password' => bcrypt('yu,WVxA{hC30B6['),
            ],
            [
                'name' => 'user2',
                'email' => 'user2.opena@gmail.com',
                'password' => bcrypt('h?bq$+7rF8Xc9f'),
            ]
        ]
        );
    }
}
