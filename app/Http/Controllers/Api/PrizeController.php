<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BankContract;
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
        $randomRegistryId = rand(0,count($registry)-1);
        $prize = app($registry[$randomRegistryId])->generate();
        return ['type'=>$registry[$randomRegistryId], 'prize'=>$prize, 'prizeText'=>$prize->name_text];
    }

    public function transferToBankAccount(Request $request, BankContract $bankContract)
    {
        $account = \Auth::user()->bank_account;
        $val = $request->value;
        return ['status'=>$bankContract->transferToBankAccount($account, $val)];
    }

    public function transferBonus(Request $request)
    {
        $val = $request->value;
        return ['status'=>BonusPrize::transferToUserAccount(\Auth::user(), $val)];
    }

    public function subjectApply(Request $request)
    {
        Subject::find($request->id)->apply();
        return ['status'=>1];
    }

    public function convertBonusToMoney(BonusPrize $bonusPrize, Request $request)
    {
        $bonusPrize->value = $request->value;
        return ['type'=> MoneyPrize::class, 'prize'=>$bonusPrize->convertBonusToMoney()];
    }
}
