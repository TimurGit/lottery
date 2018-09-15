<?php

namespace App\Http\Controllers;

use App\Models\BonusPrize;
use App\Models\MoneyPrize;
use App\Models\Subject;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getprize()
    {
        $registry= [MoneyPrize::class, BonusPrize::class, Subject::class];
        echo "<pre>"; print_r(app($registry[rand(0,2)])->generate()); echo "</pre>";die();
    }

}
