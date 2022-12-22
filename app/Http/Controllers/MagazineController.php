<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Repositories\MagazineRepository;
use Illuminate\Support\Facades\Auth;

class MagazineController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(MagazineRepository $magRepo){

      $magazine = $magRepo->getAllMagazine();

      return view('magazine.list',["magazineList"=>$magazine,
                                  "footerYear"=>date("Y"),
                                  "title"=>"Magazyny",
                                   ]);
    }


    public function show(MagazineRepository $magRepo,$id){

      $magazine = $magRepo->find($id);

      return view('magazine.show',["magazine"=>$magazine,"title"=>"Magazyny"]);
    }

    public function create(){

      return view('magazine.create');
    }

    public function store(Request $request){

      $magazine = new Magazine;                                                        //dodawanie Magazynu do bazy poprzez przechwycenie danych z formularza
      $magazine->name = $request->input('name');
      $magazine->save();

      return redirect()->action('App\Http\Controllers\MagazineController@index');
    }

    public function edit(MagazineRepository $magRepo,$id){

      $magazine = $magRepo->find($id);

      return view('magazine.edit',["magazine" => $magazine]);
    }

    public function delete(MagazineRepository $magRepo,$id){

      $magazine = $magRepo->delete($id);
      return redirect('magazine');
    }

    public function editStore(Request $request){

      $magazine = Magazine::find($request->input('id'));
      $magazine->name = $request->input('name');
      $magazine->save();

      return redirect()->action('App\Http\Controllers\MagazineController@index');
    }
}
