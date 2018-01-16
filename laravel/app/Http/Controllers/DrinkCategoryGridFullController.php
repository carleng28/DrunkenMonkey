<?php

namespace App\Http\Controllers;

use Hamcrest\Arrays\IsArrayContainingInAnyOrder;
use Illuminate\Http\Request;

class DrinkCategoryGridFullController extends Controller
{
    //


    public function showSubCategories($id, $category, $page = null)
    {
        //$id=$request['id'];
        //$category=$request['category'];

        $categorycurl=$category;

        if(starts_with($category, "Ready")){
            $categorycurl='Ready-to-Drink/Coolers';
        }

        $category_secondary = Array();
        //$page=$request['page'];
        if ($page == null) {
            $page = 1;
        }
        $greatjason = Array();

        $url2 = 'http://lcboapi.com/products?per_page=100&store_id=' . $id . '&q=' . $category . '&page=' . $page;
        $curl2 = curl_init($url2);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
        $json2 = curl_exec($curl2);
        $obj2 = json_decode($json2, true);

        $total_pages = $obj2["pager"]["total_pages"];
        $total_record_count = $obj2["pager"]["total_record_count"];


        echo "The current Category is : " . $category . "<br>";
        echo "Total of record is : " . $total_record_count . "<br>";
        echo "Total pages : " . $total_pages . "<br>";
        echo "Current store id is : " . $id . "<br>";
        echo "category before CURL " . $category . "<br>";
        echo "category after CURL ". $categorycurl . "<br>";


        foreach ($obj2["result"] as $drink) {
                if ($drink['primary_category'] == $categorycurl & !in_array($drink['secondary_category'], $category_secondary)) {
                    array_push($category_secondary, $drink['secondary_category']);
                };
            };
        $product = Array();

        foreach ($obj2["result"] as $drink) {
            if ($drink['primary_category'] == $categorycurl) {

                $product["id"] = $drink["id"];
                $product["name"] = ($drink["name"] == null ? "" : $drink["name"]);
                $product["primary_category"] = $drink["primary_category"];
                $product["secondary_category"] = $drink["secondary_category"];
                $product["origin"] = $drink["origin"];
                $product["package"] = $drink["package"];
                $product["package_unit_type"] = $drink["package_unit_type"];
                $product["package_unit_volume_in_milliliters"] = $drink["package_unit_volume_in_milliliters"];
                $product["total_package_units"] = $drink["total_package_units"];
                $product["alcohol_content"] = $drink["alcohol_content"];
                $product["description"] = ($drink["tags"] == null ? "ND" : $drink["tags"]);
                $product["regular_price_in_cents"] = "$" . $drink["regular_price_in_cents"] * 100;
                $product["image_thumb_url"] = ($drink["image_thumb_url"] == null ? "" : $drink["image_thumb_url"]);
                $product["image_url"] = $drink["image_url"];

                array_push($greatjason, $product);
            };
        };
        array_unique($category_secondary);


        //var_dump($category_secondary);
        //var_dump($greatjason);

        $current_page = $obj2["pager"]["current_page"];
        echo "the Current Page is : " . $current_page . "<br>";

        $data = array('drinks' => $greatjason, 'size' => count($greatjason), 'category' => $category, 'total_pages' => $total_pages, 'current_page' => $current_page);

        return \View::make('drink-category-grid-full', ['id' => $id, 'category' => $category, 'page' => $page])->with(compact('data'));

    }







    public function showCategories()
    {
        $url2 = 'http://lcboapi.com/products?';
        $curl2 = curl_init($url2);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
        $json2 = curl_exec($curl2);
        $obj2 = json_decode($json2, true);

        $total_pages = $obj2["pager"]["total_pages"];
        //$total_record_count = $obj2["pager"]["total_record_count"];

        $data=$total_pages;

        return \View::make('test',['pages'=>$total_pages])->with(compact('data'));

    }

}


?>