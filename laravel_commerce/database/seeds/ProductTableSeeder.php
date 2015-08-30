<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;

class ProductTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 15)->create();
    }
}