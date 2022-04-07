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
            'name' => 'Nike',
            'reference' => "09TER4"
        ]);
        Brand::create([
            'name' => 'Adidas',
            'reference' => "05FE21"
        ]);
        Brand::create([
            'name' => 'Quiksilver',
            'reference' => "B8R60R"
        ]);
    }
}
