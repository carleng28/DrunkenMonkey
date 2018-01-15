<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\USer;
use DB;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   // use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.sign-in');
    }

   public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $checkLogin = DB::table('USR')->where(['usr_st_email'=>$email, 'usr_st_password'=>$password])->get();


        if (count($checkLogin) > 0) {

            $userArray = json_decode($checkLogin, true);
            Session::put('id', $userArray[0]['usr_id_user']);
            Session::put('email', $email);
            Session::put('fname',$userArray[0]['usr_st_fname']);
            Session::put('lname',$userArray[0]['usr_st_lname']);
            return redirect()->home();
        }
        else
        {
            return redirect()->route('login')->withInput($request->only('email'))->withErrors([
            'email' => 'The email or the password is invalid. Please try again.']);
        }



    }
    public function logout()
    {
        Session::flush();
        Session::regenerate();
        return redirect()->home();
    }
/*   public function login(Request $request){
        if(! auth()->attempt(request(['email', 'password']))){

            return redirect()->home();
           return redirect()->route('login')->withInput($request->only('email'))->withErrors([
                'email' => 'The email or the password is invalid. Please try again.',
            ]);
        };
       return view('about-us');
    }*/

}