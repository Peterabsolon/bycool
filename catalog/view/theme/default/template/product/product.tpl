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
    <div id="content" class="<?php echo $class . ' '; echo 'parent-' . $data['parent_id']; ?>"><?php echo $content_top; ?>
      <br>
      <div class="card product-body">
        <div class="row">
          <?php $class = 'col-sm-8'; ?>
          <div class="<?php echo $class; ?>">
            <?php if ($thumb || $images) { ?>
            <ul class="thumbnails">
              <?php if ($thumb) { ?>
              <li><a class="thumbnail" href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>"><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
              <?php } ?>
              <?php if ($images) { ?>
              <?php foreach ($images as $image) { ?>
              <li class="image-additional"><a class="thumbnail" href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>"> <img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
              <?php } ?>
              <?php } ?>
            </ul>
            <?php } ?>
            <?php if(isset($link_accessories) || isset($link_spareparts)) { ?>
              <div class="product-links">
                <?php if (isset($link_accessories)) { ?>
                
                <?php } ?>
                <?php if (isset($link_spareparts)) { ?>
                <a href="<?php echo $link_spareparts; ?>-diely"><?php echo $tab_spareparts; ?> <i class="fa fa-angle-double-right"></i></a>
                <?php } ?>                         
                <br><br>
              </div>
            <?php } ?>
            <ul class="nav nav-tabs">
              <?php if (isset($data['highlights'])) { ?>
              <li class="active"><a href="#tab-highlights" data-toggle="tab" >Info</a></li>
              <?php } ?>
              <?php if ($review_status) { ?>
              <li><a href="#tab-review" data-toggle="tab"><?php echo $tab_review; ?></a></li>
              <?php } ?>
              <?php if (isset($data['techspecs'])) { ?>
              <li><a href="#tab-techspecs" data-toggle="tab"><?php echo $tab_techspecs; ?></a></li>
              <?php } ?>
              <?php if (isset($data['product_downloads'])) { ?>
              <li><a href="#tab-downloads" data-toggle="tab"><?php echo $tab_downloads; ?></a></li>
              <?php } ?>
              <?php if ($products) { ?>
              <li><a href="#tab-models" data-toggle="tab"><?php echo $text_related; ?></a></li>
              <?php } ?>     
              <?php if($custom_field_1_title != '') { ?>          
              <li><a href="#tab-custom_1" data-toggle="tab"><?php echo $custom_field_1_title; ?></a></li>
              <?php } ?>
              <?php if($custom_field_2_title != '') { ?>          
              <li><a href="#tab-custom_2" data-toggle="tab"><?php echo $custom_field_2_title; ?></a></li>
              <?php } ?>
              <?php if($custom_field_3_title != '') { ?>          
              <li><a href="#tab-custom_3" data-toggle="tab"><?php echo $custom_field_3_title; ?></a></li>
              <?php } ?>
            </ul>
            <div class="tab-content">
              <?php if (isset($data['highlights'])) {?>
                <div class="tab-pane tab-styled-list active" id="tab-highlights"><?php echo $data['highlights'] ?></div>
              <?php } ?>
              <?php if ($attribute_groups) {?>
              <div class="tab-pane" id="tab-specification">
                <table class="table table-bordered">
                  <?php foreach ($attribute_groups as $attribute_group) { ?>
                  <thead>
                    <tr>
                      <td colspan="2"><strong><?php echo $attribute_group['name']; ?></strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
                    <tr>
                      <td><?php echo $attribute['name']; ?></td>
                      <td><?php echo $attribute['text']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
              <?php } ?>
              <?php if ($review_status) { ?>
              <div class="tab-pane" id="tab-review">
                <form class="form-horizontal" id="form-review">
                  <div id="review"></div>
                  <h2><?php echo $text_write; ?></h2>
                  <?php if ($review_guest) { ?>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
                      <input type="text" name="name" value="" id="input-name" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label" for="input-review"><?php echo $entry_review; ?></label>
                      <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                      <div class="help-block"><?php echo $text_note; ?></div>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label"><?php echo $entry_rating; ?></label>
                      &nbsp;&nbsp;&nbsp; <?php echo $entry_bad; ?>&nbsp;
                      <input type="radio" name="rating" value="1" />
                      &nbsp;
                      <input type="radio" name="rating" value="2" />
                      &nbsp;
                      <input type="radio" name="rating" value="3" />
                      &nbsp;
                      <input type="radio" name="rating" value="4" />
                      &nbsp;
                      <input type="radio" name="rating" value="5" />
                      &nbsp;<?php echo $entry_good; ?></div>
                  </div>
                  <?php if ($site_key) { ?>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="buttons clearfix">
                    <div class="pull-right">
                      <button type="button" id="button-review" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary"><?php echo $button_continue; ?></button>
                    </div>
                  </div>
                  <?php } else { ?>
                  <?php echo $text_login; ?>
                  <?php } ?>
                </form>
              </div>
              <?php } ?>
              <?php if ($products) { ?>
                <div class="tab-pane" id="tab-models">
                  <h3><?php echo $text_related; ?></h3>
                  <div class="row">
                    <?php $i = 0; ?>
                    <?php foreach ($products as $product) { ?>
                    <?php $class = 'col-sm-6 col-xs-12'; ?>
                    <div class="<?php echo $class; ?>">
                      <div class="product-thumb transition">
                        <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" /></a></div>
                        <div class="caption">
                          <h4><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h4>
                          <?php if ($product['rating']) { ?>
                          <div class="rating">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <?php if ($product['rating'] < $i) { ?>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <?php } else { ?>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <?php } ?>
                            <?php } ?>
                          </div>
                          <?php } ?>
                          <?php if ($product['price']) { ?>
                          <p class="price">
                            <?php if (!$product['special']) { ?>
                            <?php echo $product['price']; ?>
                            <?php } else { ?>
                            <span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
                            <?php } ?>
                            <?php if ($product['tax']) { ?>
                            <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
                            <?php } ?>
                          </p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <?php if (($column_left && $column_right) && ($i % 2 == 0)) { ?>
                    <div class="clearfix visible-md visible-sm"></div>
                    <?php } elseif (($column_left || $column_right) && ($i % 3 == 0)) { ?>
                    <div class="clearfix visible-md"></div>
                    <?php } elseif ($i % 4 == 0) { ?>
                    <div class="clearfix visible-md"></div>
                    <?php } ?>
                    <?php $i++; ?>
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
              <?php if (isset($data['product_downloads'])) { ?>
              <div class="tab-pane tab-styled-list" id="tab-downloads">
                <ul class="product-downloads">
                  <?php foreach($data['product_downloads'] as $download) { ?>
                    <li>
                      <a href="<?php echo HTTP_SERVER ?>system/download/<?php echo $download['filename'] ?>" download><?php echo $download['name'] ?></a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <?php } ?>
              <?php if (isset($data['techspecs'])) { ?>
              <div class="tab-pane tab-styled-list" id="tab-techspecs">
                <?php echo $data['techspecs']; ?>
              </div>
              <?php } ?>
              <?php if($custom_field_1_content != '') { ?> 
              <div class="tab-pane tab-styled-list" id="tab-custom_1">
                <?php echo $custom_field_1_content; ?>
              </div>
              <?php } ?>
              <?php if($custom_field_2_content != '') { ?> 
              <div class="tab-pane tab-styled-list" id="tab-custom_2">
                <?php echo $custom_field_2_content; ?>
              </div>
              <?php } ?>
              <?php if($custom_field_3_content != '') { ?> 
              <div class="tab-pane tab-styled-list" id="tab-custom_3">
                <?php echo $custom_field_3_content; ?>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php $class = 'col-sm-4'; ?>
          <div class="<?php echo $class; ?>">
            <h2><?php echo $heading_title; ?></h2>
            <?php if ($manufacturer) { ?>
            <li><?php echo $text_manufacturer; ?> <a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a></li>
            <?php } ?>
            <li><span class="stock"><?php echo $text_stock . ' ' . $stock ?></span></li>
            <li><span class="order_code"><?php echo $text_order_code . ': ' . $order_code; ?></span></li>
            <br>
            <?php if (!$logged) { ?>
              <?php if (!$special) { ?>
              <h2><?php echo $price; ?></h2>
              <?php } else { ?>
              <h3><span style="text-decoration: line-through;"><?php echo $price; ?></span></h3>
              <h2><?php echo $special; ?></h2>
              <?php } ?>
              <?php if ($tax) { ?>
              <h4><?php echo $text_tax; ?> <?php echo $tax; ?></h4>
              <?php } ?>
            <?php } else { ?>
              <?php if (!$special) { ?>
              <h2><?php echo $tax; ?></h2>
              <?php } else { ?>
              <h3><span style="text-decoration: line-through;"><?php echo $tax; ?></span></h3>
              <h2><?php echo $special; ?></h2>
              <?php } ?>
            <?php } ?>
            <br>
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
              <button type="button" class="btn btn-primary btn-lg btn-block"><a href="http://shop.molpir.sk/default.aspx?content=TVRDETAIL&nparams=kod_id;<?php echo $external_url_id; ?>"><?php echo $button_cart; ?></a></button>
            <?php if ($review_status) { ?>
            <div class="rating">
              <p>
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                <?php if ($rating < $i) { ?>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                <?php } else { ?>
                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                <?php } ?>
                <?php } ?>
                <a href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo $reviews; ?></a> / <a href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo $text_write; ?></a></p>
              <hr>
              <!-- AddThis Button BEGIN -->
              <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
              <!-- AddThis Button END -->
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <br>
      <div class="card product-footer" id="product">
        <div class="row">
          <div class="col-sm-8">
            <h2><?php echo $heading_title; ?></h2>
            <span class="stock"><?php echo $text_stock . ' ' . $stock ?></span>
            <br>
            <span><?php echo $text_order_code; ?>: <?php echo $order_code; ?></span>
            <?php if (!$logged) { ?>
              <?php if (!$special) { ?>
              <h2><?php echo $price; ?></h2>
              <?php } else { ?>
              <h3><span style="text-decoration: line-through;"><?php echo $price; ?></span></h3>
              <h2><?php echo $special; ?></h2>
              <?php } ?>
              <?php if ($tax) { ?>
              <h4><?php echo $text_tax; ?> <?php echo $tax; ?></h4>
              <?php } ?>
            <?php } else { ?>
              <?php if (!$special) { ?>
              <h2><?php echo $tax; ?></h2>
              <?php } else { ?>
              <h3><span style="text-decoration: line-through;"><?php echo $tax; ?></span></h3>
              <h2><?php echo $special; ?></h2>
              <?php } ?>
            <?php } ?>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <?php /*
              <label class="control-label" for="quantity"><?php echo $entry_qty; ?></label>
              <input type="text" name="quantity" size="2" id="input-quantity" class="form-control" placeholder="<?php echo $entry_qty; ?>" />
              <?php foreach ($options as $option) { ?>
                <?php if ($option['type'] == 'select') { ?>
                <div class="form-group form-select<?php echo ($option['required'] ? ' required' : ''); ?>">
                  <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
                  <select name="option[<?php echo $option['product_option_id']; ?>]" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control">
                    <option value=""><?php echo $text_select; ?></option>
                    <?php foreach ($option['product_option_value'] as $option_value) { ?>
                    <option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
                    <?php if ($option_value['price']) { ?>
                    (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                    <?php } ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <?php } ?>
              <?php } ?>        
              */ ?>
              <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
              <button type="button" class="btn btn-primary btn-lg btn-block"><a href="http://shop.molpir.sk/default.aspx?content=TVRDETAIL&nparams=kod_id;<?php echo $external_url_id; ?>"><?php echo $button_cart; ?></a></button>
            </div>
          </div>
        </div>
      </div>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<script type="text/javascript"><!--
$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
	$.ajax({
		url: 'index.php?route=product/product/getRecurringDescription',
		type: 'post',
		data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
		dataType: 'json',
		beforeSend: function() {
			$('#recurring-description').html('');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();

			if (json['success']) {
				$('#recurring-description').html(json['success']);
			}
		}
	});
});
//--></script>
<script type="text/javascript"><!--
$('#button-cart').on('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-cart').button('loading');
		},
		complete: function() {
			$('#button-cart').button('reset');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();
			$('.form-group').removeClass('has-error');

			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						var element = $('#input-option' + i.replace('_', '-'));

						if (element.parent().hasClass('input-group')) {
							element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						} else {
							element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						}
					}
				}

				if (json['error']['recurring']) {
					$('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
				}

				// Highlight any found errors
				$('.text-danger').parent().addClass('has-error');
			}

			if (json['success']) {
				$('.breadcrumb').after('<div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

				$('#cart > button').html('<i class="fa fa-shopping-cart"></i> ' + json['total']);

				$('html, body').animate({ scrollTop: 0 }, 'slow');

				$('#cart > ul').load('index.php?route=common/cart/info ul li');
			}
		}
	});
});
//--></script>
<script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.datetime').datetimepicker({
	pickDate: true,
	pickTime: true
});

$('.time').datetimepicker({
	pickDate: false
});

$('button[id^=\'button-upload\']').on('click', function() {
	var node = this;

	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);

			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(node).button('loading');
				},
				complete: function() {
					$(node).button('reset');
				},
				success: function(json) {
					$('.text-danger').remove();

					if (json['error']) {
						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
					}

					if (json['success']) {
						alert(json['success']);

						$(node).parent().find('input').attr('value', json['code']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script>
<script type="text/javascript"><!--
$('#review').delegate('.pagination a', 'click', function(e) {
  e.preventDefault();

    $('#review').fadeOut('slow');

    $('#review').load(this.href);

    $('#review').fadeIn('slow');
});

$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').on('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: $("#form-review").serialize(),
		beforeSend: function() {
			$('#button-review').button('loading');
		},
		complete: function() {
			$('#button-review').button('reset');
		},
		success: function(json) {
			$('.alert-success, .alert-danger').remove();

			if (json['error']) {
				$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}

			if (json['success']) {
				$('#review').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').prop('checked', false);
			}
		}
	});
});

$(document).ready(function() {
	$('.thumbnails').magnificPopup({
		type:'image',
		delegate: 'a',
		gallery: {
			enabled:true
		}
	});
});
//--></script>
<?php echo $footer; ?>