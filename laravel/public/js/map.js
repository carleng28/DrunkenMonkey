// Create custom map style here: https://mapstyle.withgoogle.com/

var mapStyles = [{
    'elementType': 'geometry',
    'stylers': [{
        'color': '#f5f5f5'
    }]
},
{
    'elementType': 'labels.icon',
    'stylers': [{
        'visibility': 'off'
    }]
},
{
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#616161'
    }]
},
{
    'elementType': 'labels.text.stroke',
    'stylers': [{
        'color': '#f5f5f5'
    }]
},
{
    'featureType': 'administrative.land_parcel',
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#bdbdbd'
    }]
},
{
    'featureType': 'poi',
    'elementType': 'geometry',
    'stylers': [{
        'color': '#eeeeee'
    }]
},
{
    'featureType': 'poi',
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#757575'
    }]
},
{
    'featureType': 'poi.park',
    'elementType': 'geometry',
    'stylers': [{
        'color': '#e5e5e5'
    }]
},
{
    'featureType': 'poi.park',
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#9e9e9e'
    }]
},
{
    'featureType': 'road',
    'elementType': 'geometry',
    'stylers': [{
        'color': '#ffffff'
    }]
},
{
    'featureType': 'road.arterial',
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#757575'
    }]
},
{
    'featureType': 'road.highway',
    'elementType': 'geometry',
    'stylers': [{
        'color': '#dadada'
    }]
},
{
    'featureType': 'road.highway',
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#616161'
    }]
},
{
    'featureType': 'road.local',
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#9e9e9e'
    }]
},
{
    'featureType': 'transit.line',
    'elementType': 'geometry',
    'stylers': [{
        'color': '#e5e5e5'
    }]
},
{
    'featureType': 'transit.station',
    'elementType': 'geometry',
    'stylers': [{
        'color': '#eeeeee'
    }]
},
{
    'featureType': 'water',
    'elementType': 'geometry',
    'stylers': [{
        'color': '#c9c9c9'
    }]
},
{
    'featureType': 'water',
    'elementType': 'labels.text.fill',
    'stylers': [{
        'color': '#9e9e9e'
    }]
}
];

// map center
var center = new google.maps.LatLng(-33.91722, 151.23064);

//Map initialize function
function initialize() {
    var mapOptions = {
        center: center,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles:mapStyles,
        scrollwheel: false
    };
    //create a google map instance into the Dom element
    var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

    /*
    Path to json file that contains listing data for the marker. Make sure you are calling this file through a server.
     */
    var url = 'http://themes.iamabdus.com/listty/1.0/js/listings.json';

    // define the format of the file retrive from server. here it is in JSON format
    var mapdata = {
        format: 'json'
    };
    // the ajax callback function. Do all the stuff you want to do with the remote data in between this function.
    function getContent(data) {
        //loop through each of the single JSON object obtained from the JSON file.
        var markers = [];
        var infobox = new InfoBox({
            content: 'empty',
            disableAutoPan: false,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-250, -330),
            zIndex: null,
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(1, 1),
            isHidden: false,
            isOpen: false,
            pane: "floatPane",
            enableEventPropagation: false
        });
        infobox.addListener('domready', function () {
            $('.infobox-close').on('mouseout', function () {
                infobox.close(map, this);
                infobox.isOpen = false;
            });
        });
        $.each(data, function (i, value) {
            var markerCenter = new google.maps.LatLng(value.latitude, value.longitude);

            var verified = '';


            if (value.verified) {
                verified = '<div class="marker-verified"><i class="fa fa-check"></i></div>';
            }


            function getMarkerContent(value){
                var content='<div id="marker-'+ value.id +'" class="flip-container">'+ verified +
                '<div class="flipper">'+
                '<div class="front">'+
                '<img src="'+value.thumbnail+'">'+
                '</div>'+
                '<div class="back">'+
                '<i class="fa fa-eye"></i>'+
                '</div>'+
                '</div>'+
                '</div>';
                return content;
            }

            var markerContent=getMarkerContent(value);
            var marker = new RichMarker({
                id: value.id,
                data: value,
                flat: true,
                position: markerCenter,
                map: map,
                shadow: 0,
                content:markerContent,
                title:"Fábrica de Porcelana da Vista Alegre",
                is_logged_in:value.is_logged_in
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', function(e) {
                $('#sectionToHide').css('display', 'block');
                window.location.href = "#sectionToHide";
                e.preventDefault();
                e.stopPropagation();
            });
            // This event expects a click on a marker
            // When this event is fired the Info Window is opened.
            google.maps.event.addListener(marker, 'mouseover', function() {

                var content = '<div class="infobox-close"></div>'+
                '<div id="iw-container" style="background-image: url(' + marker.data.thumbnail + ');">' +
                '<div class="iw-content">' +
                '<ul class="list-inline rating">'+
                '<li><i class="fa fa-star" aria-hidden="true"></i></li>'+
                '<li><i class="fa fa-star" aria-hidden="true"></i></li>'+
                '<li><i class="fa fa-star" aria-hidden="true"></i></li>'+
                '<li><i class="fa fa-star" aria-hidden="true"></i></li>'+
                '<li><i class="fa fa-star" aria-hidden="true"></i></li>'+
                '</ul>'+
                '<div class="iw-subTitle">'+ marker.data.title +'</div>' +
                '<p>' + marker.data.address + '</p>'+
                '</div>' +
                '<div class="iw-bottom-gradient"></div>' +
                '</div>';

                if (!infobox.isOpen) {
                    infobox.setContent(content);
                    infobox.open(map, this);
                    infobox.isOpen = true;
                    infobox.markerId = marker.id;
                } else {
                    if (infobox.markerId == marker.id) {
                        infobox.close(map, this);
                        infobox.isOpen = false;
                    } else {
                        infobox.close(map, this);
                        infobox.isOpen = false;

                        infobox.setContent(content);
                        infobox.open(map, this);
                        infobox.isOpen = true;
                        infobox.markerId = marker.id;
                    }
                }
            });
        })
    }
    // call the jquery ajax function
    $.getJSON(url, mapdata, getContent);
} // map initialize function ends
var existId = document.getElementById("map-canvas");
if (existId) {
    google.maps.event.addDomListener(window, 'load', initialize);
}
