<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use Auth;

class CvsController extends Controller
{
    public function index_all(){
        if (Auth::user()->type=='entreprise' || Auth::user()->type=='admin') {
        $listcv = Cv::all();

        return view('backend.post.postcv',['list_cv' => $listcv]);   
        }
        else{
            return abort(code: 403);
        }
    }
}
