<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(OrderRepository $orderRepo){  //metoda zawierająca funkcje wyświetlania listy kontrahentów

      $order = $orderRepo->getAllOrder();

      return view('order.list',["orderList"=>$order,
                                  "footerYear"=>date("Y"),
                                  "title"=>"Przyjęcia",
                                   ]);
    }

    public function listByProduct(OrderRepository $orderRepo,$id){


      $order = $orderRepo->getOrderByProduct($id);

      return view('order.list',["orderList"=>$order]);

    }

    public function listByClient(OrderRepository $orderRepo,$id){


      $order = $orderRepo->getOrderByClient($id);

      return view('order.list',["orderList"=>$order]);

    }

    public function report(OrderRepository $orderRepo,$id){ //metoda zawierająca funkcje wyświetlania dokumentu PZ

      $order = $orderRepo->find($id);

      return view('order.report',["order"=>$order,"title"=>"Dokument PZ"]);
    }

    public function pdf()
    {

      $pdf = PDF::loadView('order.report');

      return $pdf->download("dokumentPZ.pdf");
    }

    public function create(){  //metoda zawierająca funkcje wyswietlania formularza dodawnaia produktu

      $product = Product::All();      // zmienna $product pobierająca dane z tabeli "Products"
      $client = Client::All();

      return view('order.create', ["product" => $product, "client" => $client]);
    }

    public function store(Request $request){  //zapisywanie danych do tabeli

      $request->validate([                                                      //walidacja danych wprowadzonych do formularza
        'ordernumber' => 'required|max:255',  //pole wymagane max 255 znaków
        'number' => 'required', //pole wymagane
        'orderdate' => 'required'
      ]);

      $order = new Order;                                                        //dodawanie Przyjecia do bazy poprzez przechwycenie danych z formularza
      $order->ordernumber = $request->input('ordernumber');
      $order->number = $request->input('number');
      $order->orderdate = $request->input('orderdate');
      $order->save();
      $order->product()->sync($request->input('product'));
      $order->client()->sync($request->input('client'));

      return redirect()->action('App\Http\Controllers\OrderController@index');
    }

    public function edit(OrderRepository $orderRepo,$id){ //edytowanie istniejących danych, wyświetlanie formularza edycji

      $product = Product::All();
      $client = Client::All();
      $order = $orderRepo->find($id);

      return view('order.edit',["order" => $order, "product" => $product, "client" => $client]);
    }

    public function delete(OrderRepository $orderRepo,$id){  //usuwanie danego przyjecia z tabeli, usuwanie po "id"

      $order = $orderRepo->delete($id);
      return redirect('order');
    }

    public function editStore(Request $request){  //zapisywanie edytowanych danych

      $request->validate([                                                      //walidacja danych wprowadzonych do formularza
        'ordernumber' => 'required|max:255',  //pole wymagane max 255 znaków
        'number' => 'required', //pole wymagane
        'orderdate' => 'required'
      ]);

      $order = Order::find($request->input('id'));
      $order->ordernumber = $request->input('ordernumber');
      $order->number = $request->input('number');
      $order->orderdate = $request->input('orderdate');
      $order->save();
      $order->product()->sync($request->input('product'));
      $order->client()->sync($request->input('client'));

      return redirect()->action('App\Http\Controllers\OrderController@index');
    }
}
