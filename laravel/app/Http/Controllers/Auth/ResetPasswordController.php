<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use DB;
use Session;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */


    public function resetPassword(Request $req)
    {
        //Validate the form
        $this->validate(request(),[
            'currentPassword'=>'required',
            'password'=>'required|confirmed'
        ]);

        $id = Session::get('id');
        $oldPass = DB::table('usr')->where('usr_id_user', $id)->value('usr_st_password');



        if ($oldPass == $req->input('currentPassword') ){
            DB::table('usr')
                ->where(['usr_id_user' => $id])
                ->update([
                    'usr_st_password' =>  $req->input('password')
                ]);

            $currentUser = DB::table('USR')->where(['usr_id_user' => $id])->get();

            $user = json_decode($currentUser, true);
            $success = "The password has been updated.";
            //return  back()->with(compact('success', 'user'));

            return  back()->with('user',$user)
                ->with('success',$success);
        }
        else{

            $currentUser = DB::table('USR')->where(['usr_id_user' => $id])->get();

            $user = json_decode($currentUser, true);

            $errorsPass = 'Current password is not correct.';

           // return   back()->with(compact('errorsPass', 'user'));
            return  back()->with('user',$user)
                ->with('errorsPass',$errorsPass);
        }

    }
}
