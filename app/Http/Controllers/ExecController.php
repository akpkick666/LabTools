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
        
        Storage::putFileAs('cdfile', $sample, 'sample');
        Storage::putFileAs('cdfile', $blank, 'blank');

        $command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_1.py";
        exec($command, $output);

        Storage::deleteDirectory('cdfile');

    }
    

}
