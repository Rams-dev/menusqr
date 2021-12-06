<?php

namespace App\Repositories;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class CartRepository extends BaseRepository{
    
    public function __construct(Cart $Cart){
        parent::__construct($Cart);

    }

    public function cartExist($mac){
        return Cart::where('ip',$mac)->first();
    }
    
}