<?php

namespace App\repositories;
use Illuminate\Database\Eloquent\Model;

class BaseRepository {

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function all(){
        return $this->model->get();
    }

    public function get($id){
        return $this->model->find($id);
    }

    public function save($request){
        // return $request;
        return $this->model->insert($request);
    }

    public function update($id, $request){
        // return $request;
        $this->model::where('id',$id)->update($request);
    }

    public function delete($id){
        $this->model::destroy($id);
    }
}