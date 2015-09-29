<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<link href="catalog/view/javascript/bootstrap/bootstrap.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bootstrap/bootstrap.js"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="catalog/view/theme/default/stylesheet/print.css">
</head>
<body>
<div class="container">
  <div>
    <br>
    <h2>
      <?php echo $text_picklist; ?> #<?php echo $warranty_info['warranty_id']; ?>
    </h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>
            <?php echo $text_service_centre; ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <strong><?php echo $text_service_name; ?></strong> <?php echo $warranty_info['name']; ?> <br>
            <strong><?php echo $text_address; ?></strong> <?php echo $warranty_info['address']; ?> <br>
            <strong><?php echo $text_phone; ?></strong> <?php echo $warranty_info['phone']; ?> <br>
            <strong><?php echo $text_fax; ?></strong> <?php echo $warranty_info['fax']; ?> <br>
            <strong><?php echo $text_email; ?></strong> <?php echo $warranty_info['email']; ?> <br>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>
            <?php echo $text_warranty_data; ?>
          </td>
          <td style="width: 30%">
            <?php echo $text_stamp; ?>
          </td>
          <td style="width: 30%">
            <?php echo $text_signature; ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <strong><?php echo $text_warranty_code; ?></strong> <?php echo $warranty_info['warranty_code']?> <br>
            <strong><?php echo $text_order_code; ?></strong> <?php echo $warranty_info['order_code']?> <br>
            <strong><?php echo $text_vehicle_type; ?></strong> <?php echo $warranty_info['vehicle_type']?> <br>
            <strong><?php echo $text_ecv; ?></strong> <?php echo $warranty_info['ecv']?> <br>
            <strong><?php echo $text_vin; ?></strong> <?php echo $warranty_info['vin']?> <br>
            <strong><?php echo $text_compressor_number; ?></strong> <?php echo $warranty_info['compressor_number']?> <br>
            <strong><?php echo $text_model; ?></strong> <?php echo $warranty_info['model']?> <br>
            <strong><?php echo $text_serial_number; ?></strong> <?php echo $warranty_info['serial_number']?> <br>
            <strong><?php echo $text_date_installed; ?></strong> <?php echo $warranty_info['date_installed']?> 
          </td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <p class="print-note text-center">
      <strong>
        <?php echo $text_customer_warning; ?>
      </strong>
    </p>
    <p class="print-note">
      <?php echo $text_warranty_certificate; ?>
    </p>
  </div>
</div>
</body>
</html>