<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#Facade
use Illuminate\Support\Facades\Storage;   #保存
use Illuminate\Support\Str;               #ランダム

class ExecController extends Controller
{   
    public function index(){
        return view('index');
    }

    public function cd(){
        return view('/tools/cd');
    }

    public function cdpython(Request $request) {
        $sample = $request->file("sample");
        $blank = $request->file("blank");

        #一意になるフォルダ名作成
        $seed = Str::random(4);
        $cd_dir = 'cdfile_'.$seed;

        #グラフファイル名作成
        $seed2 = Str::random(4);
        $graph_name = 'graph_'.$seed2;

        #生データをフォルダに一時保存
        Storage::putFileAs($cd_dir, $sample, 'sample');
        Storage::putFileAs($cd_dir, $blank, 'blank');

        $command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_1.py $cd_dir $graph_name";
        exec($command, $output);

        Storage::deleteDirectory($cd_dir);

        
        #グラフ表示ページに移動、ランダムに作成した画像名渡す
        return view('/tools/graph')->with(['graph_name' => $graph_name]);

    }
    

}
