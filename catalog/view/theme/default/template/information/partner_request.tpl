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
    <?php $class = 'col-sm-10'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
      <h1><?php echo $heading_title; ?></h1>
      <p><?php echo $request_info; ?></p>
      <br>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label for="input-message" class="col-sm-2 control-label"><?php echo $entry_message; ?></label>
            <div class="col-sm-10">
              <textarea name="message" id="input-message" rows="5" class="form-control"><?php echo $message; ?></textarea>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-name" class="col-sm-2 control-label"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo $name; ?>" id="input-name" class="form-control" />
              <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-address" class="col-sm-2 control-label"><?php echo $entry_address; ?></label>
            <div class="col-sm-10">
              <input type="text" name="address" value="<?php echo $address; ?>" id="input-address" class="form-control" />
              <?php if ($error_address) { ?>
              <div class="text-danger"><?php echo $error_address; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-country" class="col-sm-2 control-label"><?php echo $entry_country; ?></label>
            <div class="col-sm-10">
              <input type="text" name="country" value="<?php echo $country; ?>" id="input-country" class="form-control" />
              <?php if ($error_country) { ?>
              <div class="text-danger"><?php echo $error_country; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-contact_person" class="col-sm-2 control-label"><?php echo $entry_contact_person; ?></label>
            <div class="col-sm-10">
              <input type="text" name="contact_person" value="<?php echo $contact_person; ?>" id="input-contact_person" class="form-control" />
              <?php if ($error_contact_person) { ?>
              <div class="text-danger"><?php echo $error_contact_person; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-phone" class="col-sm-2 control-label"><?php echo $entry_phone; ?></label>
            <div class="col-sm-10">
              <input type="text" name="phone" value="<?php echo $phone; ?>" id="input-phone" class="form-control" />
              <?php if ($error_phone) { ?>
              <div class="text-danger"><?php echo $error_phone; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label for="input-fax" class="col-sm-2 control-label"><?php echo $entry_fax; ?></label>
            <div class="col-sm-10">
              <input type="text" name="fax" value="<?php echo $fax; ?>" id="input-fax" class="form-control" />
              <?php if ($error_fax) { ?>
              <div class="text-danger"><?php echo $error_fax; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-email" class="col-sm-2 control-label"><?php echo $entry_email; ?></label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?php echo $email; ?>" id="input-email" class="form-control" />
              <?php if ($error_email) { ?>
              <div class="text-danger"><?php echo $error_email; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-ico" class="col-sm-2 control-label"><?php echo $entry_ico; ?></label>
            <div class="col-sm-10">
              <input type="text" name="ico" value="<?php echo $ico; ?>" id="input-ico" class="form-control" />
              <?php if ($error_ico) { ?>
              <div class="text-danger"><?php echo $error_ico; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-dic" class="col-sm-2 control-label"><?php echo $entry_dic; ?></label>
            <div class="col-sm-10">
              <input type="text" name="dic" value="<?php echo $dic; ?>" id="input-dic" class="form-control" />
              <?php if ($error_dic) { ?>
              <div class="text-danger"><?php echo $error_dic; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-icdph" class="col-sm-2 control-label"><?php echo $entry_icdph; ?></label>
            <div class="col-sm-10">
              <input type="text" name="icdph" value="<?php echo $icdph; ?>" id="input-icdph" class="form-control" />
              <?php if ($error_icdph) { ?>
              <div class="text-danger"><?php echo $error_icdph; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label for="input-note" class="col-sm-2 control-label"><?php echo $entry_note; ?></label>
            <div class="col-sm-10">
              <input type="text" name="note" value="<?php echo $note; ?>" id="input-note" class="form-control" />
              <?php if ($error_note) { ?>
              <div class="text-danger"><?php echo $error_note; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="input-opening_hours" class="col-sm-2 control-label"><?php echo $entry_opening_hours; ?></label>
            <div class="col-sm-10">
              <textarea name="opening_hours" id="input-opening_hours" rows="5" class="form-control"><?php echo $opening_hours; ?></textarea>
            </div>
          </div>
          <?php if ($site_key) { ?>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
                <?php if ($error_captcha) { ?>
                  <div class="text-danger"><?php echo $error_captcha; ?></div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </fieldset>
        <div class="buttons">
          <div class="pull-right">
            <input class="btn btn-primary" type="submit" value="<?php echo $button_submit; ?>" />
          </div>
        </div>
      </form>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>
