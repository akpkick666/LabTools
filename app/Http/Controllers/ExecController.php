<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#Facade
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        #生データをフォルダに一時保存
        Storage::putFileAs($cd_dir, $sample, 'sample');
        Storage::putFileAs($cd_dir, $blank, 'blank');

        $command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_1.py $cd_dir";
        exec($command, $output);

        Storage::deleteDirectory($cd_dir);

    }
    

}
