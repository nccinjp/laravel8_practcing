@extends('layouts.kadai')

@section('pageTitle', "kadai06_1")
@section('title', 'EloquentORM')

@section('content')
{{-- kadai8でlink の活化 --}}
<div class="flex justify-end mb-10">
    <a href="{{ route( "kadai06_1.create" ) }}"
    class="block w-24 text-white text-center bg-sky-600 hover:bg-sky-500 px-3 py-2 rounded-md">新規投稿</a>
</div>


<section class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-10">
    @foreach ($articles as $art)

        <article class="row-span-2 bg-white hover:bg-white rounded-md shadow-md hover:shadow-lg transition-shadow overflow-hidden ">
            <a href="{{ route("kadai06_1.show",$art['id'] )}}" class="block w-full h-full">
                {{-- @if($art->thumbnails->count())
                <figure class="h-48 overflow-hidden">

                    @foreach ( $art->thumbnails as $thumbnail)
                    <img src="{{asset('storage/images/'. $thumbnail->name)}}" class="w-full h-full object-cover object-top">
                    @endforeach
                </figure>
                @endif --}}
                <h3>{{ $art['title'] }}</h3>
                <p><time datetime="{{ $art['created_at']}}"> {{ $art['created_at']}}</time></p>

            </a>
        </article>

    @endforeach

</section>

    {{ $articles -> links() }}   {{-- pagnetion--}}


@endsection
