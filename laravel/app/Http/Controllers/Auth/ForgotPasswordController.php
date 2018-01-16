<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
// Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;


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
        $this->validate(request(),[
            'email'=>'required|email'
        ]);

        $emailTo = $request->input('email');

        $checkEmail = DB::table('USR')->where(['usr_st_email'=>$emailTo])->get();
        //dd($checkEmail);
        if (count($checkEmail) > 0) {
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

            $tempPassword = 'dm'.rand(1,100000);

            //Login::updateUserTempPassword($userId, $tempPassword);
            DB::table('usr')
                ->where(['usr_st_email' => $emailTo])
                ->update([
                    'usr_st_password' => $tempPassword
                ]);


            $mail->setFrom($email, 'DrunkenMonkey Tech Support');
            $mail->addAddress($emailTo, 'John Doe');
            $mail->Subject = 'DrunkenMonkey account password reset';
            $mail->CharSet = 'utf-8';
            $mail->AddEmbeddedImage(url('img/logo-drunkenmonkey.png'), 'logo_dm');

            $mail->Body    =
                '<h3>Password reset</h3> '.
                '<p>Hi,</p>'.
                '<p>Please use this temporary password to log in to the Drunken Monkey website:<br>'.
                '<b>'.$tempPassword.'</b></p><br>'.
                '<p>Thank you,</p>'.
                '<p>DrunkenMonkey Tech Support Team</p>'.
                '<img src="cid:logo_dm"><br><br>';

            $mail->AltBody = 'Please use this temporary password to log in to the system: '.$tempPassword;

            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
           /* $userArray = json_decode($checkEmail, true);
            $userName = $userArray[0]['usr_st_fname'];
//            dd($userName);
            Mail::to($email)->send(new ForgotPassword($userName));*/
            return redirect()->route('home');
        }

        else{

            $errorEmail = 'There is no user registered with this email.';

            return redirect()->route('forgot')->withErrors([
                'email' => 'There is no user registered with this email.']);

        }
//        Mail::send('emails.send',['title' => $title, 'content' => $content])
    }
}