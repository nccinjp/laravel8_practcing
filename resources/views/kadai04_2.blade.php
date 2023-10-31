@extends('layouts.kadai')

@section('pageTitle', "kadai04_2")
@section('title', 'データ送信')

@section('content')
<section>

    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">質問の投稿</h3>

    <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">
        <div class="flex flex-col w-full lg:w-6/12 mr-5">
            <!-- 名前 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">名前</label>
                <p>{{$result['name']}}</p>
            </div>
            <!-- 学籍番号 -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">学籍番号</label>
                <p>{{$result['student_id']}}</p>
            </div>
            <!-- メールアドレス -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">メールアドレス</label>
                <p>{{$result['email']}}</p>
            </div>
            <!-- コース -->
            <div class="flex flex-col w-full mb-5">
                <label class="text-gray-400 text-sm">コース</label>
                <p>{{$result['course']}}</p>
            </div>
        </div>
        <!-- メッセージ -->
        <div class="flex flex-col items-stretch flex-grow">
            <label class="text-gray-400 text-sm">メッセージ</label>
            <p>{{$result['note']}}</p>
        </div>
    </div>
    <div class="flex justify-end">
    	<!-- 戻るボタン -->
        <a href="/kadai04_1" class="text-white text-center leading-10 bg-gray-500 px-10 hover:bg-gray-400 rounded-md">戻る</a>
    </div>

</section>
@endsection
