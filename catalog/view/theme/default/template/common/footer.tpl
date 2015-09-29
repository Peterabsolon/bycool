    </main><!-- /content -->    
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="about">
                <img src="image/catalog/molpirlogo.png" alt="Bycool" class="logo">
                <p>
                  <?php echo $text_aboutus; ?>
                </p>
                <a href="<?php echo $contact ?>" class="button"><?php echo $text_contactus ?></a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="row nav-footer">
                <div class="col-xs-6 col-sm-3">
                  <h3>Blue line</h3>
                  <ul>
                    <li><a href="revolution">R-Evolution</a></li>
                    <li><a href="flat">Flat</a></li>
                    <li><a href="mochila">Mochila</a></li>
                    <li><a href="camper">Camper</a></li>
                  </ul>
                </div>
                <div class="col-xs-6 col-sm-3">
                  <h3>Green line</h3>
                  <ul>
                    <li><a href="compact">Compact</a></li>
                    <li><a href="slimfit">SlimFit</a></li>
                    <li><a href="dinamic">Dinamic 1.1</a></li>
                    <li><a href="integralpower">Integral Power</a></li>
                    <li><a href="split">Split</a></li>
                    <li><a href="sun">Sun</a></li>
                  </ul>
                </div>
                <div class="col-xs-6 col-sm-3">
                  <h3>Menu</h3>
                  <ul>
                    
                    <li><a href="diely"><?php echo $menu_spareparts ?></a></li>
                    <li><a href="<?php echo $servis; ?>"><?php echo $menu_services ?></a></li>
                    <li><a href="<?php echo $contact; ?>"><?php echo $text_contact ?></a></li>
                    <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap ?></a></li>
                  </ul>
                </div>
                <div class="col-xs-6 col-sm-3">
                  <h3><?php echo $text_shopping; ?></h3>
                  <ul>
                    <?php /* <li><a href="<?php echo $cart ?>"><?php echo $text_shopping_cart ?></a></li> */ ?>
                    <?php if ($logged) { ?>
                    <li><a href="<?php echo $logout; ?>"><span><?php echo $text_logout; ?></span></a></li>
                    <?php } else { ?>
                    <li><a href="<?php echo $login; ?>"><span><?php echo $text_partner_login; ?></span></a></li>
                    <?php } ?>
                    <li><a href="files/obchodne-podmienky.pdf"><span><?php echo $text_terms; ?></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </footer><!-- /footer -->
  </div><!-- /page -->
</div><!-- /canvas -->
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->

<!-- Theme created by Welford Media for OpenCart 2.0 www.welfordmedia.co.uk -->

</body></html>