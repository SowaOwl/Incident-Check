<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        return view('main');
    }
    public function test(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://jservice.io/api/random');
        $output = curl_exec($ch);
        curl_close($ch);
    }
}
