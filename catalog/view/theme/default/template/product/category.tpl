<?php echo $header; ?>
<div class="container-fluid">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="row lineup">
    <div class="col-sm-6">
      <div class="card lineup-card">
        <h3>
          <a href="blueline">
            <?php echo $data['blue_line']['title']; ?>
          </a>
        </h3>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card lineup-card">
        <h3>
          <a href="greenline" class="heading-green">
            <?php echo $data['green_line']['title']; ?>
          </a>
        </h3>
      </div>
    </div>
  </div>
  <div class="row category-description">
    <div id="content" class="col-xs-12"><?php echo $content_top; ?>
      <h2><?php echo $heading_title; ?></h2>
      <?php if ($breakup_image) { ?>

      <div class="modal fade" id="breakup-zoom" tabindex="-1" role="dialog" aria-labelledby="breakup-label">
        <div class="modal-dialog" role="document" style="width: auto;">
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="breakup-zoom"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="breakup" style="position:relative">
        <a href="#" class="zoom-toggle" style="position: absolute; top: 15px; right: 15px; z-index: 10;"><i class="fa fa-search"></i></a>
        <img src="<?php echo  HTTP_SERVER . '/image/' .$breakup_image; ?>" alt="" class="breakup-image">
        <div class="map">
          <?php foreach ($spare_parts as $product) { ?>
            <?php if ($product['on_demand'] == 0) { ?>
              <a class="<?php echo $heading_title . '-' . $product['external_url_id'] . ' ' . $heading_title . '-' . $product['breakup_id']; ?>" href="http://shop.molpir.sk/default.aspx?content=TVRDETAIL&nparams=kod_id;<?php echo $product['external_url_id']; ?>"><span class="part-id"><?php echo $product['breakup_id'] ?></span>
                <div class="part-title"><strong><?php echo $product['name']; ?> <br> <?php echo $product['order_code']; ?></strong></div>
              </a>
            <?php } else { ?>
              <a class="toggle-modal-demand <?php echo $heading_title . '-' . $product['external_url_id'] . ' ' . $heading_title . '-' . $product['breakup_id']; ?>" href="#" data-order-code="<?php echo $product['order_code']; ?>" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['name']; ?>"><span class="part-id"><?php echo $product['breakup_id']; ?></span>
                <div class="part-title"><strong><?php echo $product['name']; ?> <br> <?php echo $product['order_code']; ?></strong></div>
              </a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
      <?php if ($thumb || $description) { ?>
      <div class="row">
        <?php if ($description) { ?>
        <div class="col-xs-12 description-content">
          <div class="card">
            <?php echo $description; ?>
          </div>
        </div>
        <?php } ?>
      </div>
      <br>
      <?php } ?>
      <?php if ($categories) { ?>
      <h3><?php echo $text_refine; ?></h3>
      <?php if (count($categories) <= 50) { ?>
      <div class="row">
        <div class="col-xs-12">
          <ul class="category-refine">
            <?php foreach ($categories as $category) { ?>
                <li>
                  <div class="card">
                    <a href="<?php echo $category['href']; ?>">
                    <img src="<?php echo $category['image']; ?>" alt="">
                    <?php echo $category['name']; ?></a>
                  </div>
                </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php } else { ?>
      <div class="row">
        <?php foreach (array_chunk($categories, ceil(count($categories) / 4)) as $categories) { ?>
        <div class="col-sm-3">
          <ul>
            <?php foreach ($categories as $category) { ?>
            <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
      </div>
      <?php } ?>
      <?php } ?>
      <?php if ($products) { ?>
      <div class="row category-settings">      

      <div class="col-xs-12">
        <a href="<?php echo $compare; ?>" id="compare-total"><?php echo $text_compare; ?></a>
      </div>

      <div class="col-xs-12">
        
        <div class="row">
          <div class="hidden-xs col-sm-3 display-toggle-buttons">
            <div class="btn-group hidden-xs">
              <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_list; ?>"><i class="fa fa-th-list"></i></button>
              <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_grid; ?>"><i class="fa fa-th"></i></button>
              <a id="print-view" href="<?php echo $print; ?>" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_print; ?>"><i class="fa fa-print"></i></a>
           </div>   
          </div>
          <div class="hidden-xs col-sm-6">
            <div class="row">
              <div class="col-sm-4 text-right">
                <label class="control-label" for="input-sort"><?php echo $text_sort; ?></label>
              </div>
              <div class="col-sm-8">
                <select id="input-sort" class="form-control" onchange="location = this.value;">
                  <?php foreach ($sorts as $sorts) { ?>
                  <?php if ($sorts['value'] == $sort . '-' . $order) { ?>
                  <option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-3">
            <div class="filter-order-code">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="<?php echo $text_order_code; ?>" name="filter_order_code">
                  <span id="search-submit" class="input-group-addon" style="border-radius: 0;"><i class="fa fa-search" style="font-size: 18px;"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <?php /*   
        <div class="col-xs-6 col-sm-3 text-left">
          <a href="<?php echo $compare; ?>" id="compare-total"><?php echo $text_compare; ?></a>  
        </div>

        <div class="col-xs-6 text-right col-sm-5 col-sm-custom">
          <label class="control-label" for="input-sort"><?php echo $text_sort; ?></label>
        </div>
        
        <div class="col-xs-12 col-sm-2">
          <select id="input-sort" class="form-control" onchange="location = this.value;">
            <?php foreach ($sorts as $sorts) { ?>
            <?php if ($sorts['value'] == $sort . '-' . $order) { ?>
            <option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
            <?php } ?>
            <?php } ?>
          </select>
        </div>

        <div class="col-sm-2 display-toggle">
          <div class="btn-group hidden-xs pull-right">
            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_list; ?>"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_grid; ?>"><i class="fa fa-th"></i></button>
          </div>          
        </div>

        */ ?>
      </div>
      <br />
      <div class="row category-products">
        <?php foreach ($products as $product) { ?>
        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" /></a></div>
            <div>
              <div class="caption">
                <h4><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h4>
                <?php if ($product['breakup_id']) { ?>
                  <span class="caption-breakupid"><a href="<?php echo $product['href']; ?>"><?php echo $product['breakup_id'] ?></a></span>
                <?php } ?>
                <p class="caption-description"><?php echo $product['description']; ?></p>
                <?php if ($product['order_code']) { ?>
                  <span class="order-code"><?php echo $text_order_code . ' <strong>' . $product['order_code'] .'</strong>'; ?></span>
                <?php } ?>
                <?php if ($product['rating']) { ?>
                <div class="rating">
                  <?php for ($i = 1; $i <= 5; $i++) { ?>
                  <?php if ($product['rating'] < $i) { ?>
                  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                  <?php } else { ?>
                  <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                  <?php } ?>
                  <?php } ?>
                </div>
                <?php } ?>
                <?php if ($product['on_demand'] == 0) { ?>
                  <?php if ($product['price']) { ?>
                  <p class="price">
                    <?php if (!$logged) { ?>
                      <?php if (!$product['special']) { ?>
                      <span class="text-blue"><?php echo $product['price']; ?></span>
                      <?php } else { ?>
                      <span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
                      <?php } ?>
                      <?php if ($product['tax']) { ?>
                      <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
                      <?php } ?>
                    <?php } else { ?>
                      <?php if (!$product['special']) { ?>
                      <span class="text-blue"><?php echo $product['tax']; ?></span>
                      <?php } else { ?>
                      <span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['tax']; ?></span>
                      <?php } ?>
                    <?php } ?>
                  </p>
                  <?php } ?>
                <?php } else { ?>
                <p class="price">
                  <span class="text-blue"><?php echo $text_on_demand; ?></span>
                </p>
                <?php } ?>
              </div>
              <div class="button-group">
                <?php /* <button type="button" onclick="cart.add('<?php echo $product['product_id']; ?>', '<?php echo $product['minimum']; ?>');"><i class="fa fa-shopping-cart"></i> <span><?php echo $button_cart; ?></span></button> */ ?>
                <?php if ($product['on_demand'] == 0) { ?>
                <button type="button">
                  <a href="http://shop.molpir.sk/default.aspx?content=TVRDETAIL&nparams=kod_id;<?php echo $product['external_url_id'] ?>" style="color: #999" class="nohover"><i class="fa fa-shopping-cart"></i> &nbsp;<?php echo $button_cart; ?></a>
                </button>
                <?php } else { ?>
                <button type="button">
                  <a href="#" class="toggle-modal-demand" data-order-code="<?php echo $product['order_code']; ?>" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['name']; ?>" style="color: #999;"><i class="fa fa-envelope"></i> &nbsp;<?php echo $button_order; ?></a>
                </button>
                <?php } ?>
                <button type="button" data-toggle="tooltip" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <br>
      <div class="row">
        <!-- <div class="col-sm-6 text-left"><?php //echo $pagination; ?></div> -->
        <!-- <div class="col-sm-6 text-right text-white"><?php // echo $results; ?></div> -->
      </div>
      <?php } ?>
      <?php if (!$categories && !$products) { ?>
      <p><?php echo $text_empty; ?></p>
      <div class="buttons">
        <div class="pull-right"><a href="<?php echo $continue; ?>" class="btn btn-primary"><?php echo $button_continue; ?></a></div>
      </div>
      <?php } ?>
      <div id="modal-demand" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Product title goes here</h4>
            </div>
            <div class="modal-body">
              <div class="alert alert-info" role="alert"><?php echo $text_info_demand; ?></div>
              <form id="form-demand" action="<?php echo $modal_action; ?>" method="post">
                <input type="text" hidden class="hidden" name="order_code">
                <input type="text" hidden class="hidden" name="product_name">
                <div class="form-group required">
                  <label class="col-sm-3 control-label"><?php echo $entry_firstname; ?></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="<?php echo $entry_firstname; ?>">
                    <div class="text-error error-name"><?php echo $error_empty; ?></div>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label"><?php echo $entry_email; ?></label>
                  <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" placeholder="<?php echo $entry_email; ?>">
                    <div class="text-error error-email"><?php echo $error_empty; ?></div>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label"><?php echo $entry_message; ?></label>
                  <div class="col-sm-9">
                    <textarea name="message" class="form-control" rows="5" placeholder="<?php echo $entry_message; ?>"></textarea>
                    <div class="text-error error-message"><?php echo $error_empty; ?></div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" style="color: #999;"><?php echo $button_cancel; ?></button>
              <button id="submit-form" type="button" class="btn btn-primary"><?php echo $button_submit; ?></button>
            </div>
          </div>
        </div>
      </div>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<script type="text/javascript">
  $('#search-submit').on('click', function(e) {
    var url = window.location.href;

    var filter_order_code = $('input[name=\'filter_order_code\']').val();
    if (filter_order_code) {
      url += '&filter_order_code=' + encodeURIComponent(filter_order_code);
    }

    location = url;
  });

  $('.toggle-modal-demand').on('click', function(e) {
    e.preventDefault();

    var id    = $(this).attr('data-product-id');
    var name  = $(this).attr('data-product-name');
    var code  = $(this).attr('data-order-code');

    if (name == '') {
      name = 'Undefined';
    }

    $('#modal-demand .modal-title').html(name);

    $('#modal-demand input[name=\'order_code\']').val(code);
    $('#modal-demand input[name=\'product_name\']').val(name);

    $('#modal-demand').modal();
  });

  $('#submit-form').parsley();

  $('#submit-form').on('click', function(e) {
    e.preventDefault();

    var valid = true;

    $('.error-name, .error-email, .error-message').hide();
    $('#modal-demand .form-group').removeClass('has-error');

    if($('input[name=\'name\']').val() == '') {
      $('.error-name').show();
      $('.error-name').parents('.form-group').addClass('has-error');

      valid = false;
    }

    if($('input[name=\'email\']').val() == '') {
      $('.error-email').show();
      $('.error-email').parents('.form-group').addClass('has-error');

      valid = false;
    }

    if($('textarea[name=\'message\']').val() == '') {
      $('.error-message').show();
      $('.error-message').parents('.form-group').addClass('has-error');

      valid = false;
    }

    if(valid) {
      $('#form-demand').submit();
    }

  })
</script>
<?php echo $footer; ?>
