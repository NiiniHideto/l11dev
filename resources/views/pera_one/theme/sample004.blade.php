<x-show-layout>

    <!-- alpine.js -->


    <!-- 診断くん -->
    <div x-data='diagnosis' class='diagnosis-container'>
        <div class='diagnosis-start' x-cloak x-show="step === 'start'" 
            x-transition:enter='transitionEnter' x-transition:enter-start='enterStart' x-transition:enter-end='enterEnd' 
            x-transition:leave='transitionLeave' x-transition:leave-start='leaveStart' x-transition:leave-end='leaveEnd'>
            <h1 class='start-title'>診断くん</h1>
            <button type='button' class='start-btn' @click="handleStep('q1')">
                START
            </button>
        </div>
        <div class='diagnosis-question' x-cloak x-show="step === 'q1'" 
            x-transition:enter='transitionEnter' x-transition:enter-start='enterStart' x-transition:enter-end='enterEnd' 
            x-transition:leave='transitionLeave' x-transition:leave-start='leaveStart' x-transition:leave-end='leaveEnd'>
            <h2 class='question-title'>パートナーにするなら？</h2>
            <div class='question-answer'>
            <button type='button' @click="answerQuestion('A')">
                <span>年上派</span>
            </button>
            <button type='button' @click="answerQuestion('B')">
                <span>年下派</span>
            </button>
            </div>
            <button class='question-back' type='button' @click='previousStep()'>
                スタート画面に戻る
            </button>
        </div>

        <div class='diagnosis-question' x-cloak x-show="step === 'q2'" 
            x-transition:enter='transitionEnter' x-transition:enter-start='enterStart' x-transition:enter-end='enterEnd' 
            x-transition:leave='transitionLeave' x-transition:leave-start='leaveStart' x-transition:leave-end='leaveEnd'>
            <h2 class='question-title'>休日は</h2>
            <div class='question-answer'>
            <button type='button' @click="answerQuestion('A')">
                <span>外でアクティブに<br />リフレッシュ</span>
            </button>
            <button type='button' @click="answerQuestion('B')">
                <span>屋内で<br />まったり過ごす</span>
            </button>
            </div>
            <button class='question-back' type='button' @click='previousStep()'>
                1つ前に戻る
            </button>
        </div>

        <div class='diagnosis-question' x-cloak x-show="step === 'q3'" 
            x-transition:enter='transitionEnter' x-transition:enter-start='enterStart' x-transition:enter-end='enterEnd' 
            x-transition:leave='transitionLeave' x-transition:leave-start='leaveStart' x-transition:leave-end='leaveEnd'>
            <h2 class='question-title'>人の運命は</h2>
            <div class='question-answer'>
            <button type='button' @click="answerQuestion('A')">
                <span>努力次第で<br />切り開ける</span>
            </button>
            <button type='button' @click="answerQuestion('B')">
                <span>変えられない</span>
            </button>
            </div>
            <button class='question-back' type='button' @click='previousStep()'>
                1つ前に戻る
            </button>
        </div>

        <div class='diagnosis-processing' x-cloak x-show="step === 'processing'" 
            x-transition:enter='transitionEnter' x-transition:enter-start='enterStart' x-transition:enter-end='enterEnd' 
            x-transition:leave='transitionLeave' x-transition:leave-start='leaveStart' x-transition:leave-end='leaveEnd'>
            <h2>診断中...</h2>
        </div>

        <div class='diagnosis-result' x-cloak x-show="step === 'result'" 
            x-transition:enter='transitionEnter' x-transition:enter-start='enterStart' x-transition:enter-end='enterEnd' 
            x-transition:leave='transitionLeave' x-transition:leave-start='leaveStart' x-transition:leave-end='leaveEnd'>
            <h2 class='result-title'>診断結果🎉</h2>
            <p class='result-desc'>あなたの運命の相手は...</p>
            <figure class='result-thumb'>
            <img :src='result.img' alt='' />
            </figure>
            <p class='result-caption'>
            <span class='caption-type' x-text='result.type'></span>
            <span class='caption-name'>
                <span x-text='result.name'></span>さん
            </span>
            </p>
            <button class='result-back' @click='restartDiagnosis()'>
                スタート画面に戻る
            </button>
        </div>
    </div>
    <br>


    <!-- 入力された値を参照 -->
    <div x-data="{ inputedText: '' }">
        <input x-model="inputedText" type="text" placeholder="文字を入力" />
        <p>入力された値：<span x-text="inputedText"></span></p>
        <div x-cloak x-show="inputedText.length > 0 && inputedText.length < 4">
            <p>4文字以上入れてね</p>
        </div>
        <div x-cloak x-show="inputedText == 'test'">
            <div class="text-red-300">testって入れてしまいましたね</div>
        </div>
    </div>
    <br>

    <!-- プルダウンメニュー -->
    <div x-data="{ dropdown: false }" class="p-2">
        <button @click="dropdown = true" class="px-4 py-2 text-white bg-blue-500 rounded-md">プルダウンメニュー</button>
        <ul @click.away="dropdown = false" x-transition.opacity.duration.500ms x-cloak x-show="dropdown" class="absolute w-40 border px-1 py-2 bg-gray-50 rounded-md">
            <li class="p-2"><a href="#" class="block p-2 hover:bg-gray-300">プルダウン？</a></li>
            <li class="p-2"><a href="#" class="block p-2 hover:bg-gray-300">ドロップダウン？</a></li>
            <li class="p-2"><a href="#" class="block p-2 hover:bg-gray-300">どちらでもいいか</a></li>
        </li>
    </div>
    <br>

    <!-- 候補検索 -->
    <div
        x-data="{
            search: '',
            items: ['あめんぼ', 'あかいな', 'あいうえお', 'あいうえを'],
            get filteredItems() {
                return this.items.filter(
                    i => i.startsWith(this.search)
                )
            }
        }"
    >
        <input x-model="search" placeholder="候補検索">
        <ul>
            <template x-for="item in filteredItems" :key="item">
                <li x-text="item"></li>
            </template>
        </ul>
    </div>
    <br>

    <!-- for文で要素の抜き出し template 内しかできない -->
    <ul x-data="{ words: ['あああ', 'いいい', 'ううう'] }">
        <template x-for="(word, index) in words">
            <li>
                <span x-text="index + ': '"></span>
                <span x-text="word"></span>
            </li>
        </template>
    </ul>

    <!-- モーダルを他の場所クリックで閉じる -->
    <div x-data="{open: false}">
        <div>
            <button x-on:click="open = true" class="border p-3 bg-gray-200 rounded-xl border-black shadow-lg m-4">説明しよう</button>
        </div>

        <div x-cloak x-show="open" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-40 flex justify-center items-center border">
            <div x-on:click.away="open = false" class="max-w-xs w-full h-auto flex flex-col bg-white rounded-xl px-4 py-2">
                <!-- モーダル本体に x-on:click.away="open = false" -->
                <header class="flex justify-between items-end pb-2 mb-2 border-b border-black">
                    <p>説明しよう</p>
                    <div x-on:click="open = false" class="text-2xl cursor-pointer">×</div>
                </header>
                <div class="py-2 px-1">
                    モーダルは×ボタンでしか閉じられないとイラつくのだ。<br>
                    だから、他の場所をクリックしても閉じられるようにしたい。
                </div>
            </div>
        </div>
    </div>

    <!-- 表示されるときの速さとか -->
    <div x-data="{
        open: false,
        toggle() {
            this.open = ! this.open
        },
    }">
        <button @click="toggle" class="font-display p-2 m-5 bg-green-300 rounded">表示</button>
        <!-- 。関数 toggle を呼んでいる -->
        <div x-cloak x-show="open" x-transition.opacity.scale.10.origin.top.duration.1000ms >
            やっほー
        </div>

        <div class="flex px-4 py-2 w-auto">
            <ul x-cloak x-show="open" x-transition.scale.10.origin.left.duration.1000ms >
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
        <div x-cloak x-show="open">
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
        <h1 x-cloak x-show="toggle" class="font-display">alpine</h1>
    </div>

    <div class="flex items-center w-full" x-data="{toggle: false}">
        <button @click="toggle = ! toggle" class="py-2 px-3 mx-10 rounded-sm bg-blue-300">Toggle</button>
        <div x-cloak x-show="toggle"
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
        <div x-cloak x-show="isShow">
                Hello alpine!
        </div>
        <button @click="isShow = !isShow" x-text="isShow ? '非表示':'表示'" class="font-display p-2 m-5 bg-blue-300 rounded"></button>
    </div>
    <br>

    <div class="relative" x-data="{ isOpen:false }" @click.away="isOpen = false">
        <button class="text-black shadow-lg rounded-md" @click="isOpen = !isOpen">ドロップダウンメニュー</button>
        <div class="bg-white absolute w-56 my-2 py-1 shadow-lg rounded-md" x-cloak x-show="isOpen">
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

    <!-- tailwind で自分なりのCSSクラス -->
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