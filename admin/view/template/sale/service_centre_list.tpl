<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-service_centre').submit() : false;"><i class="fa fa-trash-o"></i></button>
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
                <label class="control-label" for="input-service_centre_id"><?php echo $entry_service_centre_id; ?></label>
                <input type="text" name="filter_service_centre_id" value="<?php echo $filter_service_centre_id;?>" placeholder="<?php echo $entry_service_centre_id; ?>" id="input-service_centre_id" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
                <input type="text" name="filter_name" value="<?php echo $filter_name;?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-address"><?php echo $entry_address; ?></label>
                <input type="text" name="filter_address" value="<?php echo $filter_address;?>" placeholder="<?php echo $entry_address; ?>" id="input-address" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-city"><?php echo $entry_city; ?></label>
                <input type="text" name="filter_city" value="<?php echo $filter_city;?>" placeholder="<?php echo $entry_city; ?>" id="input-city" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-country"><?php echo $entry_country; ?></label>
                <input type="text" name="filter_country" value="<?php echo $filter_country;?>" placeholder="<?php echo $entry_country; ?>" id="input-country" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-date_added"><?php echo $entry_date_added; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" placeholder="<?php echo $entry_date_added; ?>" data-date-format="YYYY-MM-DD" id="input-date_added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-date_modified"><?php echo $entry_date_modified; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_modified" value="<?php echo $filter_date_modified; ?>" placeholder="<?php echo $entry_date_modified; ?>" data-date-format="YYYY-MM-DD" id="input-date_modified" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
              <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
            </div>
          </div>
        </div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-service_centre">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-right"><?php if ($sort == 'sc.service_centre_id') { ?>
                    <a href="<?php echo $sort_service_centre_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_service_centre_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_service_centre_id; ?>"><?php echo $column_service_centre_id; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'sc.name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'sc.address') { ?>
                    <a href="<?php echo $sort_address; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_address; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_address; ?>"><?php echo $column_address; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'sc.city') { ?>
                    <a href="<?php echo $sort_city; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_city; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_city; ?>"><?php echo $column_city; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'sc.country') { ?>
                    <a href="<?php echo $sort_country; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_country; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_country; ?>"><?php echo $column_country; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'sc.date_added') { ?>
                    <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-left"><?php if ($sort == 'sc.date_modified') { ?>
                    <a href="<?php echo $sort_date_modified; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_modified; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_date_modified; ?>"><?php echo $column_date_modified; ?></a>
                    <?php } ?>
                  </td>
                  <td class="text-right">
                    <?php echo $column_action; ?>
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php if ($service_centres) { ?>
                <?php foreach ($service_centres as $service_centre) { ?>
                <tr>
                  <td class="text-center"><?php if (in_array($service_centre['service_centre_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $service_centre['service_centre_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $service_centre['service_centre_id']; ?>" />
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php echo $service_centre['service_centre_id']; ?></td>
                  <td class="text-left"><?php echo $service_centre['name']; ?></td>
                  <td class="text-left"><?php echo $service_centre['address']; ?></td>
                  <td class="text-left"><?php echo $service_centre['city']; ?></td>
                  <td class="text-left"><?php echo $service_centre['country']; ?></td>
                  <td class="text-left"><?php echo $service_centre['date_added']; ?></td>
                  <td class="text-left"><?php echo $service_centre['date_modified']; ?></td>
                  <td class="text-right"><a href="<?php echo $service_centre['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> <?php echo $column_edit; ?></a></td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="10"><?php echo $text_no_results; ?></td>
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
$('#button-filter').on('click', function() {
	url = 'index.php?route=sale/service_centre&token=<?php echo $token; ?>';
	
	var filter_service_centre_id = $('input[name=\'filter_service_centre_id\']').val();
	if (filter_service_centre_id) {
		url += '&filter_service_centre_id=' + encodeURIComponent(filter_service_centre_id);
	}

  var filter_name = $('input[name=\'filter_name\']').val();
  if (filter_name) {
    url += '&filter_name=' + encodeURIComponent(filter_name);
  }

  var filter_address = $('input[name=\'filter_address\']').val();
  if (filter_address) {
    url += '&filter_address=' + encodeURIComponent(filter_address);
  }

  var filter_city = $('input[name=\'filter_city\']').val();
  if (filter_city) {
    url += '&filter_city=' + encodeURIComponent(filter_city);
  }

  var filter_country = $('input[name=\'filter_country\']').val();
  if (filter_country) {
    url += '&filter_country=' + encodeURIComponent(filter_country);
  }

  var filter_date_added = $('input[name=\'filter_date_added\']').val();
  if (filter_date_added) {
    url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
  }

  var filter_date_modified = $('input[name=\'filter_date_modified\']').val();
  if (filter_date_modified) {
    url += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);
  }
			
	location = url;
});
//--></script> 
  <script type="text/javascript"><!--
// $('input[name=\'filter_customer\']').autocomplete({
// 	'source': function(request, response) {
// 		$.ajax({
// 			url: 'index.php?route=sale/customer/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
// 			dataType: 'json',			
// 			success: function(json) {
// 				response($.map(json, function(item) {
// 					return {
// 						label: item['name'],
// 						value: item['customer_id']
// 					}
// 				}));
// 			}
// 		});
// 	},
// 	'select': function(item) {
// 		$('input[name=\'filter_customer\']').val(item['label']);
// 	}	
// });
//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});
//--></script></div>
<?php echo $footer; ?> 