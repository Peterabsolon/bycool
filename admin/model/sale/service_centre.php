<?php
class ModelSaleServiceCentre extends Model {
	public function addServiceCentre($data) {
		$this->db->query("
			INSERT INTO `" . DB_PREFIX . "service_centre`
			SET
				name = '" . $this->db->escape($data['name']) . "',
				contact_person = '" . $this->db->escape($data['contact_person']) . "',
				address = '" . $this->db->escape($data['address']) . "',
				city = '" . $this->db->escape($data['city']) . "',
				country_id = '" . (int)$data['country'] . "',
				phone = '" . $this->db->escape($data['phone']) . "',
				fax = '" . $this->db->escape($data['fax']) . "',
				email = '" . $this->db->escape($data['email']) . "',
				ico = '" . $this->db->escape($data['ico']) . "',
				dic = '" . $this->db->escape($data['dic']) . "',
				icdph = '" . $this->db->escape($data['icdph']) . "',
				opening_hours = '" . $this->db->escape($data['opening_hours']) . "',
				note = '" . $this->db->escape($data['note']) . "',
				date_added = NOW(),
				date_modified = NOW()
		");
	}

	public function editServiceCentre($service_centre_id, $data) {
		$this->db->query("
			UPDATE `" . DB_PREFIX . "service_centre`
			SET
				name = '" . $this->db->escape($data['name']) . "',
				contact_person = '" . $this->db->escape($data['contact_person']) . "',
				address = '" . $this->db->escape($data['address']) . "',
				city = '" . $this->db->escape($data['city']) . "',
				country_id = '" . (int)$data['country'] . "',
				phone = '" . $this->db->escape($data['phone']) . "',
				fax = '" . $this->db->escape($data['fax']) . "',
				email = '" . $this->db->escape($data['email']) . "',
				ico = '" . $this->db->escape($data['ico']) . "',
				dic = '" . $this->db->escape($data['dic']) . "',
				icdph = '" . $this->db->escape($data['icdph']) . "',
				opening_hours = '" . $this->db->escape($data['opening_hours']) . "',
				note = '" . $this->db->escape($data['note']) . "',
				date_added = NOW(),
				date_modified = NOW()
				WHERE service_centre_id = '" . $service_centre_id . "'
		");
	}

	public function deleteServiceCentre($service_centre_id) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "service_centre` WHERE service_centre_id = '" . (int)$service_centre_id . "'");
	}


	public function getServiceCentre($service_centre_id) {
		$query = $this->db->query("
			SELECT *
			FROM `" . DB_PREFIX . "service_centre` sc
			LEFT JOIN `" . DB_PREFIX . "user` u
			ON u.user_service_centre_id = sc.service_centre_id
			WHERE sc.service_centre_id = '" . $service_centre_id . "'
		");

		return $query->row;
	}

	public function getServiceCentres($filter_data = array()) {
		$sql = "
			SELECT 
				*,
				cn.country_name as country
			FROM `" . DB_PREFIX . "service_centre` sc
			LEFT JOIN `" . DB_PREFIX . "country_name` cn
			ON sc.country_id = cn.country_id AND language_id = 2
		";

		$implode = array();

		if (!empty($filter_data['filter_service_centre_id'])) {
			$implode[] = "sc.service_centre_id= '" . $this->db->escape($filter_data['filter_service_centre_id']) . "'";
		}

		if (!empty($filter_data['filter_name'])) {
			$implode[] = "name LIKE '" . $this->db->escape($filter_data['filter_name']) . "%'";
		}

		if (!empty($filter_data['filter_address'])) {
			$implode[] = "address LIKE '" . $this->db->escape($filter_data['filter_address']) . "%'";
		}

		if (!empty($filter_data['filter_city'])) {
			$implode[] = "city LIKE '" . $this->db->escape($filter_data['filter_city']) . "%'";
		}

		// if (!empty($filter_data['filter_country'])) {
		// 	$implode[] = "country LIKE '" . $this->db->escape($filter_data['filter_country']) . "%'";
		// }

		if (!empty($filter_data['filter_date_added'])) {
			$implode[] = "sc.date_added= '" . $this->db->escape($filter_data['filter_date_added']) . "'";
		}

		if (!empty($filter_data['filter_date_modified'])) {
			$implode[] = "sc.date_modified= '" . $this->db->escape($filter_data['filter_date_modified']) . "'";
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		if (isset($filter_data['start']) || isset($filter_data['limit'])) {
			if ($filter_data['start'] < 0) {
				$filter_data['start'] = 0;
			}

			if ($filter_data['limit'] < 1) {
				$filter_data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$filter_data['start'] . "," . (int)$filter_data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalServiceCentres() {
		$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "service_centre` sc";

		$implode = array();

		if (!empty($filter_data['filter_service_centre_id'])) {
			$implode[] = "sc.service_centre_id= '" . $this->db->escape($filter_data['filter_service_centre_id']) . "'";
		}

		if (!empty($filter_data['filter_name'])) {
			$implode[] = "name LIKE '" . $this->db->escape($filter_data['filter_name']) . "%'";
		}

		if (!empty($filter_data['filter_address'])) {
			$implode[] = "address LIKE '" . $this->db->escape($filter_data['filter_address']) . "%'";
		}

		if (!empty($filter_data['filter_city'])) {
			$implode[] = "city LIKE '" . $this->db->escape($filter_data['filter_city']) . "%'";
		}

		if (!empty($filter_data['filter_country'])) {
			$implode[] = "country LIKE '" . $this->db->escape($filter_data['filter_country']) . "%'";
		}

		if (!empty($filter_data['filter_date_added'])) {
			$implode[] = "sc.date_added= '" . $this->db->escape($filter_data['filter_date_added']) . "'";
		}

		if (!empty($filter_data['filter_date_modified'])) {
			$implode[] = "sc.date_modified= '" . $this->db->escape($filter_data['filter_date_modified']) . "'";
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		if (isset($filter_data['start']) || isset($filter_data['limit'])) {
			if ($filter_data['start'] < 0) {
				$filter_data['start'] = 0;
			}

			if ($filter_data['limit'] < 1) {
				$filter_data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$filter_data['start'] . "," . (int)$filter_data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getServiceCentreByUserId($user_id) {
		$query = $this->db->query("
			SELECT sc.service_centre_id
			FROM `" . DB_PREFIX . "service_centre` sc
			LEFT JOIN `" . DB_PREFIX . "user` u
			ON u.user_service_centre_id = sc.service_centre_id
			WHERE u.user_id = '" . $user_id . "'
		");

		return $query->rows;
	}

	// public function getServiceCentres($data = array()) {
	// 	$sql = "
	// 		SELECT 
	// 			sc.service_centre_id
	// 			sc.name
	// 		FROM " . DB_PREFIX . "customer_centre sc
	// 	";

	// 	$implode = array();

	// 	if(!empty($data['filter_service_centre_id'])) {
	// 		$implode[] = "WHERE sc.name";
	// 	}

	// 	if($implode) {
	// 		$sql .= " " . implode(" AND ", $implode);
	// 	}

	// 	print_r($sql);
	// 	die;
	// }
}
