<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository{

  protected $model;

  public function getAll($columns = array('*')){  //zwracanie danych z tabeli
    return $this->model->get($columns);
  }

  public function create($date){   //dodawanie rekordu do tabeli
    return $this->model->create($date);
  }

  public function update($date,$id){  //edytowanie istniejącego rekordu
    return $this->model->where("id",'=',$id)->update($date);
  }

  public function delete($id){  //usuwanie rekordu
    return $this->model->destroy($id);
  }

  public function find($id){ //przeszukiwanie tabeli po "id"
    return $this->model->find($id);
  }

}
