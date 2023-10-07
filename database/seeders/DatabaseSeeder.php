<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Al Azad Heera',
            'email' => 'alazadheera@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('settings')->insert([
            'shop_name' => 'Cell Mela',
            'logo' => 'logo.png'
        ]);

        DB::table('brands')->insert([
            ['name' => 'IPhone'],
            ['name' => 'Nokia']
        ]);

        DB::table('categories')->insert([
            ['name' => 'Feature Phone'],
            ['name' => 'Touch Phone']
        ]);

        DB::table('customers')->insert([
            [
                'name' => 'Abul Kalam',
                'phone' => '017xxxxxx',
                'email' => 'abul@email.com',
                'address' => 'Rangpur, Bangladesh.',
            ],
            [
                'name' => 'Abdul Baten',
                'phone' => '019xxxxxx',
                'email' => 'baten@email.com',
                'address' => 'Sylhet Bangladesh.'
            ]
        ]);

        DB::table('suppliers')->insert([
            [
                'name' => 'Mojaffor Rahman',
                'phone' => '018xxxxxx',
                'email' => 'mojaffor@email.com',
                'address' => 'Khulna, Bangladesh.',
            ],
            [
                'name' => 'Mofijul Islam',
                'phone' => '019xxxxxx',
                'email' => 'mofij@email.com',
                'address' => 'Rajshahi, Bangladesh.'
            ]
        ]);

        DB::table('products')->insert([
            [
                'name' => 'IPhone 3',
                'description' => 'Special phone produced by Apple Corp.',
                'brand_id' => '1',
                'image' => 'https://res.cloudinary.com/dqv4l1mkj/image/upload/v1696604942/portfolio-laravel-pos/yukzstplmvaz17fpy0gb.png',
            ],
            [
                'name' => 'IPhone 3',
                'description' => 'Special phone produced by Apple Corp.',
                'brand_id' => '1',
                'image' => 'https://res.cloudinary.com/dqv4l1mkj/image/upload/v1696604942/portfolio-laravel-pos/yukzstplmvaz17fpy0gb.png',
            ],
            [
                'name' => 'Nokia 1100',
                'description' => 'Special phone produced by Nokia',
                'brand_id' => '2',
                'image' => 'https://res.cloudinary.com/dqv4l1mkj/image/upload/v1696604941/portfolio-laravel-pos/j0sfnguct5t3tkf5pudw.jpg',
            ],
            [
                'name' => 'Nokia 6300',
                'description' => 'Special phone produced by Nokia',
                'brand_id' => '2',
                'image' => 'https://res.cloudinary.com/dqv4l1mkj/image/upload/v1696604941/portfolio-laravel-pos/tt1ybvszkql85syb9gx6.jpg',
            ]
        ]);

        DB::table('batches')->insert([
            [
                'batch_no' => 'january-1',
                'product_id' => '1',
                'quantity' => '10',
                'rem_quantity' => '10',
                'purchase_price' => '10000',
                'sell_price' => '12000',
                'supplier_id' => '1',
                'total_purchase_cost' => '100000',
            ],
            [
                'batch_no' => 'february-1',
                'product_id' => '2',
                'quantity' => '10',
                'rem_quantity' => '10',
                'purchase_price' => '10000',
                'sell_price' => '12000',
                'supplier_id' => '1',
                'total_purchase_cost' => '1000000',
            ],
            [
                'batch_no' => 'january-2',
                'product_id' => '3',
                'quantity' => '10',
                'rem_quantity' => '10',
                'purchase_price' => '10000',
                'sell_price' => '12000',
                'supplier_id' => '2',
                'total_purchase_cost' => '1000000',
            ],
            [
                'batch_no' => 'february-2',
                'product_id' => '4',
                'quantity' => '10',
                'rem_quantity' => '10',
                'purchase_price' => '10000',
                'sell_price' => '12000',
                'supplier_id' => '2',
                'total_purchase_cost' => '1000000',
            ]
        ]);

        DB::table('category_product')->insert([
            [
                'category_id' => '1',
                'product_id' => '1'
            ],
            [
                'category_id' => '1',
                'product_id' => '2'
            ],
            [
                'category_id' => '2',
                'product_id' => '3'
            ],
            [
                'category_id' => '2',
                'product_id' => '4'
            ]
        ]);
    }
}
