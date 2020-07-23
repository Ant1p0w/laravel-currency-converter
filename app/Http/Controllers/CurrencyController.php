<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Rate;

class CurrencyController extends Controller
{
    function list(){
        $currency_rates = Currency::with(['rate' => function ($query) {
            $query->orderBy('updated_at', 'desc');
        }])->get();
        return response()->json($currency_rates);
    }

    function rates(){
        return response()->json(Rate::with('currency')->get());
    }
}
