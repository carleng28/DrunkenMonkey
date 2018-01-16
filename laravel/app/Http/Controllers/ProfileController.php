<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\User;

class ProfileController extends Controller
{
    public function create()
    {
        $id = Session::get('id');
        $newUser = DB::table('USR')->where(['usr_id_user' => $id])->get();

        $userArray = json_decode($newUser, true);

        return view('profile')->with('user', $userArray);
    }

    public function updateProfile(Request $req)
    {

        //Validate the form
        $this->validate(request(), [
            'firstName' => 'required|max:40',
            'lastName' => 'required|max:40',
            'email' => 'required|email',
            'dateBirth' => 'required',
            'gender' => 'required',
            'province' => 'required',
            'city' => 'required',
        ]);


        $id = Session::get('id');


        $fname = $req->input('firstName');
        $lname = $req->input('lastName');
        $email = $req->input('email');
        $dateBirth = $req->input('dateBirth');
        $gender = $req->input('gender');
        $province = $req->input('province');
        $city = $req->input('city');

        DB::table('usr')
            ->where(['usr_id_user' => $id])
            ->update([
                'usr_st_fname' => $fname,
                'usr_st_lname' => $lname,
                'usr_dt_birth' => $dateBirth,
                'usr_st_email' => $email,
                'usr_st_gender' => $gender,
                'usr_st_province' => $province,
                'usr_st_city' => $city
            ]);

        return back();
    }


}