<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#Facade
use Illuminate\Support\Facades\Storage;

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
        
        #一意になるファイル名指定
        $seed = 1234;
        $sample_file = 'sample'.$seed;
        $blank_file = 'blank'.$seed;

        Storage::putFileAs('cdfile', $sample, $sample_file);
        Storage::putFileAs('cdfile', $blank, $blank_file);

        $command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_1.py $sample_file $blank_file";
        exec($command, $output);

        Storage::deleteDirectory('cdfile');

    }
    

}
