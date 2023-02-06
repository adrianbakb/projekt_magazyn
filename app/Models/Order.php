<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ordernumber',
        'number',
        'orderdate'
    ];

    public function product(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Product::class,'orders_product');
    }

    public function client(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Client::class,'orders_client');
    }

}
