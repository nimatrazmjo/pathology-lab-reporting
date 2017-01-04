<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        if(Auth::user()->role_id ==2 ){
            return response(view('errors.401'),401);
        }

        $user = User::where('name','like','%'.$request['patient_name'].'%')->where('role_id',2)->get();
        return response(view('search.search')
            ->with('user',$user));
    }
}
