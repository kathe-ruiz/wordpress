<?php if (is_array($row_item)): ?>
  <?php $event = EM_Events::get($row_item['event']->ID)[0]; ?>
  <?php $location = EM_Locations::get($event->event_id)[0]; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- box events -->
        <div class="event-item event-<?php echo $event->event_id ?>">
          <div class="row">
            <!-- rigth box -->
            <div class="col-xs-12 col-md-3 col-lg-2 featured">
              <div class="wrapper">
                <div class="title">
                  <?php _e('<span>UPCOMMING</span><span>EVENTS</span>') ?>
                </div>
                <div class="link">
                  <a href="<?php echo site_url('events/' . $event->slug); ?>"><?php _e('Click here to Register') ?></a>
                </div>
              </div>
            </div>
            <!-- end rigth box -->
            <!-- left box -->
            <div class="col-xs-12 col-md-9 col-lg-10 pull-right">
              <div class="row ">
                <div class="wrapper">
                  <div class="col-xs-4 col-md-1">
                    <div class="datetime">
                      <?php $date = format_date_array($event->start_date) ?>
                      <?php foreach ($date as $key => $value): ?>
                        <span class="date date-<?php echo $key ?>"><?php echo $value ?></span>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="col-xs-8 col-md-11 vertical-divider">
                    <div class="complete-info">
                      <h2 class="title">
                        <?php echo $event->name ?>
                      </h2>
                      <span class="location-info">
                        <?php $location_array[] = date_format(date_create($event->start_time), 'H:i'); ?>
                        <?php $location_array[] = $location->location_address; ?>
                        <?php $location_array[] = $location->location_town; ?>
                        <?php $location_array[] = $location->location_state; ?>
                        <?php echo implode(', ', array_filter($location_array)) . ' ' . $location->location_postcode; ?>
                      </span>
                      <span class="description">
                        <?php echo $event->post_excerpt ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end left box -->
          </div>
        </div>
        <!-- end box events -->
      </div>
    </div>
  </div>
<?php endif ?>


