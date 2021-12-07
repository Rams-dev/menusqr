<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StorageRepository;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $CategoryRepository;
    protected $RestaurantRepository;
    protected $ProductRepository;
    protected $StorageRepository;
    public function __construct(
        CategoryRepository $CategoryRepository, RestaurantRepository $RestaurantRepository, ProductRepository $ProductRepository, StorageRepository $StorageRepository ){
        $this->CategoryRepository = $CategoryRepository;
        $this->RestaurantRepository = $RestaurantRepository;
        $this->ProductRepository = $ProductRepository;
        $this->StorageRepository = $StorageRepository;
    }

    public function index()
    {
        //
        $restaurant = $this->RestaurantRepository->getByUserId();
        $this->ProductRepository->getbyRestaurantId($restaurant->id);
        $data['products'] = $this->ProductRepository->getbyRestaurantId($restaurant->id);
        return view('products.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["categories"] = $this->CategoryRepository->getByRestaurantId($this->RestaurantRepository->getByUserId()->id);
        return view('products.create',$data);
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
        $request->validate($this->attrbibutes());
        $req = $request->except('_token');
        if($request->hasFile('image')){
            $req["image"] = $this->StorageRepository->store('products', $request->file('image'));
        }
        $req['restaurant_id'] = $this->RestaurantRepository->getByUserId()->id;
        $this->ProductRepository->save($req);

        return redirect()->back()->with('success','1 nuevo producto agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data["categories"] = $this->CategoryRepository->getByRestaurantId($this->RestaurantRepository->getByUserId()->id);
        $data["product"] = $this->ProductRepository->get($id);
        return view('products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate($this->attrbibutes("edit")); 

        $req = $request->except(['_method','_token']);
        $restaurant = $this->RestaurantRepository->getByUserId();
        $product = $this->ProductRepository->get($id);

        if($request->hasFile('image')){
            $req['image'] = $this->StorageRepository->store('products', $request->file('image'));
            

            $this->StorageRepository->destroy($product->image);
        }
        $req['restaurant_id'] = $restaurant->id;

        $this->ProductRepository->update($id, $req);
        return redirect('/product')->with('success','1  producto actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = $this->ProductRepository->get($id);
        return $this->StorageRepository->destroy($product->image);
        exit ;
        $this->ProductRepository->delete($id);
        return redirect('/product')->with('success','1 producto eliminado');
    }

    public function changeAvailable($productId){
        $product = $this->ProductRepository->get($productId);
        $t = $this->ProductRepository->update($productId, ['available' => $product['available'] ? false : true ]);
        return redirect()->back();

    }

    public function attrbibutes($type = ""){
        if($type != ""){
            return [
                "name" => "required|string",
                "description" => "required",
                "price" => "required",
                "category_id" => "required",
            ];

        }else{

            return [
                "name" => "required|string",
                "description" => "required",
                "price" => "required",
                "image" => "required",
                "category_id" => "required",
            ];
        }
    }
}
