<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\Order;
use App\Models\Issue;
use App\Repositories\DocumentsRepository;
use App\Repositories\OrderRepository;
use App\Repositories\IssueRepository;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(DocumentsRepository $docRepo){  //metoda zawierająca funkcje wyświetlania listy kontrahentów

      $order = $docRepo->getAllOrder();
      $issue = $docRepo->getAllIssue();

      return view('documents.list',["orderList" => $order,"issueList" => $issue,
                                  "footerYear" => date("Y"),
                                  "title" => "Archiwum PZ/WZ",
                                   ]);
    }

    public function indexPZ(DocumentsRepository $docRepo){  //metoda zawierająca funkcje wyświetlania listy kontrahentów

      $order = $docRepo->getAllOrder();

      return view('documents.listPZ',["orderList" => $order,
                                  "footerYear" => date("Y"),
                                  "title" => "Archiwum PZ",
                                   ]);
    }

    public function indexWZ(DocumentsRepository $docRepo){  //metoda zawierająca funkcje wyświetlania listy kontrahentów

      $issue = $docRepo->getAllIssue();

      return view('documents.listWZ',["issueList" => $issue,
                                  "footerYear" => date("Y"),
                                  "title" => "Archiwum WZ",
                                   ]);
    }


}
