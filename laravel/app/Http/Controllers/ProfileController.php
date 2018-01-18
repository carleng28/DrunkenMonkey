<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\View;
use Session;
use DB;
use App\User;
use App\Picture;

class ProfileController extends Controller
{
    public function create()
    {
        $id = Session::get('id');
        $newUser = DB::table('USR')->where(['usr_id_user' => $id])->get();

// $user used to be userArray, I modified it to $user for the reasons:
//I need to pass two arrays
//the name you get it in profile is 'user', so i renamed it to $user, because in the current case 'user'->$userArray was not possible
        $user = json_decode($newUser, true);

        $dirname = "img/userAddedImgOfCocktail/".$id."/";
        $pictures = scandir($dirname);
        $ignore = Array(".", "..");

//just 'user'
//so anyway in profile you get $user don't worry :)
        return view('profile', compact('user', 'pictures', 'ignore', 'dirname'));
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

    public function loadPics(){
        $id = Session::get('id');

        $dirname = "img/userAddedImgOfCocktail/".$id."/";
        $pictures = scandir($dirname);
        $ignore = Array(".", "..");

        return view('myImages', compact( 'pictures', 'ignore', 'dirname'));
    }

    public function addPhoto(Request $req)
    {
        $id = Session::get('id');
        /*$this->validate($req,
            [
                'imageInput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );*/
        $image = $req->file('imageInput');
        var_dump($image);/*
        if (!empty($image)) {
            $name = $image->getClientOriginalName();
            $type = $image->getClientOriginalExtension();
            $destinationPath = public_path("img/userAddedImgOfCocktail" . "/" . $id . "/");
            $path = url('img/userAddedImgOfCocktail') . "/" . $id . "/" . $name;
            $image->move($destinationPath, $name);
        }

        if (!empty($image) || $image != null || $image = "") {
            Picture::create([
                'pic_st_picname' => $name,
                'pic_st_type' => $type,
                'pic_st_picture' => $path,
                'pic_id_user' => $id,
                'pic_id_cocktail' => -1
            ]);

        }
        return redirect('myImages/');*/
    }

}