<?php
class ModelSaleWarranty extends Model {
	public function addWarranty($data) {
		$this->db->query("
			INSERT INTO `" . DB_PREFIX. "warranty`
			SET 
				warranty_code = '". $this->db->escape($data['warranty_code']) ."',
				customer_id = '". $this->db->escape($data['customer_id']) ."',
				order_code = '". $this->db->escape($data['order_code']) ."',
				vehicle_type = '". $this->db->escape($data['vehicle_type']) ."',
				ecv = '". $this->db->escape($data['ecv']) ."',
				vin = '". $this->db->escape($data['vin']) ."',
				compressor_number = '". (int)$data['compressor_number'] ."',
				product = '". $this->db->escape($data['product']) ."',
				serial_number = '". $this->db->escape($data['serial_number']) ."',
				customer_name = '". $this->db->escape($data['customer_name']) ."',
				customer_address = '". $this->db->escape($data['customer_address']) ."',
				customer_country = '". $this->db->escape($data['customer_country']) ."',
				customer_phone = '". $this->db->escape($data['customer_phone']) ."',
				customer_email = '". $this->db->escape($data['customer_email']) ."',
				date_installed = '". $this->db->escape($data['date_installed']) ."',
				date_added = NOW(),
				date_modified = NOW()
		");
	}

	public function editWarranty($warranty_id, $data) {
		$this->db->query("
			UPDATE `" . DB_PREFIX . "warranty` 
			SET 
				warranty_code = '". $this->db->escape($data['warranty_code']) ."',
				customer_id = '". $this->db->escape($data['customer_id']) ."',
				order_code = '". $this->db->escape($data['order_code']) ."',
				vehicle_type = '". $this->db->escape($data['vehicle_type']) ."',
				ecv = '". $this->db->escape($data['ecv']) ."',
				vin = '". $this->db->escape($data['vin']) ."',
				compressor_number = '". (int)$data['compressor_number'] ."',
				product = '". $this->db->escape($data['product']) ."',
				serial_number = '". $this->db->escape($data['serial_number']) ."',
				customer_name = '". $this->db->escape($data['customer_name']) ."',
				customer_address = '". $this->db->escape($data['customer_address']) ."',
				customer_country = '". $this->db->escape($data['customer_country']) ."',
				customer_phone = '". $this->db->escape($data['customer_phone']) ."',
				customer_email = '". $this->db->escape($data['customer_email']) ."',
				date_installed = '". $this->db->escape($data['date_installed']) ."',
				date_modified = NOW()
				WHERE warranty_id = '" . (int)$warranty_id ."'
		");
	}

	public function deleteWarranty($warranty_id) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "warranty` WHERE warranty_id = '" . (int)$warranty_id . "'");
	}

	public function getWarranty($warranty_id) {
		$query = $this->db->query("
			SELECT * 
			FROM " . DB_PREFIX . "warranty w
			WHERE w.warranty_id = '" . (int)$warranty_id . "'"
		);

		return $query->row;
	}

	public function getWarranties($data = array()) {
		$sql = "
			SELECT 
				w.*,
				CONCAT(c.firstname, ' ', c.lastname) as customer
			FROM " . DB_PREFIX . "warranty w
			LEFT JOIN " . DB_PREFIX . "customer c
			ON c.customer_Id = w.customer_id
		";

		$implode = array();

		if (!empty($data['filter_warranty_id'])) {
			$implode[] = "w.warranty_id= '" . $this->db->escape($data['filter_warranty_id']) . "'";
		}

		if (!empty($data['filter_warranty_code'])) {
			$implode[] = "w.warranty_code= '" . $this->db->escape($data['filter_warranty_code']) . "'";
		}

		if (!empty($data['filter_customer'])) {
			$implode[] = "CONCAT(c.firstname, ' ', c.lastname) LIKE '%" . $this->db->escape($data['filter_customer']) . "%'";
		}

		if (!empty($data['filter_client'])) {
			$implode[] = "w.customer_name LIKE '%" . $this->db->escape($data['filter_client']) . "%'";
		}

		if (!empty($data['filter_product'])) {
			$implode[] = "w.product LIKE '%" . $this->db->escape($data['filter_product']) . "%'";
		}

		if (!empty($data['filter_ecv'])) {
			$implode[] = "w.ecv= '" . $this->db->escape($data['filter_ecv']) . "'";
		}

		if (!empty($data['filter_order_code'])) {
			$implode[] = "w.order_code= '" . $this->db->escape($data['filter_order_code']) . "'";
		}

		if (!empty($data['filter_serial_number'])) {
			$implode[] = "w.serial_number= '" . $this->db->escape($data['filter_serial_number']) . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$implode[] = 	"w.date_added= '" . $this->db->escape($data['filter_date_added']) . "'";
		}

		if (!empty($data['filter_date_modified'])) {
			$implode[] = "w.date_modified= '" . $this->db->escape($data['filter_date_modified']) . "'";
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$sort_data = array(
			'w.warranty_id',
			'w.warranty_code',
			'customer',
			'w.ecv',
			'w.product',
			'w.order_code',
			'w.serial_number',
			'w.date_added',
			'w.date_modified',
			'w.date_installed'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY w.warranty_id";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalWarranties($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "warranty` w LEFT JOIN " . DB_PREFIX . "customer c ON c.customer_Id = w.customer_id";

		$implode = array();

		if (!empty($data['filter_warranty_id'])) {
			$implode[] = "w.warranty_id= '" . $this->db->escape($data['filter_warranty_id']) . "'";
		}

		if (!empty($data['filter_warranty_code'])) {
			$implode[] = "w.warranty_code= '" . $this->db->escape($data['filter_warranty_code']) . "'";
		}

		if (!empty($data['filter_customer'])) {
			$implode[] = "CONCAT(c.firstname, ' ', c.lastname) LIKE '%" . $this->db->escape($data['filter_customer']) . "%'";
		}

		if (!empty($data['filter_client'])) {
			$implode[] = "w.customer_name LIKE '%" . $this->db->escape($data['filter_client']) . "%'";
		}

		if (!empty($data['filter_product'])) {
			$implode[] = "w.product LIKE '%" . $this->db->escape($data['filter_product']) . "%'";
		}

		if (!empty($data['filter_ecv'])) {
			$implode[] = "w.ecv= '" . $this->db->escape($data['filter_ecv']) . "'";
		}

		if (!empty($data['filter_order_code'])) {
			$implode[] = "w.order_code= '" . $this->db->escape($data['filter_order_code']) . "'";
		}

		if (!empty($data['filter_serial_number'])) {
			$implode[] = "w.serial_number= '" . $this->db->escape($data['filter_serial_number']) . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$implode[] = 	"w.date_added= '" . $this->db->escape($data['filter_date_added']) . "'";
		}

		if (!empty($data['filter_date_modified'])) {
			$implode[] = "w.date_modified= '" . $this->db->escape($data['filter_date_modified']) . "'";
		}


		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function printWarranty($warranty_id) {
		$sql = "
			SELECT w.*, CONCAT(c.firstname, ' ', c.lastname) AS name
			FROM `". DB_PREFIX ."warranty` w
			LEFT JOIN `" . DB_PREFIX . "customer` c
			ON w.customer_id = c.customer_id
			WHERE w.warranty_id = '" . $warranty_id . "'
		";	

		$query = $this->db->query($sql);

		return $query->row;
	}
}