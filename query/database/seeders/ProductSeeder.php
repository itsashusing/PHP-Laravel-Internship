<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get(path: 'database/json/products.json');
        $products = json_decode($json);

        // $products = [
        //     [
        //         'name' => 'Motorola',
        //         'discriptions' => 'A very good motorola phone'
        //     ],
        //     [
        //         'name' => 'i phone',
        //         'discriptions' => 'A very good i phone'
        //     ],

        // ];

        foreach ($products as $product) {
            product::create([
                'name' => $product->title,
                'discriptions' => $product->description
            ]);
        }
        // product::create([
        //     'name' => 'Samsung',
        //     'discriptions' => 'A very good phpne'
        // ]);
    }
}
