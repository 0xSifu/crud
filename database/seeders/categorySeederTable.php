<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class categorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Asia',
            ],
            [
                'name' => 'Middle East',
            ],
            [
                'name' => 'Europe',
            ],
            [
                'name' => 'South East Asia',
            ],
            [
                'name' => 'Australia',
            ],
            [
                'name' => 'Chinese',
            ],
        ];
        Category::insert($data);
    }
}
