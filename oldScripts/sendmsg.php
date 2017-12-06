<?php

$category = $_GET['category'];
echo "<script> 
        var url = 'http://www.thecocktaildb.com/api/json/v1/1/filter.php?c=" . $category . "';"
    . "$.ajax({
            type: 'POST',
            url: url,
            data: JSON,
            success: function (data) {
    
                var length = data.drinks.length;
                for (var i = 0; i < data.drinks.length; i++) {
            
                    var cocktailId = data.drinks[i].idDrink;
                    var cocktailName = data.drinks[i].strDrink;
                    var functionName = 'displayCocktailInfo(\"' + cocktailId + '\")'; 
                    $(\"#cocktailList\").append('<div class=\"col-sm-4\"><div class=\"thingsBox thinsSpace\"> ' +
                        '<div class=\"thingsImage\"><img src=\"'+data.drinks[i].strDrinkThumb+'\" width=\"280\" height=\"270\"/>' +
                        '<div class=\"thingsMask\"><a href=\"#\" onclick='+functionName+'><h2>'+ cocktailName +'</h2></a></div></div></div></div>');
                }
                
                $(\"#resultLength\").append(length);

}
        });
        
        function displayCocktailInfo(cocktailId){
            
            window.location.href = \"cocktail-page.php?id=\"+cocktailId;
        }
        
        </script>";

?>

