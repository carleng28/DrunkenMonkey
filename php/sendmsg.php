<?php

    $category = $_GET['category'];
    echo "<script> 
        var url = 'http://www.thecocktaildb.com/api/json/v1/1/filter.php?c=" . $category . "';"
        . "$.ajax({
            type: 'POST',
            url: url,
            data: JSON,
            success: function (data) {
    
    for (var i = 0; i < data.drinks.length; i++) {

        $(\"#cocktailList\").append('<div class=\"col-sm-4\"><div class=\"thingsBox thinsSpace\"> ' +
            '<div class=\"thingsImage\"><img src=\"'+data.drinks[i].strDrinkThumb+'\" width=\"280\" height=\"270\"/>' +
            '<div class=\"thingsMask\"><a href=\"cocktail-page.html\"><h2>\"'+ data.drinks[i].strDrink+'\"</h2></a></div></div></div></div>');
    }

}
        });</script>";

?>