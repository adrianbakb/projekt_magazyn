<?php

namespace App\Repositories;

use App\Models\Product;
use DB;



class ProductRepository extends BaseRepository{

  public function __construct(Product $model){

    $this->model = $model;
  }
  public function getAllProduct(){  //funkcja pobierająca wszystkie rekodry tabeli
    return $this->model->get();
  }

  public function getAllMagazine(){  //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('magazines')->get();
  }

  public function getProductByMagazine($id){  //funkcja pobierająca "id" magazynu, w celu przypisania produktu do odpowiedniego magazynu

    return $this->model->where('magazine',function($q) use ($id){

      $q->where('magazine.id',$id);
    })->orderBy('name','asc')->get();
  }

}
