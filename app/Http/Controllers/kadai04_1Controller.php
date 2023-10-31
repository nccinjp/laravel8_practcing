<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Kadai04_1Request;

class kadai04_1Controller extends Controller
{
    private $courses =[
            [    'id' => 1,
                'name' => 'IT開発エキスパート',
            ],
            [
                'id'   => 2,
                'name' => 'IT開発研究',
            ],
            [
                'id'   => 3,
                'name' => 'システムエンジニア',
            ],
            [
                'id'   => 4,
                'name' => 'Webデザイン',
            ],
        ];
        //連装配列
    public function index() {

        /*
        $courses = [
            [
                'id'   => 1,
                'name' => 'IT開発エキスパート',
            ],
            [
                'id'   => 2,
                'name' => 'IT開発研究',
            ],
            [
                'id'   => 3,
                'name' => 'システムエンジニア',
            ],
            [
                'id'   => 4,
                'name' => 'Webデザイン',
            ],
        ];
        */

        $courses = $this-> courses;

    return view('kadai04_1',compact('courses'));
    }

    public function post(Kadai04_1Request $request) {
    //POSTで送信されたデータを配列$resultに格納する
    $result = [];
    $result['name']         = $request->input( 'name' );
    $result['student_id']   = $request->input( 'student_id' );
    $result['email']        = $request->input( 'email' );

    //$result['course'] = $request->input('course');
    //TODO: test
    $result['course'] = "";
    foreach($this-> courses as $c){
        if($c['id']== $request -> input('course')){
            $result['course'] = $c['name'];
            break;
        }

    }

    $result['note']   = $request->input('note');
    //CSRFトークンを廃棄
    $request -> session()-> regenerateToken();

    return view('kadai04_2', compact('result'));
    }

}
