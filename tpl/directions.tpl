<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <title>Google Maps Driving Directions</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <script src="http://maps.google.com/maps?file=api&v=2.x&key={$apicode}" type="text/javascript"></script>
    <script type="text/javascript"> 
	// Create a directions object and register a map and DIV to hold the 
    // resulting computed directions

	
    var map;
    var directionsPanel;
    var directions;

	{if $type == 2}{literal}
    function initialize() {
      map = new GMap2(document.getElementById("map_canvas"));
      //map.setCenter(new GLatLng(37.0902, -95.7129), 15);
      directionsPanel = document.getElementById("route");
      directions = new GDirections(map, directionsPanel);
      directions.load({/literal}"{$start} to {$destination}"{literal});
    }
	{/literal}
	
	{else}
	
	{literal}
	function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 13);
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress({/literal}{$start}{literal}) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 13);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address);
            }
          }
        );
      }
    }
	{/literal}
	
	{/if}
    </script>
  </head>

  <body onload="initialize()">
  <center>
  <br />
  <div style="width:80%; text-align:center;">
  	<div id="route" style="text-align: left; width: 30%; height:480px; float:left; margin-right:10px; font-size:14px;"></div>
    <div id="map_canvas" style="width: 55%; height: 480px; float:left; border: 1px solid black;"></div>
    <br/>
	
  </div>
  </center>
  </body>
</html>
