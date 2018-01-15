<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

/*    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('guest');
    }*/

    public function create(){
        return view('auth.passwords.password');
    }

    public function send(Request $request){
        $email = $request->input('email');

        $checkEmail = DB::table('USR')->where(['usr_st_email'=>$email])->get();
        //dd($checkEmail);
        if (count($checkEmail) > 0) {
            $userArray = json_decode($checkEmail, true);
            $userName = $userArray[0]['usr_st_fname'];
            Mail::to($email)->send(new ForgotPassword($userName));
            return redirect()->route('forgot');
        }

        else{

            return redirect()->route('home');
        //TODO include error messages{
        }
//        Mail::send('emails.send',['title' => $title, 'content' => $content])
    }
}