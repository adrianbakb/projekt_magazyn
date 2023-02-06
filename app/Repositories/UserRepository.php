<?php

namespace App\Repositories;

use App\Models\User;
use DB;


class UserRepository extends BaseRepository{

  public function __construct(User $model){

    $this->model = $model;
  }
  public function getAllUser(){   //funkcja pobierająca wszystkie rekodry tabeli
    return $this->model->get();
  }

}
