<?php

namespace App\Http\Controllers;

use App\Currency;

class CurrencyController extends Controller
{
    function list(){
        return response()->json(Currency::all());
    }
}
