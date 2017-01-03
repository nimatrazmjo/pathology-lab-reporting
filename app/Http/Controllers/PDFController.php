<?php

namespace App\Http\Controllers;

use App\User;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{

    /**
     * Controller function to export patient records into pdf
     *
     * @return mixed
     */
    public function index($id)
    {
        /** Check for authorized user */
        if(Auth::User()->role_id ==2 & $id != Auth::user()->id) {
            return response(view('errors.401'),401);
        }

        $user = User::find($id);
        $report = $user->UserReport;
        $data= array('user'=>$user,'report'=>$report);
        $pdf = PDF::loadView('pdf.user_report',$data);
        return $pdf->download('User Report'.date('Y-m-d H:i:s').'.pdf');
    }
}
