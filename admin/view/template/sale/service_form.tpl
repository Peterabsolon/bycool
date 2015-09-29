<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-warranty" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-warranty" class="form-horizontal">
          <div class="tab-content">
          <div class="tab-pane active" id="tab-general">
            <fieldset>
              <legend><?php echo $text_service_centre; ?></legend>
              <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label"><?php echo $entry_name; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="<?php echo $name ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-contact_person" class="col-sm-2 control-label"><?php echo $entry_contact_person; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="contact_person" value="<?php echo $contact_person ?>" placeholder="<?php echo $entry_contact_person; ?>" id="input-contact_person" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-address" class="col-sm-2 control-label"><?php echo $entry_address; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="address" value="<?php echo $address ?>" placeholder="<?php echo $entry_address; ?>" id="input-address" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-city" class="col-sm-2 control-label"><?php echo $entry_city; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="city" value="<?php echo $city ?>" placeholder="<?php echo $entry_city; ?>" id="input-city" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-country" class="col-sm-2 control-label"><?php echo $entry_country ?></label>
                <div class="col-sm-10">
                  <select name="country" id="input-country" class="form-control">
                    <?php foreach($data['countries'] as $country) { ?>
                      <option value="<?php echo $country['id'] ?>"><?php echo $country['name']; ?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="input-phone" class="col-sm-2 control-label"><?php echo $entry_phone; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="phone" value="<?php echo $phone ?>" placeholder="<?php echo $entry_phone; ?>" id="input-phone" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-fax" class="col-sm-2 control-label"><?php echo $entry_fax; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="fax" value="<?php echo $fax ?>" placeholder="<?php echo $entry_fax; ?>" id="input-fax" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-email" class="col-sm-2 control-label"><?php echo $entry_email; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="email" value="<?php echo $email ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-ico" class="col-sm-2 control-label"><?php echo $entry_ico; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="ico" value="<?php echo $ico ?>" placeholder="<?php echo $entry_ico; ?>" id="input-ico" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-dic" class="col-sm-2 control-label"><?php echo $entry_dic; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="dic" value="<?php echo $dic ?>" placeholder="<?php echo $entry_dic; ?>" id="input-dic" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-icdph" class="col-sm-2 control-label"><?php echo $entry_icdph; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="icdph" value="<?php echo $icdph ?>" placeholder="<?php echo $entry_icdph; ?>" id="input-icdph" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label for="input-opening_hours" class="col-sm-2 control-label"><?php echo $entry_opening_hours; ?></label>
                <div class="col-sm-10">
                  <textarea rows="5" name="opening_hours" value="<?php echo $opening_hours ?>" placeholder="<?php echo $entry_opening_hours; ?>" id="input-opening_hours" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="input-note" class="col-sm-2 control-label"><?php echo $entry_note; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="note" value="<?php echo $note ?>" placeholder="<?php echo $entry_note; ?>" id="input-note" class="form-control"/>
                </div>
              </div>
            </fieldset>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
  pickTime: false
});
//--></script></div>
<?php echo $footer; ?>