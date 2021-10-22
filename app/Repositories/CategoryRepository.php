<?php
namespace App\Repositories;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository{
    public function __construct(Category $category){
        parent::__construct($category);
    }

    public function getByRestaurantId($restaurant_id){
        return Category::where('restaurant_id',$restaurant_id)->get();
    }

    public function getCategoryWithProducts($restaurant_id){
        $query = DB::table('categories')
        ->join('products','products.category_id','=','categories.id')
        ->select('products.*','categories.name as categoryName')
        ->where('categories.restaurant_id','=', $restaurant_id)->get();


        return $query;


    }
}