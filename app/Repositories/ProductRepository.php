<?php

namespace App\Repositories;

use App\Models\Product;
use DB;



class ProductRepository extends BaseRepository{

  public function __construct(Product $model){

    $this->model = $model;
  }
  public function getAllProduct(){
    return $this->model->get();
  }

  public function getAllMagazine(){
    return DB::table('magazines')->get();
  }

  public function getProductByMagazine($id){

    return $this->model->where('magazine',function($q) use ($id){

      $q->where('magazine.id',$id);
    })->orderBy('name','asc')->get();
  }

}
