<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function index($category, $page){
        $cocktails = Array();
        $categoryName= str_replace("%20%20","%20/%20", $category);

        //fix the issue with the other/unknown category
        $categoryName= str_replace("Unk","/Unk", $categoryName);

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
        return response()->json(array('data'=> $data), 200);
    }
}
