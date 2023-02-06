<?php

namespace App\Repositories;

use App\Models\Order;
use DB;


class OrderRepository extends BaseRepository{

  public function __construct(Order $model){

    $this->model = $model;

  }
  public function getAllOrder(){   //funkcja pobierająca wszystkie rekodry tabeli
    return $this->model->get();
  }

  public function getAllClient(){   //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('clients')->get();
  }

  public function getAllProduct(){  //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('products')->get();
  }

  public function getOrderByProduct($id){  //funkcja pobierająca "id" produktu, w celu przypisania Przyjecia do odpowiedniego produktu

    return $this->model->where('product',function($q) use ($id){

      $q->where('product.id',$id);
    })->orderBy('name','asc')->get();
  }

  public function getOrderByClient($id){  //funkcja pobierająca "id" kontrahenta, w celu przypisania Przyjecia do odpowiedniego kontrahenta

    return $this->model->where('client',function($q) use ($id){

      $q->where('client.id',$id);
    })->orderBy('name','asc')->get();
  }


}
