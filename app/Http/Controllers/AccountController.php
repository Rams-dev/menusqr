<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Codes;
use App\Repositories\AccountRepository;
use App\Repositories\CodeRepository;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $AccountRepository;
    protected $CodeRepository;

    public function __construct(AccountRepository $AccountRepository, CodeRepository $CodeRepository){
        $this->AccountRepository = $AccountRepository;
        $this->CodeRepository = $CodeRepository;
    }

    public function getCode(){
        return view('code');
    }

    public function storeAccount(Request $request){
        $req = $request->get('code');
        $code = Codes::where('code',$req)->where('status',false)->first();
        if($code){
            $data = [
                "code_id" => $code->id,
                "user_id" => auth()->user()->id,
                "start" => date('Y-m-d')
            ];   

            $this->CodeRepository->update($code->id, ['status' => true]);
            $this->AccountRepository->save($data);

            return redirect('/restaurant/create')->with('success','Bienvenido'.auth()->user()->name);
        }
        return redirect()->back()->with('error',"Este codigo no esta registrado en la base de datos! ");
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
