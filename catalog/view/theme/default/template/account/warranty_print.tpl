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
<div class="container" style="width: 1000px !important; position: relative;">
  <div>
    <br>
    <div style="border: 2px dashed #000; height: 170px; width: 350px; position: absolute; right: 0; top: 190px; text-align: center; padding-top: 30px;"><?php echo $warranty_info['name']; ?></div>
    <div style="border: 2px dashed #000; height: 170px; width: 350px; position: absolute; right: 0; top: 690px; text-align: center; padding-top: 30px;"><?php echo $warranty_info['name']; ?></div>
    <p class="pull-right" style="display: block;">
      No. DE GARANTIA / WARRANTY NUMBER <?php echo $text_picklist; ?> <strong><?php echo $warranty_info['warranty_code']; ?></strong>
    </p><br>
    Referencia / Code <?php echo $text_order_code ?>: <?php echo $warranty_info['order_code']; ?><br>
    Vehicúlo - Marca - Modelo / Vehicle - Brand - Model <?php echo $text_vehicle_type; ?>: <?php echo $warranty_info['vehicle_type'];?><br>
    Matricúla / Registration <?php echo $text_ecv; ?>: <?php echo $warranty_info['ecv']; ?><br>
    *No. Chasis / Chasis No. <?php echo $text_vin; ?>: <?php echo $warranty_info['vin']; ?><br>
    *No. Compresor / Compressor No. <?php echo $text_compressor_number; ?>: <?php echo $warranty_info['compressor_number'];?><br>
    <span style="font-size: 12px;">* Nota / Note <?php echo $text_note; ?>: No rellenar si es un modelo evaporativo-Bycool / Do not fill in if it is an evaporative-Bycool <?php echo $text_bycool_note;?></span><br>
    Para Evaporativos Bycool / For Evaporative Bycool <?php echo $text_for_evaporative; ?><br>
    Modelo / Model <?php echo $text_model; ?>: <?php echo $warranty_info['product']; ?><br>
    No. de Serie / Serial Number <?php echo $text_serial_number; ?>: <?php echo $warranty_info['serial_number']; ?><br>
    <br>
    Cliente / Customer <?php echo $text_customer; ?>: <?php echo $warranty_info['customer_name']; ?><br>
    Domicilio / Address <?php echo $text_address; ?>: <?php echo $warranty_info['customer_address']; ?><br>
    Pais / Country <?php echo $text_country; ?>: <?php echo $warranty_info['customer_country']; ?><br>
    <br>
    Teléfono / Phone No. <?php echo $text_phone; ?>: <?php echo $warranty_info['customer_phone']; ?><br>
    Fecha Instalacíon / Installation date <?php echo $text_date_installed; ?>: <?php echo $warranty_info['date_installed']; ?><br>
    Firma y Sello del Vendedor-Instalador / Seller-Fitter Sign and Stamp<br>
    <?php echo $text_stamp; ?>:<br>
    PARA EL INSTALADOR-VENDEDOR / FOR THE INSTALLER/SELLER <?php echo $text_for_service_centre; ?>:<br>
    <i style="font-size: 12px;">Recorte esta tarjeta y una vez cumplimenatdo enviar el fabricantee / Once the warranty cards has been completed, cut and send it to the manufacturer <?php echo $text_service_instructions; ?></i><br><br>
    <div style="height: 0; width: 100%; border-bottom: 2px dashed #000; position: relative;">
      <img src="image/scissors.png" alt="" style="width: 35px; position: absolute; left: 20px; top: -10px;">
    </div>
    <br>
    <p class="pull-right" style="display: block;">
      No. DE GARANTIA / WARRANTY NUMBER <?php echo $text_picklist; ?> <strong><?php echo $warranty_info['warranty_code']; ?></strong>
    </p><br>
    Referencia / Code <?php echo $text_order_code ?>: <?php echo $warranty_info['order_code']; ?><br>
    Vehicúlo - Marca - Modelo / Vehicle - Brand - Model <?php echo $text_vehicle_type; ?>: <?php echo $warranty_info['vehicle_type'];?><br>
    Matricúla / Registration <?php echo $text_ecv; ?>: <?php echo $warranty_info['ecv']; ?><br>
    *No. Chasis / Chasis No. <?php echo $text_vin; ?>: <?php echo $warranty_info['vin']; ?><br>
    *No. Compresor / Compressor No. <?php echo $text_compressor_number; ?>: <?php echo $warranty_info['compressor_number'];?><br>
    <span style="font-size: 12px;">* Nota / Note <?php echo $text_note; ?>: No rellenar si es un modelo evaporativo-Bycool / Do not fill in if it is an evaporative-Bycool <?php echo $text_bycool_note;?></span><br>
    Para Evaporativos Bycool / For Evaporative Bycool <?php echo $text_for_evaporative; ?><br>
    Modelo / Model <?php echo $text_model; ?>: <?php echo $warranty_info['product']; ?><br>
    No. de Serie / Serial Number <?php echo $text_serial_number; ?>: <?php echo $warranty_info['serial_number']; ?><br><br>
    <p style="width: 65%; font-size: 13px; margin: 0; padding: 0;"><strong>EL USARIO DEBE RECIBIR DEL VENDEDOR Y LEER EL MANUAL DE USO Y MANTENIMIENTO DE EST EQUIPO ANTES DE SU UTILIZACIÓN / THE USER MUST RECEIVE AND READ THE USE AND MAINTENANCE MANUAL OF THIS KIT FROM THE SELLER BEFORE USING IT <?php echo $text_customer_warning; ?></strong></p><br>
    Fecha Instalacíon / Installation date <?php echo $text_date_installed; ?>: <?php echo $warranty_info['date_installed']; ?><br>
    Firma y Sello del Vendedor-Instalador / Seller-Fitter Sign and Stamp<br>
    <?php echo $text_stamp; ?>:<br>
    Para cualquier reclomoción en garontío, el servicio de Asistencia Técnico-Instolador enviorá o Dirno lo piezo acomponoda con lo fotocopio de esta torjeto o de lo fodura de compro del usuorio indicando el defecto observodo / For any warranty claim, the faulty part must be sent to Dirna by the Technical Assistance-Installer together with copy of this card or copy of the customer invoice, indicating the defect observed <?php echo $text_customer_instructions; ?><br>
    <p style="font-size: 10px; text-align:center;">CERTlFlCADO DE GARANTíA</p>
    <p style="font-size: 10px;">lo gorontío omporoda por este Certificodo para los equipos de Aire Acondicionodo Dirno cubre duranle el plazo de 2 onos los piezos o materiales con funcionomiento onormol o defedos de fobricoción, excluyendo lo correo de transmisión. En el coso de equipos de Aire Acondicionodo Dirno para vehículos industriales, el plazo es de 1 ono en los mismos condiciones. Esto garontío comprende lo reposición ci reporoción en opinión de DIRNA, SA, de lo piezo reconocido como defecfuoso. NO INClUYE LAMANO DE OBRA de lo sustitución en el vehículo. ni goslos de desplozomientos ni corgo de gas. En su coso ello gira por cuenlo del instolodor, yo que DIRNA como fabriconie sólo gorontizo el produeto. la goronlío no te09ré volidez cuondo Jo overío procedo de uno inodecuodo utilizoción del equipo o por modificociones y sustituciones efecfuodas sin nuestro expreso outorización, tombién cuondo el equipo o sus componentes hubieron sido monipulodos, reporodos o desmontados por personal na autorizodo por DIRNA, S.A. Poro lo vigencio de esto gorontío es imprescindible que este certificodo esté cumplimenlodo en todos sus dolos, qu.e contengan el sello y firma del instolodor y que el cliente presenle su ejemplor de garantio o nuestro personal autorizodo cuondo se lo solicite.</p>
    <p style="font-size: 10px; text-align:center;">WARRANTY CERTlFICATE</p>
    <p style="font-size: 10px;">The warranty covered by this Certificate for Dirna's AjC units covers for a term of 2 years the spare parts or materials with abnormal functioning or monufacturing defects, except the transmission belt. The warranty period for Dirna's Air conditioning Kits for industrial vehicles is , year with the same conditions. This warranty includes the replenishment or repair, in Dirna's opinion, of the recognised as faulty part. It does not include workmanship in the vehicle substitution, neither the displacement costs o gas charge in any case it would be in charge of the filler, because Dirna as a mqnufacturer only guarantees the product. The warranty will not have validity when the breakdown comes from an inadequate use of the unit, or from modifications and substihitions made without our express authorisation, and also when the unit or its components had been modified, manipulated, repaired or dismounted by non-authorised personne/. For this warranty force it is indispensable to ml in all the dota of this certificate; it should contain the filler stomp and sign ond it is necessáry that the customer shows the warranty certificate when our authorised personnel ask for it.</p>
    <p style="font-size: 10px; text-align:center; text-transform: uppercase;"><?php echo $text_certificate; ?></p>
    <p style="font-size: 10px;"><?php echo $text_warranty_certificate; ?></p>

    <?php /*
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
            <strong><?php echo $text_model; ?></strong> <?php echo $warranty_info['product']?> <br>
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
    */ ?>
  </div>
</div>
<script>
  $(document).ready(function(){
    window.print();
  });
</script>
</body>
</html>