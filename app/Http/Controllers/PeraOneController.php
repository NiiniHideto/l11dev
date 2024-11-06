<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeraOne;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Facades\Auth;


class PeraOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pera_ones = PeraOne::all();
        return view('pera_one.index', ['pera_ones' => $pera_ones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pera_one = new PeraOne;

        $pera_one->user_id = $request->user()->id;

        $pera_one->str_a = $request->input('str_a');
        $pera_one->str_b = $request->input('str_b');
        $pera_one->str_c = $request->input('str_c');
        $pera_one->theme = $request->input('theme');
        if(!isset($pera_one->theme)){
            // dump($request);
            dd($request);
            // return redirect('/peraone');
            // TODO: Requests のところで rules() を設定する
        }

        if(isset($request->pic_a)){
            $file_name = $request->pic_a->getClientOriginalName();
            $pera_one->pic_a = $file_name;
            $img = $request->pic_a->storeAs('public', $file_name );
        }

        if(isset($request->pic_b)){
            $file_name = $request->pic_b->getClientOriginalName();
            $pera_one->pic_b = $file_name;
            $img = $request->pic_b->storeAs('public', $file_name );
        }

        if(isset($request->pic_c)){
            $file_name = $request->pic_c->getClientOriginalName();
            $pera_one->pic_c = $file_name;
            $img = $request->pic_c->storeAs('public', $file_name );
        }

        // dd($request);

        $pera_one->save();


        // 画像処理のテスト
        $manager = new ImageManager(new Driver());

        if(isset($pera_one->pic_b) && isset($pera_one->str_b)){
            // 画像を操作
            $imgPath = storage_path('app/public/' . $pera_one->pic_b);
            $img = $manager->read($imgPath);

            // 画像を垂直に反転
            $img->flop();

            // リサイズ
            $img->resize(600, 400);

            // 文字列を合成
            $img->text($pera_one->str_b, 300, 150, function($font) {
                $font->file(storage_path('app/public/font/NotoSansJP-Black.ttf'));
                $font->size(80);
                $font->color('#00FF00');
                $font->align('center');
                $font->valign('bottom');
                $font->stroke('#000000', 5);
                $font->angle(350);
                
            });

            // 別名で保存
            $img->save(storage_path('app/public/' . $pera_one->pic_b . "_test"));
        } 


        return redirect('/peraone');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        //
        // とりあえず新しいデータ
        $pera_one = PeraOne::where('user_id', $user_id)->orderBy('id','desc')->first();
        if(!isset($pera_one))
        {
            // データが無ければ、とりあえずindex
            return view('pera_one.index');    
        }

        return view('pera_one.theme.' . $pera_one->theme, compact('pera_one'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user_id = Auth::id();

        $pera_one = PeraOne::where('user_id', $user_id)->orderBy('id','desc')->first();

        return view('pera_one.edit', compact('pera_one'));
    }

    /**
     * vue test
     */
    public function vue()
    {
        $user_id = Auth::id();
        $pera_one = PeraOne::where('user_id', $user_id)->orderBy('id','desc')->first();

        return view('pera_one.vue', compact('pera_one'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function save(Request $request)
    {
        // dd($request);
        $pera_one = new PeraOne;

        $pera_one->user_id = $request->user()->id;

        $pera_one->str_a = $request->input('str_a');
        $pera_one->str_b = $request->input('str_b');
        $pera_one->str_c = $request->input('str_c');
        $pera_one->theme = $request->input('theme');
        if(!isset($pera_one->theme)){
            // dump($request);
            dd($request);
            // return redirect('/peraone');
            // TODO: Requests のところで rules() を設定する
        }

        if(isset($request->pic_a)){
            $file_name = $request->pic_a->getClientOriginalName();
            $pera_one->pic_a = $file_name;
            $img = $request->pic_a->storeAs('public', $file_name );
        }

        if(isset($request->pic_b)){
            $file_name = $request->pic_b->getClientOriginalName();
            $pera_one->pic_b = $file_name;
            $img = $request->pic_b->storeAs('public', $file_name );
        }

        if(isset($request->pic_c)){
            $file_name = $request->pic_c->getClientOriginalName();
            $pera_one->pic_c = $file_name;
            $img = $request->pic_c->storeAs('public', $file_name );
        }

        PeraOne::updateOrCreate(['user_id' => $pera_one->user_id], $pera_one->toArray());


        // 画像処理のテスト
        $manager = new ImageManager(new Driver());

        if(isset($pera_one->pic_b) && isset($pera_one->str_b)){
            // 画像を操作
            $imgPath = storage_path('app/public/' . $pera_one->pic_b);
            $img = $manager->read($imgPath);

            // 画像を垂直に反転
            $img->flop();

            // リサイズ
            $img->resize(600, 400);

            // 文字列を合成
            $img->text($pera_one->str_b, 300, 150, function($font) {
                $font->file(storage_path('app/public/font/NotoSansJP-Black.ttf'));
                $font->size(80);
                $font->color('#00FF00');
                $font->align('center');
                $font->valign('bottom');
                $font->stroke('#000000', 5);
                $font->angle(350);
                
            });

            // 別名で保存
            $img->save(storage_path('app/public/' . $pera_one->pic_b . "_test"));
        } 


        return redirect('/peraone/edit');
    }
}
