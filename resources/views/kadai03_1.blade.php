@extends('layouts.kadai')

@section('pageTitle',"kadai03_1")
@section('title','Bladeテンプレート')

@section('content')

    @foreach( $collages as $collage)

    <a href = "{{$collage ['url']}}">{{$collage['name']}}</a>

        @foreach ( $collage['course'] as $c)
            <p>{{$c}}</p>
        @endforeach

    @endforeach

@endsection
