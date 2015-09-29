<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-return" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-return" class="form-horizontal">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
            <li><a href="#tab-return-items" data-toggle="tab"><?php echo $text_return_items; ?></a></li>
            <?php if ($return_id) { ?>
            <li><a href="#tab-history" data-toggle="tab"><?php echo $tab_history; ?></a></li>
            <?php } ?>
          </ul>
          <div class="tab-content">
          <div class="tab-pane active" id="tab-general">
            <fieldset>
              <legend><?php echo $text_details; ?></legend>
              <div class="form-group">
                <label for="input-customer" class="col-sm-2 control-label">
                  <?php echo $entry_customer; ?>
                </label>
                <div class="col-sm-10">
                  <select name="customer_id" id="input-customer" class="form-control">
                    <?php foreach ($customers as $customer) { ?>
                      <option value="<?php echo $customer['id'] ?>"><?php echo $customer['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-return_code">
                  <?php echo $entry_return_code ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_code" value="<?php echo $return_code ?>" placeholder="<?php echo $entry_return_code; ?>" id="input-return_code" class="form-control">
                  <?php if ($error_return_code) { ?>
                    <div class="text-danger"><?php echo $error_return_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-date_return">
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
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-invoice_code">
                  <?php echo $entry_invoice_code ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="invoice_code" value="<?php echo $invoice_code ?>" placeholder="<?php echo $entry_invoice_code; ?>" id="input-invoice_code" class="form-control">
                  <?php if ($error_invoice_code) { ?>
                    <div class="text-danger"><?php echo $error_invoice_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-warranty_code">
                  <?php echo $entry_warranty_code ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="warranty_code" value="<?php echo $warranty_code ?>" placeholder="<?php echo $entry_warranty_code; ?>" id="input-warranty_code" class="form-control">
                  <?php if ($error_warranty_code) { ?>
                    <div class="text-danger"><?php echo $error_warranty_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-fault_description">
                  <?php echo $entry_fault_description; ?>
                </label>
                <div class="col-sm-10">
                  <textarea name="fault_description" id="input-fault_description" cols="30" rows="10" class="form-control" placeholder="<?php echo $entry_fault_description ?>"><?php echo $fault_description; ?></textarea>
                  <?php if ($error_fault_description) { ?>
                    <div class="text-danger"><?php echo $error_fault_description; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-note">
                  <?php echo $entry_note ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="note" value="<?php echo $note ?>" placeholder="<?php echo $entry_note; ?>" id="input-note" class="form-control">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-solution">
                  <?php echo $entry_solution; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="solution" value="<?php echo $solution ?>" placeholder="<?php echo $entry_solution; ?>" id="input-solution" class="form-control">
                  <?php if ($error_solution) { ?>
                    <div class="text-danger"><?php echo $error_solution; ?></div>
                  <?php } ?>
                </div>
              </div>
              <legend><?php echo $text_service_centre_info; ?></legend>  
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-service_centre">
                  <?php echo $entry_service_centre; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="service_centre" value="<?php echo $service_centre ?>" placeholder="<?php echo $entry_service_centre; ?>" id="input-service_centre" class="form-control">
                  <?php if ($error_service_centre) { ?>
                    <div class="text-danger"><?php echo $error_service_centre; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-address">
                  <?php echo $entry_address; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="address" value="<?php echo $address ?>" placeholder="<?php echo $entry_address; ?>" id="input-address" class="form-control">
                  <?php if ($error_address) { ?>
                    <div class="text-danger"><?php echo $error_address; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-city_postcode">
                  <?php echo $entry_city_postcode; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="city_postcode" value="<?php echo $city_postcode ?>" placeholder="<?php echo $entry_city_postcode; ?>" id="input-city_postcode" class="form-control">
                  <?php if ($error_city_postcode) { ?>
                    <div class="text-danger"><?php echo $error_city_postcode; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-contact_person">
                  <?php echo $entry_contact_person; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="contact_person" value="<?php echo $contact_person ?>" placeholder="<?php echo $entry_contact_person; ?>" id="input-contact_person" class="form-control">
                  <?php if ($error_contact_person) { ?>
                    <div class="text-danger"><?php echo $error_contact_person; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-phone">
                  <?php echo $entry_phone; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="phone" value="<?php echo $phone ?>" placeholder="<?php echo $entry_phone; ?>" id="input-phone" class="form-control">
                  <?php if ($error_phone) { ?>
                    <div class="text-danger"><?php echo $error_phone; ?></div>
                  <?php } ?>
                </div>
              </div>
              <legend><?php echo $text_vehicle_info; ?></legend>  
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-vehicle_type">
                  <?php echo $entry_vehicle_type ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="vehicle_type" value="<?php echo $vehicle_type ?>" placeholder="<?php echo $entry_vehicle_type; ?>" id="input-vehicle_type" class="form-control">
                  <?php if ($error_vehicle_type) { ?>
                    <div class="text-danger"><?php echo $error_vehicle_type; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-vehicle_model">
                  <?php echo $entry_vehicle_model ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="vehicle_model" value="<?php echo $vehicle_model ?>" placeholder="<?php echo $entry_vehicle_model; ?>" id="input-vehicle_model" class="form-control">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-ecv">
                  <?php echo $entry_ecv ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="ecv" value="<?php echo $ecv ?>" placeholder="<?php echo $entry_ecv; ?>" id="input-ecv" class="form-control">
                  <?php if ($error_ecv) { ?>
                    <div class="text-danger"><?php echo $error_ecv; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-vehicle_year">
                  <?php echo $entry_vehicle_year ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="vehicle_year" value="<?php echo $vehicle_year ?>" placeholder="<?php echo $entry_vehicle_year; ?>" id="input-vehicle_year" class="form-control">
                </div>
              </div>
              <legend><?php echo $text_product_info; ?></legend>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-model">
                  <?php echo $entry_model ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="model" value="<?php echo $model ?>" placeholder="<?php echo $entry_model; ?>" id="input-model" class="form-control">
                  <?php if ($error_model) { ?>
                    <div class="text-danger"><?php echo $error_model; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-order_code">
                  <?php echo $entry_order_code ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="order_code" value="<?php echo $order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-order_code" class="form-control">
                  <?php if ($error_order_code) { ?>
                    <div class="text-danger"><?php echo $error_order_code; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-serial_number">
                  <?php echo $entry_serial_number ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="serial_number" value="<?php echo $serial_number ?>" placeholder="<?php echo $entry_serial_number; ?>" id="input-serial_number" class="form-control">
                  <?php if ($error_serial_number) { ?>
                    <div class="text-danger"><?php echo $error_serial_number; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-date_installed">
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
                <label for="input-return_item_1_name" class="col-sm-2 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_1_name" value="<?php echo $return_item_1_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_1_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_1_order_code" class="col-sm-2 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_1_order_code" value="<?php echo $return_item_1_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_1_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_1_quantity" class="col-sm-2 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_1_quantity" value="<?php echo $return_item_1_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_1_quantity" class="form-control">
                </div>
              </div>

              <legend>#2</legend>
              <div class="form-group">
                <label for="input-return_item_2_name" class="col-sm-2 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_2_name" value="<?php echo $return_item_2_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_2_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_2_order_code" class="col-sm-2 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_2_order_code" value="<?php echo $return_item_2_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_2_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_2_quantity" class="col-sm-2 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_2_quantity" value="<?php echo $return_item_2_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_2_quantity" class="form-control">
                </div>
              </div>

              <legend>#3</legend>
              <div class="form-group">
                <label for="input-return_item_3_name" class="col-sm-2 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_3_name" value="<?php echo $return_item_3_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_3_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_3_order_code" class="col-sm-2 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_3_order_code" value="<?php echo $return_item_3_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_3_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_3_quantity" class="col-sm-2 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_3_quantity" value="<?php echo $return_item_3_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_3_quantity" class="form-control">
                </div>
              </div>

              <legend>#4</legend>
              <div class="form-group">
                <label for="input-return_item_4_name" class="col-sm-2 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_4_name" value="<?php echo $return_item_4_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_4_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_4_order_code" class="col-sm-2 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_4_order_code" value="<?php echo $return_item_4_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_4_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_4_quantity" class="col-sm-2 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_4_quantity" value="<?php echo $return_item_4_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_4_quantity" class="form-control">
                </div>
              </div>

              <legend>#5</legend>
              <div class="form-group">
                <label for="input-return_item_5_name" class="col-sm-2 control-label">
                  <?php echo $entry_return_item; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_5_name" value="<?php echo $return_item_5_name ?>" placeholder="<?php echo $entry_return_item; ?>" id="input-return_item_5_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_5_order_code" class="col-sm-2 control-label">
                  <?php echo $entry_order_code; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_5_order_code" value="<?php echo $return_item_5_order_code ?>" placeholder="<?php echo $entry_order_code; ?>" id="input-return_item_5_order_code" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="input-return_item_5_quantity" class="col-sm-2 control-label">
                  <?php echo $entry_quantity; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="return_item_5_quantity" value="<?php echo $return_item_5_quantity ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-return_item_5_quantity" class="form-control">
                </div>
              </div>
            </fieldset>
          </div>
          <?php if ($return_id) { ?>
          <div class="tab-pane" id="tab-history">
            <div id="history"></div>
            <br />
            <fieldset>
              <legend><?php echo $text_history; ?></legend>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-return-status"><?php echo $entry_return_status; ?></label>
                <div class="col-sm-10">
                  <select name="return_status_id" id="input-return-status" class="form-control">
                    <?php foreach ($return_statuses as $return_status) { ?>
                    <?php if ($return_status['return_status_id'] == $return_status_id) { ?>
                    <option value="<?php echo $return_status['return_status_id']; ?>" selected="selected"><?php echo $return_status['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $return_status['return_status_id']; ?>"><?php echo $return_status['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-notify"><?php echo $entry_notify; ?></label>
                <div class="col-sm-10">
                  <input type="checkbox" name="notify" value="1" id="input-notify" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-history-comment"><?php echo $entry_comment; ?></label>
                <div class="col-sm-10">
                  <textarea name="history_comment" rows="8" id="input-history-comment" class="form-control"></textarea>
                </div>
              </div>
              <div class="text-right">
                <button id="button-history" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> <?php echo $button_history_add; ?></button>
              </div>
            </fieldset>
          </div>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
$('input[name=\'customer\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=sale/customer/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						category: item['customer_group'],
						label: item['name'],
						value: item['customer_id'],
						firstname: item['firstname'],
						lastname: item['lastname'],
						email: item['email'],
						telephone: item['telephone']			
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'customer\']').val(item['label']);
		$('input[name=\'customer_id\']').val(item['value']);
		$('input[name=\'firstname\']').attr('value', item['firstname']);
		$('input[name=\'lastname\']').attr('value', item['lastname']);
		$('input[name=\'email\']').attr('value', item['email']);
		$('input[name=\'telephone\']').attr('value', item['telephone']);
	}
});

$('input[name=\'service_centre_name\']').autocomplete({
  'source': function(request, response) {
    console.log('index.php?route=sale/service_centre/autocomplete&token=<?php echo $token; ?>&filter_service_centre_name=' +  encodeURIComponent(request));
    $.ajax({
      url: 'index.php?route=sale/service_centre/autocomplete&token=<?php echo $token; ?>&filter_service_centre_name=' +  encodeURIComponent(request),
      dataType: 'json',     
      success: function(json) {
        response($.map(json, function(item) {
          return {
            service_centre_name: item['service_centre_name'],
            service_address: item['service_centre_address'],
            service_phone: item['service_centre_phone'],
            service_fax: item['service_centre_fax'],
            service_email: item['service_centre_email']
          }
        }));
      },
      error: function(exception){console.log(exception);}
    });
  },
  'select': function(item) {
    console.log(item);
    $('input[name=\'service_centre_name\']').val(item['service_centre_name']);
    $('input[name=\'telephone\']').attr('value', item['service_centre_phone']);
  }
});
//--></script> 
  <script type="text/javascript"><!--
// $('input[name=\'product_name\']').autocomplete({
// 	'source': function(request, response) {
//     console.log(request);
// 		$.ajax({
// 			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
// 			dataType: 'json',			
// 			success: function(json) {
// 				response($.map(json, function(item) {
// 					return {
// 						label: item['name'],
// 						order_code: item['upc']
// 					}
// 				}));
// 			}
// 		});
// 	},
// 	'select': function(item) {
// 		$('input[name=\'product_name\']').val(item['label']);
// 		$('input[name=\'order_code\']').val(item['order_code']);	
// 	}
// });

$('#history').delegate('.pagination a', 'click', function(e) {
	e.preventDefault();
	
	$('#history').load(this.href);
});			

$('#history').load('index.php?route=sale/return/history&token=<?php echo $token; ?>&return_id=<?php echo $return_id; ?>');

$('#button-history').on('click', function(e) {
  e.preventDefault();

	$.ajax({
		url: 'index.php?route=sale/return/history&token=<?php echo $token; ?>&return_id=<?php echo $return_id; ?>',
		type: 'post',
		dataType: 'html',
		data: 'return_status_id=' + encodeURIComponent($('select[name=\'return_status_id\']').val()) + '&notify=' + ($('input[name=\'notify\']').prop('checked') ? 1 : 0) + '&comment=' + encodeURIComponent($('textarea[name=\'history_comment\']').val()),
		beforeSend: function() {
			$('#button-history').button('loading');	
		},
		complete: function() {
			$('#button-history').button('reset');	
		},
		success: function(html) {
			$('.alert').remove();
			
			$('#history').html(html);
			
			$('textarea[name=\'history_comment\']').val('');
		}
	});
});
//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});
//--></script></div>
<?php echo $footer; ?>