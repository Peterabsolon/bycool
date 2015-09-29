<?php echo $header; ?>
<div class="container-fluid">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="row">
    <div id="content" class="col-sm-12"><?php echo $content_top; ?>
      <h1><?php echo $heading_title; ?></h1>
      <div class="well" id="service_centres">
        <ul class="nav nav-tabs" role="tablist">
          <?php foreach($countries as $country) { ?>
            <li role="presentation" id="link-<?php echo $country['country_id']; ?>">
              <a href="#country-<?php echo $country['country_id']; ?>" role="tab" data-toggle="tab">
                <?php print_r($country['country_name']); ?>
              </a>
            </li>
          <?php } ?>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <?php foreach($countries as $country) { ?>
            <div role="tabpanel" class="tab-pane fade" id="country-<?php echo $country['country_id']; ?>">
              <div class="panel-group" id="accordion-<?php echo $country['country_id']; ?>" role="tablist" aria-multiselectable="true">
                <?php foreach($service_centres as $service_centre) {
                  if($service_centre['country_id'] == $country['country_id']) { ?>
                    <div class="panel panel-default" data-city="<?php echo $service_centre['city']; ?>">
                      <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion-<?php echo $country['country_id']; ?>" href="#panel-<?php echo $service_centre['id']; ?>" aria-expanded="false" aria-controls="panel-<?php echo $service_centre['id']; ?>">
                            <?php echo $service_centre['name'] . ' - <span style="text-transform: uppercase;">' . $service_centre['city'] . '</span>'; ?> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                          </a>
                        </h4>
                      </div>
                      <div id="panel-<?php echo $service_centre['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panel-<?php echo $service_centre['id']; ?>">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-sm-6">
                              <strong><?php echo $text_address; ?></strong>: <?php echo $service_centre['address']; ?><br>
                              <strong><?php echo $text_phone; ?></strong>: <?php echo $service_centre['phone']; ?><br>
                              <strong><?php echo $text_fax; ?></strong>: <?php echo $service_centre['fax']; ?><br>
                              <strong><?php echo $text_email; ?></strong>: <a style="width: auto;" href="mailto:<?php echo $service_centre['email']; ?>"><?php echo $service_centre['email']; ?></a><br><br>
                            </div>
                            <div class="col-sm-6">
                              <strong><?php echo $text_opening_hours; ?></strong>: <br><?php echo $service_centre['opening_hours']; ?><br>
                              <strong><?php echo $text_contact_person; ?></strong>: <?php echo $service_centre['contact_person']; ?><br>
                              <strong><?php echo $text_note; ?></strong>: <?php echo $service_centre['note']; ?><br>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      </div>
      <?php echo $content_bottom; ?></div>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#country-189").addClass('in active');
          $("#link-189").addClass('active');
        });
      </script>
</div>
<?php echo $footer; ?>
