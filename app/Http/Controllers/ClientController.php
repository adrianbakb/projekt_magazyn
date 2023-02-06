<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Product;
use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(ClientRepository $clientRepo){  //metoda zawierająca funkcje wyświetlania listy kontrahentów

      $client = $clientRepo->getAllClient();

      if(Auth::user()->type != 'biuro' && Auth::user()->type != 'admin')
      {
        return view('client.listauthmag',['clientList'=>$client]);
      }

      return view('client.list',["clientList"=>$client,
                                  "footerYear"=>date("Y"),
                                  "title"=>"Kontrahenci",
                                   ]);
    }

    public function show(ClientRepository $clientRepo,$id){ //metoda zawierająca funkcje wyświetlania szczgółów danego kontrahenta

      $magazine = $clientRepo->find($id);

      return view('client.show',["client"=>$client,"title"=>"Kontrahenci"]);
    }

    public function create(){  //metoda zawierająca funkcje wyswietlania formularza dodawnaia produktu

      $product = Product::All();      // zmienna $magazine pobierająca dane z tabeli "Magazine"

      return view('client.create', ["product" => $product]);
    }

    public function store(Request $request){  //zapisywanie danych do tabeli

      $client = new Client;                                                        //dodawanie Magazynu do bazy poprzez przechwycenie danych z formularza
      $client->name = $request->input('name');
      $client->address = $request->input('address');
      $client->email = $request->input('email');
      $client->phone = $request->input('phone');
      $client->NIP = $request->input('NIP');
      $client->account = $request->input('account');
      $client->save();

      return redirect()->action('App\Http\Controllers\ClientController@index');
    }

    public function edit(ClientRepository $clientRepo,$id){ //edytowanie istniejących danych, wyświetlanie formularza edycji

      $client = $clientRepo->find($id);

      return view('client.edit',["client" => $client]);
    }

    public function delete(ClientRepository $clientRepo,$id){  //usuwanie danego magazynu z tabeli, usuwanie po "id"

      $client = $clientRepo->delete($id);
      return redirect('client');
    }

    public function editStore(Request $request){  //zapisywanie edytowanych danych

      $client = Client::find($request->input('id'));
      $client->name = $request->input('name');
      $client->address = $request->input('address');
      $client->email = $request->input('email');
      $client->phone = $request->input('phone');
      $client->NIP = $request->input('NIP');
      $client->account = $request->input('account');
      $client->save();

      return redirect()->action('App\Http\Controllers\ClientController@index');
    }
}
