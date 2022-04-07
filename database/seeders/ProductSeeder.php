<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Jogger',
            'observations' => 'Jogger Negro, con estilo triple linea',
            'stock' => 25,
            'boardingDate' => Carbon::now(),
            'brand_id' => 2,
            'size_id' => 3
        ]);

        Product::create([
            'name' => 'Chaqueta Negra',
            'observations' => 'Chaqueta de cuero en color negro',
            'stock' => 250,
            'boardingDate' => Carbon::now(),
            'brand_id' => 1,
            'size_id' => 1
        ]);

        Product::create([
            'name' => 'Sueter deportivo',
            'observations' => 'Sueter deportivo en distintos colores',
            'stock' => 17,
            'boardingDate' => Carbon::now(),
            'brand_id' => 1,
            'size_id' => 2
        ]);
    }
}
