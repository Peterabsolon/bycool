<?php echo $header; ?>
<section class="banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="banner">
          <div class="item item-1">
            <div class="overlay"></div>
            <div class="caption">
              <div class="container-fluid">
                <h2><?php echo $banner_1_headline; ?></h2>
                <h3><?php echo $banner_1_subheadline; ?></h3>
                <a href="produkty" class="button"><?php echo $banner_1_button; ?></a>
              </div>
            </div>
          </div>
          <div class="item item-2">
            <div class="caption">
              <div class="container-fluid">
                <h2><?php echo $banner_2_headline; ?></h2>
                <h3><?php echo $banner_2_subheadline; ?></h3>
                <img src="image/banner/product_slimfit.png" alt="" class="photo">
                <a href="slimfit" class="button"><?php echo $banner_2_button; ?></a>
              </div>
            </div>
          </div>
          <div class="item item-3">
            <div class="caption">
              <div class="container-fluid">
                <h2><?php echo $banner_3_headline; ?></h2>
                <h3><?php echo $banner_3_subheadline; ?></h3>
                <img src="image/banner/product_compact.png" alt="" class="photo">
                <a href="compact_16molpir" class="button"><?php echo $banner_3_button; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /banner -->
<section class="lineup">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-left">
        <div class="card card-blue">
          <div class="card-header">
            <div class="card-icon">
              <div class="icon icon-blueline"></div>
            </div>
            <div class="card-title">
              <h2><?php echo $data['blue_line']['headline']; ?></h2>
            </div>
          </div>
          <div class="card-body">
            <div class="card-body-content">
              <?php echo $data['blue_line']['description']; ?>
            </div>
            <a href="blueline" class="button">Blue line</a>
          </div>
        </div><!-- /card-blue -->  
      </div>
      <div class="col-sm-6 col-right">
        <div class="card card-green">
          <div class="card-header">
            <div class="card-icon">
              <div class="icon icon-greenline"></div>
            </div>
            <div class="card-title">
              <h2><?php echo $data['green_line']['headline']; ?></h2>
            </div>
          </div>
          <div class="card-body">
            <div class="card-body-content">
              <?php echo $data['green_line']['description']; ?>
            </div>
            <a href="greenline" class="button green">Green line</a>
          </div>
        </div><!-- /card-green -->
      </div>
    </div>
  </div>
</section><!-- /lineup -->
<section class="newsletter">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <h2>Newsletter</h2>
        <p><?php echo $text_newsletter ?></p>
      </div>
      <form class="form" method="post" action="index.php?route=account/register/subscribeguest" id="homepage-newsletter">
        <input type="text" name="email"placeholder="<?php echo $data['newsletter_index']['email']; ?>" class="email">
        <input name="submit" id="homepage-submit" type="submit" class="button" value="<?php echo $data['newsletter_index']['button']; ?>">
      </form>
    </div>
  </div>
</section>
<script type="text/javascript">
</script>
<?php echo $footer; ?>
