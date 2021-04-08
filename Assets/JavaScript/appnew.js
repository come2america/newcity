var redirect_uri = "https://mylocationsong.com/"; // change this your value
//var redirect_uri = "http://127.0.0.1:5500/index.html";


var client_id = "";
var client_secret = ""; // In a real app you should not expose your client_secret to the user

var access_token = null;
var refresh_token = null;
var currentPlaylist = "";
var radioButtons = [];

const AUTHORIZE = "https://accounts.spotify.com/authorize"
const TOKEN = "https://accounts.spotify.com/api/token";

const ARTIST = "https://api.spotify.com/v1/search?q=pitbull&type=artist&market=US&limit=1&offset=0";


function  myFunctionChange(){
var g = document.getElementById("inputART").value;
const ARTISTs = "https://api.spotify.com/v1/search?q=" + g + "&type=artist&market=US&limit=1&offset=0";
console.log(g)
console.log(ARTISTs)

}


function onPageLoad(){
 document.getElementById("state").value = "CA";
  document.getElementById("musicInfo").style.display = "none";
    document.getElementById("myData5").style.display = "none";
   document.getElementById("hideCont").style.display = "none";
  /*
  $(function() {
      console.log( "ready!" );
      artistGetter1();
  });
  */

  //requestAuthorization();
    client_id = localStorage.getItem("client_id");
    client_secret = localStorage.getItem("client_secret");
  //  artistGetter1();
    if ( window.location.search.length > 0 ){
        handleRedirect();
    }
    else{
        access_token = localStorage.getItem("access_token");
        if ( access_token == null ){
            // we don't have an access token so present token section
            document.getElementById("tokenSection").style.display = 'block';
            document.getElementById("authO").style.display = 'initial';
        }
        else {
            // we have an access token so present device section
            document.getElementById("deviceSection").style.display = 'block';
              document.getElementById("submit").style.display = 'initial';
        //    refreshDevices();
        //    refreshPlaylists();
        //    currentlyPlaying();
        }
    }
  //  refreshRadioButtons();
}

function handleRedirect(){
    let code = getCode();
    fetchAccessToken( code );
    window.history.pushState("", "", redirect_uri); // remove param from url
}

function getCode(){
    let code = null;
    const queryString = window.location.search;
    if ( queryString.length > 0 ){
        const urlParams = new URLSearchParams(queryString);
        code = urlParams.get('code')
    }
    return code;
}

function requestAuthorization(){
    client_id = document.getElementById("clientId").value;
    client_secret = document.getElementById("clientSecret").value;
    localStorage.setItem("client_id", client_id);
    localStorage.setItem("client_secret", client_secret); // In a real app you should not expose your client_secret to the user

    let url = AUTHORIZE;
    url += "?client_id=" + client_id;
    url += "&response_type=code";
    url += "&redirect_uri=" + encodeURI(redirect_uri);
    url += "&show_dialog=true";
    url += "&scope=user-read-private user-read-email user-modify-playback-state user-read-playback-position user-library-read streaming user-read-playback-state user-read-recently-played playlist-read-private";
    window.location.href = url; // Show Spotify's authorization screen
}

function fetchAccessToken( code ){
    let body = "grant_type=authorization_code";
    body += "&code=" + code;
    body += "&redirect_uri=" + encodeURI(redirect_uri);
    body += "&client_id=" + client_id;
    body += "&client_secret=" + client_secret;
    callAuthorizationApi(body);
}

function refreshAccessToken(){
    refresh_token = localStorage.getItem("refresh_token");
    let body = "grant_type=refresh_token";
    body += "&refresh_token=" + refresh_token;
    body += "&client_id=" + client_id;
    callAuthorizationApi(body);
}

function callAuthorizationApi(body){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", TOKEN, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('Authorization', 'Basic ' + btoa(client_id + ":" + client_secret));
    xhr.send(body);
    xhr.onload = handleAuthorizationResponse;
}

function handleAuthorizationResponse(){
    if ( this.status == 200 ){
        var data = JSON.parse(this.responseText);
        console.log(data);
        var data = JSON.parse(this.responseText);
        if ( data.access_token != undefined ){
            access_token = data.access_token;
            localStorage.setItem("access_token", access_token);
        }
        if ( data.refresh_token  != undefined ){
            refresh_token = data.refresh_token;
            localStorage.setItem("refresh_token", refresh_token);
        }
        onPageLoad();
    }
    else {
        console.log(this.responseText);
        alert(this.responseText);
    }
}

function refreshDevices(){
   callApi( "GET", ARTIST, null, handleDevicesResponse );



}



function refreshDevicesss(){


    var h = document.getElementById("myData6xxx").innerHTML;

  let ARTIST = "https://api.spotify.com/v1/search?q=" + h + "&type=artist&market=US&limit=1&offset=0";
    callApi( "GET", ARTIST, null, handleDevicesResponse );



}



function handleDevicesResponse(){
    if ( this.status == 200 ){
        var data = JSON.parse(this.responseText);
//console.log(data);
var myJSONNameE = JSON.stringify(data.artists.items[0].images[0].url);
console.log(myJSONNameE);
    var myJSONName = JSON.stringify(data.artists.items[0].name);
str = myJSONNameE.replace(/"/g,"")
    var myJSON = JSON.stringify(data.artists.items[0].uri);

    var obj = JSON.parse(myJSON);
    var objNAme = JSON.parse(myJSONName);

          var sillyString2 = objNAme;
        var sillyString = myJSON.slice(16, -1);
          //   console.log(sillyString2)

              document.getElementById("myData").innerHTML = sillyString;
                 document.getElementById("myData2").innerHTML = sillyString2;
                  document.getElementById("myData6").innerHTML = sillyString2;
                 document.getElementById("artImg").src = str;
          //       console.log(data.tracks[0].name);

    }
    else if ( this.status == 401 ){
        refreshAccessToken()
    }
    else {
        console.log(this.responseText);
        alert(this.responseText);
    }
}

function handleTrackResponse(){
    if ( this.status == 200 ){
        var data = JSON.parse(this.responseText);

    //    console.log(data);
function getRandomInt(max) {
    return Math.floor(Math.random() * max);
  }
  var randOs = getRandomInt(10);
    var myJSONNameTrack = JSON.stringify(data.tracks[ ""+ randOs +"" ].name);
    document.getElementById("myData3").innerHTML = myJSONNameTrack;

          //       console.log(data.tracks[0].name);




    }
    else if ( this.status == 401 ){
        refreshAccessToken()
    }
    else {
        console.log(this.responseText);
        alert(this.responseText);
    }
}





function refreshTopTracks(){

  var hA = document.getElementById("myData").innerHTML;

  let ARTISTtop = 'https://api.spotify.com/v1/artists/' + hA + '/top-tracks?market=ES';

    callApi( "GET", ARTISTtop, null, handleTrackResponse );


}



function addDevice(item){
    let node = document.createElement("option");
    node.value = item.id;
    node.innerHTML = item.name;
    document.getElementById("devices").appendChild(node);
}

function callApi(method, url, body, callback){
    let xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);
    xhr.send(body);
    xhr.onload = callback;
}


function transfer(){
    let body = {};
    body.device_ids = [];
    body.device_ids.push(deviceId())
    callApi( "PUT", PLAYER, JSON.stringify(body), handleApiResponse );
}

function handleApiResponse(){
    if ( this.status == 200){
        console.log(this.responseText);
        setTimeout(currentlyPlaying, 2000);
    }
    else if ( this.status == 204 ){
        setTimeout(currentlyPlaying, 2000);
    }
    else if ( this.status == 401 ){
        refreshAccessToken()
    }
    else {
        console.log(this.responseText);
        alert(this.responseText);
    }
}

function deviceId(){
    return document.getElementById("devices").value;
}

function fetchTracks(){
    let playlist_id = document.getElementById("playlists").value;
    if ( playlist_id.length > 0 ){
        url = TRACKS.replace("{{PlaylistId}}", playlist_id);
        callApi( "GET", url, null, handleTracksResponse );
    }
}

function fetchTracksss(){
    let playlist_ids = document.getElementById("inputART").value;

        url = ARTIST.replace("{{ARTISTId}}", playlist_ids);
        callApi( "GET", url, null, handleTracksResponse );

}

function artistGetter1() {

var stateV = document.getElementById("state").value;
console.log(stateV);

var xhr = new XMLHttpRequest();

//var url = "https://en.wikipedia.org/w/api.php?action=query&origin=*&format=json&generator=search&gsrnamespace=0&gsrlimit=5&gsrsearch='New_England_Patriots'";
//var url = "https://en.wikipedia.org/w/api.php?action=query&origin=*&format=json&generator=search&gsrnamespace=0&gsrlimit=100&gsrsearch='Category:Rappers_from_Atlanta'";
var url = "https://en.wikipedia.org/w/api.php?action=query&origin=*&format=json&generator=search&gsrnamespace=0&gsrlimit=100&gsrsearch='Category:Rappers_from_" + stateV + "'";
console.log(url);
// Provide 3 arguments (GET/POST, The URL, Async True/False)
xhr.open('GET', url, true);

// Once request has loaded...
xhr.onload = function() {
  function getRandomInt(max) {
    return Math.floor(Math.random() * max);
  }

  var randO = 7;
  var randOs = getRandomInt(100);
    // Parse the request into JSON
    var data = JSON.parse(this.response);

      let pages = data.query.pages;

var wiki = (pages[Object.keys(pages)[ ""+ randOs +"" ]].title);

 document.getElementById("myData6xxx").innerHTML = wiki;
}
xhr.send();
};




function youtubeVid1() {


  var searchKeyA = document.getElementById("myData6").innerHTML;
  var searchKeyT = document.getElementById("myData3").innerHTML;
  var searchKey = searchKeyA + searchKeyT;



    var apiKey = "AIzaSyB6eT2et-bDuQ2u7rfBBsWkmxjTP--QqXw";

  var queryURL = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyB6eT2et-bDuQ2u7rfBBsWkmxjTP--QqXw&part=snippet&q=Pitbull+Give-Me-Everything&type=video";

    $.ajax({
        //   url: 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyB6eT2et-bDuQ2u7rfBBsWkmxjTP--QqXw&part=snippet&q=Pitbull+Give-Me-Everything&type=video',
           url: 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyB6eT2et-bDuQ2u7rfBBsWkmxjTP--QqXw&part=snippet&q=' + searchKey + '&type=video',

            success: function(data){

              console.log(data)



  var myJSONNameVid = JSON.stringify(data.items[0].id.videoId);
  var objNAmeVid = JSON.parse(myJSONNameVid);
    var sillyString2 = objNAmeVid;

           document.getElementById("myData4").innerHTML = sillyString2;
}
    })


}




function youtubeVid2() {
  var hAId = document.getElementById("myData4").innerHTML;
           document.getElementById("myData5").src = "https://www.youtube.com/embed/" + hAId;
 document.getElementById("myData5").style.height = "605px";

}




function resolveAfter2Seconds() {

/*
  function resolveAfter11Seconds() {
    return new Promise(resolve => {
      setTimeout(() => {

        artistGetter1();

      resolve(10);
    },1000);
      });
  }
*/
function resolveAfter3Seconds() {
  return new Promise(resolve => {
    setTimeout(() => {

       refreshDevicesss();

    resolve(20);
  },1000);
    });
}

function resolveAfter4Seconds() {
  return new Promise(resolve => {
    setTimeout(() => {

       refreshTopTracks();

    resolve(30);
  },1000);
   });
}
function resolveAfter5Seconds() {
  return new Promise(resolve => {
    setTimeout(() => {

      youtubeVid1()

    resolve(40);
  },1000);
   });
}
function resolveAfter6Seconds() {
  return new Promise(resolve => {
    setTimeout(() => {

      youtubeVid1()

    resolve(60);
  },1000);
   });
}
function resolveAfter7Seconds() {
  return new Promise(resolve => {
    setTimeout(() => {

      youtubeVid2()

    resolve(70);
  },1000);
   });
}

function resolveAfter722Seconds() {
  return new Promise(resolve => {
    setTimeout(() => {

      var artistN = document.getElementById("myData6").innerHTML;
      var trackN = document.getElementById("myData3").innerHTML;
      $("#amazonlink").attr({ href: "https://www.amazon.com/gp/search?ie=UTF8&tag=locationsong1-20&linkCode=ur2&linkId=a2760e14a2d286d92bc32fdeae1f4b8d&camp=1789&creative=9325&index=digital-music&keywords=" + artistN + " " + trackN })


    resolve(70);
  },1000);
   });
}
async function asyncCall() {
  document.getElementById("musicInfo").style.display = "flex";
  document.getElementById("myData5").style.display = "block";
    document.getElementById("hideCont").style.display = "block";
 artistGetter1();
  //console.log("hello");
//  const result11 = await resolveAfter11Seconds();
  const result1 = await resolveAfter3Seconds();
  const result2 = await resolveAfter4Seconds();
  const result3 = await resolveAfter5Seconds();
  const result4 = await resolveAfter6Seconds();
  const result5 = await resolveAfter7Seconds();
  const result6 = await resolveAfter722Seconds();

//  console.log(result);
  // expected output: "resolved"
}

asyncCall();
}
$("#submit").click(function() {
    $('html, body').animate({
        scrollTop: $("#linkhereQ").offset().top
    }, 2000);
});
