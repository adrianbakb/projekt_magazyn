<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserManagment extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

    public function index(UserRepository $userRepo)
    {

      if(Auth::user()->type != 'admin')
      {
        return view('users.listauth');
      }

      $user = $userRepo->getAllUser();

      return view('users.list',["userList"=>$user,
                                  "footerYear"=>date("Y"),
                                  "title"=>"Użytkownicy",
                                   ]);
    }

    public function create(){  //metoda zawierająca funkcje wyswietlania formularza dodawnaia produktu

      return view('users.create');
    }

    public function store(Request $request){  //zapisywanie danych do tabeli

      $user = new User;                                                        //dodawanie Użytkownika do bazy poprzez przechwycenie danych z formularza
      $user->name = $request->input('name');
      $user->type = $request->input('type');
      $user->save();

      return redirect()->action('App\Http\Controllers\UserManagment@index');
    }

    public function edit(UserRepository $userRepo,$id){ //edytowanie istniejących danych, wyświetlanie formularza edycji

      $user = $userRepo->find($id);

      return view('users.edit',["user" => $user]);
    }

    public function delete(UserRepository $userRepo,$id){  //usuwanie danego magazynu z tabeli, usuwanie po "id"

      $user = $userRepo->delete($id);
      return redirect('users');
    }

    public function editStore(Request $request){  //zapisywanie edytowanych danych

      $user = User::find($request->input('id'));
      $user->name = $request->input('name');
      $user->type = $request->input('type');
      $user->save();

      return redirect()->action('App\Http\Controllers\UserManagment@index');
    }
}
