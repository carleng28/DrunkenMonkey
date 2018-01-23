<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\View;
use File;
use Session;
use DB;
use App\User;
use App\Picture;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
// Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

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
        $dirname = "img\\userAddedImgOfCocktail\\".$id."\\";

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
        if(!File::exists($dirname)) {
            $dirname = File::makeDirectory("img/userAddedImgOfCocktail/".$id."/");
        }
        $pictures = scandir($dirname);
        $ignore = Array(".", "..");

        return view('myImages', compact( 'pictures', 'ignore', 'dirname'));
    }

    public function addPhoto(Request $req)
    {
        $id = Session::get('id');
        $this->validate($req,
            [
                'imageInput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        if ($req->hasFile('imageInput')) {
            $image = $req->file('imageInput');
            $name = $image->getClientOriginalName();
            $type = $image->getClientOriginalExtension();

            if($req->has('profilePic')) {
                $profilepic = true;
                $destinationPath = public_path("img/userProfilePhoto" . "/" . $id . "/");
                $path = url('img/userProfilePhoto') . "/" . $id . "/" . $name;
            } else {
                $profilepic = false;
                $destinationPath = public_path("img/userAddedImgOfCocktail" . "/" . $id . "/");
                $path = url('img/userAddedImgOfCocktail') . "/" . $id . "/" . $name;
            }

            $image->move($destinationPath, $name);

            Picture::create([
                'pic_st_picname' => $name,
                'pic_st_type' => $type,
                'pic_st_picture' => $path,
                'pic_id_user' => $id,
                'pic_id_cocktail' => null,
                'pic_bo_profilepic' => $profilepic
            ]);
            return back()->with('success', 'Image Upload successfully');
        }
    }

    public function shareImage(Request $req){

        $this->validate(request(),[
            'email'=>'required|email'
        ]);

        $emailTo = $req->input('email');

        date_default_timezone_set('Etc/UTC');

        $mail = new PHPMailer;
        $mail->isSMTP();
        //$mail->SMTPDebug = 4;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->AuthType = 'XOAUTH2';

        $email = 'drunkenmonkeyservice@gmail.com';
        $clientId = '697505958617-t8tnbrlvgbjann16ro7jnidmanhfv9tp.apps.googleusercontent.com';
        $clientSecret = 'eliey2YpsG90o3aglhie1f8_';
        //Obtained by configuring and running get_oauth_token.php
        //after setting up an app in Google Developer Console.
        $refreshToken = '1/qXlmmXy1ZqGV1tImWIJo-ckDwLLVCZI3Zs7eljDrJug';
        $mail -> SMTPOptions = array (

            'ssl' => array(

                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $provider = new Google(
            [
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
            ]
        );
        $mail->setOAuth(
            new OAuth(
                [
                    'provider' => $provider,
                    'clientId' => $clientId,
                    'clientSecret' => $clientSecret,
                    'refreshToken' => $refreshToken,
                    'userName' => $email,
                ]
            )
        );
        $user = User::where('usr_id_user', '=', Session::get('id'))->first();

        $mail->setFrom($email, 'DrunkenMonkey');
        $mail->addAddress($emailTo, "John Doe");
        $mail->Subject = $user->usr_st_fname. " ". $user->usr_st_lname . ' has send you a new picture!';
        $mail->CharSet = 'utf-8';
        $mail->AddEmbeddedImage($req->input('imagePath'), 'image_dm');

        //dd(url($req->input('imagePath')));
        $mail->Body    =
            '<h3>'.$user->usr_st_fname. ' '. $user->usr_st_lname.' shared a new picture!</h3> '.
            '<img src="cid:image_dm"><br><br>';

        $mail->AltBody = 'Shared an image';

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        /* $userArray = json_decode($checkEmail, true);
         $userName = $userArray[0]['usr_st_fname'];
//            dd($userName);
         Mail::to($email)->send(new ForgotPassword($userName));*/
        $success="1";
        return redirect('myImages')->with('success', 'Image sent');

//        else{
//
//            $errorEmail = 'There is no user registered with this email.';
//
//            return redirect()->route('forgot')->withErrors([
//                'email' => 'There is no user registered with this email.']);
//
//        }
    }

}