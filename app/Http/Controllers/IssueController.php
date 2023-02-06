<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Product;
use App\Models\Client;
use App\Repositories\IssueRepository;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(IssueRepository $issueRepo){  //metoda zawierająca funkcje wyświetlania listy kontrahentów

      $issue = $issueRepo->getAllIssue();

      return view('issue.list',["issueList"=>$issue,
                                  "footerYear"=>date("Y"),
                                  "title"=>"Wydania",
                                   ]);
    }

    public function listByProduct(IssueRepository $issueRepo,$id){


      $issue = $issueRepo->getIssueByProduct($id);

      return view('issue.list',["issueList"=>$issue]);

    }

    public function listByClient(IssueRepository $issueRepo,$id){


      $issue = $issueRepo->getIssueByClient($id);

      return view('issue.list',["issueList"=>$issue]);

    }

    public function report(IssueRepository $issueRepo,$id){ //metoda zawierająca funkcje wyświetlania dokumentu WZ

      $product = Product::All();      // zmienna $product pobierająca dane z tabeli "Products"
      $client = Client::All();
      $issue = $issueRepo->find($id);

      return view('issue.report',["issue"=>$issue,"product"=>$product,"client"=>$client,"title"=>"Dokument WZ"]);
    }

    public function create(){  //metoda zawierająca funkcje wyswietlania formularza dodawnaia produktu

      $product = Product::All();      // zmienna $product pobierająca dane z tabeli "Products"
      $client = Client::All();

      return view('issue.create', ["product" => $product, "client" => $client]);
    }

    public function store(Request $request){  //zapisywanie danych do tabeli

      $issue = new Issue;                                                        //dodawanie Wydania do bazy poprzez przechwycenie danych z formularza
      $issue->issuenumber = $request->input('issuenumber');
      $issue->number = $request->input('number');
      $issue->issuedate = $request->input('issuedate');
      $issue->save();
      $issue->product()->sync($request->input('product'));
      $issue->client()->sync($request->input('client'));

      return redirect()->action('App\Http\Controllers\IssueController@index');
    }

    public function edit(IssueRepository $issueRepo,$id){ //edytowanie istniejących danych, wyświetlanie formularza edycji

      $product = Product::All();
      $client = Client::All();
      $issue = $issueRepo->find($id);

      return view('issue.edit',["issue" => $issue, "product" => $product, "client" => $client]);
    }

    public function delete(IssueRepository $issueRepo,$id){  //usuwanie danego wydania z tabeli, usuwanie po "id"

      $issue = $issueRepo->delete($id);
      return redirect('issue');
    }

    public function editStore(Request $request){  //zapisywanie edytowanych danych

      $issue = Issue::find($request->input('id'));
      $issue->issuenumber = $request->input('issuenumber');
      $issue->number = $request->input('number');
      $issue->issuedate = $request->input('issuedate');
      $issue->save();
      $issue->client()->sync($request->input('client'));
      $issue->product()->sync($request->input('product'));

      return redirect()->action('App\Http\Controllers\IssueController@index');
    }
}
