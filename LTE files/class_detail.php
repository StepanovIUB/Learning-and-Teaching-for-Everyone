<?php
include 'function.php';

$anum = $_GET['comnum'];

$_SESSION['anum'] = $anum;

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.35">
		<link rel="stylesheet" type="text/css" href="style.css">
                <link rel="stylesheet" href="css/swiper.min.css">
		<script src="//code.jquery.com/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>



        <style>
      #map {
        height: 400px;
        width: 100%;
	margin-top: 60px;
 	margin-bottom: 40px;
	padding: 10px;
      }
       </style>






	</head>
	<body>
	
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
  	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
  	fjs.parentNode.insertBefore(js, fjs);	
	}(document, 'script', 'facebook-jssdk'));</script>  

	
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        
	<?php
	include 'profile_js.php';
	
	$activity_num=$_GET["comnum"];
	$share_url = "http://cgi.soic.indiana.edu/~stepanov/capstone_week_2/class_detail.php?comnum=" . $activity_num;
	?>

	<div id="profile"></div>
	<div id="show_avail" style="position: absolute; width: 500px; height: 500px; left: 50%; margin-left: -250px; top: 50%; margin-top: -250px; z-index: 12; display: none; border: 0px solid black; background-color: white; 
padding: 10px; border-radius: 5px;">
		<li style="text-align: right;"><a href="javascript:close();">X</a></li>
		<?php
		class_detail_show();
		?>
		<div id="plus">
		</div>
	</div>

	<div id="back" style="position: absolute; width: 100%; height: 100%; overflow: auto; background-color: black; opacity: 0.5; display: none; z-index: 1;"></div>
	<script type="text/javascript" id="omnius"></script>
	<script>
	/*var height = document.body.scrollWidth;
	document.write(height);*/
	function show_avail() {
		document.getElementById("show_avail").style.display='inline';
		document.getElementById("back").style.display="inline";
		document.documentElement.style.overflowY='hidden';
	}
	function close() {
		document.getElementById("show_avail").style.display='none';
		document.getElementById("back").style.display="none";
		document.documentElement.style.overflowY='scroll';
	}
	function plus() {
		document.getElementById("plus").innerHTML="<li>test</li>";
	}
	function selectdate_ok(count, comnum, selectdate) {
		document.getElementById(count).innerHTML='<a href="javascript:selectdate_delete(\''+count+'\', \''+comnum+'\', \''+selectdate+'\');" class="d_s_a_submit selected">Selected</a>';
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'selectdate_ok.php');
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		var data = '';
		data += 'comnum='+comnum;
		data += '&selectdate='+selectdate;
		xhr.send(data);
		//omnius.src='http://omnius.co.kr/jin2/selectdate_ok.php?comnum='+comnum+'&selectdate='+selectdate;
	}
	function selectdate_delete(count, comnum, selectdate) {
		document.getElementById(count).innerHTML='<a href="javascript:selectdate_ok(\''+count+'\', \''+comnum+'\', \''+selectdate+'\');" class="d_s_a_submit">Select</a>';
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'selectdate_delete.php');
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		var data = '';
		data += 'comnum='+comnum;
		data += '&selectdate='+selectdate;
		xhr.send(data);
		//omnius.src='http://omnius.co.kr/jin2/selectdate_delete.php?comnum='+comnum+'&selectdate='+selectdate;
	}
	
	</script>




		<div class="header">
			<div class="logo">
				<a href="home.php"><img src="images/logo.jpg"></a>
			</div>
			<div class="gnb">
				<div class="gnb1">
					<li><a href="home.php">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li style="background-color: #A94343;"><a href="content.php" style="color: white;">View Classes & 
Activities</a></li>
					<li><a href="create.php">Create Activity</a></li>
					<li><a href="customerservice.php">Customer Service</a></li>
				</div>
				<div class="login">
					<?php
					head_login();
					?>
					<!--<li><a href="login.php">Login</a></li>
					<li><a href="">Cart</a></li>-->
				</div>
			</div>
		</div>

		<!---------- Content ---------->
		<div class="clear"></div>
		<div class="content_body">
		<div class="content">
			<div class="content_left">
				<li><a href="content.php">Categories</a></li>
				<li><a href="content.php?categories=art">Art</a></li>
				<li><a href="content.php?categories=music">Music</a></li>
				<li><a href="content.php?categories=sport">Sport</a></li>
				<li><a href="content.php?categories=computer">Computer</a></li>
				<li><a href="content.php?categories=science">Science</a></li>
				<li><a href="content.php?categories=english">English</a></li>
				<li><a href="content.php?categories=game">Game</a></li>
				<li><a href="content.php?categories=business">Business</a></li>
			</div>
			<div class="content_right">
				<div class="con_list">
					 <div class="search">
                                        <form method="post" action="search_list.php">
                                                <li><input type="text" name="search" placeholder="Search"></li>
                                                <li><input type="submit" value="search"></li>
                                        </form>
                                </div>

					<div class="class_detail_left">
					<?php
					class_detail_left();
					?>
					</div>


					<div class="con_list_right">
					<?php
					//class_detail_right();
                 			include 'detail_right_image.php';
					?>
                                     
					</div>
					<div class="clear"> </div>

					<div class="class_description"> 
					<?php
                                        class_detail_description();
                                        ?>
					</div>
                                        
					<div class="clear" id="map"></div>
					
					<div>
					<?php
                                        class_detail_down();
                                        ?>
					</div>
				</div>
			</div>
		</div>
		</div>
    </br>
    </br>

    <script>
      var customLabel = {
        activity: {
          label: 'A'
        },
        class: {
          label: 'C'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(39.1696356,-86.5180196),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          
	downloadUrl('http://cgi.soic.indiana.edu/~stepanov/capstone_week_2/xml_create.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaI6MbnCvr7cN8iA3jrNOrA_sySo4pa5I&callback=initMap">
    </script>

		<!---------- Content ---------->
	</body>
</html>
