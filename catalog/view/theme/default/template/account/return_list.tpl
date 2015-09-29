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
    <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i style="font-size: 18px; color: #fff" class="fa fa-plus" style="color: #fff"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-return').submit() : false;"><i style="font-size: 18px; color: #fff" class="fa fa-trash-o" style="color: #fff"></i></button>
      </div>
      <h1 style="margin-top: 10px;"><?php echo $heading_title; ?></h1>
      <?php if ($error_warning) { ?>
      <div class="alert alert-danger"><i style="font-size: 18px; color: #fff" class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      <?php } ?>
      <?php if ($success) { ?>
      <div class="alert alert-success"><i style="font-size: 18px; color: #fff" class="fa fa-check-circle"></i> <?php echo $success; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      <?php } ?>
      <div class="panel panel-default" style="border-radius: 0;">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
        <?php if ($customer_group_id == 3) { // if admin ?>
        <div class="well well-filters">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-return_id"><?php echo $entry_return_id; ?></label>
                <input type="text" name="filter_return_id" value="<?php echo $filter_return_id;?>" placeholder="<?php echo $entry_return_id; ?>" id="input-return_id" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-return_code"><?php echo $entry_return_code; ?></label>
                <input type="text" name="filter_return_code" value="<?php echo $filter_return_code;?>" placeholder="<?php echo $entry_return_code; ?>" id="input-return_code" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-customer"><?php echo $entry_customer; ?></label>
                <input type="text" name="filter_customer" value="<?php echo $filter_customer;?>" placeholder="<?php echo $entry_customer; ?>" id="input-customer" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-model"><?php echo $entry_model; ?></label>
                <input type="text" name="filter_model" value="<?php echo $filter_model;?>" placeholder="<?php echo $entry_model; ?>" id="input-model" class="form-control" />
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
                <label class="control-label" for="input-return-status"><?php echo $entry_return_status; ?></label>
                <select name="filter_return_status_id" id="input-return-status" class="form-control">
                  <option value=""></option>
                  <?php foreach ($return_statuses as $return_status) { ?>
                  <?php if ($return_status['return_status_id'] == $filter_return_status_id) { ?>
                  <option value="<?php echo $return_status['return_status_id']; ?>" selected="selected"><?php echo $return_status['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $return_status['return_status_id']; ?>"><?php echo $return_status['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-date-added"><?php echo $entry_date_added; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" placeholder="<?php echo $entry_date_added; ?>" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span>
                </div>
              </div>   
            </div>
            <button type="button" id="button-filter" class="btn btn-primary pull-left"  style="margin-left: 15px;"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
          </div>
        </div>
        <?php } else { ?>
        <div class="well well-filters">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-return_id"><?php echo $entry_return_id; ?></label>
                <input type="text" name="filter_return_id" value="<?php echo $filter_return_id;?>" placeholder="<?php echo $entry_return_id; ?>" id="input-return_id" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-return_code"><?php echo $entry_return_code; ?></label>
                <input type="text" name="filter_return_code" value="<?php echo $filter_return_code;?>" placeholder="<?php echo $entry_return_code; ?>" id="input-return_code" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-model"><?php echo $entry_model; ?></label>
                <input type="text" name="filter_model" value="<?php echo $filter_model;?>" placeholder="<?php echo $entry_model; ?>" id="input-model" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-order_code"><?php echo $entry_order_code; ?></label>
                <input type="text" name="filter_order_code" value="<?php echo $filter_order_code;?>" placeholder="<?php echo $entry_order_code; ?>" id="input-order_code" class="form-control" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-ecv"><?php echo $entry_ecv; ?></label>
                <input type="text" name="filter_ecv" value="<?php echo $filter_ecv;?>" placeholder="<?php echo $entry_ecv; ?>" id="input-ecv" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-return-status"><?php echo $entry_return_status; ?></label>
                <select name="filter_return_status_id" id="input-return-status" class="form-control">
                  <option value=""></option>
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
                <label class="control-label" for="input-date-added"><?php echo $entry_date_added; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" placeholder="<?php echo $entry_date_added; ?>" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span>
                </div>
              </div>   
            </div>
          </div>
          <button type="button" id="button-filter" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
        </div>
        <?php } ?>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-return">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php echo $column_action; ?></td>
                  <?php /*
                  <td class="text-right"><?php if ($sort == 'r.return_id') { ?>
                    <a href="<?php echo $sort_return_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_return_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_return_id; ?>"><?php echo $column_return_id; ?></a>
                    <?php } ?></td>
                    */ ?>
                  <td class="text-left"><?php if ($sort == 'r.return_code') { ?>
                    <a href="<?php echo $sort_return_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_return_code; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_return_code; ?>"><?php echo $column_return_code; ?></a>
                    <?php } ?></td>
                  <?php if ($customer_group_id == 3) { ?>
                  <td class="text-left"><?php if ($sort == 'customer') { ?>
                    <a href="<?php echo $sort_customer; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_customer; ?>"><?php echo $column_customer; ?></a>
                    <?php } ?></td>  
                  <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'r.model') { ?>
                    <a href="<?php echo $sort_model; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_model; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_model; ?>"><?php echo $column_model; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'r.ecv') { ?>
                    <a href="<?php echo $sort_ecv; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_ecv; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_ecv; ?>"><?php echo $column_ecv; ?></a>
                    <?php } ?></td>  
                  <td class="text-left"><?php if ($sort == 'r.order_code') { ?>
                    <a href="<?php echo $sort_order_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_order_code; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_order_code; ?>"><?php echo $column_order_code; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'status') { ?>
                    <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'r.date_added') { ?>
                    <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
                    <?php } ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($returns) { ?>
                <?php foreach ($returns as $return) { ?>
                <tr>
                  <td class="text-center"><?php if (in_array($return['return_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $return['return_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $return['return_id']; ?>" />
                    <?php } ?></td>
                  <td class="text-left" style="">
                    <div class="btn-group">
                      <!-- <a href="<?php echo $return['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-pencil" style="font-size: 18px;"></i>
                      </a> -->
                      <a href="<?php echo $return['details'] ?>" data-toggle="tooltip" title="<?php echo $button_details; ?>" class="btn btn-primary btn-sm print-store"><i class="fa fa-file-o" style="font-size: 16px;"></i>
                      </a> 
                    </div>
                  </td>
                  <?php /* <td class="text-right"><?php echo $return['return_id']; ?></td> */ ?>
                  <td class="text-left"><?php echo $return['return_code']; ?></td>
                  <?php if ($customer_group_id == 3) { ?>
                  <td class="text-left"><?php echo $return['customer']; ?></td>
                  <?php } ?>
                  <td class="text-left"><?php echo $return['model']; ?></td>
                  <td class="text-left"><?php echo $return['ecv']; ?></td>
                  <td class="text-left"><?php echo $return['order_code']; ?></td>
                  <td class="text-left"><?php echo $return['status']; ?></td>
                  <td class="text-left"><?php echo $return['date_added']; ?></td>
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
        <div class="row" style="color: #000">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
  <script type="text/javascript"><!--
$('#button-filter').on('click', function(e) {
  url = 'index.php?route=account/return';

  var filter_return_id = $('input[name=\'filter_return_id\']').val();
  if(filter_return_id) {url += '&filter_return_id=' + encodeURIComponent(filter_return_id);}

  var filter_return_code = $('input[name=\'filter_return_code\']').val();
  if(filter_return_code) {url += '&filter_return_code=' + encodeURIComponent(filter_return_code);}

  var filter_customer = $('input[name=\'filter_customer\']').val();
  if(filter_customer) {url += '&filter_customer=' + encodeURIComponent(filter_customer);}

  var filter_ecv = $('input[name=\'filter_ecv\']').val();
  if(filter_ecv) {url += '&filter_ecv=' + encodeURIComponent(filter_ecv);}

  var filter_model = $('input[name=\'filter_model\']').val();
  if(filter_model) {url += '&filter_model=' + encodeURIComponent(filter_model);}

  var filter_order_code = $('input[name=\'filter_order_code\']').val();
  if(filter_order_code) {url += '&filter_order_code=' + encodeURIComponent(filter_order_code);}

  var filter_return_status_id = $('select[name=\'filter_return_status_id\']').val();
  if (filter_return_status_id) {url += '&filter_return_status_id=' + encodeURIComponent(filter_return_status_id);}

  var filter_date_added = $('input[name=\'filter_date_added\']').val();
  if(filter_date_added) {url += '&filter_date_added=' + encodeURIComponent(filter_date_added);}

  var filter_date_modified = $('input[name=\'filter_date_modified\']').val();
  if(filter_date_modified) {url += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);}
      
  location = url;
});
//--></script> 
<script type="text/javascript"><!--
$('.date').datetimepicker({
  pickTime: false
});
//--></script>
<?php echo $footer; ?>
