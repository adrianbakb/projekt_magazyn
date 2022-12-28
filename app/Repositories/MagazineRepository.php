<?php

namespace App\Repositories;

use App\Models\Magazine;
use DB;


class MagazineRepository extends BaseRepository{

  public function __construct(Magazine $model){

    $this->model = $model;
  }
  public function getAllMagazine(){   //funkcja pobierająca wszystkie rekodry tabeli
    return DB::table('magazines')->get();
  }

}
