<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class MailController extends Controller
{
    /**
     * Send the report via Email
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function send($id)
    {
        /** Check for authorized user */
        if(Auth::User()->role_id ==2 & $id != Auth::user()->id) {
            return response(view('errors.401'),401);
        }

        $from ="nimatullah.razmjo@gmail.com";
        $pdf= $this->pdf($id);
        $to = $pdf['mail'];
        $filename = $pdf['filename'];

        /** Send email */
        Mail::send('mail.mail',[],
            function($message) use ($from, $to, $filename) {
                $message->from($from);
                $message->to($to)->subject("Pathology Report");
                $message->attach('uploads/'.$filename);

            });
        /** delete file after send it to email */
        unlink('uploads/'.$filename);
        return redirect('/user/'.$id);
    }

    /**
     * Generate pdf file for attachement
     *
     * @param $id
     * @return string
     */
    public function pdf($id)
    {
        $user = User::find($id);
        $report = $user->UserReport;
        $data= array('user'=>$user,'report'=>$report);
        $filename ='patient_report'.date('YmdHis').'.pdf';

        /** save file to a directory for attachment */
        PDF::loadView('pdf.user_report',$data)->save('uploads/'.$filename);
        return array('mail'=>$user->email, 'filename' => $filename);
    }
}
