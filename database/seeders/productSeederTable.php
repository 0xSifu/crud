<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class productSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name' => 'Kebab',
                'description' => 'Test Makanan 1'
            ],
            [
                'name' => 'Rendang',
                'description' => 'Test Makanan 2'
            ],
            [
                'name' => 'Pasta',
                'description' => 'Test Makanan 3'
            ],
            [
                'name' => 'Ramen',
                'description' => 'Test Makanan 4'
            ],
            [
                'name' => 'Cumi Hitam',
                'description' => 'Test Makanan 5'
            ],
            [
                'name' => 'Ayam Woku',
                'description' => 'Test Makanan 6'
            ],
        ];
        Product::insert($data);
    }
}
