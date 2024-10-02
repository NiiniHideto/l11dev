<template>
    <table>
        <thead>
            <tr>
                <th>番号</th>
                <th>タイトル</th>
                <th>内容</th>
                <th>担当者</th>
                <th>詳細</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>ゴミ捨て</td>
                <td>明日の朝までに燃えるゴミを出す。</td>
                <td>田中太郎</td>

                <td>
                    <router-link to="/tasks/1" class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">詳細</router-link>
                </td>
                <td>
                    <router-link to="/tasks/1/edit" class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">編集</router-link>
                </td>
                <td>
                    <button class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">
                        削除
                    </button>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td>読書</td>
                <td>三四郎を100ページまで読む。</td>
                <td>鈴木次郎</td>
                <td>
                    <router-link to="/tasks/2" class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">詳細</router-link>
                </td>
                <td>
                    <router-link to="/tasks/2/edit" class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">編集</router-link>
                </td>
                <td>
                    <button class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">
                        削除
                    </button>
                </td>
            </tr>
            <tr>
                <th>3</th>
                <td>勉強</td>
                <td>数学の問題集を50ページまで解く。</td>
                <td>佐藤花子</td>
                <td>
                    <router-link to="/tasks/3" class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">詳細</router-link>
                </td>
                <td>
                    <router-link to="/tasks/3/edit" class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">編集</router-link>
                </td>
                <td>
                    <button class="hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 border p-3 bg-gray-500 rounded-xl border-black shadow-lg m-4 text-white">
                        削除
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>
