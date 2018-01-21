<?php
/**
 * Created by PhpStorm.
 * User: Erika Pepe
 * Date: 2018-01-20
 * Time: 1:47 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\View;
use File;
use Session;
use DB;
use App\User;
use App\Picture;

class WishListController extends Controller
{
    public function load(){

        $wsldrinks = Array();

        $id = Session::get('id');
        $newUser = DB::table('WSL')->where(['wsl_id_user' => $id])->get();

        return view('wishlist');
    }

    public function addToWishList($idproduct){

        $id = Session::get('id');

        $drink = DB::table('DRK')->where('drk_id_drink', $idproduct)->get();

        if (!count($drink)){
            DB::table('DRK')->insert(
                ['drk_id_drink' => $idproduct, 'drk_dc_rate' => 0.0]
            );
        }

        $data = DB::table('WSL')->where([
            ['wsl_id_user', $id],
            ['wsl_id_drink', $idproduct],
        ])->get();

        if (!count($data)) {
            DB::table('WSL')->insert(
                ['wsl_id_user' => $id, 'wsl_id_drink' => $idproduct]
            );
        } else {
            return redirect()->back() ->with('insert', 'Drink is already in your Wish List!');
        }

        return redirect()->back() ->with('insert', 'Drink added to your Wish List!');
    }
}