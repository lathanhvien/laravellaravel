<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BasicController extends Controller
{
    function process(Request $request){
        // $q1 = array_unique(User::pluck('q1')->toArray());
        // $q3 = array_unique(User::pluck('q3')->toArray());
        // dd($q1,$q3===array(null));
        $excludes = [];
        $includes = [];
        for ($i=1;$i<=7;$i++){
            ${'q' . $i} = array_unique(User::pluck('q'. $i)->toArray());
            if(${'q' . $i}===array(null)) {
                $excludes [] = 'q' . $i;
            }else {
                $includes [] = 'q' . $i;
            }
        }
        $users = User::select(['id',...$includes])->get();
        return view('process', ['users'=>$users,'includes'=>$includes]);
    }
}
