<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<title><?php echo $data['heading_title']; ?></title>
<base href="<?php echo $base; ?>" />
<link href="catalog/view/javascript/bootstrap/bootstrap.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bootstrap/bootstrap.js"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="catalog/view/theme/default/stylesheet/print.css">
<style>
	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
		padding: 5px;
		font-size: 11px;
	}
</style>
</head>
<body onload="window.print();">
	<div class="" style="margin: 0 20px; position: relative;">
		<h2 style="font-weight: bold; text-transform: uppercase; text-align:center;"><?php echo $data['heading_title']; ?></h2>
		<img src="image/<?php echo $data['breakup_image']; ?>" alt="">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td><?php echo $column_id; ?></td>
					<td><?php echo $column_order_code; ?></td>
					<td><?php echo $column_title; ?></td>
					<td><?php echo $column_price; ?></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $product) { ?>
					<tr>
						<td><?php echo $product['breakup_id']; ?></td>
						<td><?php echo $product['order_code'] ?></td>
						<td><?php echo $product['name'] ?></td>
						<td><?php echo $product['price'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>