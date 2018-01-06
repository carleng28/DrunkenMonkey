<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    public function showRegistrationForm()
    {
        return view('auth.sign-up');
    }

    public function register(Request $req) {
//Validate the form
        $this->validate(request(),[
            'firstName'=>'required|max:40',
            'lastName'=>'required|max:40',
            'email'=>'required|email|confirmed',
            'dateBirth'=>'required',
            'gender'=>'required',
            'province'=>'required',
            'city'=>'required',
            'password'=>'required|confirmed',
        ]);


        $fname = $req->input('firstName');
        $lname = $req->input('lastName');
        $email = $req->input('email');
        $dateBirth = $req->input('dateBirth');
        $gender = $req->input('gender');
        $province = $req->input('province');
        $city = $req->input('city');
        $password = $req->input('password');
        $regDate = date('Y-m-d H:i:s');

        if ($gender == 'Male') {
            $gender = 'M';
        }
        else if ($gender == 'Female') {
            $gender = 'F';
        }
        else {
            $gender = 'N';
        }

        $checkEmail = DB::table('USR')->where(['usr_st_email'=>$email])->get();

        if (count($checkEmail) > 0) {
            return redirect()->route('register');
        }

        else
        {

            $id = DB::table('USR')->insertGetId(
                [
                    'usr_st_fname' => $fname,
                    'usr_st_lname' => $lname,
                    'usr_dt_birth' => $dateBirth,
                    'usr_st_email' => $email,
                    'usr_st_password' => $password,
                    'usr_st_gender' => $gender,
                    'usr_dt_register' => $regDate,
                    'usr_st_province' => $province,
                    'usr_st_city' => $city
                ]
            );

            Session::put('email', $email);
            Session::put('fname', $fname);
            Session::put('lname', $lname);
            return redirect()->home();

        }
    }

   /* public function register(Request $req)
    {
        //Validate the form
        $this->validate(request(),[
            'firstName'=>'required|max:40',
            'lastName'=>'required|max:40',
            'email'=>'required|email|confirmed',
            'dateBirth'=>'required',
            'gender'=>'required',
            'province'=>'required',
            'city'=>'required',
            'password'=>'required|confirmed',
        ]);

        $gender = $req->input('gender');
        $regDate = date('Y-m-d H:i:s');

        if ($gender == 'Male') {
            $gender = 'M';
        }
        else if ($gender == 'Female') {
            $gender = 'F';
        }
        else {
            $gender = 'N';
        }

        //Create and save the user
        $user = User::create([
            'usr_st_fname' => request('firstName'),
            'usr_st_lname' => request('lastName'),
            'usr_dt_birth' => request('dateBirth'),
            'email' => request('email'),
            'password' => request('password'),
            'usr_st_gender' => $gender,
            'usr_dt_register' => $regDate,
            'usr_st_province' => request('province'),
            'usr_st_city' => request('city'),
        ]);
        //$user = User::create(request(['name','email','password']));

        //Sign them in
        //\Auth::login();
        auth()->login($user);

        //Redirect to the home page
        return redirect()->home();
    }*/
}
