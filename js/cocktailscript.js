/**
 * Created by carlo on 2017-10-16.
 */


$(document).ready(function () {
    var url = "http://www.thecocktaildb.com/api/json/v1/1/list.php?c=list";
    $.ajax({
        type: "POST",
        url: url,
        data: JSON,
        success: function (data) {

            displayCategories(data);

        }
    });
});

function displayCategories(data){

    //data.drinks.sort();
    for (var i = 0; i < data.drinks.length; i++) {

        $("#SingleCategory").append('<div class="col-md-3 col-sm-6 col-xs-12"><div class="categoryItem"> ' +
            '<center><i class="icon-listy icon-mobile-phone"></i></center><h2 style="text-align: center!important"><a href="cocktail-category.html">' + data.drinks[i].strCategory +
            '</a></h2> </div> </div>');
    }


}
