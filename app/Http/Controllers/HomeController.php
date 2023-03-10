<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('dashboard',[ "footerYear"=>date("Y"),
                                  "title"=>"Strona główna",]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

}
