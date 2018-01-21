<?php
/**
 * Created by PhpStorm.
 * User: Erika Pepe
 * Date: 2018-01-20
 * Time: 1:47 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\View;
use File;
use Session;
use DB;
use App\WishList;

class WishListController extends Controller
{
    public function load(){

        $data = Array();
        $product = Array();
        $greatjason = Array();

        $id = Session::get('id');

        $wsldrinks = WishList::where('wsl_id_user', $id)->get()->toArray();

        for($i = 0; $i < sizeof($wsldrinks); $i++){

            $drinkid = $wsldrinks[$i]['wsl_id_drink'];

            $url ='http://lcboapi.com/products/'.$drinkid;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $json = curl_exec($curl);
            $obj = json_decode($json,true);

            $product['id']=($obj["result"]["id"]==null?"ND":$obj["result"]["id"]);
            $product['name']=($obj["result"]["name"]==null?"ND":$obj["result"]["name"]);$data['tags']=($obj["result"]["tags"]==null?"ND":$obj["result"]["tags"]);
            $product['price_in_cents']=($obj["result"]["price_in_cents"]==null?"ND":"$ ".($obj["result"]["price_in_cents"]/100)." CAD");
            $product['regular_price_in_cents']=($obj["result"]["regular_price_in_cents"]==null?"ND":"$ ".($obj["result"]["regular_price_in_cents"]/100)." CAD");
            $product['limited_time_offer_savings_in_cents']=($obj["result"]["limited_time_offer_savings_in_cents"]==null?"ND":"$ ".($obj["result"]["limited_time_offer_savings_in_cents"]/100)." CAD");
            $product['limited_time_offer_ends_on']=($obj["result"]["limited_time_offer_ends_on"]==null?"ND":$obj["result"]["limited_time_offer_ends_on"]);
            $product['stock_type']=($obj["result"]["stock_type"]==null?"ND":$obj["result"]["stock_type"]);
            $product['primary_category']=($obj["result"]["primary_category"]==null?"ND":$obj["result"]["primary_category"]);
            $product['origin']=($obj["result"]["origin"]==null?"ND":$obj["result"]["origin"]);
            $product['package']=($obj["result"]["package"]==null?"ND":$obj["result"]["package"]);
            $product['package_unit_type']=($obj["result"]["package_unit_type"]==null?"ND":$obj["result"]["package_unit_type"]);
            $product['package_unit_volume_in_milliliters']=($obj["result"]["package_unit_volume_in_milliliters"]==null?"ND":$obj["result"]["package_unit_volume_in_milliliters"]);
            $product['total_package_units']=($obj["result"]["total_package_units"]==null?"ND":$obj["result"]["total_package_units"]);
            $product['volume_in_milliliters']=($obj["result"]["volume_in_milliliters"]==null?"ND":$obj["result"]["volume_in_milliliters"]);
            $product['alcohol_content']=($obj["result"]["alcohol_content"]==null?"ND":($obj["result"]["alcohol_content"]/100)."%");
            $product['has_value_added_promotion']=($obj["result"]["has_value_added_promotion"]==null?"ND":$obj["result"]["has_value_added_promotion"]);
            $product['value_added_promotion_description']=($obj["result"]["value_added_promotion_description"]==null?"ND":$obj["result"]["value_added_promotion_description"]);
            $product['description']=($obj["result"]["description"]==null?"ND":$obj["result"]["description"]);
            $product['image_thumb_url']=($obj["result"]["image_thumb_url"]==null?"ND":$obj["result"]["image_thumb_url"]);
            $product['image_url']=($obj["result"]["image_url"]==null?"ND":$obj["result"]["image_url"]);
            $product['style']=($obj["result"]["style"]==null?"ND":$obj["result"]["style"]);
            $product['tertiary_category']=($obj["result"]["tertiary_category"]==null?"ND":$obj["result"]["tertiary_category"]);
            $product['clearance_sale_savings_in_cents']=($obj["result"]["clearance_sale_savings_in_cents"]==null?"ND":$obj["result"]["clearance_sale_savings_in_cents"]);
            $product['clearance_sale_savings_in_cents']=($obj["result"]["clearance_sale_savings_in_cents"]==null?"ND":"$ ".($obj["result"]["clearance_sale_savings_in_cents"]*100)." CAD");
            $product['has_clearance_sale']=($obj["result"]["has_clearance_sale"]==null?"ND":$obj["result"]["has_clearance_sale"]);

            array_push($greatjason, $product);

        }

        $data = array('drinks' => $greatjason, 'size' => count($greatjason));

        return \View::make('wishlist')->with(compact('data'));
        //return view('wishlist');

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
            ['wsl_id_drink', $idproduct]
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

    public function deleteDrink($idproduct){

        $id = Session::get('id');

        DB::table('WSL')->where([
            ['wsl_id_user', $id],
            ['wsl_id_drink', $idproduct]
        ])->delete();

        return redirect()->back();

    }
}