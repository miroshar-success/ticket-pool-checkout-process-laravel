var geocoder;

$(document).ready(function() {

    var default_lat = $('#default_lat').val();
    var default_long = $('#default_long').val();


    if (default_lat) {
        if (document.getElementById('contact_map')) {
            setTimeout(() => {
                var default_latlng = new google.maps.LatLng(default_lat, default_long);
                var default_mapOptions = {
                    zoom: 17,
                    center: default_latlng,
                }
                contact_map = new google.maps.Map(document.getElementById('contact_map'), default_mapOptions);
            }, 1000);
        }
    }

});


var autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

function initAutocomplete() {
    if (document.getElementById('search_address')) {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('search_address'));
        autocomplete.setFields(['address_component']);
        autocomplete.addListener('place_changed', fillInAddress);
    }
}

function fillInAddress() {
    var place = autocomplete.getPlace();
    for (var component in componentForm) {
        if (document.getElementById(component)) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }
    }
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            if (document.getElementById(addressType)) {
                document.getElementById(addressType).value = val;
            }
        }
    }
}