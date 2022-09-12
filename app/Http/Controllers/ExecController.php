<?php

namespace App\Http\Controllers;

use App\Http\Requests\CdRequest;
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

    public function cdpython(CdRequest $request) {
        // sampleの連想配列
        $sample_asfiles = $request['sample'];
        # $sample = $input_file['sample'];
        $input_blank = $request['blank'];
        // blankファイル
        $blank = $input_blank['blank'];
        # $sample2 = $input_file['sample2'];
        # $sample3 = $input_file['sample3'];
        ##### sampleを全てリストに格納 #####

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
        ##### sampleはリストからforeach文で一個ずつ取り出していく #####
        foreach ($sample_asfiles as $key => $value){
            Storage::putFileAs($cd_dir, $value, $key);
        }
        # Storage::putFileAs($cd_dir, $sample, 'sample');
        # Storage::putFileAs($cd_dir, $sample2, 'sample2');
        # Storage::putFileAs($cd_dir, $sample3, 'sample3');
        Storage::putFileAs($cd_dir, $blank, 'blank');

        #グラフファイル名作成
        $seed2 = Str::random(4);
        $graph_name = 'graph_'.$seed2;

        #csvファイル名作成
        $seed3 = Str::random(4);
        $csv_file = 'data_'.$seed3.'.csv';

        #グラフ全データ格納フォルダ名作成
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
