<?php
	/* Database connection settings */
// $servername = 'localhost';
// $username = 'root';
// 	$password = '';
// 		$dbname = 'googlemapsapi';
	$servername = '35.209.21.30';
	$username = 'uwvphr7yokngu';
	$password = 'pcBb@1kce122';
	$dbname = 'dbash5arhlnfjk';
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT id, Lat, Longit, youtubeIframe, Address, Artist, TrackTitle, ArtistSpotifyImgSrc FROM locations";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {

			$coordinates2[] = "[".  '"' . $row["youtubeIframe"]. '"' . ", ". $row["Lat"]. ", " . $row["Longit"] . ", " .  '"' . $row["Address"]. '"' . "],";
			 $coordinates[] = "[".  '"' . $row["youtubeIframe"]. '"' . ", ". $row["Lat"]. ", " . $row["Longit"] . ", " .  '"' . $row["Address"]. '"' . ", " .  '"' . $row["Artist"]. '"' . ", " .  '"' . $row["TrackTitle"]. '"' . ", " .  '"' . $row["ArtistSpotifyImgSrc"]. '"' . "],";
		 //  $coordinates[] = "[".  '"' . $row["Content"]. '"' . ", ". $row["Lat"]. ", " . $row["Longit"] . ", " .  '"' . $row["TrackTitle"]. ", ". $row["Address"]. '"' .  "],";
//$coordinates3[] = "[".  '"' . $row["Artist"]. '"' . ", ". $row["TrackTitle"]. ", " . $row["ArtistSpotifyImgSrc"] . ", " .  '"' . $row["Address"]. '"' . "],";
	   //     echo "[".  '"' . $row["Content"]. '"' . ", ". $row["Lat"]. ", " . $row["Longit"] . ", " .  '"' . $row["Address"]. '"' . "],";
	    }
	} else {
	    echo "0 results";
	}

	$lastcount = count($coordinates)-1;
	$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");

//echo $coordinates[$lastcount] ;
	$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<style>
.placeholderLat, .placeholderLatI, .placeholderLong, .placeholderLatI {
    display: none;
}
#contact_form {
    display: none;
}
.artistImg {
    max-height: 50px;
    max-width: 50px !important;
}
.containerD {
    display: none;
}
#spaceEr {
    display: none;
}
    .main {
    font-family: 'Permanent Marker', sans-serif;
    text-align: center;
    font-size: 25px;
   // margin: 10px;
    padding-top: 5px;
    font-weight: 900;
}
#youtubeIframeE {
	position: inherit !important;
	height: 200px !important;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="./Assets/CSS/styles.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <script src="https://api.mqcdn.com/sdk/mapquest-gl-js/v0.4.0/mapquest-gl.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-gl-js/v0.4.0/mapquest-gl.css" />
    <script data-ad-client="ca-pub-2035096466523218" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <title>Location Song</title>

    <!-- Global site tag (gtag.js) - Google Ads: 933557001 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-933557001"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'AW-933557001');
    </script>



    <script>
        window.addEventListener('load', function () {
            jQuery('.btn.waves-effect').click(function () {

                gtag('event', 'conversion', { 'send_to': 'AW-933557001/usjwCKzjtu0BEInmk70D' });
            })

        })

    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131395094-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-131395094-2');
    </script>
    <meta name="google-site-verification" content="vUMw67Ia8PtFKUdPaLLG95MtqHeW0oV6QzRDJgcGyLw" />

    <div class="cookie-container2">
<div style="" class="home-20-pop">
        <a id="butX" href="#" onclick="myFuncPopClose()"class="link-2">X</a>
        <div class="div-block-35">
<iframe id="vidId" width="787" height="443" src="https://www.youtube.com/embed/bLFGbuA957E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<div class="button center-align">
<button onclick="myFunctionPopVideoSelector()" class="btn waves-effect waves-light" id="submit2" type="button" name="action">
switch video!
</button>
</div>
</div>
</div>

     </div>



</head>



 <body onload="initialize()">
		<?php
			/* Database connection settings */
	//	$servername = 'localhost';
	//	$username = 'root';
	//		$password = '';
		//	$dbname = 'googlemapsapi';


	//		$servername = '35.209.21.30';
	//		$username = 'uwvphr7yokngu';
	//		$password = 'I)*ex1&i3%15';
	//		$dbname = 'dbash5arhlnfjk';

	$servername = '35.209.21.30';
	$username = 'uwvphr7yokngu';
	$password = 'pcBb@1kce122';
	$dbname = 'dbash5arhlnfjk';
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT id, Lat, Longit, youtubeIframe, Address FROM locations";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {

						$coordinates[] = "[".  '"' . $row["youtubeIframe"]. '"' . ", ". $row["Lat"]. ", " . $row["Longit"] . ", " .  '"' . $row["Address"]. '"' . "],";
			   //     echo "[".  '"' . $row["Content"]. '"' . ", ". $row["Lat"]. ", " . $row["Longit"] . ", " .  '"' . $row["Address"]. '"' . "],";
			    }
			} else {
			    echo "0 results";
			}

			$lastcount = count($coordinates)-1;
			$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");

		//echo $coordinates[$lastcount] ;
			$conn->close();

		?>
		<script type="text/javascript">

		var locations = [
			<?php
			$i = 1;
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

		  function initialize() {
onPageLoad();
		    var myOptions = {
		     // center: new google.maps.LatLng(37.4232, -122.0853),
		      zoom: 8,
		     // mapTypeId: google.maps.MapTypeId.ROADMAP

		    };
		    var map = new google.maps.Map(document.getElementById("googleMap"),
		        myOptions);

		    setMarkers(map,locations)

		  }



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
		 </head>

		 <div id="contact_form">
		    <form action="index.php" method="post">
		    Lat: <input id="lat" type="text" name="Lat">
		    longit: <input id="longit" type="text" name="Longit">
		    address: <input id="address" type="text" name="Address">
		    Artist: <input id="artistA" type="text" name="Artist">
		    TrackTitle: <input id="trackTitleA"  type="text" name="TrackTitle">
		    ArtistSpotifyImgSrc: <input id="artistSpotifyImgSrc" type="text" name="ArtistSpotifyImgSrc">
		    youtubeIframe:<input id="youtubeIframe" type="text" name="youtubeIframe">
		    <input id="dataS" type="submit" name="submit" placeholder="submit">
		    </form>
		    </div>
		 <?php
		 //$servername = "35.209.21.30";
		 //$username = "uutagzeoh70gz";
		 //$password = "rybjbarodpyed";
		 //$dbname = "dbtwgjwyuxbgce";


		 //define("DB_SERVER", "35.209.21.30");
		 //define("DB_USER", "uutagzeoh70gz");
		 //define("DB_PASSWORD", "pcBb@1kce122");
		 //define("DB_DATABASE", "dbtwgjwyuxbgce");
		 	if(isset($_POST['submit'])){
		 $Lat = $_POST['Lat'];
		 $Longit = $_POST['Longit'];
		 $Address = $_POST['Address'];
		 $Artist = $_POST['Artist'];
		 $TrackTitle = $_POST['TrackTitle'];
		 $ArtistSpotifyImgSrc = $_POST['ArtistSpotifyImgSrc'];
        
         $youtubeIframe = $_POST['youtubeIframe'];

		 $host = "35.209.21.30";
		 $db_name = "dbash5arhlnfjk"; // Database name
		 $username = "uwvphr7yokngu"; // your database username
		 $password = "pcBb@1kce122"; // Your password
		 $conn;

		 try {
		  $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
		  // set the PDO error mode to exception
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  //$sql = "INSERT INTO locations (Lat, Longit)
		  //VALUES ('John', 'Doe')";
		  $sql = "INSERT INTO locations (lat, longit, address, artist, tracktitle, artistspotifyimgsrc, youtubeIframe)
		  VALUES('$Lat', '$Longit', '$Address', '$Artist', '$TrackTitle', '$ArtistSpotifyImgSrc', '$youtubeIframe')";

		  // use exec() because no results are returned
		  $conn->exec($sql);
		  echo "New record created successfully";
		 } catch(PDOException $e) {
		  echo $sql . "<br>" . $e->getMessage();
		 }

		 $conn = null;

		 }
		 ?>



		 </body>
		  </html>





		  </script>


        <div id="spaceEr" class="row info valign-wrapper"></div>
<div class="containerD">
      <div class="container">

          <div id="tokenSection" class="row">
            <!--
              <div class="col">
                  <p class="welcomeText">This is a javascript app that shows how to use the Spotify API to control the playback
                      of music (playlist or albums) on any of your devices connected to your spotify account.</p>
                  <p class="welcomeText">To use this app you need a Spotify client ID and client secret. You get these by
                      creating an app in the Spotify developers dashboard here
                      <a href="https://developer.spotify.com/dashboard/applications" target="_blank">https://developer.spotify.com/dashboard/applications</a>
                       and add https://makeratplay.github.io/SpotifyWebAPI/ in the "Redirect URIs" settings field.
                  </p>
                  <p  class="welcomeText">
                      This app demostrates how the use the following APIs:
                      <ul>
                          <li>https://accounts.spotify.com/authorize </li>
                          <li>https://accounts.spotify.com/api/token </li>

                          <li>https://api.spotify.com/v1/me/playlists </li>
                          <li>https://api.spotify.com/v1/me/player/devices </li>
                          <li>https://api.spotify.com/v1/me/player/play </li>
                          <li>https://api.spotify.com/v1/me/player/pause </li>
                          <li>https://api.spotify.com/v1/me/player/next </li>
                          <li>https://api.spotify.com/v1/me/player/previous </li>
                          <li>https://api.spotify.com/v1/me/player </li>
                          <li>https://api.spotify.com/v1/playlists/{{PlaylistId}}/tracks </li>
                          <li>https://api.spotify.com/v1/me/player/currently-playing </li>
                          <li>https://api.spotify.com/v1/me/player/shuffle </li>
                      </ul>
                  </p>

              </div>
            -->
              <div class="col">
                  <div class="mb-3">
                      <label for="clientId" class="form-label">Client ID</label>
                      <input  value="f87a3ef2bbc64e80a6b2d906705de8f6" type="text" class="form-control" id="clientId" placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="clientSecret" class="form-label">Client Secret</label>
                      <input  value="c76efe700272417aa02dbb2ee12ee1f1" type="text" class="form-control" id="clientSecret" placeholder="">
                  </div>
                  <input class="btn btn-primary btn-lg" type="button" onclick="requestAuthorization()" value="Request Authorization"><br/>
              </div>
                </div>

                <div id="deviceSection" class="row">
<input class="btn btn-primary btn-sm mt-3" type="button" onclick="resolveAfter2Seconds()" value="run all apis and embed video">

        <input class="btn btn-primary btn-sm mt-3" type="button" onclick="artistGetter1()" value="wiki get artist name">
<!--            <input class="btn btn-primary btn-sm mt-3" type="button" onclick="artistGetter2()" value="wiki"> -->
<input class="btn btn-primary btn-sm mt-3" type="button" onclick="refreshDevicesss()" value="spotify retrieve name and id">
<!-- <input class="btn btn-primary btn-sm mt-3" type="button" onclick="myFunctionChange()" value="log input field and api url"> -->
<input class="btn btn-primary btn-sm mt-3" type="button" onclick="refreshTopTracks()" value="spotify show top track">
<input class="btn btn-primary btn-sm mt-3" type="button" onclick="youtubeVid1()" value="google get videoID">
<input class="btn btn-primary btn-sm mt-3" type="button" onclick="youtubeVid2()" value="embed youtube video">

            <label value="name">wiki artist name
          <div id="myData6xxx"></div>
          <div class="col">
      <!--   <input value="pitbull" id="inputART"> -->

            <label value="name">spotify artist name
              <div id="myData2"></div>

              <label value="id">artist spotify id
                <div id="myData"></div>
                <label value="id">top track
                  <div id="myData3xxx"></div>
                  <label value="id">google api youtube videoid
                    <div id="myData4"></div>
                <!--       <iframe id="myData5" width="1261" height="719" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
--></div></div>
</div></div></div></div>
    <h5 class="main">Location Entertainment</h5>
 <h5 class="main">My location song.com-  A free quick "what to do?"</h5>
 <h5 class="main">-enter address for free music player</h5>
   <div class="button center-align">
 <button onclick="myFunctionPop()" class="btn waves-effect waves-light" id="submit2" type="button" name="action">
    how to!
 </button>
</div>
    <div class="container">


      <!-- Address inputs and button -->
          <div id="addressform" class="row">
              <h5 style="color:white">Enter Your Address To Start</h5>
              <div class="input-field col s3">
                  <input placeholder="123 Main Street" id="street" type="text" class="validate">
                  <label class="active" for="street">Address</label>
              </div>
              <div class="input-field col s3">
                  <input placeholder="Irvine" id="city" type="text" class="validate">
                  <label class="active" for="city">City</label>
              </div>
              <div class="input-field col s3">
                  <input placeholder="california" value="california" id="state" type="text" class="validate">
                  <label class="active" for="state">State</label>
              </div>
              <div class="input-field col s3">
                  <input placeholder="92618" id="zip" type="text" class="validate">
                  <label class="active" for="zip">Zip Code</label>
              </div>
          </div>
          <div class="button center-align">
              <button onclick="resolveAfter2Seconds()" class="btn waves-effect waves-light" id="submit" type="button" name="action">
                  <i class="material-icons right">audiotrack</i>Submit
              </button>

        <div class="button center-align">
            <button id="authO" onclick="requestAuthorization()"  class="btn waves-effect waves-light"  type="button">
                <i class="material-icons right">audiotrack</i>authorize
            </button>

        </div>
<!--
<a id="amazonlink"><img src="./Assets/Images/amazon.png" alt="Amazon Button"
                        style=" width:153px;height:40px;"></a>
-->
        </div>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Look Below As We Select A Song For this Location.. Press Love It To Save It For Next Time, Change It to select A New One</p>
            </div>

        </div>
        <div class="button center-align">
            <button class="btn waves-effect waves-light" id="current" type="button" name="action">
                <i class="material-icons right">audiotrack</i>Current Location
            </button>
        </div>

        <div id="googleMap" class="col s12 iframe-container" style="width:100%;height:400px;"> <iframe id="wavesframe" width="300" height="400"></iframe></div>

        <!-- Song info + picture -->
        <!-- <div class="row">
        <div class="col s12"> -->
        <!-- <div class="col s12 iframe-container"  >



           </div>
        -->
    <!--       <iframe id="myData5" width="100%" height="0" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
-->
        <div class="center-align" id="displayDiv">
            <p class="placeholder">Your Address</p>
              <p class="placeholderLat">Latitude:</p>
                <p class="placeholderLatI"></p>
                <p class="placeholderLong">Longitude:</p>
                  <input class="placeholderLongI"></input>




        </div>

        <div class="button center-align">
            <a href="https://orderfood.google.com/"
               class="btn waves-effect waves-light" id="orderfood" type="button" name="action">
                <i class="material-icons right">audiotrack</i>Order Food

            </a>
        </div>

        <div class="button center-align">
            <a href="https://gingolow.com/"
               class="btn waves-effect waves-light" id="music" type="button" name="action">
                <i class="material-icons right">audiotrack</i>Play With Sounds

            </a>
        </div><!--
        <div class="button center-align">
            <a href="https://sites.google.com/view/mylocationsongdownloads/home"
               class="btn waves-effect waves-light" id="downloads" type="button" name="action">
                <i class="material-icons right">audiotrack</i>Free Downloads

            </a>
        </div>
-->
<!--
        <div class="button center-align">
            <a href="/messanger/messanger.html"
               class="btn waves-effect waves-light" id="message" type="button" name="action">
                <i class="material-icons right">audiotrack</i>Messanger

            </a>
        </div>
-->
        <div class="button center-align">
            <button id="flip4" class="btn waves-effect waves-light" id="Games" type="button" name="action">
                <i class="material-icons right">audiotrack</i>I
                Open Games
            </button>
        </div>
        <div class="row info valign-wrapper" id="panel4">


            <div class="col s5  left-align" id="game-img">
                <a href="https://come2america.github.io/unit-4-game/">Play Game</a>
                <br />
                <img src="./Assets/Images/Screenshot_2021-04-08 crystalgame.png">
                <h5 class="song-info">Title: <span id="title3">Crystal Game</span></h5>


                <a href="https://come2america.github.io/GifTastic/">Play Game</a>
                <br />
                <img src="./Assets/Images/gifimage.jpg">
                <h5 class="song-info">Title: <span id="title3">GifTastic</span></h5>



            </div>
            <br />
            <div class="col s5 center-align " id="game-img">
                <a href="https://come2america.github.io/wordguessgame/">Play Game</a>
                <br />
                <img src="./Assets/Images/wordimage.jpg">
                <h5 class="song-info">Title: <span id="title3">Word Guess Game</span></h5>

                <a href="https://come2america.github.io/TriviaGame/">Play Game</a>
                <br />
                <img src="./Assets/Images/triviaimage.jpg">
                <h5 class="song-info">Title: <span id="title3">Mj Trivia Game</span></h5>


            </div>



        </div>
        <!-- </div>
        </div>  -->
        <div id="hideCont">
        <h5 style="color:black"> Your Location Song </h5>
                <div class="button center-align">
                    <button class="btn waves-effect waves-light" id="loveit" type="button" name="action"><i class="material-icons right">audiotrack</i>I
                        Save To Address
                    </button>

                    <button onclick="resolveAfter2Seconds()" class="btn waves-effect waves-light" id="hateitY" type="button" name="action"><i class="material-icons right">audiotrack</i>I
                        Change it
                    </button>

                </div>
              </div>
                 <!--      <input class="btn btn-primary btn-sm mt-3" type="button" onclick="resolveAfter2Seconds()" value="run all apis and embed video">

                        <input class="btn btn-primary btn-sm mt-3" type="button" onclick="artistGetter1()" value="wiki get artist name">

                <input class="btn btn-primary btn-sm mt-3" type="button" onclick="refreshDevicesss()" value="spotify retrieve name and id">

                <input class="btn btn-primary btn-sm mt-3" type="button" onclick="refreshTopTracks()" value="spotify show top track">
                <input class="btn btn-primary btn-sm mt-3" type="button" onclick="youtubeVid1()" value="google get videoID">
                <input class="btn btn-primary btn-sm mt-3" type="button" onclick="youtubeVid2()" value="embed youtube video"> -->
                <div id="musicInfo" class="row info valign-wrapper">

                    <div class="col s6  image" id="linkhereQ">
      <img id="artImg" src ="">
                    </div>

                    <div class="col s6">
                        <h5 class="song-info">Title: <span id="myData3" ></span></h5>
                        <h5 >Artist: <span id="myData6"></span></h5>

    <!--  <a href="mylocationsong.com?at=1000lc66" target="_blank"><img src="http://www.niftybuttons.com/itunes/itunesbutton1.png" alt="iTunes Button (via NiftyButtons.com)"></a>
       <a id="buylink" style="display:inline-block;overflow:hidden;background:url(https://tools.applemusic.com/en-us/badge-lrg.svg?releaseDate=2001-04-02&kind=song&bubble=itunes) no-repeat;width:153px;height:40px;"></a>
        -->           <a id="amazonlink"><img src="./Assets/Images/amazon.png" alt="Amazon Button"
                        style=" width:153px;height:40px;"></a>


            </div>
        </div>
        <!-- Youtube  -->
        <div class="row">

            <div class="col s12">
                <div class="youtube iframe-container">
           <!--     <iframe id="myData5" width="100%" height="0" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 -->
                    <iframe id="myData5" width="550" height="315" src=""
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>

        </div>




        <footer id="share-buttons">

            <!-- Buffer -->
            <a href="https://bufferapp.com/add?url=https://mylocationsong.com/&amp;text=Simple Share Buttons" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/buffer.png" alt="Buffer" />
            </a>

            <!-- Digg -->
            <a href="https://www.digg.com/submit?url=https://mylocationson.com/" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" />
            </a>

            <!-- Email -->
            <a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://mylocationsong.com/">
                <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer.php?u=https://mylocationsong.com/" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
            </a>


            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://mylocationsong.com/" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
            </a>




            <!-- Print -->
            <a href="javascript:;" onclick="window.print()">
                <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
            </a>

            <!-- Reddit -->
            <a href="https://reddit.com/submit?url=https://mylocationsong.com/&amp;title=Simple Share Buttons" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
            </a>

            <!-- StumbleUpon-->
            <a href="https://www.stumbleupon.com/submit?url=https://mylocationsong.com/&amp;title=Simple Share Buttons"
               target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/stumbleupon.png" alt="StumbleUpon" />
            </a>

            <!-- Tumblr-->
            <a href="https://www.tumblr.com/share/link?url=https://mylocationsong.com/&amp;title=Simple Share Buttons"
               target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com/share?url=https://mylocationsong.com/&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons"
               target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
            </a>

            <!-- VK -->
            <a href="https://vkontakte.ru/share.php?url=https://mylocationsong.com/" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" />
            </a>

            <!-- Yummly -->
            <a href="https://www.yummly.com/urb/verify?url=https://mylocationsong.com/&amp;title=Simple Share Buttons"
               target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/yummly.png" alt="Yummly" />
            </a>
            <br/>
            <a href="https://come2america.github.io/Bootstrap-Portfolio/">&copy; Yusuf Serunjogi 2021</a>
            <script type='text/javascript'>var _merchantSettings = _merchantSettings || []; (function () { var autolink = document.createElement('script'); autolink.type = 'text/javascript'; autolink.async = true; autolink.src = ('https:' == document.location.protocol) ? 'https://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js' : 'http://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(autolink, s); })();</script>
            <div class="fb-like"
                 data-share="true"
                 data-width="450"
                 data-show-faces="true">
            </div>
        </footer>
    </div> <!-- container div-->



    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="Assets/JavaScript/app.js"></script> -->

    <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
    <script src="https://apis.google.com/js/api.js" type="text/javascript"></script>
    <script src='https://www.youtube.com/iframe_api' type="text/javascript"></script>
    <script>

        var config = {
            apiKey: "AIzaSyDIn55RwHEEzeZ3UVwGxMG3V9LVWzcjZeE",
            authDomain: "songcity-1544767995840.firebaseapp.com",
            databaseURL: "https://songcity-1544767995840.firebaseio.com",
            projectId: "songcity-1544767995840",
            storageBucket: "songcity-1544767995840.appspot.com",
            messagingSenderId: "821348327302"
        };
        firebase.initializeApp(config);

    </script>
    <!-- <script src="Assets/JavaScript/app.js"></script> -->
    <script src="Assets/JavaScript/app2.js"></script>
      <script src="Assets/JavaScript/appnew.js"></script>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.1/mapquest.js"></script>
    <script src="https://resources.amazonwebapps.com/v1/latest/Amazon-Web-App-API.min.js" type="text/javascript"></script>
    <script src="https://resources.amazonwebapps.com/v1/latest/Amazon-Web-App-API-tester.min.js" type="text/javascript"></script>
  <!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRUz9YQNs31lhb7Gl0GERKZ9Quoa5Jewc&callback=myMap"></script> -->
		<script type="text/javascript"
  src=
"https://maps.googleapis.com/maps/api/js?key=AIzaSyCRUz9YQNs31lhb7Gl0GERKZ9Quoa5Jewc&sensor=false&libraries=places">
</script>
		<?php include 'Assets/JavaScript/app2.php';
		?>
		<?php include 'Assets/JavaScript/map.php';
		?>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '280456222670015',
                xfbml: true,
                version: 'v3.2'
            });
            FB.AppEvents.logPageView();
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        $(document).ready(function () {
            $("#flip4").click(function () {
                $("#panel4").slideToggle("slow");
            });
        });
    </script>
    <script data-ad-client="ca-pub-2035096466523218" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</body>

</html>
<script>
 $(document).ready(function() {
$('#loveit').click(
function() {
document.getElementById("dataS").click();
}
);

});
</script>