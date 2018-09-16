<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BonusPrize;
use App\Models\MoneyPrize;
use App\Models\Subject;
use Illuminate\Http\Request;

class PrizeController extends Controller
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

    public function getPrize()
    {
        $registry= [MoneyPrize::class, BonusPrize::class, Subject::class];
        $randomRegistryId = rand(0,count($registry));
        $prize = app($registry[$randomRegistryId])->generate();
        return ['type'=>$registry[$randomRegistryId], 'prize'=>$prize, 'prizeText'=>$prize->name_text];
    }

}
