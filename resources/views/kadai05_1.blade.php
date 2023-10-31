@extends('layouts.kadai')

@section('pageTitle', "Kadai05_1")
@section('title', "File Upload")

@section('content')

<section>
    <form action="/kadai05_1" method="POST"
    enctype="multipart/form-data">

       @csrf
        <input type="file" name="image[]" multiple>

        @error('image')
            {{$message}}
        @enderror

        <br>
        <input type="submit" name="sub" value="送信" style="background-color:rgb(255, 127, 206); color:white; width:50px;height:30px">

    </form>

</section>
@endsection
