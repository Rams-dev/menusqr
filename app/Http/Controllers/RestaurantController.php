<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use App\Repositories\RestaurantRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\StorageRepository;
use App\Repositories\ProductRepository;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class RestaurantController extends Controller
{

    protected $RestaurantRespository;
    protected $StorageRepository;
    protected $CategoryRepository;
    protected $ProductRepository;

    public function __construct(RestaurantRepository $RestaurantRespository, StorageRepository $StorageRepository, CategoryRepository $CategoryRepository, ProductRepository $ProductRepository){

        $this->RestaurantRepository = $RestaurantRespository;
        $this->StorageRepository = $StorageRepository;
        $this->CategoryRepository = $CategoryRepository;
        $this->ProductRepository = $ProductRepository;
        
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

    public function myRestaurant(){
        $restaurant = $this->RestaurantRepository->getByUserId();
        
        $data["categories"] =  $this->CategoryRepository->getByRestaurantId($restaurant->id);
        $data["products"] = $this->ProductRepository->getByRestaurantId($restaurant->id);
        

        $data['restaurant'] = $restaurant;
        return view('Restaurant.index',$data);

    }

    public function restaurant($name){
        $restaurant = $this->RestaurantRepository->getByName($name);
        $data["restaurant"] = $this->RestaurantRepository->getByName($name);
        $data["categories"] =  $this->CategoryRepository->getByRestaurantId($restaurant->id);
        $data["products"] = $this->ProductRepository->getByRestaurantId($restaurant->id);
        return view('restaurant.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userHasRestaurant = $this->RestaurantRepository->getByUserId();
        if($userHasRestaurant){
            return redirect('/my_restaurant')->with('error','¡Ya tienes registrado un restaurante!');
        }
        return view('Restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate($this->attributes());
        
        $req = $request->except('_token');
        if($request->hasFile('logo')){
            $req['logo'] = $this->StorageRepository->store('logos',$request->file('logo'));
        }
        if($request->hasFile('front_image')){
            $req['front_image'] = $this->StorageRepository->store('portadas',$request->file('front_image'));
        }
        $req['user_id'] = auth()->user()->id;
         $this->RestaurantRepository->save($req);
         return redirect('/myRestaurant');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data["restaurant"] = $this->RestaurantRepository->getByUserId();

        return view('Restaurant.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate($this->attributes("edit"));
        $restaurant = $this->RestaurantRepository->get($id);
        $req = $request->except(['_token','_method']);
        
        if($request->hasFile('logo')){
            $req['logo'] = $this->StorageRepository->store('logos',$request->file('logo'));
            $this->StorageRepository->destroy($restaurant->logo);
        }
        if($request->hasFile('front_image')){
            $req['front_image'] = $this->StorageRepository->store('portadas',$request->file('front_image'));
            $this->StorageRepository->destroy($restaurant->front_image);
        }

        $this->RestaurantRepository->update($id,$req);

        return redirect('/my_restaurant')->with('success','¡Restaurante Actualizado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    public function attributes($type = ""){
        if($type != ""){
            return [
                "name" => "required",
                "shortName" => "required",
                "phone" => "size:10",
                "address" => "string",
                "city" => "string",
                "state" => "string",
                "slogan" => "string",
                "description" => "string|max:190",
            ];
        }
        return [
            "name" => "required",
            "shortName" => "required",
            "logo" => "required",
            "front_image" => "required",
            "phone" => "size:10",
            "address" => "string",
            "city" => "string",
            "state" => "string",
            "slogan" => "string",
            "description" => "string|max:190",
        ];
    }
}
