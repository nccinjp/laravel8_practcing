
@extends('layouts.kadai')

@section('pageTitle', "Kadai05_2")
@section('title', "File Upload Finshed")

@section('content')

    <p>file uploaded success</p>
    {{-- to do list --}}

    @foreach ( $img as $i)
        <img src="{{asset('storage/kadai05images/' . $i)}}">
        <br>
    @endforeach


    <br>

    <div class="flex justify-end">
    	<!-- 戻るボタン -->
        <a href="/kadai05_1" class="text-white text-center leading-10 bg-gray-500 px-10 hover:bg-gray-400 rounded-md">戻る</a>
    </div>
@endsection
