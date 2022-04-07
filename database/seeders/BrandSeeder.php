<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Nike'
        ]);
        Brand::create([
            'name' => 'Adidas'
        ]);
        Brand::create([
            'name' => 'Quiksilver'
        ]);
    }
}
