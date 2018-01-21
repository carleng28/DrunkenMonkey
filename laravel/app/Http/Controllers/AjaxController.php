<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Cocktail;
use App\Picture;

class AjaxController extends Controller
{
    //
    public function cocktailPagination($category, $page){
        $cocktails = Array();
        $categoryName= str_replace("%20%20","%20/%20", $category);

        if($categoryName=="Coffee"){
            $categoryName= "Coffee%20/%20Tea";
        }
        if($categoryName=="Homemade"){
            $categoryName= "Homemade%20LIQUEUR";
        }
        if($categoryName=="Milk"){
            $categoryName= "Milk%20/%20Float%20/%20Shake";
        }
        if($categoryName=="Ordinary"){
            $categoryName= "Ordinary%20Drink";
        }
        if ($categoryName=="Punch"){
            $categoryName="Punch%20/%20Party%20Drink";
        }
        if ($categoryName=="Soft"){
            $categoryName="Soft%20Drink%20/%20Soda";
        }
        if ($categoryName=="Other"){
            $categoryName="Other/Unknown";
        }

        //echo $categoryName; USE CURL_EXEC
        $url = 'http://www.thecocktaildb.com/api/json/v1/1/filter.php?c='. $categoryName;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($curl);
        $obj = json_decode($json);

        foreach ($obj->drinks as $cocktail) {
            array_push($cocktails,$cocktail);
        }

        //Fix the issue with the spaces in category name
        $categoryName= str_replace("%20"," / ", $categoryName);
        $categoryName= str_replace("/ / /"," / ", $categoryName);

        $offset = ($page - 1)*9;
        $length = 9;
        $data=array('cocktails'=>array_slice($cocktails,$offset, $length), 'size'=>count($cocktails), 'categoryName' => $categoryName);
        //print_r($data);

        //$msg = "This is a simple message." . $page;
        //return response()->json(array('data'=> $data), 200);
        //dd($data);
        return \Response::json(array('data'=> $data), 200);
    }

    public function userCocktailPagination($category, $page){
        $pictures=Array();
        $cocktails = Array();
        //Default category if the URI does not have one
        if ($category==null) {
            $category = "Beer";
        }
        $category=explode("/",$category)[0];
        $categoryQuery=$categoryId = Category::where('cgr_st_name', 'like', '%'. $category. '%')->get();
        if(count($categoryQuery)>0){

            $categoryId = $categoryQuery[0]->cgr_id_category;
            $cocktailsCol = Cocktail::where([
                ['ckt_id_category', '=', $categoryId],
            ])
                ->orderBy('ckt_st_name', 'desc')
                ->get();

            foreach ($cocktailsCol as $cocktail) {
                $picture = Picture::where('pic_id_cocktail', $cocktail->ckt_id_cocktail)->first();
                array_push($pictures,$picture);
                array_push($cocktails,$cocktail);
            }
        }

        $offset = ($page - 1)*9;
        $length = 9;
        $data=array('cocktails'=>array_slice($cocktails,$offset,$length), 'size'=>count($cocktails), 'categoryName' => $category, 'pictures' => $pictures, "originalCategory" => $category);

        //$data = array('cocktails'=>$cocktails);
        return \Response::json(array('data'=> $data), 200);

        //return response()->json(array('data'=> $data), 200);
    }


}
