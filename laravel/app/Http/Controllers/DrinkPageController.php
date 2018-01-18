<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class DrinkPageController extends Controller
{
    //
    public function showProduct($idproduct){

        $data=Array();

        $url ='http://lcboapi.com/products/'.$idproduct;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($curl);
        $obj = json_decode($json,true);

        $data['id']=($obj["result"]["id"]==null?"ND":$obj["result"]["id"]);
        $data['name']=($obj["result"]["name"]==null?"ND":$obj["result"]["name"]);
        $data['tags']=($obj["result"]["tags"]==null?"ND":$obj["result"]["tags"]);
        $data['price_in_cents']=($obj["result"]["price_in_cents"]==null?"ND":"$ ".($obj["result"]["price_in_cents"]/100)." CAD");
        $data['regular_price_in_cents']=($obj["result"]["regular_price_in_cents"]==null?"ND":"$ ".($obj["result"]["regular_price_in_cents"]/100)." CAD");
        $data['limited_time_offer_savings_in_cents']=($obj["result"]["limited_time_offer_savings_in_cents"]==null?"ND":"$ ".($obj["result"]["limited_time_offer_savings_in_cents"]/100)." CAD");
        $data['regular_price_in_cents']=($obj["result"]["regular_price_in_cents"]==null?"ND":"$ ".($obj["result"]["regular_price_in_cents"]/100)." CAD");
        $data['limited_time_offer_ends_on']=($obj["result"]["limited_time_offer_ends_on"]==null?"ND":$obj["result"]["limited_time_offer_ends_on"]);
        $data['stock_type']=($obj["result"]["stock_type"]==null?"ND":$obj["result"]["stock_type"]);
        $data['primary_category']=($obj["result"]["primary_category"]==null?"ND":$obj["result"]["primary_category"]);
        $data['secondary_category']=($obj["result"]["secondary_category"]==null?"ND":$obj["result"]["secondary_category"]);
        $data['origin']=($obj["result"]["origin"]==null?"ND":$obj["result"]["origin"]);
        $data['package']=($obj["result"]["package"]==null?"ND":$obj["result"]["package"]);
        $data['package_unit_type']=($obj["result"]["package_unit_type"]==null?"ND":$obj["result"]["package_unit_type"]);
        $data['package_unit_volume_in_milliliters']=($obj["result"]["package_unit_volume_in_milliliters"]==null?"ND":$obj["result"]["package_unit_volume_in_milliliters"]);
        $data['total_package_units']=($obj["result"]["total_package_units"]==null?"ND":$obj["result"]["total_package_units"]);
        $data['volume_in_milliliters']=($obj["result"]["volume_in_milliliters"]==null?"ND":$obj["result"]["volume_in_milliliters"]);
        $data['alcohol_content']=($obj["result"]["alcohol_content"]==null?"ND":($obj["result"]["alcohol_content"]/100)."%");
        $data['producer_name']=($obj["result"]["producer_name"]==null?"ND":$obj["result"]["producer_name"]);
        $data['has_value_added_promotion']=($obj["result"]["has_value_added_promotion"]==null?"ND":$obj["result"]["has_value_added_promotion"]);
        $data['value_added_promotion_description']=($obj["result"]["value_added_promotion_description"]==null?"ND":$obj["result"]["value_added_promotion_description"]);
        $data['description']=($obj["result"]["description"]==null?"ND":$obj["result"]["description"]);
        $data['tasting_note']=($obj["result"]["tasting_note"]==null?"ND":$obj["result"]["tasting_note"]);
        $data['image_thumb_url']=($obj["result"]["image_thumb_url"]==null?"ND":$obj["result"]["image_thumb_url"]);
        $data['image_url']=($obj["result"]["image_url"]==null?"ND":$obj["result"]["image_url"]);
        $data['varietal']=($obj["result"]["varietal"]==null?"ND":$obj["result"]["varietal"]);
        $data['style']=($obj["result"]["style"]==null?"ND":$obj["result"]["style"]);
        $data['tertiary_category']=($obj["result"]["tertiary_category"]==null?"ND":$obj["result"]["tertiary_category"]);
        $data['clearance_sale_savings_in_cents']=($obj["result"]["clearance_sale_savings_in_cents"]==null?"ND":$obj["result"]["clearance_sale_savings_in_cents"]);
        $data['clearance_sale_savings_in_cents']=($obj["result"]["clearance_sale_savings_in_cents"]==null?"ND":"$ ".($obj["result"]["clearance_sale_savings_in_cents"]*100)." CAD");
        $data['has_clearance_sale']=($obj["result"]["has_clearance_sale"]==null?"ND":$obj["result"]["has_clearance_sale"]);


        return \View::make('drink-page',['idproduct'=>$idproduct])->with(compact('data'));
    }
public function storeReview(Request $req){
    $reviewSt = $req->input('drinkReview');
    $reviewRt = $req->input('ratings');
    $drinkId = $req->Input('idProd');
    $drink = Drink::find($drinkId);
    $usrId = Session::get('id');
    //dd($drinkId);
        if($drink == null){
            Drink::insert(
                ['drk_id_drink'=>$drinkId]
            );

            //dd($usrId);
            $this->validate($req,
                ['ratings'=>'required']);
            //dd($usrId);


            Review::insert([
                ['rvw_st_review'=>$reviewSt,
                    'rvw_dc_rate'=>$reviewRt,
                    'rvw_id_user'=>$usrId,
                    'rvw_id_drink'=>$drinkId]
            ]);
            dd(Review::all());
        }else{
            //dd($usrId);
            $this->validate($req,
                ['ratings'=>'required']);
            //dd($usrId);
            $reviewSt = $req->input('drinkReview');
            $reviewRt = $req->input('ratings');
            $drinkId = $req->Input('idProd');

            Review::insert([
                ['rvw_st_review'=>$reviewSt,
                    'rvw_dc_rate'=>$reviewRt,
                    'rvw_id_user'=>$usrId,
                    'rvw_id_drink'=>$drinkId]
            ]);
            dd(Review::all());
        }

    return Redirect('drink-page',['idProd'=>$drinkId])->with(compact('data'));
}
}
