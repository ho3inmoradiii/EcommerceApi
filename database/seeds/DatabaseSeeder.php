<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\User::truncate();
        \App\Category::truncate();
        \App\Product::truncate();
        \App\Transaction::truncate();
        \Illuminate\Support\Facades\DB::table('category_product')->truncate();

        $usersQuantity = 200;
        $categoriesQuantity = 30;
        $productsQuantity = 1000;
        $transactionQuantity = 1000;

        factory(\App\User::class,$usersQuantity)->create();
        factory(\App\Category::class,$categoriesQuantity)->create();
        factory(\App\Product::class,$productsQuantity)->create()->each(
            function ($product){
                $categories = \App\Category::all()->random(mt_rand(1,5))->pluck('id');
                $product->categories()->attach($categories);
            }
        );
        factory(\App\Transaction::class,$transactionQuantity)->create();

    }
}
