<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecController extends Controller
{
    public function cdpython(Request $request) {
        $command = "cd /Users/akp_kick6/development/research/test && python cd_1.py";
        exec($command, $output);
    }



    

}
