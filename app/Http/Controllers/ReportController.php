<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\UserReport;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=0)
    {

        /** Check for authorized user */
        if(Auth::User()->role_id ==2) {
            return response(view('errors.401'),401);
        }

        $reports = DB::select("select ur.*,GROUP_CONCAT(t.test) as test from user_reports as ur
                            LEFT JOIN report_test as rt ON rt.`report_id`= ur.`id`
                            LEFT JOIN test as t on t.id = rt.`test_id`
                            GROUP by ur.id");
        return response(view('report.list')
            ->with('reports', $reports));
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
        $rules = [
            'title' => 'required',
            'test.*' => 'required'
        ];
        $this->validate($request, $rules);
        $report = new UserReport();
        $report->user_id = $input['user_id'];
        $report->title = $input['title'];
        $report->description = $input['description'];
        $report->save();

        $report->tests()->attach($input['test']);
        return redirect('/user/'.$input['user_id']);
    }
    /**
     * Get test based on report ID
     *
     * @param $report_id
     * @return mixed
     */
    public function getTest($report_id)
    {
        $reports = UserReport::find($report_id);
        return view('report.test')
            ->with('report', $reports)
            ->with('test', $reports->tests);
    }
}
