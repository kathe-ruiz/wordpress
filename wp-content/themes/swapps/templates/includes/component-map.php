<section id="eleven" class="map">
  <div id="map">
    <script>
      function initMap() {
        var location =  new google.maps.LatLng({lat: <?php if (function_exists('sw_options') && sw_options('latitude')): ?><?php echo sw_options('latitude'); ?><?php else: ?>3.3744223<?php endif ?>,lng:<?php if (function_exists('sw_options') && sw_options('longitude')): ?><?php echo sw_options('longitude'); ?><?php else: ?>-76.5434036<?php endif ?>});
        var map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          draggable: false,
          scrollwheel: false,
          zoom: 15
        });

        var contentString = '<div id="content" class="map-info">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            <?php if (function_exists('sw_options') && sw_options('address')): ?>
              '<p class="map-info__text text-secondary"><br><?php echo sw_options('address'); ?><br>'+
            <?php else: ?>
              '<p class="map-info__text text-secondary"><br>Carrera 100 # 5 - 16<br>'+
            <?php endif ?>
            <?php if (function_exists('sw_options') && sw_options('email')): ?>
              '<?php echo sw_options('email'); ?><br>'+
            <?php else: ?>
              'info@misitioweb.com<br>'+
            <?php endif ?>
            <?php $phone = sw_get_phone(); ?>
            <?php if ($phone): ?>
              '<?php echo $phone; ?><br>'+
            <?php else: ?>
              '+57 (350) 316-8388<br>'+
            <?php endif ?>
            <?php if (function_exists('sw_options') && sw_options('city')): ?>
              '<?php echo sw_options('city'); ?>, '+
            <?php endif ?>
            <?php if (function_exists('sw_options') && sw_options('country')): ?>
              '<?php echo sw_options('country'); ?><br>'+
            <?php else: ?>
              'Colombia<br>'+
            <?php endif ?>
            '</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: location,
          map: map,
          title: 'Location',
          <?php if (function_exists('sw_options') && sw_options("map_pin")): ?>
            icon: '<?php echo esc_url(sw_options("map_pin")); ?>'
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
</section>
