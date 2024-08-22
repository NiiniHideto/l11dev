@extends('layouts.default')
@section('title', 'sample001')

@section('content')
<section class="text-gray-600 body-font relative">

    <!-- 背景画像 画像A -->
    <header style="background-position: center; background-size: cover; background-attachment: fixed; background-image:url( {{asset('storage/' . $pera_one->pic_a)}} );">

    @if (isset($pera_one))
        <div class="container px-5 mx-auto">
            <br>
            <ul class="font-medium text-gray-900 bg-white/80 rounded-lg border border-gray-200">
                <li class="py-4 px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{{ $pera_one->str_a }}</p>
                </li>
            </ul>

            <img src="{{asset('storage/' . $pera_one->pic_b)}}" style="display: block; margin: auto;" />
            <br>

            <ul class="font-medium text-gray-900 bg-white/80 rounded-lg border border-gray-200">
                <li class="py-4 px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{{ $pera_one->str_b }}</p>
                </li>
            </ul>

            <img src="{{asset('storage/' . $pera_one->pic_c)}}" style="display: block; margin: auto;" />
            <br>

            <ul class="font-medium text-gray-900 bg-white/80 rounded-lg border border-gray-200">
                <li class="py-4 px-5 w-full rounded-t-lg border-b last:border-b-0 border-gray-200">
                    <p>{{ $pera_one->str_c }}</p>
                </li>
            </ul>

            <img src="{{asset('storage/' . $pera_one->pic_a . '_test')}}" style="display: block; margin: auto;" />

        </div>

        @endif
</section>
@endsection
