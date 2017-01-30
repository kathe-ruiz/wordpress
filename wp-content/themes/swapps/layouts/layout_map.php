<div id="map">
  <script>
    function initMap() {
      var location =  new google.maps.LatLng({lat:<?php echo $row_item['map']['lat'] ?> ,lng:<?php echo $row_item['map']['lng'] ?> });
      var map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        draggable: false,
        scrollwheel: false,
        zoom: 15
      });

      var contentString = "<?php echo trim(preg_replace('/\s\s+/', ' ', $row_item['marker_description']));?>";
      contentString = '<div id="content" class="map-info"><div id="bodyContent"><br><p class="map-info__text text-secondary">'+contentString+'</p></div></div>';

      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });

      var marker = new google.maps.Marker({
        position: location,
        map: map,
        title: 'Location',
        <?php if ($row_item['marker_image']): ?>
          icon: "<?php echo $row_item['marker_image'] ?>"
        <?php endif ?>
      });
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });

      google.maps.event.trigger(marker, 'click');
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkyAIZ32b8OJi50ZUxPNx19G_82fecJDY&callback=initMap" async defer></script>
</div>
