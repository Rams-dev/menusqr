<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Image;

class StorageRepository {

    public function store($folder, $image){
        $name =  Str::random(10) . $image->getClientOriginalName();
        $route = storage_path() . '/app/public/'.$folder.'/'.$name;
        Image::make($image)
                ->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($route);

        return $folder.'/'.$name;
    }

    public function destroy($rute){
        Storage::delete("public/".$rute);
    }

}