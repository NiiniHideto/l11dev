<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <!-- 入力フォーム -->
                    <!-- <form action="{{ route('peraone.store') }}" method="POST" enctype="multipart/form-data"> -->
                    <form action="{{ route('peraone.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="container px-5 py-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">設定</h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">使用する文章、画像、表示スタイルを設定します。</p>
                                <a href="{{ route('peraone.show', ['user_id' => $pera_one->user_id]) }}" target="_blank">[保存されている状態を別ウィンドウで表示]</a>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="str_a" class="leading-7 text-sm text-gray-600">文章A</label>
                                            <textarea id="str_a" name="str_a" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $pera_one->str_a }}</textarea>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="str_b" class="leading-7 text-sm text-gray-600">文章B</label>
                                            <textarea id="str_b" name="str_b" value="test" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $pera_one->str_b }}</textarea>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="str_c" class="leading-7 text-sm text-gray-600">文章C</label>
                                            <textarea id="str_c" name="str_c" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $pera_one->str_c }}</textarea>
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <label for="post-image">画像A</label>
                                        <input type="file" name="pic_a" id="pic_a">
                                    </div>

                                    <div class="p-2 w-full">
                                        <label for="post-image">画像B</label>
                                        <input type="file" name="pic_b" id="pic_b">
                                    </div>

                                    <div class="p-2 w-full">
                                        <label for="post-image">画像C</label>
                                        <input type="file" name="pic_c" id="pic_c">
                                    </div>

                                    <label for="theme">テーマ：</label>
                                    <select class="form-control" id="theme" name="theme">
                                        <option value="sample001"  @if(!isset($pera_one->theme) || "sample001" == $pera_one->theme) selected @endif>サンプル001</option>
                                        <option value="sample002"  @if("sample002" == $pera_one->theme) selected @endif>サンプル002</option>
                                    </select>

                                    <div class="py-10 p-2 w-full">
                                        <button type="submit" name="submitBtnVal" value="confirm" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">保存</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
