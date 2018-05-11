<?php
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Adding Map </title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="style.css">



<!-- jQuery library (making a connection to autofil the boxes)-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- jQuery UI library (making a connection to autofil the boxes)-->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Google JavaScript API (making a conncetion to display the map)-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaI6MbnCvr7cN8iA3jrNOrA_sySo4pa5I"></script>

<script type="text/javascript">
    var geocoder;
    var map;
    var marker;
    /*
     * Google Map with marker (followed tutorial on codex.com)
     */
    function initialize() {
        var initialLat = $('.search_latitude').val();
        var initialLong = $('.search_longitude').val();
        initialLat = initialLat?initialLat:39.1696356;
        initialLong = initialLong?initialLong:-86.5180196;
        var latlng = new google.maps.LatLng(initialLat, initialLong);
        var options = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("geomap"), options);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: latlng
        });
        google.maps.event.addListener(marker, "dragend", function () {
            var point = marker.getPosition();
            map.panTo(point);
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                }
            });
        });
    }
    $(document).ready(function () {
        //load google map
        initialize();
        /*
         * autocomplete location search
         */
        var PostCodeid = '#search_location';
        $(function () {
            $(PostCodeid).autocomplete({
                source: function (request, response) {
                    geocoder.geocode({
                        'address': request.term
                    }, function (results, status) {
                        response($.map(results, function (item) {
                            return {
                                label: item.formatted_address,
                                value: item.formatted_address,
                                lat: item.geometry.location.lat(),
                                lon: item.geometry.location.lng()
                            };
                        }));
                    });
                },
                select: function (event, ui) {
                    $('.search_addr').val(ui.item.value);
                    $('.search_latitude').val(ui.item.lat);
                    $('.search_longitude').val(ui.item.lon);
                    var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                    marker.setPosition(latlng);
                    initialize();
                }
            });
        });
        /*
         * Point location on google map
         */
        $('.get_map').click(function (e) {
            var address = $(PostCodeid).val();
            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
            e.preventDefault();
        });
        //Add listener to marker for reverse geocoding
        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('.search_addr').val(results[0].formatted_address);
                        $('.search_latitude').val(marker.getPosition().lat());
                        $('.search_longitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    });
</script>
<style>
#geomap{width: 100%; height: 400px;}

.text input[type="text"] {
	display: inline-block;
        width: 400px;
        padding: 7px 12px;
        background: transparent;
        border: none;
        border-bottom: 1px solid #435160;
        outline: none;
        border-top: none;
        border-left: none;
        border-right: none;
        height: 30px;
        color: #6D7781;
        font-size: 15px;
        font-weight: bold;
        border-radius: 7px;
}
</style>
</head>
<body>





<?php
        include 'profile_js.php';
        ?>

        <div id="profile"></div>

<div class="header">
        <div class="logo">
                <a href="home.php"><img src="images/logo.jpg"></a>
        </div>
        <div class="gnb">
                <div class="gnb1">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="content.php">View Classes & Activities</a></li>
                        <li style="background-color: #A94343;"><a href="create.php" style="color: white;">Create Activity</a></li>
                        <li><a href="customerservice.php">Customer Service</a></li>
                </div>
                <div class="login">
                        <?php
                        head_login();
                        ?>
                </div>


        </div>
</div>

        <div class="clear"></div>
	<div class="content_body"></div>







<div style="margin-top: 50px; margin-left: 25%;   margin-right: 25%;">
    <h4 style="font-size: 18px; font-weight: bold; color:#435160"> Enter an address of activity or drag a marker on the map </h4>

    <form>
    <div class="form-group input-group" style="width:100%; float:left; margin-top:10px">
        <input type="text" id="search_location" "placeholder="Search location" style="width:85%; float:left; height:30px; margin-top:10px">
	<div class="input-group-btn" style="width:14.2%; float:left">
            <button class="btn btn-def
ault get_map" style="border:3px; background:#A94343;
color:#FFF; margin-top:10px; height:36px; padding:0px; font-weight: bold; width:100%" type="submit">
                Locate
            </button>
	</div>
    </div>
    </form>

    <!-- display google map -->
    <div id="geomap"></div>

    <!-- display selected location information -->
    <form action="map_insert.php" method="post" class="text">

    <h4 style="margin-top: 20px; font-size: 18px; color:#435160;">Location Details</h4>
    <p>Address : <input type="text" name="address" class="search_addr" size="45" style="padding:3px"></p>
    <p>Latitude : <input type="text" name="lat" class="search_latitude" size="45" style="padding:3px"></p>
    <p>Longitude : <input type="text" name="long" class="search_longitude" size="44" style="width:367px"></p>
    <p>Name displayed on the map : <input type="text" name="name" size="30"></p>    
    <p>Type displayed on the map :<select name="type" style="width:420px; margin-left: 10px; margin-top: 10px; font-size: 15px; transform:scale(1.0);">
                                                                <option size="30" value="activity">Activity</option>
                                                                <option size="30" value="class">Class</option>
                                                        </select>
    </br>


    <input class="animated" class="create_activity_button" type="submit" value="Create Activity" style= "cursor:pointer;  font-weight: bold; width:200px; border:none; background:#A94343;
color:#FFF; margin: 20px 0; padding: 8px; border-radius: 4px;"> 
</br>
    </form>
</div>
</body>
</html>
