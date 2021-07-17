<script>
var locations = [
	<?php
	$i = 0;
					while ($i < count($coordinates)) {
						echo $coordinates[$i];
						$i++;
					}
//echo $coordinates[0];

?>

/*
  ['loan 1 sfasf', 37.4232, -122.0853, 'address 1'],
  ['loan 2', 33.923036, 151.259052, 'address 2'],
  ['loan 3', 34.028249, 151.157507, 'address 3'],
  ['loan 4', 33.80010128657071, 151.28747820854187, 'address 4'],
  ['loan 5', 33.950198, 151.259302, 'address 5']
	*/
  ];

  $( document ).ready(function() {


    var myOptions = {
      center: new google.maps.LatLng(37.4232, -122.0853),
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.ROADMAP

    };
    var map = new google.maps.Map(document.getElementById("wavesframe"),
        myOptions);

    setMarkers(map,locations)




});


  function setMarkers(map,locations){

      var marker, i

for (i = 0; i < locations.length; i++)
 {

 var loan = locations[i][0]
 var lat = locations[i][1]
 var long = locations[i][2]
 var add =  locations[i][3]
 var artist =  locations[i][4]
 var trackTitle =  locations[i][5]
 var ArtistSpotifyImgSrc =  locations[i][6]


 latlngset = new google.maps.LatLng(lat, long);

  var marker = new google.maps.Marker({
          map: map, title: loan , position: latlngset
        });
        map.setCenter(marker.getPosition())


      //  var content = "<div>long " + long + "/ "+ "</div>lat " + lat + "<div>Song : " + trackTitle +  '</div>' + "<div> Artist: " + artist + "</div><a href=''></a><img class='artistImg' max-width='50' max-height='50'  src=' " + ArtistSpotifyImgSrc + " '>" + " </br><iframe id='youtubeIframeE' width='50' height='' src='https://www.youtube.com/embed/MBGm4lwjiuA'></iframe>"
  var content = "<div>long " + long + "/ "+ "</div>lat " + lat + "<div>Song : " + trackTitle +  '</div>' + "<div> Artist: " + artist + "</div><a href=''></a><img class='artistImg' max-width='50' max-height='50'  src=' " + ArtistSpotifyImgSrc + " '>" + " </br><iframe id='youtubeIframeE' width='50' height='' src=' " + loan + " '></iframe>"

  var infowindow = new google.maps.InfoWindow()

google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
        return function() {
           infowindow.setContent(content);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow));

  }
  }
	</script>
