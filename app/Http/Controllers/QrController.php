<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use App\Repositories\RestaurantRepository;
use Illuminate\Support\Facades\Storage;
use PDF;


class QrController extends Controller
{
    //
    protected $RestaurantRepository;

    public function __construct(RestaurantRepository $RestaurantRepository){
        $this->RestaurantRepository = $RestaurantRepository;
    }

    public function index(){
        $restaurant = $this->RestaurantRepository->getByUserId();
        $data["restaurant"] = $restaurant;
        QrCode::size(350)->encoding('UTF-8')->generate(url('/'.$restaurant->name, public_path().'public/qrcodes/'.$restaurant->name.'.png'));


        return view('restaurant.qr',$data);
    }

    public function pdf(){
        $data["restaurant"] = $this->RestaurantRepository->getByUserId();
        QrCode::size(350)->encoding('UTF-8')->generate(url('/'.$restaurant->name),'public/qrcodes/'.$restaurant->name.'.svg');
        $pdf = PDF::loadView('pdf.qr',$data);
        return $pdf->stream();
    }

    public function download(){
        $restaurant = $this->RestaurantRepository->getByUserId();
        
         QrCode::size(350)->encoding('UTF-8')->generate(url('/'.$restaurant->name, public_path().'public/qrcodes/'.$restaurant->name.'.png'));
        

        return response()->download($qrGnerate);
    }
}
