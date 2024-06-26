<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Tag::factory(15)->create();

            // Product Size
            foreach(['S','M','L','XL','XXL'] as $item){
                ProductSize::query()->create([
                    'name' => $item
                ]);
            }

            // Product Color
            foreach(['#000000','#0000FF','#00FF00','#FFFF00','#FF0000'] as $item){
                ProductColor::query()->create([
                    'name' => $item
                ]);
            }

            // Product 
            for ($i=0; $i < 500 ; $i++) { 
                $name = fake()->text(100);
                Product::query()->create([
                    'catelogue_id' => rand(1,5),
                    'name' => $name,
                    'slug' => Str::slug($name). '-' . Str::random(8),
                    'sku' => Str::random(8). $i,
                    'img_thumbnail' => 'https://vn-test-11.slatic.net/p/c7db377b177fc8e2ff75a769022dcc23.jpg',
                    'price_regular' => '600000',
                    'price_sale' => '400000',
                 
                ]);
            }


            // Product Gallery
            for ($i=2; $i < 501 ; $i++) { 
               ProductGallery::query()->insert([
                 [
                    'product_id'=> $i,
                    'image' => 'https://vn-test-11.slatic.net/p/c7db377b177fc8e2ff75a769022dcc23.jpg'
                 ],
                 [
                    'product_id'=> $i,
                 'image' => 'https://product.hstatic.net/200000054310/product/15__3_.jpg_2ce592a9410f492aa22adbefac9ae6c9.jpg'
                 ]


                ]);  
            }

            // Product Tag
            for ($i=2; $i < 501 ; $i++) { 
                DB::table('product_tag')->insert([
                    [
                       'product_id' => $i, 
                        'tag_id' =>  rand(1,8)],
                    [ 'product_id' => $i,
                      'tag_id' => rand(9,15)]

                ]);
             }


             // Product Variants
             for ($proID=1; $proID < 501 ; $proID++) { 
                $data = [];
                for ($sizeID=1; $sizeID < 6 ; $sizeID++) { 
                    for ($colorID=1; $colorID < 6 ; $colorID++) { 
                            $data[] = [
                                
                                'product_id'=> $proID,
                                'product_size_id' =>$sizeID,
                                'product_color_id' => $colorID,
                                'quantity' => 100,
                                'image' => 'https://vn-test-11.slatic.net/p/c7db377b177fc8e2ff75a769022dcc23.jpg'
                            ];
                    }
                }
             }
             DB::table('product_variants')->insert($data);

    }
}
