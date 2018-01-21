var map, currentLat,currentLng,currentMarker;
//Array with markers
var markers = [];
var storeId = "";

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

/*// map center
var center = new google.maps.LatLng(-33.91722, 151.23064);*/

$(document).ready(function(){
    //Prevent the form to be submitted when the enter key is pressed
    document.getElementById("searchAddress").onkeypress = function(e) {
        var key = e.charCode || e.keyCode || 0;
        if (key == 13) {
            e.preventDefault();
        }
    };

    var infoWindow = new google.maps.InfoWindow({map: map});
    var id = document.getElementById('map-canvas');

    if (id) {
        initialize();
    }

    //To initialize the function for autocomplete in the "Find restaurant" field
    initAutocomplete();

});

//Map initialize function
function initialize() {

    map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {lat: -34.397, lng: 150.644},
        styles:mapStyles,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: 13
    });
    //Center the map based on the device's current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            currentLat = position.coords.latitude;
            currentLng = position.coords.longitude;
            var pos = {
                lat: currentLat,
                lng: currentLng
            };

            var image = 'img/map/active.png';

            currentMarker = new google.maps.Marker({
                position: pos,
                title: 'You are here!',
                map: map,
                icon: image
            });

            map.setCenter(pos);
            $.ajax({
                url: 'http://lcboapi.com/stores?lat='+currentLat+'&lon='+currentLng,
                dataType: 'jsonp',
                headers: {
                    Authorization: 'Token MDo2YWM0ZGRlNC1hYTExLTExZTctYTI5Yy1kYmQzMWQ4OTRlNDg6U0x4T3FZUFdhYmVsb0d5NXlRcnFLbGp1NHRNRDJkWkwzRzdO'
                }
            }).then(function(data) {
                console.log(data);
                createMarkers(data);
            });
            initAutocomplete();
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    }
    else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
} // map initialize function ends


//Format the hours to display in infobox
function getHours(total){
    var minutes, hours, period = "";
    if (total%60 === 0){
        minutes = "00";
    }
    else{
        minutes = total%60;
    }
    if(total/60 > 12){
        hours =(total/60)-12;
        period = "pm";
    }
    else{
        hours = total/60;
        period = "am";
    }
    return hours+":"+minutes+" "+period;
}


//Handling error in case of Location error
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}


//Setting the content for the markers in the map
function getMarkerContent(value) {
    return content = '<div id="marker-'+ value.id +'" class="flip-container">' +
        '<div class="front">'+
        '<img src="'+"img/map/markerStore.jpeg"+'">'+
        '</div>'+
        '</div>';

}


//Populate map with markers for the LCBO stores
function createMarkers(results){

    infoWindow = new google.maps.InfoWindow();

    deleteMarkers();

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

    $.each(results.result, function(i,value){
        var markerCenter = new google.maps.LatLng(value.latitude, value.longitude);


        var markerContent = getMarkerContent(value);

        var marker = new RichMarker({
            id: value.id,
            data: value,
            flat: true,
            position: markerCenter,
            map: map,
            shadow: 0,
            content: markerContent,
            title: value.name
        });

        marker.addListener('click', function (e) {
            console.log(marker.data.id);
            $('#sectionToHide').css('display', 'block');
            window.location.href = "#sectionToHide";

            setCategoryLink(marker.data.id);


            e.preventDefault();
            e.stopPropagation();
        });
        // This event expects a mouse over on a marker
        // When this event is fired the Info Window is opened.
        marker.addListener('mouseover', function () {

            var content = '<div class="infobox-close"></div>' +
                '<div id="iw-container">' +
                '<div class="iw-content">' +
                '<div class="iw-subTitle">' + marker.data.name + '</div>' +
                '<p>' + marker.data.address_line_1 + '</p>';

            if (marker.data.address_line_2 !== null){
                content += '<p>' + marker.data.address_line_2 + '</p>';
            }
            content += '<p>' + marker.data.city + '</p>' +
                '<p>Monday: '+getHours(marker.data.monday_open)+' - '+getHours(marker.data.monday_close)+'</p>'+
                '<p>Tuesday: '+getHours(marker.data.tuesday_open)+' - '+getHours(marker.data.tuesday_close)+'</p>'+
                '<p>Wednesday: '+getHours(marker.data.wednesday_open)+' - '+getHours(marker.data.wednesday_close)+'</p>'+
                '<p>Thursday: '+getHours(marker.data.thursday_open)+' - '+getHours(marker.data.thursday_close)+'</p>'+
                '<p>Friday: '+getHours(marker.data.friday_open)+' - '+getHours(marker.data.friday_close)+'</p>'+
                '<p>Saturday: '+getHours(marker.data.saturday_open)+' - '+getHours(marker.data.saturday_close)+'</p>'+
                '<p>Sunday: '+getHours(marker.data.sunday_open)+' - '+getHours(marker.data.sunday_close)+'</p>'+
                '<div class="iw-bottom-gradient"></div>' +
                '</div>';

            if (!infobox.isOpen) {
                infobox.setContent(content);
                infobox.open(map, this);
                infobox.isOpen = true;
                infobox.markerId = marker.id;
            } else {
                if (infobox.markerId === marker.id) {
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
        markers.push(marker);





    });
}
function setCategoryLink(storeId) {
    $("#beers").attr("href","drink-category-grid-full/"+storeId+"/"+$("#beers").text()+"/1");
    $("#coolers").attr("href","drink-category-grid-full/"+storeId+"/"+"Ready-to-drink"+"/1");
    $("#wine").attr("href","drink-category-grid-full/"+storeId+"/"+$("#wine").text()+"/1");
    $("#spirits").attr("href","drink-category-grid-full/"+storeId+"/"+$("#spirits").text()+"/1");
    $("#ciders").attr("href","drink-category-grid-full/"+storeId+"/"+$("#ciders").text()+"/1 ");

}
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function deleteMarkers() {
    clearMarkers();
    markers = [];
}

function clearMarkers() {
    setMapOnAll(null);
}

//It will initialize the search box from Google API and center the map in the new address
function initAutocomplete() {

// Create the search box and link it to the UI element.
    var input = document.getElementById('nearLocation');
    var searchBox = new google.maps.places.SearchBox(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var place = searchBox.getPlaces();
        console.log(place);

        if (place.length == 0) {
            return;
        }
        else {

            currentLat = place[0].geometry.location.lat();
            currentLng = place[0].geometry.location.lng();
            map.setCenter(place[0].geometry.location);
            pos = {
                lat: currentLat,
                lng: currentLng
            };

            var image = 'img/map/active.png';

            //Erase current marker
            currentMarker.setMap(null);
            currentMarker = new google.maps.Marker({
                position: pos,
                title: 'Searched location',
                map: map,
                icon: image
            });

            console.log(currentMarker);
            map.setCenter(pos);

            $.ajax({
                url: 'http://lcboapi.com/stores?lat='+currentLat+'&lon='+currentLng,
                dataType: 'jsonp',
                headers: {
                    Authorization: 'Token MDo2YWM0ZGRlNC1hYTExLTExZTctYTI5Yy1kYmQzMWQ4OTRlNDg6U0x4T3FZUFdhYmVsb0d5NXlRcnFLbGp1NHRNRDJkWkwzRzdO'
                }
            }).then(function(data) {
               // console.log(data);
                createMarkers(data);
            });
            return false;
        }


    });
}

