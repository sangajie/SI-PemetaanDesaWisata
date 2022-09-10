
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Leaflet.GestureHandling Example</title>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    
    <!-- Leaflet Gesture Handling -->
    <link rel="stylesheet" href="https://elmarquis.github.io/Leaflet.GestureHandling/dist/leaflet-gesture-handling.css" type="text/css">
<script src="https://elmarquis.github.io/Leaflet.GestureHandling/dist/leaflet-gesture-handling.js"></script>

    <style>
        html, body {
            padding:0;
            margin:0;
        }
        body {
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background-color: #fff;
            color: #222;
        }
        .content {
            padding:20px;
        }
        header, .arrows {
            text-align: center;
        }

        #map {
            width:100%;
            height:600px;
        }
    </style>
    
  </head>

  <body>
    <header>
        <h1>Leaflet.GestureHandling</h1>
    </header>
    <div class="content">
        <p>Try scrolling down the page.</p>
        <p>Normally you'd get to the map then find the map starts zooming or panning.</p>
        <p>If there's nothing outside the map to get a grip on you could find yourself trapped in the map, unable to scroll the page up or down.</p>
        <div class="arrows">
            <br>&#8675;<br><br>&#8675;<br><br>&#8675;<br><br>&#8675;<br><br>&#8675;<br><br>&#8675;<br><br>
        </div>
    </div>
    <div id="map"></div>
    <div class="content">
        <p>But Leaflet.GestureHandling prevented that from happening.</p>
        <b>On Desktop</b>
        <ul>
            <li>The map ignores the mouse scroll wheel.</li>
            <li>The user is prompted to use ctrl+scroll to zoom the map.</li>
        </ul>

        <b>On Mobile/Touch enabled devices</b>
        <ul>
            <li>The map ignores single fingered dragging. </li>
            <li>The user is prompted to use two fingers to pan the map.</li>
        </ul>

        <p>It brings the basic functionality of <a href="https://developers.google.com/maps/documentation/javascript/examples/interaction-cooperative">Google Maps Gesture Handling</a> into Leaflet.</p>
    </div>
    <hr/>
    <div class="content">
        <div class="arrows">
            <p>
                <a href="https://github.com/elmarquis/Leaflet.GestureHandling/">View this project on Github</a>
            </p>
            <br/>&#8673;<br><br>&#8673;<br><br>&#8673;<br><br>&#8673;<br><br>&#8673;<br><br>&#8673;<br><br>
        </div>
    </div>

    </ul>
  </body>

  <script>
      var map = L.map("map", {
        center: [-25.2702, 134.2798],
        zoom: 3,
        gestureHandling: true
    });

    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    //Add markers
   var marker = new L.marker([-25.2702, 134.2798])
				.bindPopup("Example Popup")
				.addTo(map);

  </script>

 
</html>