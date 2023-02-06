<?php

namespace App\Repositories;

use App\Models\Issue;
use DB;


class IssueRepository extends BaseRepository{

  public function __construct(Issue $model){

    $this->model = $model;

  }
  public function getAllIssue(){   //funkcja pobierająca wszystkie rekodry tabeli
    return $this->model->get();
  }

  public function getAllClient(){   //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('clients')->get();
  }

  public function getAllProduct(){  //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('products')->get();
  }

  public function getIssueByProduct($id){  //funkcja pobierająca "id" produkctu, w celu przypisania wydania do odpowiedniego produktu

    return $this->model->where('product',function($q) use ($id){

      $q->where('product.id',$id);
    })->orderBy('name','asc')->get();
  }
  public function getIssueByClient($id){  //funkcja pobierająca "id" kontrahenta, w celu przypisania wydania do odpowiedniego kontrahenta

    return $this->model->where('client',function($q) use ($id){

      $q->where('client.id',$id);
    })->orderBy('name','asc')->get();
  }

}
