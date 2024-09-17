@extends('layouts.default')
@section('title', 'sample003')

@section('content')
<section class="text-gray-600">

    <!-- 背景画像 -->
    <!-- <header style="background-position: center; background-size: cover; background-attachment: fixed; background-image:url( {{asset('storage/' . $pera_one->pic_a)}} );"> -->
    <header style="background-color: #80ff80;">

    @if (isset($pera_one))
        <div class="container px-5 mx-auto">
            <br>

            <div class="grid grid-cols-5">
                @foreach (range(1, 10) as $number)
                <div class="p-2">
                    <div class="py-5 text-center cursor-pointer bg-indigo-400 hover:bg-indigo-300 text-white">
                        {{ $number }}
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-5">
                <div class="flex">
                    <div class="w-1/6 p-3 bg-blue-300">左１</div>
                    <div class="w-3/6 p-3 bg-yellow-300">中３</div>
                    <div class="w-2/6 p-3 bg-orange-600">右２</div>
                </div>
            </div>


            <!-- 画像A -->
            <img src="{{asset('storage/' . $pera_one->pic_a)}}" style="display: block; margin: auto;" />
            <br>

            <!-- 文章A -->
            <ul class="font-medium text-gray-900 bg-white/80 rounded-lg border border-gray-200">
                <li class="py-4 px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{!! nl2br(htmlspecialchars($pera_one->str_a)) !!}</p>
                </li>
            </ul>
            <br>

            <!-- 画像B -->
            <img src="{{asset('storage/' . $pera_one->pic_b)}}" style="display: block; margin: auto;" />
            <br>

            <!-- 文章B -->
            <ul class="font-medium text-gray-900 bg-white/80 rounded-lg border border-gray-200">
                <li class="py-4 px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{!! nl2br(htmlspecialchars($pera_one->str_b)) !!}</p>
                </li>
            </ul>
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

            <!-- 画像B 文字列合成 -->
            <img src="{{asset('storage/' . $pera_one->pic_b . '_test')}}" style="display: block; margin: auto;" />

        </div>

        @endif
</section>
@endsection
