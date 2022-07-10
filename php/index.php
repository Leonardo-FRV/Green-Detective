<!DOCTYPE html>
<html lang="en"  ng-app="demoapp">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.:: Gastreador::.</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">

  </head>

  
    
<div style="position: relative; width: 100%; height: 0; padding-top: 177.7778%;
 padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
  <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFF9Hvhi3A&#x2F;watch?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
  </iframe>
</div>
<a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFF9Hvhi3A&#x2F;watch?utm_content=DAFF9Hvhi3A&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link" target="_blank" rel="noopener">

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Plugin JavaScript -->
    <script src="js/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>
    <script src="js/geo.js"></script>

  

<script src="maps/js/angular.min.js"></script>
    <script src="maps/js/leaflet.js"></script>
    <script src="maps/js/angular-leaflet-directive.js"></script>
    <link rel="stylesheet" href="maps/css/leaflet.css" />
    <script>



        var app = angular.module("demoapp", ["leaflet-directive"]);
        app.controller('MarkersEventsAddController', [ '$scope','$http', function($scope,$http) {

            angular.extend($scope, {
                sp: {
                    lat: -23.57555,
                    lng: -46.63755,
                    zoom: 8
                },
                events: {}
            });

            $scope.markers = new Array();


            $scope.enviar_denuncia = function(){
              alert("vai enviar sua denuncia");
              alert("Latitude : " + $scope.latitude + " Longitude: " + $scope.longitude);
              $http.post("https://chatsocket-2626b.firebaseio.com/denuncias.json",{"data":1,"Latitude":  $scope.latitude , "Longitude": $scope.longitude})
              .then(function(response) {
                      // success
                      alert(response);
                      console.log(response);
              }, 
              function(response) { // optional
                      // failed
                      alert(response);
                      console.log(response);
              });

            }
            

            /*$scope.$on("leafletDirectiveMap.click", function(event, args){
                var leafEvent = args.leafletEvent;

                $scope.markers.push({
                    lat: leafEvent.latlng.lat,
                    lng: leafEvent.latlng.lng,
                    message: "My Added Marker"
                });
            });*/


        function showLocationS(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            $scope.latitude = position.coords.latitude;
            $scope.longitude = position.coords.longitude;
           // alert("Latitude : " + latitude + " Longitude: " + longitude);
            $scope.sp = {
                    lat: $scope.latitude,
                    lng: $scope.longitude,
                    zoom: 10
                };
            $scope.markers.push({
                    lat: latitude,
                    lng: longitude,
                    message: "Clica ai"
                });
         }

        
      
         function getLocationS() {

            if(navigator.geolocation) {
               
               // timeout at 60000 milliseconds (60 seconds)
               var options = {};
               navigator.geolocation.getCurrentPosition(showLocationS, errorHandler, options);
            } else {
               alert("Desculpe seu navegador nao deixa usar a localizacao!");
            }
         }

          $('#exampleModal').on('shown.bs.modal', function () {
            getLocationS();
          });

        } ]);
    </script>



  


</html>
