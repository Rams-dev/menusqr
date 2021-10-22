<?php

namespace App\Repositories;
use App\Models\Restaurant;

class RestaurantRepository extends BaseRepository{
    public function __construct(Restaurant $restaurant){
        parent::__construct($restaurant);
    }

    public function getByUserId(){
        return Restaurant::where('user_id',auth()->user()->id)->first();
    }

    public function getByName($name){
        return Restaurant::where('name', $name)->first();
    }

}