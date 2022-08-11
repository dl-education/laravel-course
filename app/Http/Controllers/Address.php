<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dadata\DadataClient;

class Address extends Controller
{
    public function form(){
        return view('address.form');
    }

    public function parse(Request $request, DadataClient $dadata){
        $response = $dadata->clean('address', $request->address);
        dd($response);
        return view('address.result');
    }
}