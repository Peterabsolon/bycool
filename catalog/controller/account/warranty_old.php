<?php
class ControllerAccountWarranty extends Controller {
	private $error = array();

	private $index_keys = array(
		array('warranty_id', 0),
		array('warranty_code', 0),
		array('service_centre', 1),
		array('product', 1),
		array('order_code', 0),
		array('date_added', 0),
		array('date_modified', 0),
		array('date_installed', 0)
	);

	private $data_keys = array(
		'warranty_id',
		'warranty_code',
		'order_code',
		'vehicle_type',
		'ecv',
		'vin',
		'compressor_number',
		'model',
		'serial_number',
		'customer_name',
		'customer_address',
		'customer_country',
		'customer_phone',
		'customer_email',
		'date_added',
		'date_modified',
		'date_installed'
	);

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->response->redirect($this->url->link('account/account', '', 'SSL'));
		}

		$this->load->language('account/warranty');

		$data = array();

		$data += $this->load->language('acccount/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('account/warranty');

		$this->load->model('account/customer');

		$this->getList();
	}

	public function add() {
		$this->load->language('account/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

		$this->load->model('account/warranty');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->load->model('account/customer');

			$customer_id = $this->customer->getId();

			$result = $this->model_account_customer->getCustomer($customer_id);

			$service_centre_id = $result['service_centre_id'];

			$this->model_account_warranty->addWarranty($service_centre_id, $this->request->post);

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

			$this->response->redirect($this->url->link('account/warranty', '', 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		if ($this->customer->isLogged()) {
			$this->response->redirect($this->url->link('account/account', '', 'SSL'));
		}

		$this->load->language('account/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

		$this->load->model('account/warranty');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->load->model('account/customer');

			$customer_id = $this->customer->getId();

			$result = $this->model_account_customer->getCustomer($customer_id);

			$service_centre_id = $result['service_centre_id'];

			$this->model_account_warranty->editWarranty($this->request->get['warranty_id'], $service_centre_id, $this->request->post);

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

			$this->response->redirect($this->url->link('account/warranty', '', 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		if ($this->customer->isLogged()) {
			$this->response->redirect($this->url->link('account/account', '', 'SSL'));
		}
		
		$this->load->language('account/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('account/warranty');

		if (isset($this->request->post['selected']) /* && $this->validateDelete() */) {
			foreach ($this->request->post['selected'] as $warranty_id) {
				$this->model_account_warranty->deleteWarranty($warranty_id);
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

			$this->response->redirect($this->url->link('account/warranty', '', 'SSL'));
		}

		$this->getList();
	}

	public function printWarranty() {
		$url = '';

		if (!isset($this->request->get['warranty_id'])) {
			echo '$warranty_id not set';
		} else {
			$warranty_id = $this->request->get['warranty_id'];
		}

		$data = array();

		$data += $this->load->language('account/printwarranty');

		$data['direction'] = $this->language->get('direction');
		$data['lang'] = $this->language->get('code');
		
		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$this->load->model('account/warranty');

		$this->load->model('setting/setting');

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['store_info'] = $this->model_setting_setting->getSetting('config', 0);

		$result = $this->model_account_warranty->printWarranty($warranty_id);

		$data['warranty_info'] = array();

		$data['warranty_info'] += $result;

		$this->response->setOutput($this->load->view('default/template/account/warranty_print.tpl', $data));
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
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/warranty', '', 'SSL')
		);

		$data['add'] = $this->url->link('account/warranty/add', '', 'SSL');
		$data['delete'] = $this->url->link('account/warranty/delete', '', 'SSL');

		$customer_id = $this->customer->getId();

		$result = $this->model_account_customer->getCustomer($customer_id);

		$customer_group_id = $result['customer_group_id'];

		$service_centre_id = $result['service_centre_id'];

		if($customer_group_id == 3) { // if molpir staff
			$warranty_total = $this->model_account_warranty->getTotalWarranties($filter_data);

			$results = $this->model_account_warranty->getWarranties($filter_data);			

			$data['warranties'] = array();

			foreach($results as $result) {
				$data['warranties'][] = array(
				'warranty_id'		=> $result['warranty_id'],
				'warranty_code'    	=> $result['warranty_code'],
				'service_centre'   	=> $result['name'],
			 	'order_code' 		=> $result['order_code'],
			 	'model'				=> $result['model'],
			 	'date_installed'	=> date($this->language->get('date_format_short'), strtotime($result['date_installed'])),
				'date_added'    	=> date($this->language->get('date_format_short'), strtotime($result['warranty_date_added'])),
				'date_modified' 	=> date($this->language->get('date_format_short'), strtotime($result['warranty_date_modified'])),
				'edit'          	=> $this->url->link('account/warranty/edit', '&warranty_id=' . $result['warranty_id'] . $url, 'SSL'),
				'print_warranty'	 => $this->url->link('account/warranty/printWarranty', '&warranty_id=' . $result['warranty_id'] . $url, 'SSL' )
				);
			}
		} else {
			$warranty_total = $this->model_account_warranty->getTotalWarrantiesByServiceCentreId($filter_data, $service_centre_id);

			$results = $this->model_account_warranty->getWarrantiesByServiceCentreId($filter_data, $service_centre_id);

			$data['warranties'] = array();

			foreach($results as $result) {
				$data['warranties'][] = array(
				'warranty_id'			 => $result['warranty_id'],
				'warranty_code'    => $result['warranty_code'],
				'service_centre'   => $result['name'],
			 	'order_code' 			 => $result['order_code'],
			 	'model'						 => $result['model'],
			 	'date_installed'	 => date($this->language->get('date_format_short'), strtotime($result['date_installed'])),
				'date_added'    	 => date($this->language->get('date_format_short'), strtotime($result['warranty_date_added'])),
				'date_modified' 	 => date($this->language->get('date_format_short'), strtotime($result['warranty_date_modified'])),
				'edit'          	 => $this->url->link('account/warranty/edit', '&warranty_id=' . $result['warranty_id'] . $url, 'SSL'),
				'print_warranty'	 => $this->url->link('account/warranty/printWarranty', '&warranty_id=' . $result['warranty_id'] . $url, 'SSL' ),
				);
			}
		}

		$data += $this->language->load('account/warranty');

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
			$data['sort_' . $value[0]] = $this->url->link('account/warranty', '&sort=w.' . $value[0] . $url, 'SSL');
		}

		$url = $this->getFilterUrl;

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $warranty_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('account/warranty', '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($warranty_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($warranty_total - $this->config->get('config_limit_admin'))) ? $warranty_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $warranty_total, ceil($warranty_total / $this->config->get('config_limit_admin')));

		foreach($this->index_keys as $key => $value) {
			$value[0] = 'filter_' . $value[0];
			$data[$value[0]] = $filter_data[$value[0]];
		}

		$data['sort'] = $sort;
		$data['order'] = $order;

		$this->load->model('localisation/language');

		$results = $this->model_localisation_language->getLanguages();

		foreach ($results as $result) {
			$data['languages'][] = array(
				'dir'	 => $result['directory'],
				'code' => $result['code']
			);
		}

		$data['header'] = $this->load->controller('common/header');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('default/template/account/warranty_list.tpl', $data));
	}

	protected function getForm() {
		$data = array();

		$data['text_form'] = !isset($this->request->get['warranty_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$data += $this->language->load('account/warranty');

		if (isset($this->request->get['warranty_id'])) {
			$data['warranty_id'] = $this->request->get['warranty_id'];
		} else {
			$data['warranty_id'] = 0;
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
			'href' => $this->url->link('account/warranty', $url, 'SSL')
		);

		if (!isset($this->request->get['warranty_id'])) {
			$data['action'] = $this->url->link('account/warranty/add', $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('account/warranty/edit', '&warranty_id=' . $this->request->get['warranty_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('account/warranty', $url, 'SSL');

		if (isset($this->request->get['warranty_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$warranty_info = $this->model_account_warranty->getWarranty($this->request->get['warranty_id']);
		}

		foreach($this->data_keys as $key) {
			if(isset($this->request->post[$key])) {
				$data[$key] = $this->request->post[$key];
			} else if (!empty($warranty_info)) {
				$data[$key] = $warranty_info[$key];
			} else {
				$data[$key] = '';
			}
		}

		$this->load->model('account/service_centre');

		$data['service_centres'] = array();

		$results = $this->model_account_service_centre->getServiceCentres();

		foreach ($results as $result) {
			$data['service_centres'][] = array(
				'id'	   => $result['service_centre_id'],
				'name'     => $result['name']
			);
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('default/template/account/warranty_form.tpl', $data));
	}

	protected function validateForm() {
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		if ((utf8_strlen($this->request->post['warranty_code']) < 3) || (utf8_strlen($this->request->post['warranty_code']) > 20)) {
			$this->error['warranty_code'] = $this->language->get('error_warranty_code');
		}

		if ((utf8_strlen($this->request->post['vehicle_type']) < 3) || (utf8_strlen($this->request->post['vehicle_type']) > 50)) {
			$this->error['vehicle_type'] = $this->language->get('error_vehicle_type');
		}

		if ((utf8_strlen($this->request->post['ecv']) < 3) || (utf8_strlen($this->request->post['ecv']) > 50)) {
			$this->error['ecv'] = $this->language->get('error_ecv');
		}

		if ((utf8_strlen($this->request->post['vin']) < 3) || (utf8_strlen($this->request->post['vin']) > 50)) {
			$this->error['vin'] = $this->language->get('error_vin');
		}

		if ((utf8_strlen($this->request->post['model']) < 3) || (utf8_strlen($this->request->post['model']) > 50)) {
			$this->error['model'] = $this->language->get('error_model');
		}

		if ((utf8_strlen($this->request->post['order_code']) < 3) || (utf8_strlen($this->request->post['order_code']) > 20)) {
			$this->error['order_code'] = $this->language->get('error_order_code');
		}

		if ((utf8_strlen($this->request->post['customer_name']) < 3) || (utf8_strlen($this->request->post['customer_name']) > 100)) {
			$this->error['customer_name'] = $this->language->get('error_customer_name');
		}

		if ((utf8_strlen($this->request->post['customer_address']) < 3) || (utf8_strlen($this->request->post['customer_address']) > 200)) {
			$this->error['customer_address'] = $this->language->get('error_customer_address');
		}

		if ((utf8_strlen($this->request->post['customer_country']) < 3) || (utf8_strlen($this->request->post['customer_country']) > 100)) {
			$this->error['customer_country'] = $this->language->get('error_customer_country');
		}

		if ((utf8_strlen($this->request->post['customer_email']) < 3) || (utf8_strlen($this->request->post['customer_email']) > 50)) {
			$this->error['customer_email'] = $this->language->get('error_customer_email');
		}

		if ((utf8_strlen($this->request->post['date_installed']) < 3) || (utf8_strlen($this->request->post['date_installed']) > 30)) {
		 	$this->error['date_installed'] = $this->language->get('error_date_installed');
		}

		if ((utf8_strlen($this->request->post['serial_number']) < 3) || (utf8_strlen($this->request->post['serial_number']) > 20) || !is_numeric($this->request->post['serial_number'])) {
		 	$this->error['serial_number'] = $this->language->get('error_serial_number');
		}

		if ((utf8_strlen($this->request->post['customer_phone']) < 3) || (utf8_strlen($this->request->post['customer_phone']) > 20) || !is_numeric($this->request->post['customer_phone'])) {
		 	$this->error['customer_phone'] = $this->language->get('error_customer_phone');
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
}