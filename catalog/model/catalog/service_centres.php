<?php
class ModelCatalogServiceCentres extends Model {
	public function getServiceCentres() {
		$query = $this->db->query("
			SELECT *,
			sc.email as service_centre_email,
			sc.service_centre_id as service_centre_id
			FROM `" . DB_PREFIX . "service_centre` sc
			ORDER BY sc.city
		");

		return $query->rows;
	}

	public function getCountries($language_id) {
		$query = $this->db->query("
			SELECT DISTINCT cn.country_name,
			cn.country_id
			FROM `" . DB_PREFIX . "service_centre` sc
			LEFT JOIN `" . DB_PREFIX . "country_name` cn
			ON sc.country_id = cn.country_id
			WHERE cn.language_id = '" . $language_id . "'
		");

		return $query->rows;
	}
}