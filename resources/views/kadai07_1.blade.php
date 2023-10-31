@extends('layouts.kadai')

@section('pageTitle', "kadai07_1")
@section('title', 'EloquentORM 条件を使った参照')

@section('content')
<section>
    <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
        <h3 class="text-2xl font-bold leading-10 my-5 px-5 py-2 border-b">{{$art['title']}}</h3>
        <p class="text-gray-400 text-sm text-right px-3"><time datetime="{{ $art['created_at']}}">{{ $art['created_at']}}</time></p>
            <div class="flex justify-between py-3">

                {{-- kadai 10 PLUS --}}
            <div class= "mr-5">
                @if ($art->thumbnails->count())

                <figure class="flex flex-col w-4/12">
                    @foreach ( $art->thumbnails as $thumbnail)
                        <img class="h-80 text-xs px-3 py-2 border border-gray-300"
                        src="{{asset('storage/images/'. $thumbnail->name)}}">
                    @endforeach

                </figure>
                @endif
            </div>

            <p class="text-lg leading-loose px-3 py-5">{{$art['body']}}</p>
        </div>
    </div>



    <div class="flex justify-end">
        <a href="/kadai06_1" class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
        <form action="{{ route("kadai06_1.destroy" , $art -> id) }}" method="POST">
            @method( "DELETE" )
            @csrf
            <button type="submit" class="block w-16 text-white text-center bg-red-600 hover:bg-red-500 mr-5 px-3 py-2 rounded-md">削除</button>
        </form>
        <a href="{{ route("kadai06_1.edit", $art -> id )}}" class="block w-20 text-white text-center bg-pink-600 hover:bg-pink-500 px-3 py-2 rounded-md">編集</a>
    </div>


</section>
@endsection
