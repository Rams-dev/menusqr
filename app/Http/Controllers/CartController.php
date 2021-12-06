<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Repositories\CartRepository;

class CartController extends Controller
{

    protected $Cart;
    protected $Restaurant;

    public function __construct(CartRepository $cart, Restaurant $Restaurant){
        $this->Cart= $cart;
        $this->Restaurant= $Restaurant;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request.get('name');
        $mac = exec('getmac');
        
        if($cart = $this->Cart->cartExist($mac)){
            return $cart->id;
        }else{
            $this->cart->save($datacart);
            return 'no exist';
        }
        
        
        $product_id = $request->only('product_id');


        return $request->ip();
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }

    public function cartExist(){

        $mac = substr(exec('getmac'),0,17);
        if($this->Cart->cartExist($mac)){
            return response()->json(true, 200) ;
        }else{
            return response()->json(false, 200) ;
            
        }
    }
}
