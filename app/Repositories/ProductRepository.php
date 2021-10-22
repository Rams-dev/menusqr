<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository extends BaseRepository{
    public function __construct(Product $product){
        parent::__construct($product);
    }

    public function getbyRestaurantId($restaurant_id){
        return Product::where('restaurant_id',$restaurant_id)->get();
    }

    public function getByCategoryId($category_id){
        return Product::where('category_id',$category_id)->get();
    }

}