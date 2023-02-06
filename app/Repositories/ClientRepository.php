<?php

namespace App\Repositories;

use App\Models\Client;
use DB;


class ClientRepository extends BaseRepository{

  public function __construct(Client $model){

    $this->model = $model;
  }
  public function getAllClient(){   //funkcja pobierająca wszystkie rekodry tabeli
    return $this->model->get();
  }

}
