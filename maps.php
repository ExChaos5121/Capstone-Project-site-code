
<html>
<head>
    <?php include 'database.php';?>
	<title> Maps </title>
    <link rel="stylesheet" href="stylesheet.css">
	<script>
       
        
        var map;
        var InforObj = [];
        var centerCords = {
            lat: 37.0902,
            lng: -95.7129
        };
        var tempArray = <?php echo json_encode($result); ?>;
        window.onload = function () {
            initMap();
        };

        function addMarkerInfo() {
            for (var i = 0; i < <?= count($result)?>; i++) {
                var contentString = '<div id="content">' + '<div id="siteNotice">' + "</div>" + '<h1 id="firstHeading" class="firstHeading">' + tempArray[i][2] + '</h1>' +
                     '<div id="bodyContent">' + tempArray[i][3] + '<p>Attribution: ' + tempArray[i][4] + '<p>Date: ' 
                     + tempArray[i][5] +'<br>' + '<img src="/Bridge Images/'+ tempArray[i][2] + '.png" alt="Road Image" style="vertical-align:middle;margin:15px 0px">' +
                     "</div>" + "</div>";
                
                var v1 = parseFloat(tempArray[i][0]);
                var v2 = parseFloat(tempArray[i][1]);
                var markerCords = { lat: v1, lng: v2 };
                
                const marker = new google.maps.Marker({
                    position: markerCords,
                    map: map
                });

                const infowindow = new google.maps.InfoWindow({
                    content: contentString,

                    
                });

                marker.addListener('click', function () {
                    closeOtherInfo();
                    infowindow.open(marker.get('map'), marker);
                    InforObj[0] = infowindow;
                });
                // marker.addListener('mouseover', function () {
                //     closeOtherInfo();
                //     infowindow.open(marker.get('map'), marker);
                //     InforObj[0] = infowindow;
                // });
                // marker.addListener('mouseout', function () {
                //     closeOtherInfo();
                //     infowindow.close();
                //     InforObj[0] = infowindow;
                // });
            }
        }

        function closeOtherInfo() {
            if (InforObj.length > 0) {
                
                InforObj[0].set("marker", null);
                
                InforObj[0].close();
                
                InforObj.length = 0;
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: centerCords
            });
            addMarkerInfo();
        }
    </script>
</head>
<body>
	<header>
		<h1>Maps</h1>
		<nav>
			<ul>
				<li><a href="project">Home</a></li>
				<li><a href="about">About</a></li>
				<li><a href="maps">Maps</a></li>
			</ul>
		</nav>
    <form action="#" method="get">
			<label for="search">Search:</label>
			<input type="text" id="search" name="search">
			<button type="submit">Go</button>
		</form>
	</header>


	    
	    <div id="map"></div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF2m0svp07tGLzObVsQFEIMw6EpRh14Hc"></script>
    
</body>
</html>