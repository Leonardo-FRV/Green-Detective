
        function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
          //  alert("Latitude : " + latitude + " Longitude: " + longitude);
         }

         function errorHandler(err) {
            if(err.code == 1) {
               alert("Error: Access is denied!");
            } else if( err.code == 2) {
               alert("Error: Position is unavailable!");
            }
         }
			
         function getLocation() {

            if(navigator.geolocation) {
               
               // timeout at 60000 milliseconds (60 seconds)
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition(showLocation, errorHandler, options);
            } else {
               alert("Sorry, browser does not support geolocation!");
            }
         }

         function pegaImg(){
          getLocation();
               navigator.mediaDevices.getUserMedia({video: true})
           .then(gotMedia)
           .catch(error => console.error('getUserMedia() error:', error));

         }

      
         function gotMedia(mediaStream) {

           const mediaStreamTrack = mediaStream.getVideoTracks()[0];
           const imageCapture = new ImageCapture(mediaStreamTrack);
           console.log(imageCapture);
         }


          var player = document.getElementById('player');

          var handleSuccess = function(stream) {
            player.srcObject = stream;
          };



         function getVideo(){
            navigator.mediaDevices.getUserMedia({video: true})
            .then(handleSuccess);
         }
