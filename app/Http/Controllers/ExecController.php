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

        #グラフファイル名作成
        $seed2 = Str::random(4);
        $graph_name = 'graph_'.$seed2;

        #csvファイル名作成
        $seed3 = Str::random(4);
        $csv_file = 'data_'.$seed3.'.csv';
        
        #生データをフォルダに一時保存
        Storage::putFileAs($cd_dir, $sample, 'sample');
        Storage::putFileAs($cd_dir, $blank, 'blank');

        $command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_2.py $cd_dir $graph_name $csv_file $x_max $x_min $y_max $y_min $x_space $y_space";

        exec($command, $output);

        Storage::deleteDirectory($cd_dir);

        
        #グラフ表示ページに移動、ランダムに作成した画像名渡す
        return view('/tools/graph')->with(['graph_name' => $graph_name]);

    }
    

}
