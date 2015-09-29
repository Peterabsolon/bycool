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
                <input type="text" name="filter_warranty_id" value="<?php echo $filter_warranty_id;?>" placeholder="<?php echo $entry_warranty_id; ?>" id="input-warranty_id" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-warranty_code"><?php echo $entry_warranty_code; ?></label>
                <input type="text" name="filter_warranty_code" value="<?php echo $filter_warranty_code;?>" placeholder="<?php echo $entry_warranty_code; ?>" id="input-warranty_code" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-client"><?php echo $entry_client; ?></label>
                <input type="text" name="filter_client" value="<?php echo $filter_client;?>" placeholder="<?php echo $entry_client; ?>" id="input-client" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-product"><?php echo $entry_product; ?></label>
                <input type="text" name="filter_product" value="<?php echo $filter_product; ?>" placeholder="<?php echo $entry_product; ?>" id="input-product" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-order_code"><?php echo $entry_order_code; ?></label>
                <input type="text" name="filter_order_code" value="<?php echo $filter_order_code;?>" placeholder="<?php echo $entry_order_code; ?>" id="input-order_code" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-ecv"><?php echo $entry_ecv; ?></label>
                <input type="text" name="filter_ecv" value="<?php echo $filter_ecv;?>" placeholder="<?php echo $entry_ecv; ?>" id="input-ecv" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-serial_number"><?php echo $entry_serial_number; ?></label>
                <input type="text" name="filter_serial_number" value="<?php echo $filter_serial_number;?>" placeholder="<?php echo $entry_serial_number; ?>" id="input-serial_number" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-date_added"><?php echo $entry_date_added; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" placeholder="<?php echo $entry_date_added; ?>" data-date-format="YYYY-MM-DD" id="input-date_added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
              <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
            </div>
          </div>
        </div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-warranty">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-right"><?php if ($sort == 'w.warranty_id') { ?>
                    <a href="<?php echo $sort_warranty_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_warranty_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_warranty_id; ?>"><?php echo $column_warranty_id; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'w.warranty_code') { ?>
                    <a href="<?php echo $sort_warranty_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_warranty_code; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_warranty_code; ?>"><?php echo $column_warranty_code; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'w.customer_name') { ?>
                    <a href="<?php echo $sort_client; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_client; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_client; ?>"><?php echo $column_client; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'w.product') { ?>
                    <a href="<?php echo $sort_product; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_product; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_product; ?>"><?php echo $column_product; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'w.order_code') { ?>
                    <a href="<?php echo $sort_order_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_order_code; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_order_code; ?>"><?php echo $column_order_code; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'w.ecv') { ?>
                    <a href="<?php echo $sort_ecv; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_ecv; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_ecv; ?>"><?php echo $column_ecv; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'w.serial_number') { ?>
                    <a href="<?php echo $sort_serial_number; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_serial_number; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_serial_number; ?>"><?php echo $column_serial_number; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'w.date_added') { ?>
                    <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
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
                  <td class="text-right"><?php echo $warranty['warranty_id']; ?></td>
                  <td class="text-left"><?php echo $warranty['warranty_code']; ?></td>
                  <td class="text-left"><?php echo $warranty['client']; ?></td>
                  <td class="text-left"><?php echo $warranty['product']; ?></td>
                  <td class="text-left"><?php echo $warranty['order_code']; ?></td>
                  <td class="text-left"><?php echo $warranty['ecv']; ?></td>
                  <td class="text-left"><?php echo $warranty['serial_number']; ?></td>
                  <td class="text-left"><?php echo $warranty['date_added']; ?></td>
                  <td class="text-right" style="min-width: 208px">
                    <div class="btn-group">
                      <a href="<?php echo $warranty['print'] ?>" data-toggle="tooltip" title="<?php echo $button_print_store; ?>" class="btn btn-primary print-store" style="margin: 0 3px;"><i class="fa fa-print"></i></a> 
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

  var filter_customer = $('input[name=\'filter_customer\']').val();

  if (filter_customer) {
    url += '&filter_customer=' + encodeURIComponent(filter_customer);
  }

  var filter_warranty_code = $('input[name=\'filter_warranty_code\']').val();

  if (filter_warranty_code) {
    url += '&filter_warranty_code=' + encodeURIComponent(filter_warranty_code);
  }

  var filter_order_code = $('input[name=\'filter_order_code\']').val();
  if(filter_order_code) {url += '&filter_order_code=' + encodeURIComponent(filter_order_code);}

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

  var filter_product = $('input[name=\'filter_product\']').val();

  if (filter_product) {
    url += '&filter_product=' + encodeURIComponent(filter_product);
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

  var filter_date_modified = $('input[name=\'filter_date_modified\']').val();

  if (filter_date_modified) {
    url += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);
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

//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});
//--></script></div>
<?php echo $footer; ?> 