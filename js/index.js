var map, currentLat,currentLng;
//Array with markers
var markers = [];
var search = false;


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

            var marker = new google.maps.Marker({
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
        var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(value.latitude, value.longitude)

        });

        var markerContent = getMarkerContent(value);

        marker = new RichMarker({
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
            //marker.data.name;
            $('#sectionToHide').css('display', 'block');
            window.location.href = "#sectionToHide";
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

var existId = document.getElementById("map-canvas");
if (existId) {
    google.maps.event.addDomListener(window, 'load', initialize);
}

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
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        deleteMarkers();

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();

        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}
/*
function geocodeAddress() {
    if (search){
        markers.push(newMarker);
    }
    deleteMarkers();
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById('nearLocation').value;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            currentLat = results[0].geometry.location.lat();
            currentLng = results[0].geometry.location.lng();
            map.setCenter(results[0].geometry.location);
            pos = {
                lat: currentLat,
                lng: currentLng
            };

            var image = 'img/map/active.png';
            newMarker = new google.maps.Marker({
                position: pos,
                title: 'Searched location',
                map: map,
                icon: image
            });
            search = true;
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
            return false;
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }

    });
}
*/

