<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\User;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(ProductRepository $prodRepo){ //metoda zawierająca funkcje wyświetlania listy produktów

      $product = $prodRepo->getAllProduct();

      return view('product.list',["productList"=>$product,
                                  "footerYear"=>date("Y"),
                                  "title"=>"Produkty",
                                   ]);
    }

    public function listByMagazine(ProductRepository $prodRepo,$id){


      $product = $prodRepo->getProductByMagazine($id);

      return view('product.list',["productList"=>$product]);

    }

    public function show(ProductRepository $prodRepo,$id){ //metoda zawierająca funkcje wyświetlania szczgółów danego produktu

      $product = $prodRepo->find($id);

      return view('product.show');
    }

    public function create(){     //metoda zawierająca funkcje wyswietlania formularza dodawnaia produktu

      /*if(Auth::user()->type != 'admin')
      {
        return redirect()->route('login');
      }*/

      $magazine = Magazine::All();      // zmienna $magazine pobierająca dane z tabeli "Magazine"

      return view('product.create', ["magazine" => $magazine]);
    }

    public function store(Request $request){ //zapisywanie danych do tabeli

      $request->validate([                                                      //walidacja danych wprowadzonych do formularza
        'name' => 'required|max:255',  //pole wymagane max 255 znaków
        'price' => 'required', //pole wymagane
        'stock' => 'required'
      ]);

      $product = new Product;                                                        //dodawanie lekarza do bazy poprzez przechwycenie danych z formularza
      $product->name = $request->input('name');
      $product->price = $request->input('price');
      $product->stock = $request->input('stock');
      $product->save();
      $product->magazine()->sync($request->input('magazine.id'));

      return redirect()->action('App\Http\Controllers\ProductController@index');
    }

    public function edit(ProductRepository $prodRepo,$id){ //edytowanie istniejących danych, wyświetlanie formularza edycji

      $magazine = Magazine::All();
      $product = $prodRepo->find($id);

      return view('product.edit',["magazine" => $magazine, "product" => $product]);
    }

    public function delete(ProductRepository $prodRepo,$id){  //usuwanie danego magazynu z tabeli, usuwanie po "id"

      $product = $prodRepo->delete($id);
      return redirect('product');
    }

    public function editStore(Request $request){ //zapisywanie edytowanych danych

      $product = Product::find($request->input('id'));
      $product->name = $request->input('name');
      $product->price = $request->input('price');
      $product->stock = $request->input('stock');
      $product->save();
      $product->magazine()->sync($request->input('magazine'));

      return redirect()->action('App\Http\Controllers\ProductController@index');
    }
}
