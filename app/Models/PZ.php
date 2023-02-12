<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PZ extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'PZ_date'

    ];

    public function product(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Magazine::class,'products');
    }

    public function order(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Magazine::class,'orders');
    }

    public function client(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Magazine::class,'clients');
    }
}
