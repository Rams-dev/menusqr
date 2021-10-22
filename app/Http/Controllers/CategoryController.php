<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\RestaurantRepository;

class CategoryController extends Controller
{

    protected $CategoryRepository;
    protected $RestaurantRepository;
    public function __construct(CategoryRepository $CategoryRepository, RestaurantRepository $RestaurantRepository){
        $this->CategoryRepository = $CategoryRepository;
        $this->RestaurantRepository = $RestaurantRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["categories"] = $this->CategoryRepository->all();
        return view('categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //
        $restaurant = $this->RestaurantRepository->getByUserId();
        $data["categories"] =$this->CategoryRepository->getByRestaurantId($restaurant->id);
        
        return view('categories.create',$data);
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

        $request->validate(['name' => 'required|string']);

        $req = $request->except('_token');
        $req['restaurant_id'] = $this->RestaurantRepository->getByUserId()->id;
        $this->CategoryRepository->save($req);
        return redirect('/category')->with("success","¡Nueva categoría creada!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['category'] = $this->CategoryRepository->get($id);
        return view('categories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(['name' => 'required']);
        $req = $request->only('name');
        $this->CategoryRepository->update($id,$req);
        return redirect('/category')->with('success',"¡Categoría acualizada!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->CategoryRepository->delete($id);
        return redirect()->back();
    }

    public function attributes(){
        return [
            "name" => "required",
            "image" => "required",
        ];
    }
}
