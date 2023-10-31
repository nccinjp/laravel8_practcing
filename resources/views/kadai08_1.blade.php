@extends('layouts.kadai')

@section('pageTitle', "kadai08_1")
@section('title', 'EloquentORM 挿入')

@section('content')
<section>
<form action="{{ route("kadai06_1.store") }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
        <div class="my-5 px-5 py-2 border-b">
            <label class="block text-gray-500 text-sm uppercase" for="title">title</label>
            <input type="text" name="title" id="title" class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md" value="{{ old('title')}}">
            @error( 'title')
                {{ $message }}
            @enderror
        </div>

        <div class="flex justify-between py-3">
            <div class="w-4/12 mr-5">
                <label class="block text-gray-500 text-sm uppercase" for="image">image file</label>

                <input type="file" name="image" id="image" class="w-full h-80 text-xs px-3 py-2 border border-gray-300 rounded-md" value="">


                <p class="text-sm text-red-600 my-2">
                    @error( 'images' )
                        {{ $message }}
                    @enderror
                </p>

            </div>

            <div class="grow">
                <label class="block text-gray-500 text-sm uppercase" for="body">body</label>
                <textarea name="body" class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">
                </textarea>
                @error('body')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="flex justify-end">
        <a href="{{ route( "kadai06_1.index") }}" class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
        <button type="submit" class="block w-20 text-white text-center bg-sky-600 hover:bg-sky-500 px-3 py-2 rounded-md">投稿</button>
    </div>
</form>
</section>
@endsection
