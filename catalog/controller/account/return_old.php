<?php
class ControllerAccountReturn extends Controller {
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
		'service_centre_id',
		'product_name',
		'order_code',
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
		$this->load->language('account/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('account/return');

		$this->getList();
	}

	public function add() {
		$this->load->language('account/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

		$this->load->model('account/return');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->load->model('account/customer');

			$customer_id = $this->customer->getId();

			$result = $this->model_account_customer->getCustomer($customer_id);

			$service_centre_id = $result['service_centre_id'];

			$this->model_account_return->addReturn($service_centre_id, $this->request->post);

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

			$this->response->redirect($this->url->link('account/return', $url, 'SSL'));
		}

		$this->getForm();
	}

	// front users not allowed to edit
	// public function edit() {
	// 	$this->load->language('account/return');

	// 	$this->document->setTitle($this->language->get('heading_title'));

	// 	$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
	// 	$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
	// 	$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

	// 	$this->load->model('account/return');

	// 	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
	// 		$this->load->model('account/customer');

	// 		$customer_id = $this->customer->getId();

	// 		$result = $this->model_account_customer->getCustomer($customer_id);

	// 		$service_centre_id = $result['service_centre_id'];

	// 		$this->model_account_return->editReturn($this->request->get['return_id'], $service_centre_id, $this->request->post);

	// 		$this->session->data['success'] = $this->language->get('text_success');

	// 		$url = '';

	// 		$url = $this->getFilterUrl($url);

	// 		if (isset($this->request->get['sort'])) {
	// 			$url .= '&sort=' . $this->request->get['sort'];
	// 		}

	// 		if (isset($this->request->get['order'])) {
	// 			$url .= '&order=' . $this->request->get['order'];
	// 		}

	// 		if (isset($this->request->get['page'])) {
	// 			$url .= '&page=' . $this->request->get['page'];
	// 		}

	// 		$this->response->redirect($this->url->link('account/return', $url, 'SSL'));
	// 	}

	// 	$this->getForm();
	// }

	public function delete() {
		$this->load->language('account/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('account/return');

		if (isset($this->request->post['selected']) /* && $this->validateDelete() */) {
			foreach ($this->request->post['selected'] as $return_id) {
				$this->model_account_return->deleteReturn($return_id);
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

			$this->response->redirect($this->url->link('account/return', $url, 'SSL'));
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
			'href' => $this->url->link('common/home', '', 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/return', $url, 'SSL')
		);

		$data['add'] = $this->url->link('account/return/add', $url, 'SSL');
		$data['delete'] = $this->url->link('account/return/delete', $url, 'SSL');

		$this->load->model('account/customer');

		$customer_id = $this->customer->getId();

		$result = $this->model_account_customer->getCustomer($customer_id);

		$customer_group_id = $result['customer_group_id'];

		$service_centre_id = $result['service_centre_id'];

		if($customer_group_id == 3) { // if admin
			$return_total = $this->model_account_return->getTotalReturns($filter_data);

			$results = $this->model_account_return->getReturns($filter_data);

			$data['returns'] = array();

			foreach ($results as $result) {
				$data['returns'][] = array(
					'return_id' 				  => $result['return_id'],
					'return_code' 			  => $result['return_code'],
					'service_centre_name' => $result['service_centre_name'],
					'order_code' 				  => $result['order_code'],
					'product_name' 		    => $result['product_name'],
					'status' 	  					=> $result['name'],
					'date_received' 		  => date($this->language->get('date_format_short'), strtotime($result['date_received'])),
					'date_installed' 		  => date($this->language->get('date_format_short'), strtotime($result['date_installed'])),
					'date_added' 				  => date($this->language->get('date_format_short'), strtotime($result['return_date_added'])),
					'date_modified' 		  => date($this->language->get('date_format_short'), strtotime($result['return_date_modified'])),
					'details'             => $this->url->link('account/return/details', '&return_id=' . $result['return_id'] . $url, 'SSL'),
					'edit'          	    => $this->url->link('account/return/edit', '&return_id=' . $result['return_id'] . $url, 'SSL')
				);
			}
		} else {
			$return_total = $this->model_account_return->getTotalReturnsByServiceCentreId($filter_data, $service_centre_id);

			$results = $this->model_account_return->getReturnsByServiceCentreId($filter_data, $service_centre_id);

			$data['returns'] = array();

			foreach ($results as $result) {
				$data['returns'][] = array(
					'return_id' 				  => $result['return_id'],
					'return_code' 			  => $result['return_code'],
					'service_centre_name' => $result['service_centre_name'],
					'order_code' 				  => $result['order_code'],
					'product_name' 		    => $result['product_name'],
					'status' 	  					=> $result['name'],
					'date_received' 		  => date($this->language->get('date_format_short'), strtotime($result['date_received'])),
					'date_installed' 		  => date($this->language->get('date_format_short'), strtotime($result['date_installed'])),
					'date_added' 				  => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
					'date_modified' 		  => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
					'details'             => $this->url->link('account/return/details', '&return_id=' . $result['return_id'] . $url, 'SSL'),
					'edit'          	    => $this->url->link('account/return/edit', '&return_id=' . $result['return_id'] . $url, 'SSL')
				);
			}
		}

		$data += $this->language->load('account/return');

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
			$data['sort_' . $value[0]] = $this->url->link('account/return', '&sort=r.' . $value[0] . $url, 'SSL');
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
		$pagination->url = $this->url->link('account/return', '&page={page}', 'SSL');

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
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('default/template/account/return_list.tpl', $data));
	}

	protected function getForm() {
		$data = array();

		$data += $this->language->load('account/return');

		$data['text_form'] = !isset($this->request->get['warranty_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

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
			'href' => $this->url->link('common/home', '', 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/return', $url, 'SSL')
		);

		if (!isset($this->request->get['return_id'])) {
			$data['action'] = $this->url->link('account/return/add', $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('account/return/edit', '&return_id=' . $this->request->get['return_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('account/return', $url, 'SSL');

		if (isset($this->request->get['return_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$return_info = $this->model_account_return->getReturn($this->request->get['return_id']);
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

		$this->load->model('localisation/return_status');

		$data['return_statuses'] = $this->model_localisation_return_status->getReturnStatuses();

		$data['header'] = $this->load->controller('common/header');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('default/template/account/return_form.tpl', $data));
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

	// protected function validateDelete() {
	// 	if (!$this->user->hasPermission('modify', 'sale/return')) {
	// 		$this->error['warning'] = $this->language->get('error_permission');
	// 	}

	// 	return !$this->error;
	// }

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

		$data += $this->load->language('account/return');

		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$this->load->model('account/return');

		$this->load->model('setting/setting');

		$data['store_info'] = $this->model_setting_setting->getSetting('config', 0);

		$result = $this->model_account_return->getReturnDetails($return_id);

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

		$this->response->setOutput($this->load->view('default/template/account/return_details.tpl', $data));
	}
}