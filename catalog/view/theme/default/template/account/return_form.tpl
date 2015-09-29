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

    <div class="panel panel-default" style="border-radius: 0;">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-warranty" class="form-horizontal">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab" style="color: #000;"><?php echo $tab_general; ?></a></li>
            <li><a href="#tab-return-items" data-toggle="tab" style="color: #000;"><?php echo $tab_return_items; ?></a></li>
          </ul>
          <div class="tab-content">
          <div class="tab-pane active" id="tab-general">
            <fieldset>
              <legend><?php echo $text_details; ?></legend>
              <input type="text" value="<?php echo $customer_id; ?>" hidden name="customer_id">
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-return_code">
                  <?php echo $entry_return_code ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_code" value="<?php echo $return_code ?>" placeholder="<?php echo $entry_return_code; ?>" id="input-return_code" class="form-control">
                  <?php if ($error_return_code) { ?>
                    <div class="text-danger"><?php echo $error_return_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-date_return">
                  <?php echo $entry_date_return ?>
                </label>
                <div class="col-sm-3">
                  <div class="input-group date">
                    <input type="text" name="date_return" value="<?php echo $date_return ?>" placeholder="<?php echo $entry_date_return; ?>" data-date-format="YYYY-MM-DD" id="input-date_return" class="form-control date">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                    </span>
                  </div>
                  <?php if ($error_date_return) { ?>
                    <div class="text-danger"><?php echo $error_date_return; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-invoice_code">
                  <?php echo $entry_invoice_code ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="invoice_code" value="<?php echo $invoice_code ?>" placeholder="<?php echo $entry_invoice_code; ?>" id="input-invoice_code" class="form-control">
                  <?php if ($error_invoice_code) { ?>
                    <div class="text-danger"><?php echo $error_invoice_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-warranty_code">
                  <?php echo $entry_warranty_code ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="warranty_code" value="<?php echo $warranty_code ?>" placeholder="<?php echo $entry_warranty_code; ?>" id="input-warranty_code" class="form-control">
                  <?php if ($error_warranty_code) { ?>
                    <div class="text-danger"><?php echo $error_warranty_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-fault_description">
                  <?php echo $entry_fault_description; ?>
                </label>
                <div class="col-sm-9">
                  <textarea name="fault_description" id="input-fault_description" cols="30" rows="10" class="form-control" placeholder="<?php echo $entry_fault_description ?>"><?php echo $fault_description; ?></textarea>
                  <?php if ($error_fault_description) { ?>
                    <div class="text-danger"><?php echo $error_fault_description; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-note">
                  <?php echo $entry_note ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="note" value="<?php echo $note ?>" placeholder="<?php echo $entry_note; ?>" id="input-note" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-solution">
                  <?php echo $entry_solution; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="solution" value="<?php echo $solution ?>" placeholder="<?php echo $entry_solution; ?>" id="input-solution" class="form-control">
                  <?php if ($error_solution) { ?>
                    <div class="text-danger"><?php echo $error_solution; ?></div>
                  <?php } ?>
                </div>
              </div>
              <legend><?php echo $text_service_centre_info; ?></legend>  
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-service_centre">
                  <?php echo $entry_service_centre; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="service_centre" value="<?php echo $service_centre ?>" placeholder="<?php echo $entry_service_centre; ?>" id="input-service_centre" class="form-control">
                  <?php if ($error_service_centre) { ?>
                    <div class="text-danger"><?php echo $error_service_centre; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-address">
                  <?php echo $entry_address; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="address" value="<?php echo $address ?>" placeholder="<?php echo $entry_address; ?>" id="input-address" class="form-control">
                  <?php if ($error_address) { ?>
                    <div class="text-danger"><?php echo $error_address; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-city_postcode">
                  <?php echo $entry_city_postcode; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="city_postcode" value="<?php echo $city_postcode ?>" placeholder="<?php echo $entry_city_postcode; ?>" id="input-city_postcode" class="form-control">
                  <?php if ($error_city_postcode) { ?>
                    <div class="text-danger"><?php echo $error_city_postcode; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-contact_person">
                  <?php echo $entry_contact_person; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="contact_person" value="<?php echo $contact_person ?>" placeholder="<?php echo $entry_contact_person; ?>" id="input-contact_person" class="form-control">
                  <?php if ($error_contact_person) { ?>
                    <div class="text-danger"><?php echo $error_contact_person; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-phone">
                  <?php echo $entry_phone; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="phone" value="<?php echo $phone ?>" placeholder="<?php echo $entry_phone; ?>" id="input-phone" class="form-control">
                  <?php if ($error_phone) { ?>
                    <div class="text-danger"><?php echo $error_phone; ?></div>
                  <?php } ?>
                </div>
              </div>
              <legend><?php echo $text_vehicle_info; ?></legend>  
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-vehicle_type">
                  <?php echo $entry_vehicle_type ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="vehicle_type" value="<?php echo $vehicle_type ?>" placeholder="<?php echo $entry_vehicle_type; ?>" id="input-vehicle_type" class="form-control">
                  <?php if ($error_vehicle_type) { ?>
                    <div class="text-danger"><?php echo $error_vehicle_type; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-vehicle_model">
                  <?php echo $entry_vehicle_model ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="vehicle_model" value="<?php echo $vehicle_model ?>" placeholder="<?php echo $entry_vehicle_model; ?>" id="input-vehicle_model" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-ecv">
                  <?php echo $entry_ecv ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="ecv" value="<?php echo $ecv ?>" placeholder="<?php echo $entry_ecv; ?>" id="input-ecv" class="form-control">
                  <?php if ($error_ecv) { ?>
                    <div class="text-danger"><?php echo $error_ecv; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-vehicle_year">
                  <?php echo $entry_vehicle_year ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="vehicle_year" value="<?php echo $vehicle_year ?>" placeholder="<?php echo $entry_vehicle_year; ?>" id="input-vehicle_year" class="form-control">
                </div>
              </div>
              <legend><?php echo $text_product_info; ?></legend>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-model">
                  <?php echo $entry_model ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="model" value="<?php echo $model ?>" placeholder="<?php echo $entry_model; ?>" id="input-model" class="form-control">
                  <?php if ($error_model) { ?>
                    <div class="text-danger"><?php echo $error_model; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-order_code">
                  <?php echo $entry_order_code ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="order_code" value="<?php echo $order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-order_code" class="form-control">
                  <?php if ($error_order_code) { ?>
                    <div class="text-danger"><?php echo $error_order_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-serial_number">
                  <?php echo $entry_serial_number ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="serial_number" value="<?php echo $serial_number ?>" placeholder="<?php echo $entry_serial_number; ?>" id="input-serial_number" class="form-control">
                  <?php if ($error_serial_number) { ?>
                    <div class="text-danger"><?php echo $error_serial_number; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="input-date_installed">
                  <?php echo $entry_date_installed ?>
                </label>
                <div class="col-sm-3">
                  <div class="input-group date">
                    <input type="text" name="date_installed" value="<?php echo $date_installed ?>" placeholder="<?php echo $entry_date_installed; ?>" data-date-format="YYYY-MM-DD" id="input-date_installed" class="form-control date">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                    </span>
                  </div>
                  <?php if ($error_date_installed) { ?>
                    <div class="text-danger"><?php echo $error_date_installed; ?></div>
                  <?php } ?>
                </div>
              </div>
            </fieldset>
          </div>
          <div class="tab-pane" id="tab-return-items">
            <fieldset>
              <legend>#1</legend>
              <div class="form-group">
                <label for="input-return_item_1_name" class="col-sm-3 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_1_name" value="<?php echo $return_item_1_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_1_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_1_order_code" class="col-sm-3 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_1_order_code" value="<?php echo $return_item_1_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_1_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_1_quantity" class="col-sm-3 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_1_quantity" value="<?php echo $return_item_1_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_1_quantity" class="form-control">
                </div>
              </div>

              <legend>#2</legend>
              <div class="form-group">
                <label for="input-return_item_2_name" class="col-sm-3 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_2_name" value="<?php echo $return_item_2_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_2_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_2_order_code" class="col-sm-3 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_2_order_code" value="<?php echo $return_item_2_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_2_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_2_quantity" class="col-sm-3 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_2_quantity" value="<?php echo $return_item_2_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_2_quantity" class="form-control">
                </div>
              </div>

              <legend>#3</legend>
              <div class="form-group">
                <label for="input-return_item_3_name" class="col-sm-3 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_3_name" value="<?php echo $return_item_3_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_3_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_3_order_code" class="col-sm-3 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_3_order_code" value="<?php echo $return_item_3_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_3_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_3_quantity" class="col-sm-3 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_3_quantity" value="<?php echo $return_item_3_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_3_quantity" class="form-control">
                </div>
              </div>

              <legend>#4</legend>
              <div class="form-group">
                <label for="input-return_item_4_name" class="col-sm-3 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_4_name" value="<?php echo $return_item_4_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_4_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_4_order_code" class="col-sm-3 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_4_order_code" value="<?php echo $return_item_4_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_4_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_4_quantity" class="col-sm-3 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_4_quantity" value="<?php echo $return_item_4_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_4_quantity" class="form-control">
                </div>
              </div>

              <legend>#5</legend>
              <div class="form-group">
                <label for="input-return_item_5_name" class="col-sm-3 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_5_name" value="<?php echo $return_item_5_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_5_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_5_order_code" class="col-sm-3 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_5_order_code" value="<?php echo $return_item_5_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_5_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_5_quantity" class="col-sm-3 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-9">
                  <input type="text" name="return_item_5_quantity" value="<?php echo $return_item_5_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_5_quantity" class="form-control">
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
