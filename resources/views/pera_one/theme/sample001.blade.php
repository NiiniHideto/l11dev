@extends('layouts.default')
@section('title', 'sample001')

@section('content')
<section class="text-gray-600 body-font relative">

    <!-- 画像A 背景画像 -->
    <header style="background-position: center; background-size: cover; background-attachment: fixed; background-image:url( {{asset('storage/' . $pera_one->pic_a)}} );">

    @if (isset($pera_one))
        <div class="container py-5 px-5 mx-auto">

            <!-- 文章A タイトル風 -->
            <br>
            <ul class=" mx-auto w-1/2 font-medium text-gray-900 bg-white/70 rounded-lg border border-gray-200">
                <li class="flex justify-center py-4  px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{!! nl2br(htmlspecialchars($pera_one->str_a)) !!}</p>
                </li>
            </ul>
            <br>

            <!-- 画像B 文字列合成 -->
            <img src="{{asset('storage/' . $pera_one->pic_b . '_test')}}" style="display: block; margin: auto;" />
            <br>
            <br>

            <!-- 画像B 元画像 -->
            <img src="{{asset('storage/' . $pera_one->pic_b)}}" style="display: block; margin: auto;" />
            <br>

            <!-- 文章B -->
            <ul class="font-medium text-gray-900 bg-white/80 rounded-lg border border-gray-200">
                <li class="py-4 px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{!! nl2br(htmlspecialchars($pera_one->str_b)) !!}</p>
                </li>
            </ul>
            <br>
            <br>

            <!-- 画像C -->
            <img src="{{asset('storage/' . $pera_one->pic_c)}}" style="display: block; margin: auto;" />
            <br>

            <!-- 文章C -->
            <ul class="font-medium text-gray-900 bg-white/80 rounded-lg border border-gray-200">
                <li class="py-4 px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{!! nl2br(htmlspecialchars($pera_one->str_c)) !!}</p>
                </li>
            </ul>
            <br>

        </div>

        @endif
</section>
@endsection
