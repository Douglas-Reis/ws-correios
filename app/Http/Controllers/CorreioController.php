<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\GetFrete as GetFreteRequest;
use App\Support\Facades\Correio;

class CorreioController extends Controller
{
    public function getCep(Request $request)
    {
        $cep = $request->route('zipcode');
        
        return Correio::provider('sigep')->consultaCep($cep);
    }

    public function getFrete(GetFreteRequest $request)
    {
        return Correio::provider('calc_preco_prazo')->calcPrecoPrazo($request->all());
    }
}
