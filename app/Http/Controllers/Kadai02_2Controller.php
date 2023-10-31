<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_2Controller extends Controller
{
    //
    public function index(){
        $message = "コントローラからビューへ渡された値";
        return view ('kadai02_2',['message' => $message ]);     // call source views
    }
}
