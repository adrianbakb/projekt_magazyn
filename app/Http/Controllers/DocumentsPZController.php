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

class DocumentsPZController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function pz(OrderRepository $orderRepo,$idPZ){

      $order = Order::All();
      $order = $orderRepo->find($idPZ);

      return view('order.report',["order"=>$order,"title"=>"Dokument PZ"]);
    }


}
