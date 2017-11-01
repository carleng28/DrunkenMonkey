var array=[];

var id=[];

var store_id=64;
var category='Wine';


function requestAjax(store_id,category){

    $.ajax({
        url: 'http://lcboapi.com/products?q='+category+'&per_page=100&store_id='+store_id,
        dataType: 'jsonp',
        headers: {
            Authorization: 'Token MDo3MGQ2ZTE4Mi1hYTExLTExZTctODViNC0xN2U1MTZiZmFmZTI6N0xCTnRpWVlXU2liSDVMb3lkc0FZSGZNMElGcWpLODRHYWFD'
        },
        success: function (data) {
            //array.push(data.result);
            //console.log(data.pager.total_pages);
            var pages = data.pager.total_pages;
            console.log("Number of products is: "+data.pager.total_record_count)
            console.log("Number of pages in this store is: "+pages)
            console.log("--------------------------------------------------------")
            generic(pages);

        }
    });

    function generic (pages) {
        var stop=(pages-1);
        for (var i = 1; i < pages; i++) {
            $.ajax({
                url: 'http://lcboapi.com/products?q='+category+'&per_page=100&store_id='+store_id + '&page='+i,
                dataType: 'jsonp',
                headers: {
                    Authorization: 'Token MDo3MGQ2ZTE4Mi1hYTExLTExZTctODViNC0xN2U1MTZiZmFmZTI6N0xCTnRpWVlXU2liSDVMb3lkc0FZSGZNMElGcWpLODRHYWFD'
                },
                success: function (data) {
                    for (var j = 0; j < 100; j++) {

                        var drink =
                            {
                                store_id: data.store.id,
                                store_name: data.store.name,
                                store_adress: data.store.address_line_1,
                                store_inventory_count: data.store.inventory_count,
                                drink_id: data.result[j]['id'],
                                drink_img_tumb: data.result[j]['image_thumb_url'],
                                drink_img_url: data.result[j]['image_url'],
                                drink_name: data.result[j]['name'],
                                drink_origin: data.result[j]['origin'],
                                drink_package: data.result[j]['package_unit_type'],
                                drink_package_unit: data.result[j]['package_unit_volume'],
                                drink_price_in_cents: data.result[j]['price_in_cents'],
                                drink_primary_category: data.result[j]['primary_category'],
                                drink_secondary_category: data.result[j]['secondary_category'],
                                drink_tertiary_category: data.result[j]['tertiary_category'],
                                drink_style: data.result[j]['style'],
                                drink_total_package_unit: data.result[j]['total_package_units'],
                            }
                        if (data.result[j]['primary_category'] == category && $.inArray(data.result[j]['id'], array) === -1) {
                            array.push(drink)
                        }

                    }

                }

            });

        }
        console.log(array);
        populateImages();

    }
}

function getSubCategories(){
    var x;
    var categories=[];
    for(x in array){
        if($.inArray(array[x].drink_tertiary_category,categories)===-1){
            categories.push(array[x].drink_tertiary_category)
        }
    }
    return categories;
}



function populateImages() {
    console.log("entrando a populate images")
    for (x in array) {
        var string =
            "<div class='col-sm-4 col-xs-12'>"+
            "<div class='thingsBox thinsSpace'>" +
            "<div class='thingsImage'>" +
            "<img src='" + array[x].drink_img_tumb + "' alt='Image things'>" +
            "<div class='thingsMask'>" +
            "<a href='blog-details.html'><h2>" + array[x].drink_name + " <i class='fa fa-check-circle' aria-hidden='true'></i></h2></a>" +
            "</div>" +
            "</div>" +
            "<div class='thingsCaption '>" +
            "<ul class='list-inline captionItem'>"+
                "<li><i class='fa fa-heart-o' aria-hidden='true'></i>"+ array[x].drink_name+"</li>"+
                "<li><a href='category-list-full.html'>"+array[x].drink_id+"</a></li>"+
            "</ul>"+
            "</div>" +
            "</div>" +
            "</div>"
        $("#drink_display").append(string)

    }
}


$(document).ready(function(){
    var i=0;
    for(requestAjax(64,'Wine');i<1; i++){

    }
})



function populatebyCategory(){
    var x;
    categories=getSubCategories();
    for(x in categories)    {
        var string="<li><a href='#'>"+categories[x]+"</a></li>"
            $('#bycategory').append(string)
        }
    }
