<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cocktail;
use App\Category;
use App\Ingredient;

class CocktailCategoryController extends Controller
{
    //comment
    /*
     * showCocktailList -> method that builds the cocktail list by
     *                      connecting to thecocktaildb API, using
     *                      the category passed as the request
     * output            -> $data: array with the cocktails and the number
     *                              of cocktails
     * */
    public function showCocktailList(Request $request){

        /*$users = DB::select('select * from usr');
        foreach ($users as $usr) {
            echo $usr->usr_st_fname;
        }*/

        $cocktails = Array();
        //get the uri from the request
        $uri = $request->path();
        //get only the category using explode (split)
        $categoryArray = explode("/", $uri);

        //Default category if the URI does not have one
        if (count($categoryArray)<2){
            $category = "Beer";
        }else {
            $category =  $categoryArray[1];
        }

        //for categories that have /, it is reestructured to do the search
        $categoryName= str_replace("%20%20","%20/%20", $category);

        //fix the issue with the other/unknown category
        $categoryName= str_replace("Unk","/Unk", $categoryName);

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

        $data=array('cocktails'=>$cocktails, 'size'=>count($cocktails), 'categoryName' => $categoryName);
        //print_r($data);

        return \View::make("cocktail-category", ['category' => $categoryName])->with(compact('data'));


    }


    /*
     * showCocktailCategories -> method that builds the cocktail categories list by
     *                      connecting to thecocktaildb API.
     * output                   -> $data: array with the cocktail categories
 * */
    public function showCocktailCategories(Request $request){

        $categories = Array();
        //get the uri from the request

        //echo $categoryName;
        $json = file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/list.php?c=list');
        $obj = json_decode($json);

        foreach ($obj->drinks as $category) {
            array_push($categories,$category);
        }

        usort($categories, array($this, "cmp"));

        $data=array('categories'=>$categories);
        //print_r($data);

        return \View::make("cocktail-main")->with(compact('data'));

    }


    /*
     * showCocktailInformation -> method that builds the cocktail information by
     *                          connecting to thecocktaildb API.
     * output                   -> $data: array with the cocktail information
 * */
    public function showCocktailInformation(Request $request){

        //get the uri from the request
        $uri = $request->path();
        //get only the id using explode (split)
        $cocktailIdArray = explode("/", $uri);

        $cocktailId = $cocktailIdArray[1];

        $json = file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/lookup.php?i='.$cocktailId);
        $obj = json_decode($json);


        $data=array('cocktail'=>$obj->drinks[0]);
        //print_r($data);

        return \View::make("cocktail-page", ['id' => $obj->drinks[0]->idDrink])->with(compact('data'));

    }

    /*
     * ShowUserCocktailsByCategory -> method that builds the user-created cocktails list given
     *                                a category. The user-created cocktails are obtained from the database
     * output                   -> $data: array with the cocktail categories
 * */
    public function ShowUserCocktailsByCategory(Request $request){

        //get the uri from the request
        $uri = $request->path();
        //get only the category using explode (split)
        $categoryArray = explode("/", $uri);

        //Default category if the URI does not have one
        if (count($categoryArray)<2){
            $category = "Beer";
        }else {
            $category =  $categoryArray[1];
        }

        //for categories that have /, it is reestructured to do the search
        $categoryName= str_replace("%20%20","/", $category);

        //fix the issue with the other/unknown category
        $categoryName= str_replace("/Unk","-Unk", $categoryName);

        $categoryName= str_replace("-Drink"," Drink", $categoryName);

        $categoryQuery=$categoryId = Category::where('cgr_st_name', $categoryName)->get();
        if(count($categoryQuery)>0){

            $categoryId = $categoryQuery[0]->cgr_id_category;
            $cocktails = Cocktail::where('ckt_id_category', $categoryId)->orderBy('ckt_st_name', 'desc')->get();

        }else {
            $cocktails = Array();
        }

        $data=array('cocktails'=>$cocktails, 'size'=>count($cocktails), 'categoryName' => $categoryName);

        return \View::make("user-cocktails", ['category' => $categoryName])->with(compact('data'));

    }

    /*
    * showUserCocktailInformation -> method that builds the cocktail information by
    *                          connecting to the drunkenmonkey database.
    * output                   -> $data: array with the cocktail information
* */
    public function showUserCocktailInformation(Request $request){

        //get the uri from the request
        $uri = $request->path();
        //get only the id using explode (split)
        $cocktailIdArray = explode("/", $uri);

        $cocktailId = $cocktailIdArray[1];

        $cocktail= Cocktail::where('ckt_id_cocktail', $cocktailId)->first();

        $data=array('cocktail'=>$cocktail);

        return \View::make("user-cocktail-page", ['id' => $cocktail->ckt_id_cocktail])->with(compact('data'));

    }

    public function cmp($a, $b){
        return strcmp($a->strCategory, $b->strCategory);
    }


}
