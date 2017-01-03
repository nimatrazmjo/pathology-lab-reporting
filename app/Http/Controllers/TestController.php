<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\UserReport;
use App\Http\Requests;

class TestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        /** Check for authorized user */
        if(Auth::User()->role_id ==2) {
            return response(view('errors.401'),401);
        }

        $report = UserReport::find($id);
        $tests = $report->tests;
        return view('test.add')
            ->with('report',$report)
            ->with('tests',$tests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Check for authorized user */
        if(Auth::User()->role_id ==2) {
            return response(view('errors.401'),401);
        }

        $input = $request->all();
        $roles = [
            'result.*' => 'required'
        ];
        $this->validate($request, $roles);
        try {
            $report = UserReport::find($input['report_id']);
        } catch( ModelNotFoundException $e) {
            return response(view('error.404'),404);
        }
        if (count($input['result']) > 0) {
            foreach ($input['result'] as $key => $value) {
                $report->tests()->updateExistingPivot($key,['result' => $value]);
            }
        }
        return redirect('/user/'.$report->user_id);

    }
}
