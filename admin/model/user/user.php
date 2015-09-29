<?php
class ModelUserUser extends Model {
	public function addUser($data) {
		$salt = $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9));

  		// create front user
		if($data['customer_group_id'] == 2) {
			$this->db->query("
				INSERT INTO `" . DB_PREFIX . "customer`
				SET 
					customer_group_id = 2,
					email = '" . $this->db->escape($data['username']) . "',
					discount = '" . $this->db->escape((int)$data['discount']) . "',
					salt = '" . $salt . "', 
					status = 1,
					approved = 1,
					password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "',
					date_added = now()
	  		");

	  		$customer_id = $this->db->getLastId();
		} else {
			$customer_id = 0;
		}

		$this->db->query("
			INSERT INTO `" . DB_PREFIX . "user` 
			SET username = '" . $this->db->escape($data['username']) . "', 
			  user_group_id = '" . (int)$data['user_group_id'] . "', 
			  user_service_centre_id = '" . (int)$data['user_service_centre_id'] . "',
			  customer_id = '" . $customer_id . "',
			  salt = '" . $salt . "', 
			  password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "', 
			  firstname = '" . $this->db->escape($data['firstname']) . "', 
			  lastname = '" . $this->db->escape($data['lastname']) . "', 
			  email = '" . $this->db->escape($data['email']) . "', 
			  image = '" . $this->db->escape($data['image']) . "', 
			  status = '" . (int)$data['status'] . "', 
			  date_added = now()
  		");
	}

	public function editUser($user_id, $data) {
		$salt = $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9));

		$this->db->query("
			UPDATE `" . DB_PREFIX . "user` 
			SET username = '" . $this->db->escape($data['username']) . "', 
			user_group_id = '" . (int)$data['user_group_id'] . "', 
			firstname = '" . $this->db->escape($data['firstname']) . "', 
			lastname = '" . $this->db->escape($data['lastname']) . "', 
			email = '" . $this->db->escape($data['email']) . "', 
			image = '" . $this->db->escape($data['image']) . "', 
			status = '" . (int)$data['status'] . "' 
			WHERE user_id = '" . (int)$user_id . "'");

		if($data['customer_group_id'] == 2) {
			$result = $this->db->query("
				SELECT *
				FROM `" . DB_PREFIX . "user` u
				WHERE u.user_id = '" . $user_id . "'
			");

			$row = $result->row;

			$customer_id = $row['customer_id'];

			$this->db->query("
				UPDATE `" . DB_PREFIX . "customer` c
				SET 
					email = '" . $this->db->escape($data['username']) . "',
					discount = '" . $this->db->escape((int)$data['discount']) . "',
					salt = '" . $salt . "', 
					password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "'
					WHERE c.customer_id = '" . $customer_id . "'
			");

			if ($data['password']) {
				$this->db->query("
					UPDATE `" . DB_PREFIX . "customer` 
					SET salt = '" . $salt . "', 
					password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "' 
					WHERE customer_id = '" . (int)$customer_id . "'
				");

				$this->db->query("
					UPDATE `" . DB_PREFIX . "user`
					SET salt = '" . $salt . "', 
					password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "' 
					WHERE user_id = '" . (int)$user_id . "'
				");
			}
		} else {
			if ($data['password']) {
				$this->db->query("
					UPDATE `" . DB_PREFIX . "user` 
					SET salt = '" . $salt . "', 
					password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "' 
					WHERE user_id = '" . (int)$user_id . "'");
			}
		}
	}

	public function editPassword($user_id, $password) {
		$this->db->query("UPDATE `" . DB_PREFIX . "user` SET salt = '" . $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($password)))) . "', code = '' WHERE user_id = '" . (int)$user_id . "'");
	}

	public function editCode($email, $code) {
		$this->db->query("UPDATE `" . DB_PREFIX . "user` SET code = '" . $this->db->escape($code) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}

	public function deleteUser($user_id) {
		$result = $this->db->query("
			SELECT *
			FROM `" . DB_PREFIX . "user` u
			WHERE u.user_id = '" . $user_id . "'
		");

		$row = $result->row;

		$customer_id = $row['customer_id'];
		
		$this->db->query("DELETE FROM `" . DB_PREFIX . "user` WHERE user_id = '" . (int)$user_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer` WHERE customer_id = '" . (int)$customer_id . "'");
	}

	public function getUser($user_id) {
		$query = $this->db->query("
			SELECT *, 
			u.firstname as user_firstname,
			u.lastname as user_lastname,
				(SELECT ug.name FROM `" . DB_PREFIX . "user_group` ug WHERE ug.user_group_id = u.user_group_id) AS user_group 
			FROM `" . DB_PREFIX . "user` u 
			LEFT JOIN `" . DB_PREFIX . "customer` c
			ON u.customer_id = c.customer_id
			WHERE u.user_id = '" . (int)$user_id . "'");

		return $query->row;
	}

	public function getUserByUsername($username) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "user` WHERE username = '" . $this->db->escape($username) . "'");

		return $query->row;
	}

	public function getUserByCode($code) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "user` WHERE code = '" . $this->db->escape($code) . "' AND code != ''");

		return $query->row;
	}

	public function getUsers($data = array()) {
		$sql = "SELECT * FROM `" . DB_PREFIX . "user`";

		$sort_data = array(
			'username',
			'status',
			'date_added'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY username";
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

	public function getTotalUsers() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "user`");

		return $query->row['total'];
	}

	public function getTotalUsersByGroupId($user_group_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "user` WHERE user_group_id = '" . (int)$user_group_id . "'");

		return $query->row['total'];
	}

	public function getTotalUsersByEmail($email) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "user` WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row['total'];
	}
}