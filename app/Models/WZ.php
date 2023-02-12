<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WZ extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'WZ_date'

    ];

    public function product(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Magazine::class,'products');
    }

    public function issue(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Magazine::class,'issues');
    }

    public function client(){  //metoda zawierająca określenie relacji pomiedzy tabelami
      return $this->belongsToMany(Magazine::class,'clients');
    }
}
