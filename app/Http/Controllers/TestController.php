<?php

namespace App\Http\Controllers;

use App\Models\UserReport;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
