<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        dd($request->all());
    }
}
