<?php

namespace App\Http\Controllers;

use App\Models\Article;   //Article　classを使う
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Thumbnail;   //kadai10

class kadai06_1Controller extends Controller
{
    //
    public function index(){
        $articleDao = new Article();    //Dao (DB access object)
        //$articles = $articleDao ->orderBy( "created_at" ,"desc") ->get();

        $articles = $articleDao ->orderBy( "created_at" ,"desc") ->paginate(10); //10件つづします

        return view("kadai06_1",compact("articles"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articleDao = new Article();
        $art = $articleDao -> find($id);
        return view('kadai07_1', compact('art'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //kadai8で追加処理
        $request->session()->regenerateToken();

        $articleDao = new Article();
        $thumbnailDao = new Thumbnail();  //Kadai10

        $this->validate($request,
                        $articleDao::$rules,
                        $articleDao::$messages );

        $this->validate($request,
                        $thumbnailDao::$rules,
                        $thumbnailDao::$messages );  //kadai10

                        //  :: 静的METHOD　指的是ARTICLE裡的STATIC

        $articleDao -> title = $request->input('title');
        $articleDao -> body = $request->input('body');
        //$thumbnailDao -> image = $result['image'];

        // $result[ 'title' ] = $request->input('title');
        // $result[ 'body' ] = $request->input('body');

        //kadai10
        $image = null;
        if( $request -> has("image")){
            $file = $request->file("image");
            $image = Storage::disk( "public" )-> put( "images" , $file);
            $thumbnailDao->name = basename( $image );
        }

        DB::transaction(function () use($articleDao,$thumbnailDao,$image){
            $articleDao->save();
            if( $image ){
                $thumbnailDao -> article_id =
                $articleDao->id;
                $thumbnailDao->save();
            }
        });

        return redirect()-> route( "kadai06_1.index" );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //課題８追加
        return view ( "kadai08_1" );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $articleDao = new Article();
        $art = $articleDao -> find($id);
        return view('kadai09_1', compact('art'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request -> session()->regenerateToken();

        $articleDao = new Article();
        $thumbnailDao = new Thumbnail();  //Kadai10


        $this->validate( $request, $articleDao::$rules, $articleDao::$messages );
        $this->validate($request, $thumbnailDao::$rules, $thumbnailDao::$messages );  //kadai10

        $article = $articleDao->find( $id );
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        DB::transaction( function() use( $article ) {$article->save(); });

        //kadai10
        $image = null;
        if( $request -> has("image")){
            $file = $request->file("image");
            $image = Storage::disk( "public" )-> put( "images" , $file);
            $thumbnailDao->name = basename( $image );
        }

        DB::transaction(function () use($articleDao,$thumbnailDao,$image){
            $articleDao->save();
            if( $image ){
                $thumbnailDao -> article_id =
                $articleDao->id;
                $thumbnailDao->save();
            }
        });

        return redirect()->route( "kadai06_1.show", $article->id );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $articleDao = new Article();

        DB::transaction(function() use( $articleDao, $id ){ $articleDao->destroy( $id );  });

        return redirect()->route( "kadai06_1.index" );
    }
}
