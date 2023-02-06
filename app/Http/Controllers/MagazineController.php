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

    public function index(MagazineRepository $magRepo){  //metoda zawierająca funkcje wyświetlania listy magazynów

      $magazine = $magRepo->getAllMagazine();

      if(Auth::user()->type != 'biuro' && Auth::user()->type != 'admin')
      {
        return view('magazine.listauthmag',['magazineList'=>$magazine]);
      }

      return view('magazine.list',["magazineList"=>$magazine,
                                  "footerYear"=>date("Y"),
                                  "title"=>"Magazyny",
                                   ]);
    }


    public function show(MagazineRepository $magRepo,$id){ //metoda zawierająca funkcje wyświetlania szczgółów danego magazynu

      $magazine = $magRepo->find($id);

      return view('magazine.show',["magazine"=>$magazine,"title"=>"Magazyny"]);
    }

    public function create(){  //metoda zawierająca funkcje wyswietlania formularza dodawnaia produktu

      return view('magazine.create');
    }

    public function store(Request $request){  //zapisywanie danych do tabeli

      $magazine = new Magazine;
      $magazine->code = $request->input('code');                                                 //dodawanie Magazynu do bazy poprzez przechwycenie danych z formularza
      $magazine->name = $request->input('name');
      $magazine->save();

      return redirect()->action('App\Http\Controllers\MagazineController@index');
    }

    public function edit(MagazineRepository $magRepo,$id){ //edytowanie istniejących danych, wyświetlanie formularza edycji

      $magazine = $magRepo->find($id);

      return view('magazine.edit',["magazine" => $magazine]);
    }

    public function delete(MagazineRepository $magRepo,$id){  //usuwanie danego magazynu z tabeli, usuwanie po "id"

      $magazine = $magRepo->delete($id);
      return redirect('magazine');
    }

    public function editStore(Request $request){  //zapisywanie edytowanych danych

      $magazine = Magazine::find($request->input('id'));
      $magazine->code = $request->input('code');
      $magazine->name = $request->input('name');
      $magazine->save();

      return redirect()->action('App\Http\Controllers\MagazineController@index');
    }
}
