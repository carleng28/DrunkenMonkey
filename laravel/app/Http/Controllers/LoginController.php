<?php
/**
 * Created by PhpStorm.
 * User: Erika Pepe
 * Date: 2017-12-07
 * Time: 9:55 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function login(Request $req){

        $email = $req->input('email');
        $password = $req->input('password');

        $checkLogin = DB::table('USR')->where(['usr_st_email'=>$email, 'usr_st_password'=>$password])->get();

        if (count($checkLogin) > 0) {
            echo "Login Successful";
        }
        else
        {
            echo "Nao Funfou! Droga!";
        }

    }

    public function sign(Request $req) {

        $fname = $req->input('firstName');
        $lname = $req->input('lastName');
        $email = $req->input('emailAdress');
        $dateBirth = $req->input('dateBirth');
        $gender = $req->input('gender');
        $province = $req->input('province');
        $city = $req->input('city');
        $password = $req->input('passwordAgain');
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
            echo "E-mail already in our system. Please, sign in or request for assistance with password";
        }
        else
        {
            $id = DB::table('USR')->insertGetId(
                ['usr_st_fname' => $fname,
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

            return \View::make("index"); //Incomplete

        }

    }
}