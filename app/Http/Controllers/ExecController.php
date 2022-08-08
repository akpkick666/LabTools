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
        $input_file = $request['file'];
        $sample = $input_file['sample'];
        $sample2 = $input_file['sample2'];
        $sample3 = $input_file['sample3'];
        $blank = $input_file['blank'];

        $input_axis = $request['axis'];
        $x_max = $input_axis['x-max'];
        $x_min = $input_axis['x-min'];
        $y_max = $input_axis['y-max'];
        $y_min = $input_axis['y-min'];
        $x_space = $input_axis['x-space'];
        $y_space = $input_axis['y-space'];

        #一意になるフォルダ名作成
        $seed = Str::random(4);
        $cd_dir = 'cdfile_'.$seed;

        #生データをフォルダに一時保存
        Storage::putFileAs($cd_dir, $sample, 'sample');
        Storage::putFileAs($cd_dir, $sample2, 'sample2');
        Storage::putFileAs($cd_dir, $sample3, 'sample3');
        Storage::putFileAs($cd_dir, $blank, 'blank');

        #グラフファイル名作成
        $seed2 = Str::random(4);
        $graph_name = 'graph_'.$seed2;

        #csvファイル名作成
        $seed3 = Str::random(4);
        $csv_file = 'data_'.$seed3.'.csv';

        #グラフフォルダ名作成
        $seed4 = Str::random(4);
        $data_dir = 'data_'.$seed4;
        #フォルダ作成実行
        $command1 = "cd /Users/akp_kick6/development/LabTools/public/img/cd && mkdir $data_dir";
        exec($command1, $output);

        #グラフ描画実行
        $command2 = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_1.py $cd_dir $x_max $x_min $y_max $y_min $x_space $y_space $data_dir";
        exec($command2, $output);

        Storage::deleteDirectory($cd_dir);

        
        #グラフ表示ページに移動、ランダムに作成したディレクトリ名渡す
        return view('/tools/graph')->with(['data_dir' => $data_dir]);

    }   
    

}
