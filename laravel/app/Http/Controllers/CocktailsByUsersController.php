<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocktailsByUsersController extends Controller
{
    /*
    public static function addCocktailByUser($cocktail) {
        $db = Database::getDB();

        $ckt_st_name = $cocktail->getCktStName();
        $ckt_st_recipe = $cocktail->getCktStRecipe();
        $ckt_st_serve = $cocktail->getCktStServe();
        $ckt_st_category = $cocktail->getCktStCategory();
        $ckt_id_user = $cocktail->getCktIdUser();
        $created_at = $cocktail->getCreatedAt();



        ///////////////
        $query = 'INSERT INTO cocktailsAddedByUsers
                     (ckt_st_name, ckt_st_recipe, ckt_st_serve, ckt_st_category, ckt_id_user, created_at)
                  VALUES
                     (:ckt_st_name, :ckt_st_recipe, :ckt_st_serve, :ckt_st_category, :ckt_id_user, :created_at)';
        $statement = $db->prepare($query);
        $statement->bindValue(':ckt_st_name', $ckt_st_name);
        $statement->bindValue(':ckt_st_recipe', $ckt_st_recipe);
        $statement->bindValue(':ckt_st_serve', $ckt_st_serve);
        $statement->bindValue(':ckt_st_category', $ckt_st_category);
        $statement->bindValue(':ckt_id_user', $ckt_id_user);
        $statement->bindValue(':created_at', $created_at);
        $statement->execute();
        $statement->closeCursor();
    }*/
}

