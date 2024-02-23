<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date= now()->format('d');
        $month= now()->format('F');
        $year= now()->format('Y');
        $dayname= now()->format('l');
        return view('home',compact('date','month','year','dayname'));
    }
}
