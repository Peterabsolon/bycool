<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<link href="catalog/view/theme/default/stylesheet/normalize.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<!-- <link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet"> -->
<link rel="stylesheet" href="catalog/view/theme/default/stylesheet/main.css">
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="catalog/view/javascript/plugins.js"></script>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<script src="catalog/view/javascript/common.js" type="text/javascript"></script>
<script src="catalog/view/javascript/main.js"></script>
</head>
<body class="<?php echo $class; ?>">
  <div class="canvas">
    <aside class="sidebar">
      <div class="search">
        <?php echo $search; ?>
      </div>
      <ul class="settings">
        <li class="settings-currency">
          <?php echo $currency; ?>
        </li>
        <li class="settings-language">
          <?php echo $language; ?>
        </li>
      </ul>
      <nav class="nav-sidebar">
        <ul>
          <li><a href="produkty"><i class="fa fa-shopping-cart"></i><span><?php echo $text_blueline; ?></span></a></li>
          <li><a href="diely"><i class="fa fa-gear"></i><span><?php echo $text_diely; ?></span></a></li>
          <li><a href="index.php?route=information/service_centres"><i class="fa fa-wrench"></i><span><?php echo $text_servis; ?></span></a></li>
          <li><a href="<?php echo $contact; ?>"><i class="fa fa-phone"></i><span><?php echo $text_contact; ?></span></a></li>
          <?php if ($logged) { ?>
          <li><a href="<?php echo $return; ?>"><i class="fa fa-file-o"></i><span><?php echo $text_returns; ?></span></a></li>
          <li><a href="<?php echo $warranty; ?>"><i class="fa fa-key"></i><span><?php echo $text_warranties; ?></span></a></li>
          <li><a href="<?php echo $logout; ?>"><i class="fa fa-sign-out"></i><span><?php echo $text_logout; ?></span></a></li>
          <?php } else { ?>
          <li><a href="<?php echo $login; ?>"><i class="fa fa-sign-in"></i><span><?php echo $text_login; ?></span></a></li>
          <?php } ?>          
        </ul>
      </nav>
      <div class="contact">
        <ul>
          <li>
            <span class="label"><?php echo $text_phone; ?></span><span class="value"><?php echo $telephone; ?></span>
          </li>
          <li>
            <span class="label">E-mail</span><span class="value"><?php echo $email; ?></span>
          </li>
        </ul>
      </div>
      <a href="#" class="button contact">Napíšte nám</a>
    </aside><!-- /sidebar -->  
    <div class="page">
      <header class="topstripe">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <ul class="contact">
                <li>
                  <span class="label"><?php echo $text_phone; ?></span><span class="value"><?php echo $telephone; ?></span>
                </li>
                <li>
                  <a href="mailto:<?php echo $email; ?>"><span class="label">E-mail</span><span class="value"><?php echo $email; ?></span></a>
                </li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="settings">
                <li class="settings-currency">
                  <?php echo $currency; ?>
                </li>
                <li class="settings-language">
                  <?php echo $language; ?>
                </li>
              </ul>
            </div>                       
          </div>
        </div>
      </header><!--/topstripe-->    
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12">
              <button class="menu-button menu-trigger">
                <a href="#">
                  <div><div></div></div>
                  <div><div></div></div>
                  <div><div></div></div>
                  <span class="menu-text">Menu</span>
                </a>
              </button>
              <a href="./index.php">
                <img src="image/logo.png" alt="Bycool" class="logo">
              </a>
              <div class="btn-group account">
                <?php if ($logged) { ?>
                <button data-toggle="dropdown" class="effect"><i class="fa fa-user"></i><?php echo $customer; ?><i class="fa fa-angle-down"></i></button>
                <?php } else { ?>
                <button data-toggle="dropdown" class="effect"><i class="fa fa-user"></i><?php echo $text_partners; ?><i class="fa fa-angle-down"></i></button>
                <?php } ?>
                <ul class="dropdown-menu">
                  <?php if ($logged) { ?>
                  <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
                  <li><a href="<?php echo $return; ?>"><?php echo $text_returns; ?></a></li>
                  <li><a href="<?php echo $warranty; ?>"><?php echo $text_warranties; ?></a></li>
                  <li class="separator"></li>
                  <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
                  <?php } else { ?>
                  <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>
                  <li><a href="<?php echo $partner_request; ?>"><?php echo $text_partner_request; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
              <?php /*
              <button class="cart-button effect cart-trigger">
                <a href="<?php echo $shopping_cart; ?>" title="<?php echo $text_shopping_cart; ?>">
                  <i class="fa fa-shopping-cart"></i>
                </a>
              </button>
              */ ?>
            </div>
          </div>
        </div>
      </header><!--/header-->
      <main class="content">
        
        <?php if(!empty($sale_banner)) { ?>
          <div class="container-fluid">
            <div class="row">
              <a href="<?php echo $sale_banner['href']; ?>">
                <div class="sale_banner" style="background-image: url('<?php echo $sale_banner['image']; ?>')">
                </div>
              </a>
            </div>
          </div>
        <?php } ?>

        <?php if(!empty($discount_banner)) { ?>
          <div class="container-fluid">
            <div class="row">
              <a href="<?php echo $discount_banner['href']; ?>">
                <div class="discount_banner" style="background-image: url('<?php echo $discount_banner['image']; ?>')">
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
      
    

