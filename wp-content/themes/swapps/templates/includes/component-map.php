<section id="eleven" class="map">
  <div id="map">
    <script>
      function initMap() {
        var location = {lat: 3.3744223, lng: -76.5434036};
        var map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          draggable: false,
          scrollwheel: false,
          zoom: 15
        });

        var contentString = '<div id="content" style="padding: 0 15px">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent" style="font-size: 1.25em">'+
            '<p><br>Carrera 100 # 5 - 16<br>'+
            'info@misitioweb.com<br>'+
            '+57 (350) 316-8388<br>'+
            'Cali, Colombia<br>'+
            '</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var greenMarker = {
          path: 'M44.057,55.052 C39.628,63.017 35.284,69.635 35.101,69.913 L31.938,74.723 C31.619,75.208 31.079,75.500 30.500,75.500 C29.921,75.500 29.380,75.208 29.062,74.723 L25.899,69.913 C25.714,69.632 21.339,62.955 16.943,55.052 C10.501,43.468 7.500,35.691 7.500,30.578 C7.500,17.853 17.818,7.500 30.500,7.500 C43.182,7.500 53.500,17.853 53.500,30.578 C53.500,35.692 50.499,43.469 44.057,55.052 ZM30.500,21.096 C25.369,21.096 21.194,25.285 21.194,30.434 C21.194,35.582 25.369,39.771 30.500,39.771 C35.631,39.771 39.806,35.582 39.806,30.434 C39.806,25.285 35.631,21.096 30.500,21.096 Z',
          fillColor: '#00aa61',
          fillOpacity: 1,
          scale: 0.8,
          strokeWeight: 0,
        };

        var marker = new google.maps.Marker({
          position: location,
          map: map,
          title: 'Location',
          icon: greenMarker
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        google.maps.event.trigger(marker, 'click');
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkyAIZ32b8OJi50ZUxPNx19G_82fecJDY&callback=initMap" async defer></script>
  </div>
</section>