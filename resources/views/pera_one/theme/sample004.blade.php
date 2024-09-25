<x-show-layout>

    <!-- alpine.js -->

    <div x-data="{
        open: false,
        toggle() {
            this.open = ! this.open
        },
    }">
        <button @click="toggle" class="font-display p-2 m-5 bg-green-300 rounded">表示</button>
        <!-- 。関数 toggle を呼んでいる -->
        <div x-show="open" x-transition.opacity.scale.10.origin.top.duration.1000ms >
            やっほー
        </div>

        <div class="flex px-4 py-2 w-auto">
            <ul x-show="open" x-transition.scale.10.origin.left.duration.1000ms >
                <li>1行目</li>
                <li>2行目</li>
                <li>3行目</li>
                <li>4行目</li>
                <li>5行目</li>
            </ul>
        </div>
    </div>

    <!-- x-data の中身が大きくなる場合は、別で定義する -->
    <div x-data="toggleText()">
        <button @click="toggle" class="font-display p-2 m-5 bg-yellow-300 rounded">toggleText</button>
        <div x-show="open">
            toggleTextやっほー
        </div>
    </div>

    <script>
    // toggleTextではreturnを忘れてはならない
    const toggleText = () => {
        return {
            open: false,
            toggle() {
                this.open = ! this.open
            },
        }
    }
    </script>





    <div class="flex justify-around items-center w-full" x-data="{ toggle : false}">
        <button x-on:click=" toggle = !toggle " class="font-display p-2 m-5 bg-blue-300 rounded">button</button>
        <h1 x-bind:class="! toggle ? 'text-red-300' : 'text-blue-300'">alpine</h1>
    </div>

    <div class="flex justify-around items-center w-full" x-data="{ toggle : false}">
        <button @click=" toggle = !toggle " x-text="toggle ? 'hide' : 'show'" class="font-display p-2 m-5 bg-blue-300 rounded"></button>
        <h1 x-show="toggle" class="font-display">alpine</h1>
    </div>

    <div class="flex items-center w-full" x-data="{toggle: false}">
        <button @click="toggle = ! toggle" class="py-2 px-3 mx-10 rounded-sm bg-blue-300">Toggle</button>
        <div x-show="toggle"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
        >Hello alpine 👋</div>
    </div>

    <br>
    <div class="flex items-center" x-data="{isShow : false}">
        <button @click="isShow = !isShow" x-text="isShow ? '非表示':'表示'" class="font-display p-2 m-5 bg-blue-300 rounded"></button>
        <div x-show="isShow">
                Hello alpine!
        </div>
        <button @click="isShow = !isShow" x-text="isShow ? '非表示':'表示'" class="font-display p-2 m-5 bg-blue-300 rounded"></button>
    </div>
    <br>

    <div class="relative" x-data="{ isOpen:false }" @click.away="isOpen = false">
        <button class="text-black shadow-lg rounded-md" @click="isOpen = !isOpen">ドロップダウンメニュー</button>
        <div class="bg-white absolute w-56 my-2 py-1 shadow-lg rounded-md" x-show="isOpen">
            <a href="#" class="block p-2 hover:bg-gray-100">alpine1</a>
            <a href="#" class="block p-2 hover:bg-gray-100">alpine2</a>
            <a href="#" class="block p-2 hover:bg-gray-100">alpine3</a>
        </div>
    </div>


    <br>
    <br>
    <div>
        <div class="p-3 rounded shadow bg-green-200">
            成功しました
        </div>
        <div class="mt-3 p-3 rounded shadow-lg bg-red-200">
            失敗しました
        </div>
    </div>

    <!-- resources/views/components/button.blade.php -->
    <div class="mt-5">
        <x-button>ボタン</x-button>
        <x-button class="bg-green-600 hover:bg-green-500 active:bg-green-700 focus:border-green-700">ボタン</x-button>
        <x-button class="bg-blue-600 hover:bg-blue-500 active:bg-blue-700 focus:border-blue-700">ボタン</x-button>
        <x-button class="bg-yellow-600 hover:bg-yellow-500 active:bg-yellow-700 focus:border-yellow-700">ボタン</x-button>
        <x-button class="bg-red-600 hover:bg-red-500 active:bg-red-700 focus:border-red-700">ボタン</x-button>
    </div>

    <!-- resources/views/components/dropdown.blade.php -->
    <!-- resources/views/components/dropdown-link.blade.php -->
    <div class="mt-5 flex">
        <x-dropdown align="left">
            <x-slot name="trigger">
                <x-button>ドロップダウン</x-button>
            </x-slot>
            <x-slot name="content">
                <x-dropdown-link href="/">メニュー１</x-dropdown-link>
                <x-dropdown-link href="/">メニュー２</x-dropdown-link>
                <x-dropdown-link href="/">メニュー３</x-dropdown-link>
            </x-slot>
        </x-dropdown>  
    </div>

    <!-- app.css に定義 -->
    <div class="mt-5">
        <input type="text" class="form-control-test" placeholder="テキストフィールド">
        <input type="date" class="form-control-test" value="{{ today()->toDateString() }}">
        <select class="form-control-test">
            <option value="1">オプション１</option>
            <option value="2">オプション２</option>
            <option value="3">オプション３</option>
        </select>
    </div>


    <div class="mt-5">
        <div class="flex">
            <div class="w-1/6 p-3 bg-blue-300">左１</div>
            <div class="w-3/6 p-3 bg-yellow-300">中３</div>
            <div class="w-2/6 p-3 bg-orange-600">右２</div>
        </div>
    </div>

    <div class="mt-5">
        <div class="grid grid-cols-5">
            @foreach (range(1, 10) as $number)
            <div class="p-2">
                <div class="py-5 text-center cursor-pointer bg-indigo-400 hover:bg-indigo-300 text-white">
                    {{ $number }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="mt-5">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
            @foreach (range(1, 10) as $number)
            <div class="p-2">
                <div class="py-5 text-center cursor-pointer bg-yellow-400 hover:bg-yellow-300 text-white">
                    {{ $number }}
                </div>
            </div>
            @endforeach
        </div>
    </div>


</x-show-layout>