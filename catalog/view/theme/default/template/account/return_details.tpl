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
      <?php echo $text_picklist; ?> #<?php echo $return_details['return_id']; ?>
    </h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td style="width: 50%;">
            <?php echo $text_details; ?>
          </td>
          <td>
            <?php echo $text_service_name; ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <strong><?php echo $column_return_code ?></strong>: <?php echo $return_details['return_code']; ?><br>
            
            <strong><?php echo $entry_date_added; ?></strong>: <?php echo $return_details['date_added']; ?><br>

            <strong><?php echo $entry_invoice_code; ?></strong>: <?php echo $return_details['invoice_code']; ?><br>            

            <strong><?php echo $entry_warranty_code; ?></strong>: <?php echo $return_details['warranty_code']; ?><br>            

            <strong><?php echo $entry_solution; ?></strong>: <?php echo $return_details['solution']; ?><br>

            <strong><?php echo $entry_note; ?></strong>: <?php echo $return_details['note']; ?><br>
          </td>
          <td>
            <strong><?php echo $text_service_name; ?></strong>: <?php echo $return_details['service_centre']; ?> <br>
            
            <strong><?php echo $text_service_address; ?></strong>: <?php echo $return_details['address']; ?> <br>

            <strong><?php echo $text_phone; ?></strong>: <?php echo $return_details['phone']; ?> <br>

            <strong><?php echo $text_service_user; ?></strong>: <?php echo $return_details['contact_person']; ?> <br>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td style="width: 50%;">
            <?php echo $text_product_info; ?>
          </td>
          <td>
            <?php echo $text_vehicle_info; ?>  
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <strong><?php echo $entry_date_installed; ?></strong> <?php echo $return_details['date_installed']; ?><br>

            <strong><?php echo $entry_model; ?></strong> <?php echo $return_details['model']; ?><br>

            <strong><?php echo $entry_serial_number; ?></strong> <?php echo $return_details['serial_number']; ?><br>

            <strong><?php echo $entry_order_code; ?></strong> <?php echo $return_details['order_code']; ?><br>
          </td>
          <td>
            <strong><?php echo $entry_vehicle_type; ?></strong> <?php echo $return_details['vehicle_type']; ?><br>

            <strong><?php echo $entry_vehicle_model; ?></strong> <?php echo $return_details['vehicle_model']; ?><br>

            <strong><?php echo $entry_ecv; ?></strong> <?php echo $return_details['ecv']; ?><br>

            <strong><?php echo $entry_vehicle_year; ?></strong> <?php echo $return_details['vehicle_year']; ?><br>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>
            <?php echo $entry_return_item; ?>
          </td>
          <td>
            <?php echo $entry_order_code; ?>
          </td>
          <td>
            <?php echo $entry_quantity ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 1; $i <= 5; $i++) { ?>
          <?php if(isset($return_details['return_item_' . $i . '_name'])) { ?>
            <tr>
              <td>
                <?php echo $return_details['return_item_' . $i . '_name']; ?>
              </td>
              <td>
                <?php echo $return_details['return_item_' . $i . '_order_code']; ?>
              </td>
              <td>
                <?php 
                  if($return_details['return_item_' . $i . '_quantity'] != 0) {
                    echo $return_details['return_item_' . $i . '_quantity']; 
                  }
                ?>
              </td>
            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>
            <?php echo $text_failure_descritpion; ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 50%;">
            <?php echo $return_details['fault_description']; ?>      
          </td>
        </tr>
      </tbody>
    </table>
    <p><?php echo $warning_title; ?></p>
    <ul>
      <li><?php echo $warning_1; ?></li>
      <li><?php echo $warning_2; ?></li>
      <li><?php echo $warning_3; ?></li>
      <li><?php echo $warning_4; ?></li>
    </ul>
    <p><?php echo $warning_footer; ?></p>
  </div>
</div>
</body>
</html>