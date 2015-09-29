<?php echo $header; ?>
<div class="container-fluid">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>">
      <div class="pull-right">
        <button type="submit" form="form-warranty" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save" style="font-size: 18px; color: #fff"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-primary"><i class="fa fa-reply" style="font-size: 18px; color: #fff"></i></a>
      </div>
      <h1 style="margin-top: 10px;"><?php echo $heading_title; ?></h1>
      <?php if ($error_warning) { ?>
      <div class="alert alert-danger"><i style="font-size: 14px;" class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      <?php } ?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-warranty" class="form-horizontal">
          <div class="tab-content">
          <div class="tab-pane active" id="tab-general">
            <fieldset>
              <div class="form-group required">
                <label for="input-warranty_code" class="col-sm-3 control-label"><?php echo $entry_warranty_code; ?></label>
                <div class="col-sm-9">
                  <input type="text" name="warranty_code" value="<?php echo $warranty_code; ?>" placeholder="<?php echo $entry_warranty_code; ?>" id="input-warranty_code" class="form-control" value="<?php echo $warranty_code; ?>" />
                  <?php if ($error_warranty_code) { ?>
                    <div class="text-danger"><?php echo $error_warranty_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-3 control-label" for="input-date_installed"><?php echo $entry_date_installed; ?></label>
                <div class="col-sm-3">
                  <div class="input-group date">
                    <input type="text" name="date_installed" value="<?php echo $date_installed; ?>" placeholder="<?php echo $entry_date_installed; ?>" data-date-format="YYYY-MM-DD" id="input-date_installed" class="form-control" />
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                    </span>
                  </div>
                  <?php if ($error_date_installed) { ?>
                    <div class="text-danger"><?php echo $error_date_installed; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label for="vehicle_type" class="col-sm-3 control-label"><?php echo $entry_vehicle_type ?></label>
                <div class="col-sm-9">
                  <input type="text" name="vehicle_type" value="<?php echo $vehicle_type; ?>" placeholder="<?php echo $entry_vehicle_type; ?>" id="input-vehicle_type" class="form-control">
                <?php if ($error_vehicle_type) { ?>
                  <div class="text-danger"><?php echo $error_vehicle_type; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label for="ecv" class="col-sm-3 control-label"><?php echo $entry_ecv ?></label>
                <div class="col-sm-9"><input type="text" name="ecv" value="<?php echo $ecv; ?>" placeholder="<?php echo $entry_ecv; ?>" id="input-ecv" class="form-control">
                <?php if ($error_ecv) { ?>
                  <div class="text-danger"><?php echo $error_ecv; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label for="vin" class="col-sm-3 control-label"><?php echo $entry_vin ?></label>
                <div class="col-sm-9"><input type="text" name="vin" value="<?php echo $vin; ?>" placeholder="<?php echo $entry_vin; ?>" id="input-vin" class="form-control">
                <?php if ($error_vin) { ?>
                  <div class="text-danger"><?php echo $error_vin; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="compressor_number" class="col-sm-3 control-label"><?php echo $entry_compressor_number ?></label>
                <div class="col-sm-9"><input type="text" name="compressor_number" value="<?php echo $compressor_number; ?>" placeholder="<?php echo $entry_compressor_number; ?>" id="input-compressor_number" class="form-control"></div>
              </div>
              <div class="form-group required">
                <label for="product" class="col-sm-3 control-label"><?php echo $entry_product ?></label>
                <div class="col-sm-9"><input type="text" name="product" value="<?php echo $product; ?>" placeholder="<?php echo $entry_product; ?>" id="input-product" class="form-control">
                <?php if ($error_product) { ?>
                  <div class="text-danger"><?php echo $error_product; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label for="order_code" class="col-sm-3 control-label"><?php echo $entry_order_code ?></label>
                <div class="col-sm-9"><input type="text" name="order_code" value="<?php echo $order_code; ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-order_code" class="form-control">
                <?php if ($error_order_code) { ?>
                  <div class="text-danger"><?php echo $error_order_code; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label for="serial_number" class="col-sm-3 control-label"><?php echo $entry_serial_number ?></label>
                <div class="col-sm-9"><input type="text" name="serial_number" value="<?php echo $serial_number; ?>" placeholder="<?php echo $entry_serial_number; ?>" id="input-serial_number" class="form-control">
                <?php if ($error_serial_number) { ?>
                  <div class="text-danger"><?php echo $error_serial_number; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label for="name" class="col-sm-3 control-label"><?php echo $entry_name ?></label>
                <div class="col-sm-9"><input type="text" name="customer_name" value="<?php echo $customer_name; ?>" placeholder="<?php echo $entry_customer_name; ?>" id="input-name" class="form-control">
                <?php if ($error_customer_name) { ?>
                  <div class="text-danger"><?php echo $error_customer_name; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label for="address" class="col-sm-3 control-label"><?php echo $entry_address ?></label>
                <div class="col-sm-9"><input type="text" name="customer_address" value="<?php echo $customer_address; ?>" placeholder="<?php echo $entry_customer_address; ?>" id="input-address" class="form-control">
                <?php if ($error_customer_address) { ?>
                  <div class="text-danger"><?php echo $error_customer_address; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="country" class="col-sm-3 control-label"><?php echo $entry_country ?></label>
                <div class="col-sm-9"><input type="text" name="customer_country" value="<?php echo $customer_country; ?>" placeholder="<?php echo $entry_customer_country; ?>" id="input-country" class="form-control">
                <?php if ($error_customer_country) { ?>
                  <div class="text-danger"><?php echo $error_customer_country; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label"><?php echo $entry_phone ?></label>
                <div class="col-sm-9"><input type="text" name="customer_phone" value="<?php echo $customer_phone; ?>" placeholder="<?php echo $entry_customer_phone; ?>" id="input-phone" class="form-control">
                <?php if ($error_customer_phone) { ?>
                  <div class="text-danger"><?php echo $error_customer_phone; ?></div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label"><?php echo $entry_email ?></label>
                <div class="col-sm-9"><input type="text" name="customer_email" value="<?php echo $customer_email; ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control">
                <?php if ($error_customer_email) { ?>
                  <div class="text-danger"><?php echo $error_customer_email; ?></div>
                <?php } ?>
                </div>
              </div>
            </fieldset>
          </div>
        </form>
      </div>
    </div>
      </div>
    </div>
    <?php echo $column_right; ?></div>
</div>
  <script type="text/javascript">
$('.date').datetimepicker({
  pickTime: false
});
</script>
<?php echo $footer; ?>
