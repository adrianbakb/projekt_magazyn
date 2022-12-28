<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock'
    ];

    public function magazine(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Magazine::class,'product_magazine');
    }

}
