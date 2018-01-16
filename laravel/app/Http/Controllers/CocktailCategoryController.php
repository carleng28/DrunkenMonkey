<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cocktail;
use App\Category;
use App\Ingredient;
use App\Picture;
use Session;

class CocktailCategoryController extends Controller
{


    //comment
    /*
     * showCocktailList -> method that builds the cocktail list by
     *                      connecting to thecocktaildb API, using
     *                      the category passed as the request
     * output            -> $data: array with the cocktail and the number
     *                              of cocktail
     * */
    public function showCocktailList($category = null){
        $cocktails = Array();
        //Default category if the URI does not have one
        if ($category==null){
            $category = "Beer";
        }
        $categoryName= $this->hashApiSearch($category);

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

        $data=array('cocktails'=>array_slice($cocktails,0, 9), 'size'=>count($cocktails), 'categoryName' => $categoryName, "originalCategory" => $category);
        //print_r($data);

        return \View::make("cocktail/category", ['category' => $categoryName])->with(compact('data'));


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

        return \View::make("cocktail/main")->with(compact('data'));

    }


    /*
     * showCocktailInformation -> method that builds the cocktail information by
     *                          connecting to thecocktaildb API.
     * output                   -> $data: array with the cocktail information
 * */
    public function showCocktailInformation($id){

        $url = 'http://www.thecocktaildb.com/api/json/v1/1/lookup.php?i='. $id;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($curl);
        $obj = json_decode($json);
        $data=array('cocktail'=>$obj->drinks[0]);
        return \View::make("cocktail/view", ['id' => $obj->drinks[0]->idDrink])->with(compact('data'));

    }

    /*
     * ShowUserCocktailsByCategory -> method that builds the user-created cocktail list given
     *                                a category. The user-created cocktail are obtained from the database
     * output                   -> $data: array with the cocktail categories
 * */
    public function ShowUserCocktailsByCategory($category=null){

        $pictures=Array();
        //Default category if the URI does not have one
        if ($category==null) {
            $category = "Beer";
        }
        //for categories that have /, it is reestructured to do the search
        $categoryName= str_replace("%20%20","/", $category);
        //fix the issue with the other/unknown category
        $categoryName= str_replace("/Unk","-Unk", $categoryName);
        $categoryName= str_replace("-Drink"," Drink", $categoryName);
        $categoryQuery=$categoryId = Category::where('cgr_st_name', $categoryName)->get();
        if(count($categoryQuery)>0){

            $categoryId = $categoryQuery[0]->cgr_id_category;
            $cocktails = Cocktail::where([
                ['ckt_id_category', '=', $categoryId],
                    ])
                    ->orderBy('ckt_st_name', 'desc')
                    ->get();

            foreach ($cocktails as $cocktail) {
                $picture = Picture::where('pic_id_cocktail', $cocktail->ckt_id_cocktail)->first();
                array_push($pictures,$picture);
            }
        }else {
            $cocktails = Array();
        }

        $data=array('cocktail'=>$cocktails, 'size'=>count($cocktails), 'categoryName' => $categoryName, 'picture' => $pictures);
        //dd($data);
        return \View::make("cocktail/user-cocktails", ['category' => $categoryName])->with(compact('data'));

    }

    /*
    * showUserCocktailInformation -> method that builds the cocktail information by
    *                          connecting to the drunkenmonkey database.
    * output                   -> $data: array with the cocktail information
* */
    public function showUserCocktailInformation($id){

        //get the uri from the request
        $cocktail= Cocktail::where('ckt_id_cocktail', $id)->first();
        $picture = Picture::where('pic_id_cocktail', $id)->first();
        $data=array('cocktail'=>$cocktail, 'picture' => $picture);
        return \View::make("cocktail/user-cocktail-page", ['id' => $cocktail->ckt_id_cocktail])->with(compact('data'));

    }

    public function cmp($a, $b){
        return strcmp($a->strCategory, $b->strCategory);
    }

    public function hashApiSearch($category){

        $categoryApi=$category;

        if($category=="Coffee"){$categoryApi="Coffee%20/%20Tea";}
        if($category=="Homemade"){$categoryApi="Homemade%20Liqueur";}
        if($category=="Milk"){$categoryApi="Milk%20/%20Float%20/%20Shake";}
        if($category=="Ordinary"){$categoryApi="Ordinary%20Drink";}
        if($category=="Other"){$categoryApi="Other/Unknown";}
        if($category=="Punch"){$categoryApi="Punch%20/%20Party%20Drink";}
        if($category=="Soft"){$categoryApi="Soft%20Drink%20/%20Soda";}
        return $categoryApi;
    }


}
