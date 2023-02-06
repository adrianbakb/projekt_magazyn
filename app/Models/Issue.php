<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'issuenumber',
        'number',
        'issuedate'
    ];

    public function product(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Product::class,'issue_product');
    }

    public function client(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Client::class,'issue_client');
    }
}
