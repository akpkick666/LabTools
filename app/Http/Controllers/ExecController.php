<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecController extends Controller
{   
    public function index(){
        return view('index');
    }

    public function cd(){
        return view('/tools/cd');
    }

    public function cdpython(Request $request) {
        $command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python && python cd_1.py";
        exec($command, $output);
    }



    

}
