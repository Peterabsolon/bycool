<pre style="font-size: 9px;">
<?php print_r($data); ?>
</pre>
<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-warranty').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
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
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-warranty_id"><?php echo $entry_warranty_id; ?></label>
                <input type="text" name="filter_warranty_id" value="<?php echo $filter_warranty_id; ?>" placeholder="<?php echo $entry_warranty_id; ?>" id="input-warranty_id" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-order-id"><?php echo $entry_order_id; ?></label>
                <input type="text" name="filter_order_id" value="<?php echo $filter_order_id; ?>" placeholder="<?php echo $entry_order_id; ?>" id="input-order-id" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-customer"><?php echo $entry_customer; ?></label>
                <input type="text" name="filter_customer" value="<?php echo $filter_customer; ?>" placeholder="<?php echo $entry_customer; ?>" id="input-customer" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-product"><?php echo $entry_product; ?></label>
                <input type="text" name="filter_product" value="<?php echo $filter_product; ?>" placeholder="<?php echo $entry_product; ?>" id="input-product" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-model"><?php echo $entry_model; ?></label>
                <input type="text" name="filter_model" value="<?php echo $filter_model; ?>" placeholder="<?php echo $entry_model; ?>" id="input-model" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-return-status"><?php echo $entry_return_status; ?></label>
                <select name="filter_return_status_id" id="input-return-status" class="form-control">
                  <option value="*"></option>
                  <?php foreach ($return_statuses as $return_status) { ?>
                  <?php if ($return_status['return_status_id'] == $filter_return_status_id) { ?>
                  <option value="<?php echo $return_status['return_status_id']; ?>" selected="selected"><?php echo $return_status['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $return_status['return_status_id']; ?>"><?php echo $return_status['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-date_added"><?php echo $entry_date_added; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" placeholder="<?php echo $entry_date_added; ?>" data-date-format="YYYY-MM-DD" id="input-date_added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-date_modified"><?php echo $entry_date_modified; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_modified" value="<?php echo $filter_date_modified; ?>" placeholder="<?php echo $entry_date_modified; ?>" data-date-format="YYYY-MM-DD" id="input-date_modified" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
            </div>
          </div>
        </div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-warranty">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php if ($sort == 'w.warranty_id') { ?>
                    <a href="<?php echo $sort_warranty_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_warranty_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_warranty_id; ?>"><?php echo $column_warranty_id; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.warranty_code') { ?>
                    <a href="<?php echo $sort_warranty_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_warranty_code; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_warranty_code; ?>"><?php echo $column_warranty_code; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.service_centre_id') { ?>
                    <a href="<?php echo $sort_service_centre_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_service_centre; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_service_centre_id; ?>"><?php echo $column_service_centre; ?></a>
                    <?php } ?>
                  </td>
                  <?php /*
                  <td class="text-right"><?php if ($sort == 'w.vehicle_type') { ?>
                    <a href="<?php echo $sort_vehicle_type; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_vehicle_type; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_vehicle_type; ?>"><?php echo $column_vehicle_type; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.ecv') { ?>
                    <a href="<?php echo $sort_ecv; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_ecv; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_ecv; ?>"><?php echo $column_ecv; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.vin') { ?>
                    <a href="<?php echo $sort_vin; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_vin; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_vin; ?>"><?php echo $column_vin; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.compressor_number') { ?>
                    <a href="<?php echo $sort_compressor_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_compressor_number; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_compressor_number; ?>"><?php echo $column_compressor_number; ?></a>
                    <?php } ?>
                  </td>
                  */ ?>
                  <td class="text-right"><?php if ($sort == 'w.product') { ?>
                    <a href="<?php echo $sort_product; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_product; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_product; ?>"><?php echo $column_product; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.order_code') { ?>
                    <a href="<?php echo $sort_order_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_order_code; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_order_code; ?>"><?php echo $column_order_code; ?></a>
                    <?php } ?>
                  </td>
                  <?php /*                  
                  <td class="text-right"><?php if ($sort == 'w.serial_number') { ?>
                    <a href="<?php echo $sort_serial_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_serial_number; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_serial_number; ?>"><?php echo $column_serial_number; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.customer_name') { ?>
                    <a href="<?php echo $sort_customer_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer_name; ?>"><?php echo $column_customer_name; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.customer_address') { ?>
                    <a href="<?php echo $sort_customer_address; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer_address; ?>"><?php echo $column_customer_address; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.customer_country') { ?>
                    <a href="<?php echo $sort_customer_country; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer_country; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer_country; ?>"><?php echo $column_customer_country; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.customer_phone') { ?>
                    <a href="<?php echo $sort_customer_phone; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer_phone; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer_phone; ?>"><?php echo $column_customer_phone; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.customer_email') { ?>
                    <a href="<?php echo $sort_customer_email; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer_email; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer_email; ?>"><?php echo $column_customer_email; ?></a>
                    <?php } ?>
                  </td>
                  */ ?>
                  <td class="text-right"><?php if ($sort == 'w.date_added') { ?>
                    <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.date_modified') { ?>
                    <a href="<?php echo $sort_date_modified; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_modified; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_date_modified; ?>"><?php echo $column_date_modified; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php if ($sort == 'w.date_installed') { ?>
                    <a href="<?php echo $sort_date_installed; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_installed; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_date_installed; ?>"><?php echo $column_date_installed; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php echo $column_action; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($warranties) { ?>
                <?php foreach ($warranties as $warranty) { ?>
                <tr>
                  <td class="text-center"><?php if (in_array($warranty['warranty_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $warranty['warranty_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $warranty['warranty_id']; ?>" />
                    <?php } ?></td>
                  <td class="text-left"><?php echo $warranty['warranty_id']; ?></td>
                  <td class="text-right"><?php echo $warranty['warranty_code']; ?></td>
                  <td class="text-right"><?php echo $warranty['service_centre']; ?></td>
                  <?php /* <td class="text-right"><?php echo $warranty['vehicle_type']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['ecv']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['vin']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['compressor_number']; ?></td> */ ?>
                  <td class="text-right"><?php echo $warranty['model']; ?></td>
                  <td class="text-right"><?php echo $warranty['order_code']; ?></td>
                  <?php /* <td class="text-right"><?php echo $warranty['serial_number']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['customer_name']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['customer_address']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['customer_country']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['customer_phone']; ?></td> */ ?>
                  <?php /* <td class="text-right"><?php echo $warranty['customer_email']; ?></td> */ ?>
                  <td class="text-right"><?php echo $warranty['date_added']; ?></td>
                  <td class="text-right"><?php echo $warranty['date_modified']; ?></td>
                  <td class="text-right"><?php echo $warranty['date_installed']; ?></td>
                  <td class="text-right">
                    <div class="btn-group">
                      <select name="warranty-lang" id="warranty-lang" style="margin: 0 3px; width: 50px; float: left;" class="form-control">
                        <?php foreach ($languages as $language): ?>
                          <option value="<?php echo $language['dir'] ?>"><?php echo $language['code'] ?></option>
                        <?php endforeach ?>
                      </select>
                      <a href="<?php echo $warranty['print_store'] ?>" data-toggle="tooltip" title="<?php echo $button_print_store; ?>" class="btn btn-primary print-store" style="margin: 0 3px;"><i class="fa fa-print"></i></a> 
                      <a href="<?php echo $warranty['print_customer'] ?>" data-toggle="tooltip" title="<?php echo $button_print_customer; ?>" class="btn btn-primary print-customer" style="margin: 0 3px;"><i class="fa fa-print"></i> 
                      </a>
                      <a href="<?php echo $warranty['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary" style="margin: 0 3px; border-radius: 0;">
                        <i class="fa fa-pencil"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="18"><?php echo $text_no_results; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!-- 
  $('#warranty-lang').on('change', function(){
    var lang = $(this).val();

    var btn_store = $(this).siblings('.print-store');
    var btn_customer = $(this).siblings('.print-customer');

    var url_store = btn_store.attr('href').replace(/lang\=(.*?)([\&$])/, 'lang=' + lang + '$2');
    var url_customer = btn_customer.attr('href').replace(/lang\=(.*?)([\&$])/, 'lang=' + lang + '$2');
    
    btn_store.attr('href', url_store);
    btn_customer.attr('href', url_customer);
  });
//--></script>
  <script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	url = 'index.php?route=sale/warranty&token=<?php echo $token; ?>';
	
  var filter_warranty_id = $('input[name=\'filter_warranty_id\']').val();

  if (filter_warranty_id) {
    url += '&filter_warranty_id=' + encodeURIComponent(filter_warranty_id);
  }

  var filter_service_centre_id = $('input[name=\'filter_service_centre_id\']').val();

  if (filter_service_centre_id) {
    url += '&filter_service_centre_id=' + encodeURIComponent(filter_service_centre_id);
  }

  var filter_warranty_code = $('input[name=\'filter_warranty_code\']').val();

  if (filter_warranty_code) {
    url += '&filter_warranty_code=' + encodeURIComponent(filter_warranty_code);
  }

  var filter_order_code = $('input[name=\'filter_order_code\']').val();

  if (filter_order_code) {
    url += '&filter_order_code=' + encodeURIComponent(filter_order_code);
  }

  var filter_vehicle_type = $('input[name=\'filter_vehicle_type\']').val();

  if (filter_vehicle_type) {
    url += '&filter_vehicle_type=' + encodeURIComponent(filter_vehicle_type);
  }

  var filter_ecv = $('input[name=\'filter_ecv\']').val();

  if (filter_ecv) {
    url += '&filter_ecv=' + encodeURIComponent(filter_ecv);
  }

  var filter_vin = $('input[name=\'filter_vin\']').val();

  if (filter_vin) {
    url += '&filter_vin=' + encodeURIComponent(filter_vin);
  }

  var filter_compressor_number = $('input[name=\'filter_compressor_number\']').val();

  if (filter_compressor_number) {
    url += '&filter_compressor_number=' + encodeURIComponent(filter_compressor_number);
  }

  var filter_model = $('input[name=\'filter_model\']').val();

  if (filter_model) {
    url += '&filter_model=' + encodeURIComponent(filter_model);
  }

  var filter_product_id = $('input[name=\'filter_product_id\']').val();

  if (filter_product_id) {
    url += '&filter_product_id=' + encodeURIComponent(filter_product_id);
  }

  var filter_serial_number = $('input[name=\'filter_serial_number\']').val();

  if (filter_serial_number) {
    url += '&filter_serial_number=' + encodeURIComponent(filter_serial_number);
  }

  var filter_customer_name = $('input[name=\'filter_customer_name\']').val();

  if (filter_customer_name) {
    url += '&filter_customer_name=' + encodeURIComponent(filter_customer_name);
  }

  var filter_customer_address = $('input[name=\'filter_customer_address\']').val();

  if (filter_customer_address) {
    url += '&filter_customer_address=' + encodeURIComponent(filter_customer_address);
  }

  var filter_customer_country = $('input[name=\'filter_customer_country\']').val();

  if (filter_customer_country) {
    url += '&filter_customer_country=' + encodeURIComponent(filter_customer_country);
  }

  var filter_customer_phone = $('input[name=\'filter_customer_phone\']').val();

  if (filter_customer_phone) {
    url += '&filter_customer_phone=' + encodeURIComponent(filter_customer_phone);
  }

  var filter_customer_email = $('input[name=\'filter_customer_email\']').val();

  if (filter_customer_email) {
    url += '&filter_customer_email=' + encodeURIComponent(filter_customer_email);
  }

  var filter_date_added = $('input[name=\'filter_date_added\']').val();

  if (filter_date_added) {
    url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
  }

  var filter_date_installed = $('input[name=\'filter_date_installed\']').val();

  if (filter_date_installed) {
    url += '&filter_date_installed=' + encodeURIComponent(filter_date_installed);
  }

	location = url;
});
//--></script> 
  <script type="text/javascript"><!--
$('input[name=\'filter_customer\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=sale/customer/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['customer_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_customer\']').val(item['label']);
	}	
});

$('input[name=\'filter_product\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['product_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_product\']').val(item['label']);
	}	
});

$('input[name=\'filter_model\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_model=' +  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['model'],
						value: item['product_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_model\']').val(item['label']);
	}	
});
//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});
//--></script></div>
<?php echo $footer; ?> 