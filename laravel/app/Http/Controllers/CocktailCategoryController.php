<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocktailCategoryController extends Controller
{
    /*
     * buildCocktailList -> method that builds the cocktail list by
     *                      connecting to thecocktaildb API, using
     *                      the category passed as the request
     * output            -> $data: array with the cocktails and the number
     *                              of cocktails
     * */
    public function getCocktailList(Request $request){

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

        //echo $categoryName;
        $json = file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/filter.php?c='. $categoryName);
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
     * getCocktailCategories -> method that builds the cocktail categories list by
     *                      connecting to thecocktaildb API.
     * output                   -> $data: array with the cocktail categories
 * */
    public function getCocktailCategories(Request $request){

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
     * getCocktailInformation -> method that builds the cocktail information by
     *                          connecting to thecocktaildb API.
     * output                   -> $data: array with the cocktail information
 * */
    public function getCocktailInformation(Request $request){

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

    public function cmp($a, $b){
        return strcmp($a->strCategory, $b->strCategory);
    }


}
