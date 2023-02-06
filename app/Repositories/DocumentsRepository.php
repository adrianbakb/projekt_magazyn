<?php

namespace App\Repositories;

use App\Models\Documents;
use DB;


class DocumentsRepository extends BaseRepository{

  public function __construct(Documents $model){

    $this->model = $model;
  }
  public function getAllOrder(){   //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('orders')->get();
  }
  public function getAllIssue(){   //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('issues')->get();
  }


}
