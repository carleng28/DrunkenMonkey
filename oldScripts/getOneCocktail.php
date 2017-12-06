<?php
/**
 * Created by PhpStorm.
 * User: krist
 * Date: 2017-10-23
 * Time: 3:51 PM
 */
$cocktailid = $_GET['id'];

echo "<script> 
        var url = 'http://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=" . $cocktailid . "';"
    . "var urlOfSmallPics = 'http://www.thecocktaildb.com/images/ingredients/';"
    . "$.ajax({
            type: 'POST',
            url: url,
            data: JSON,
            success: function (data) {
    
        $(\"#Cocktail\").append('<div class=\"CocktailName\"><h2> ' +data.drinks[0].strDrink+
            '</h2></div><div class=\"CoctailRecipe\"><h3>Recipe: </h3><p>' +data.drinks[0].strInstructions+ 
            '</p></div><div class=\"ServeGlass\"><h3>Serve: </h3><p>' +data.drinks[0].strGlass+ 
            '</p><div class=\"listingReview\"><ul class=\"list-inline rating\"><a href=\"#\" class=\"btn\" id=\"tasted\">'+
            '<i class=\"fa fa-check\" aria-hidden=\"true\"></i>Tasted</a></ul><ul class=\"list-inline captionItem\">' +
            '<li><a href=\"#\" class=\"btn btn-default\" id=\"wish\">Add to Wishlist</a></li></ul></div>');
    
        $(\"#mainImage\").html('<img src=\"'+data.drinks[0].strDrinkThumb+'\" alt=\"Cocktail Image\" class=\"img-responsive\" width=\"400\" height=\"400\"\>');

        
        if(data.drinks[0].strIngredient1 != \"\" && data.drinks[0].strIngredient1 != null)
        {
            var ing = data.drinks[0].strIngredient1;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure1 + \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\" width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient2 != \"\" && data.drinks[0].strIngredient2 != null)
        {
            var ing = data.drinks[0].strIngredient2;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure2 +  \" of \" +ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient3 != \"\" && data.drinks[0].strIngredient3 != null)
        {
            var ing = data.drinks[0].strIngredient3;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure3 +  \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient4 != \"\" && data.drinks[0].strIngredient4 != null)
        {
            var ing = data.drinks[0].strIngredient4;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure4 +  \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\" width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient5 != \"\" && data.drinks[0].strIngredient5 != null)
        {
            var ing = data.drinks[0].strIngredient5;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure5 + \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\" width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient6 != \"\" && data.drinks[0].strIngredient6 != null)
        {
            var ing = data.drinks[0].strIngredient6;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure6 + \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\" width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient7 != \"\" && data.drinks[0].strIngredient7 != null)
        {
            var ing = data.drinks[0].strIngredient7;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure7 + \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient8 != \"\" && data.drinks[0].strIngredient8 != null)
        {
            var ing = data.drinks[0].strIngredient8;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure8 + \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\" width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient9 != \"\" && data.drinks[0].strIngredient9 != null)
        {
            var ing = data.drinks[0].strIngredient9;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure9 + \" of \" + ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient10 != \"\" && data.drinks[0].strIngredient10 != null)
        {
            var ing = data.drinks[0].strIngredient10;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure10 +  ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient11 != \"\" && data.drinks[0].strIngredient11 != null)
        {
            var ing = data.drinks[0].strIngredient11;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure11 +  ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient12 != \"\" && data.drinks[0].strIngredient12 != null)
        {
            var ing = data.drinks[0].strIngredient12;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure12 +  ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
            }
         if(data.drinks[0].strIngredient13 != \"\" && data.drinks[0].strIngredient13 != null)
        {
            var ing = data.drinks[0].strIngredient13;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure13 +  ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
            }
         if(data.drinks[0].strIngredient14 != \"\" && data.drinks[0].strIngredient14 != null)
        {
            var ing = data.drinks[0].strIngredient14;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure14 +  ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
        if(data.drinks[0].strIngredient15 != \"\" && data.drinks[0].strIngredient15 != null)
        {
            var ing = data.drinks[0].strIngredient15;
            $(\"#ingredients\").append('<h6>' + data.drinks[0].strMeasure15 +  ing + '</h6>');
            $(\"#ingredientsIMAGES\").append('<img src=\"' + urlOfSmallPics + ing + '.png\"  width=\"100\" height=\"100\" >');
        }
      }
        });   
        </script>";

?>