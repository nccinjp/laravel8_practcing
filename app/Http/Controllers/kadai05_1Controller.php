<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Kadai05_1Request;
use Illuminate\Support\Facades\Storage;

//selected pic will be saved in public > storage >app >goal
class kadai05_1Controller extends Controller
{
    //
    public function index(){
        return view('kadai05_1');
    }

    public function post(kadai05_1Request $request){


        $image = $request->image;
        //file's procces

        foreach($image as $i){
            //$image = $request->file('image')->store('public/images');
            $images = Storage::disk('public')->put('/kadai05images/',$i);
            $img[] = basename ($images);

        }


        //CSRFトークンを廃棄必ずreturn前にする
        $request->session()-> regenerateToken();

        return view('kadai05_2',compact('img'));

    }
}
