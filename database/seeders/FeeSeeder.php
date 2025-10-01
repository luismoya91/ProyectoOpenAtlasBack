<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fees')->insert([
            ['name' => 'Standard Fee',
             'description' => 'A standard fee for general services.',
             'amount' => 50.00,
             'currency' => 'USD'
            ],
            ['name' => 'Premium Fee',
             'description' => 'A premium fee for advanced services.',
             'amount' => 150.00,
             'currency' => 'USD'
            ],
            ['name' => 'Colombian Standard Fee',
             'description' => 'A standard fee for colombian bussiness.',
             'amount' => 100000,
             'currency' => 'COP'
            ],
        ]);

        DB::table('fees')->insert([
            ['name' => 'Discounted Fee',
             'description' => 'A discounted fee for special clients.',
             'amount' => 30.00,
             'currency' => 'USD',
             'discount' => 10.00
            ],
            ['name' => 'Colombian Discunt Fee',
             'description' => 'A discounted fee for colombian bussiness.',
             'amount' => 120000,
             'currency' => 'COP',
             'discount' => 10.00
            ],
        ]); 
        
    }
}
