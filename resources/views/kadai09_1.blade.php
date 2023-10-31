@extends('layouts.kadai')

@section('pageTitle', "kadai09_1")
@section('title', 'EloquentORM 更新')

@section('content')
<section>
<form action="{{ route("kadai06_1.update", $art -> id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method( "PUT" )

    <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
        <div class="my-5 px-5 py-2 border-b">
            <label class="block text-gray-500 text-sm uppercase" for="title">title</label>
            <input type="text" name="title" id="title" class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md" value="{{$art['title']}}">
            @error( 'title')
                {{ $message }}
            @enderror
        </div>

        <div class="flex justify-between py-3">
            <div class="w-4/12 mr-5">
                <label class="block text-gray-500 text-sm uppercase" for="">image file</label>

                <!-- サムネイル画像が設定されている場合 -->
                    <figure class="flex flex-col">
                    <img src="/public/images" class="w-full">
                    </figure>

                <!-- サムネイル画像が設定されていない場合 -->
                <input type="file" name="image" id="image" class="w-full h-80 text-xs px-3 py-2 border border-gray-300 rounded-md" value="">
                    <p class="text-sm text-red-600 my-2">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </p>
                </div>


            <div class="grow">
                <label class="block text-gray-500 text-sm uppercase" for="body">body</label>
                <textarea name="body" class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">
                    {{$art['body']}}
                </textarea>
                @error('body')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>






    <div  class="flex justify-end">
        <a href="{{ route( "kadai06_1.show",$art->id ) }}" class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
        <button type="submit" class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">更新</button>
    </div>
</form>
</section>
@endsection
