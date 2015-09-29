<?php
class ControllerSaleReturn extends Controller {
	private $error = array();

	private $index_keys = array(
		array('return_id', 0),
		array('return_code', 0),
		array('service_centre', 1),
		array('product', 1),
		array('order_code', 0),
		array('return_status_id', 0),
		array('date_received', 0),
		array('date_installed', 0),
		array('date_added', 0),
		array('date_modified', 0)
	);

	private $data_keys = array(
		'return_code',
		'product_name',
		'order_code',
		'user_id',
		'return_item_1_name',
		'return_item_1_order_code',
		'return_item_1_quantity',
		'return_item_2_name',
		'return_item_2_order_code',
		'return_item_2_quantity',
		'return_item_3_name',
		'return_item_3_order_code',
		'return_item_3_quantity',
		'return_item_4_name',
		'return_item_4_order_code',
		'return_item_4_quantity',
		'return_item_5_name',
		'return_item_5_order_code',
		'return_item_5_quantity',
		'service_centre',
		'address',
		'city',
		'contact_person',
		'phone',
		'vehicle_type',
		'vehicle_model',
		'return_status_id',
		'return_action_id',
		'ecv',
		'vin',
		'vehicle_year',
		'serial_number',
		'invoice_code',
		'warranty_code',
		'return_note',
		'comment',
		'proposal',
		'date_added',
		'date_modified',
		'date_installed'
	);

	public function index() {
		$this->load->language('sale/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/return');

		$this->getList();
	}

	public function add() {
		$this->load->language('sale/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/return');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_sale_return->addReturn($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			$url = $this->getFilterUrl($url);

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('sale/return', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('sale/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/return');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_sale_return->editReturn($this->request->get['return_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			$url = $this->getFilterUrl($url);

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('sale/return', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('sale/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/return');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $return_id) {
				$this->model_sale_return->deleteReturn($return_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			$url = $this->getFilterUrl($url);

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('sale/return', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function getList() {
		$filter_data = $this->getFilters();

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'r.return_id';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$filter_data += array(
			'sort'                    => $sort,
			'order'                   => $order,
			'start'                   => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'                   => $this->config->get('config_limit_admin')
		);

		$url = '';

		$url = $this->getFilterUrl($url);

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/return', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('sale/return/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('sale/return/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$return_total = $this->model_sale_return->getTotalReturns($filter_data);

		$user_id = $this->user->getId();

		$group_id = $this->user->getGroupId();

		if($group_id == 1) { // if admin
			$data['is_admin'] = 1;

			$results = $this->model_sale_return->getReturns($filter_data);

			$data['returns'] = array();

			foreach ($results as $result) {
				$data['returns'][] = array(
					'return_id' 				  => $result['return_id'],
					'return_code' 			  => $result['return_code'],
					'partner' 						=> $result['partner'],
					'order_code' 				  => $result['order_code'],
					'product_name' 		    => $result['product_name'],
					'status' 	  					=> $result['name'],
					'date_received' 		  => date($this->language->get('date_format_short'), strtotime($result['date_received'])),
					'date_installed' 		  => date($this->language->get('date_format_short'), strtotime($result['date_installed'])),
					'date_added' 				  => date($this->language->get('date_format_short'), strtotime($result['return_date_added'])),
					'date_modified' 		  => date($this->language->get('date_format_short'), strtotime($result['return_date_modified'])),
					'details'             => $this->url->link('sale/return/details', 'token=' . $this->session->data['token'] . '&return_id=' . $result['return_id'] . $url, 'SSL'),
					'edit'          	    => $this->url->link('sale/return/edit', 'token=' . $this->session->data['token'] . '&return_id=' . $result['return_id'] . $url, 'SSL')
				);
			}
		} else {
			$data['is_admin'] = '';

			$this->load->model('user/user');

			$user_data = $this->model_user_user->getUser($user_id);

			if($user_data) {
				$service_centre_id = $user_data['user_service_centre_id'];
			} else {
				$service_centre_id = '';
			}

			$filter_data += array(
				'filter_service_centre_id' => $service_centre_id
			);

			$results = $this->model_sale_return->getReturns($filter_data);

			$data['returns'] = array();

			foreach ($results as $result) {
				$data['returns'][] = array(
					'return_id' 				  => $result['return_id'],
					'return_code' 			  => $result['return_code'],
					'partner' 						=> $result['partner'],
					'order_code' 				  => $result['order_code'],
					'product_name' 		    => $result['product_name'],
					'status' 	  					=> $result['name'],
					'date_received' 		  => date($this->language->get('date_format_short'), strtotime($result['date_received'])),
					'date_installed' 		  => date($this->language->get('date_format_short'), strtotime($result['date_installed'])),
					'date_added' 				  => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
					'date_modified' 		  => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
					'details'             => $this->url->link('sale/return/details', 'token=' . $this->session->data['token'] . '&return_id=' . $result['return_id'] . $url, 'SSL'),
					'edit'          	    => $this->url->link('sale/return/edit', 'token=' . $this->session->data['token'] . '&return_id=' . $result['return_id'] . $url, 'SSL')
				);
			}
		}

		$data += $this->language->load('sale/return');

		$data['token'] = $this->session->data['token'];

		if (isset($this->session->data['error'])) {
			$data['error_warning'] = $this->session->data['error'];

			unset($this->session->data['error']);
		} elseif (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		$url = $this->getFilterUrl;

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		foreach($this->index_keys as $key => $value) {
			$data['sort_' . $value[0]] = $this->url->link('sale/return', 'token=' . $this->session->data['token'] . '&sort=r.' . $value[0] . $url, 'SSL');
		}
	
		$url = $this->getFilterUrl;

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $return_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('sale/return', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($return_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($return_total - $this->config->get('config_limit_admin'))) ? $return_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $return_total, ceil($return_total / $this->config->get('config_limit_admin')));

		foreach($this->index_keys as $key => $value) {
			$value[0] = 'filter_' . $value[0];
			$data[$value[0]] = $filter_data[$value[0]];
		}

		$this->load->model('localisation/return_status');

		$data['return_statuses'] = $this->model_localisation_return_status->getReturnStatuses();

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/return_list.tpl', $data));
	}

	protected function getForm() {
		$data = array();

		$data['text_form'] = !isset($this->request->get['warranty_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$data += $this->language->load('sale/return');

		$data['token'] = $this->session->data['token'];

		if (isset($this->request->get['return_id'])) {
			$data['return_id'] = $this->request->get['return_id'];
		} else {
			$data['return_id'] = 0;
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		foreach($this->data_keys as $key) {
			if (isset($this->error[$key])) {
				$data['error_' . $key] = $this->error[$key];
			} else {
				$data['error_' . $key] = '';
			}
		}

		$url = '';

		$url = $this->getFilterUrl($url);

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/return', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['return_id'])) {
			$data['action'] = $this->url->link('sale/return/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('sale/return/edit', 'token=' . $this->session->data['token'] . '&return_id=' . $this->request->get['return_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('sale/return', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['return_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$return_info = $this->model_sale_return->getReturn($this->request->get['return_id']);
		}

		foreach($this->data_keys as $key) {
			if(isset($this->request->post[$key])) {
				$data[$key] = $this->request->post[$key];
			} else if (!empty($return_info)) {
				$data[$key] = $return_info[$key];
			} else {
				$data[$key] = '';
			}
		}

		// $this->load->model('sale/service_centre');
		
		// $this->load->model('user/user');

		// $user_id = $this->user->getId();

		// $group_id = $this->user->getGroupId();

		// $user_data = $this->model_user_user->getUser($user_id);

		// if($user_data) {
		// 	$service_centre_id = $user_data['user_service_centre_id'];
		// }

		// if($group_id == 1) { // if admin
		// 	$data['is_admin'] = 1;

		// 	$data['service_centres'] = array();

		// 	$results = $this->model_sale_service_centre->getServiceCentres();

		// 	foreach ($results as $result) {
		// 		$data['service_centres'][] = array(
		// 			'id'			 => $result['service_centre_id'],
		// 			'name'     => $result['name']
		// 		);
		// 	}
		// } else {
		// 	$data['is_admin'] = '';

		// 	if(isset($service_centre_id)) {
		// 		$data['service_centre_id'];
		// 		$data['service_centre'] = $this->model_sale_service_centre->getServiceCentre($service_centre_id);
		// 	} else {
		// 		$data['service_centre'][] = array(
		// 			'id' => '',
		// 			'name' => 'Partner nemá priradený servis'
		// 		);
		// 	}
		// }

		$this->load->model('sale/customer');

		$data['customers'] = array();

		$results = $this->model_sale_customer->getCustomers();

		foreach ($results as $result) {
			$data['customers'][] = array(
				'id' 		=> $result['customer_id'],
				'name' 	=> $result['firstname'] . $result['lastname']
			);
		}

		$this->load->model('localisation/return_status');

		$data['return_statuses'] = $this->model_localisation_return_status->getReturnStatuses();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/return_form.tpl', $data));
	}

	protected function validateForm() {
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		if ((utf8_strlen($this->request->post['return_code']) < 3) || (utf8_strlen($this->request->post['return_code']) > 20)) {
			$this->error['return_code'] = $this->language->get('error_return_code');
		}

		if ((utf8_strlen($this->request->post['warranty_code']) < 3) || (utf8_strlen($this->request->post['warranty_code']) > 20)) {
			$this->error['warranty_code'] = $this->language->get('error_warranty_code');
		}

		if ((utf8_strlen($this->request->post['invoice_code']) < 3) || (utf8_strlen($this->request->post['invoice_code']) > 20)) {
			$this->error['invoice_code'] = $this->language->get('error_invoice_code');
		}

		if ((utf8_strlen($this->request->post['comment']) < 1) || (utf8_strlen($this->request->post['comment']) > 800)) {
			$this->error['comment'] = $this->language->get('error_comment');
		}

		if ((utf8_strlen($this->request->post['vehicle_type']) < 1) || (utf8_strlen($this->request->post['vehicle_type']) > 50)) {
			$this->error['vehicle_type'] = $this->language->get('error_vehicle_type');
		}

		if ((utf8_strlen($this->request->post['ecv']) < 1) || (utf8_strlen($this->request->post['ecv']) > 50)) {
			$this->error['ecv'] = $this->language->get('error_ecv');
		}

		if ((utf8_strlen($this->request->post['vin']) < 1) || (utf8_strlen($this->request->post['vin']) > 50)) {
			$this->error['vin'] = $this->language->get('error_vin');
		}

		if ((utf8_strlen($this->request->post['vehicle_year']) != 4) || !is_numeric($this->request->post['vehicle_year'])) {
		 	$this->error['vehicle_year'] = $this->language->get('error_vehicle_year');
		}

		if ((utf8_strlen($this->request->post['product_name']) < 1) || (utf8_strlen($this->request->post['product_name']) > 100)) {
			$this->error['product_name'] = $this->language->get('error_product_name');
		}

		if ((utf8_strlen($this->request->post['service_centre']) < 1) || (utf8_strlen($this->request->post['service_centre']) > 100)) {
			$this->error['service_centre'] = $this->language->get('error_service_centre');
		}

		if ((utf8_strlen($this->request->post['address']) < 1) || (utf8_strlen($this->request->post['address']) > 200)) {
			$this->error['address'] = $this->language->get('error_address');
		}

		if ((utf8_strlen($this->request->post['city']) < 1) || (utf8_strlen($this->request->post['city']) > 100)) {
			$this->error['city'] = $this->language->get('error_city');
		}

		if ((utf8_strlen($this->request->post['contact_person']) < 1) || (utf8_strlen($this->request->post['contact_person']) > 200)) {
			$this->error['contact_person'] = $this->language->get('error_address');
		}

		if ((utf8_strlen($this->request->post['phone']) < 1) || (utf8_strlen($this->request->post['phone']) > 30)) {
			$this->error['phone'] = $this->language->get('error_phone');
		}

		if ((utf8_strlen($this->request->post['order_code']) < 1) || (utf8_strlen($this->request->post['order_code']) > 20)) {
			$this->error['order_code'] = $this->language->get('error_order_code');
		}

		if ((utf8_strlen($this->request->post['serial_number']) < 1) || (utf8_strlen($this->request->post['serial_number']) > 20) || !is_numeric($this->request->post['serial_number'])) {
			$this->error['serial_number'] = $this->language->get('error_serial_number');
		}

		if ((utf8_strlen($this->request->post['date_installed']) < 1) || (utf8_strlen($this->request->post['date_installed']) > 20)) {
			$this->error['date_installed'] = $this->language->get('error_date_installed');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'sale/return')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function getFilters() {
		$filter_data = array();

		foreach($this->index_keys as $filter) {
			$filter[0] = 'filter_' . $filter[0];
			if(isset($this->request->get[$filter[0]])) {
				$$filter[0] = $this->request->get[$filter[0]];

				$filter_data += array(
					$filter[0] => $$filter[0]
				);
			} else {
				$$filter[0] = null;

				$filter_data += array(
					$filter[0] => $$filter[0]
				);
			}
		}

		return $filter_data;
	}

	protected function getFilterUrl($url) {
		foreach($this->index_keys as $filter) {
			$filter[0] = 'filter_' . $filter[0];
			if(isset($this->request->get[$filter[0]])) {
				if($filter[1] == false) {
					$url .= '&' . $filter[0] . '=' . $this->request->get[$filter[0]];
				} else if ($filter[1] == true) {
					$url .= '&' . $filter[0] . '=' . urlencode(html_entity_decode($this->request->get[$filter[0]], ENT_QUOTES, 'UTF-8'));
				}
			}
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		return $url;
	}

	public function details() {
		$url = '';

		if (!isset($this->request->get['return_id'])) {
			echo '$return_id not set';
		} else {
			$return_id = $this->request->get['return_id'];
		}

		$data = array();

		$data += $this->load->language('sale/return');

		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$this->load->model('sale/return');

		$this->load->model('catalog/product');

		$this->load->model('setting/setting');

		$data['store_info'] = $this->model_setting_setting->getSetting('config', 0);

		$result = $this->model_sale_return->getReturnDetails($return_id);

		$data['return_details'] = array();

		$data['return_details'] += $result;

		$data['return_details']['date_added'] = date($this->language->get('date_format_short'), strtotime($result['date_added']));

		$data['return_details']['date_installed'] = date($this->language->get('date_format_short'), strtotime($result['date_added']));

		for($i = 1; $i <= 5; $i++) {
			if(isset($data['return_details']['return_item_' . $i . '_id'])) {
				$id = $data['return_details']['return_item_' . $i . '_id'];
				$data['return_details']['items'][$i] = $this->model_catalog_product->getProduct($id);
			}
		}

		$this->response->setOutput($this->load->view('sale/return_details.tpl', $data));
	}

	public function history() {
		$this->load->language('sale/return');

		$data['error'] = '';
		$data['success'] = '';

		$this->load->model('sale/return');

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if (!$this->user->hasPermission('modify', 'sale/return')) {
				$data['error'] = $this->language->get('error_permission');
			}

			if (!$data['error']) {
				$this->model_sale_return->addReturnHistory($this->request->get['return_id'], $this->request->post);

				$data['success'] = $this->language->get('text_success');
			}
		}

		$data['text_no_results'] = $this->language->get('text_no_results');

		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_notify'] = $this->language->get('column_notify');
		$data['column_comment'] = $this->language->get('column_comment');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['histories'] = array();

		$results = $this->model_sale_return->getReturnHistories($this->request->get['return_id'], ($page - 1) * 10, 10);

		foreach ($results as $result) {
			$data['histories'][] = array(
				'notify'     => $result['notify'] ? $this->language->get('text_yes') : $this->language->get('text_no'),
				'status'     => $result['status'],
				'comment'    => nl2br($result['comment']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$history_total = $this->model_sale_return->getTotalReturnHistories($this->request->get['return_id']);

		$pagination = new Pagination();
		$pagination->total = $history_total;
		$pagination->page = $page;
		$pagination->limit = 10;
		$pagination->url = $this->url->link('sale/return/history', 'token=' . $this->session->data['token'] . '&return_id=' . $this->request->get['return_id'] . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($history_total) ? (($page - 1) * 10) + 1 : 0, ((($page - 1) * 10) > ($history_total - 10)) ? $history_total : ((($page - 1) * 10) + 10), $history_total, ceil($history_total / 10));

		$this->response->setOutput($this->load->view('sale/return_history.tpl', $data));
	}
}