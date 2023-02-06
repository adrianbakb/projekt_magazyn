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

class DocumentsWZController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function wz(IssueRepository $issueRepo,$idWZ){

      $issue = Issue::All();
      $issue = $issueRepo->find($idWZ);

      return view('issue.report',["issue"=>$issue,"title"=>"Dokument WZ"]);
    }


}
