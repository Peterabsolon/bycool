<?php
class ControllerSaleServiceCentre extends Controller {
	private $error = array();

	private $index_keys = array(
		array('service_centre_id', 0),
		array('name', 1),
		array('address', 1),
		array('city', 1),
		array('country', 1),
		array('date_added', 0),
		array('date_modified', 0)
	);

	private $data_keys = array(
		'service_centre_id',
		'name',
		'contact_person',
		'address',
		'city',
		'phone',
		'fax',
		'email',
		'ico',
		'dic',
		'icdph',
		'opening_hours',
		'note',
		'date_added',
		'date_modified'
	);

	public function index() {
		$this->load->language('sale/service_centre');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/service_centre');

		$this->getList();
	}

	public function add() {
		$this->load->language('sale/service_centre');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/service_centre');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') /*&& $this->validateForm() */) {
			$this->model_sale_service_centre->addServiceCentre($this->request->post);

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

			$this->response->redirect($this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('sale/service_centre');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/service_centre');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') /* && $this->validateForm() */) {
			$this->model_sale_service_centre->editServiceCentre($this->request->get['service_centre_id'], $this->request->post);

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

			$this->response->redirect($this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('sale/service_centre');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/service_centre');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $service_centre_id) {
				$this->model_sale_service_centre->deleteServiceCentre($service_centre_id);
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

			$this->response->redirect($this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function getList() {
		$filter_data = $this->getFilters();

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'r.service_centre_id';
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
			'href' => $this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('sale/service_centre/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('sale/service_centre/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$service_centres_total = $this->model_sale_service_centre->getTotalServiceCentres($filter_data);

		$results = $this->model_sale_service_centre->getServiceCentres($filter_data);

		$data['service_centres'] = array();
		
		foreach ($results as $result) {
			$data['service_centres'][] = array(
				'service_centre_id' => $result['service_centre_id'],
				'name' => $result['name'],
				'address' => $result['address'],
				'city' => $result['city'],
				'country' => $result['country'],
				'date_added'    => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified' => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'edit' => $this->url->link('sale/service_centre/edit', 'token=' . $this->session->data['token'] . '&service_centre_id=' . $result['service_centre_id'] . $url, 'SSL')
			);
		}

		$data += $this->language->load('sale/service_centre');

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
			$data['sort_' . $value[0]] = $this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . '&sort=sc.' . $value[0] . $url, 'SSL');
		}

		$url = $this->getFilterUrl;

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
	
		$pagination = new Pagination();
		$pagination->total = $service_centres_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($service_centres_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($service_centres_total - $this->config->get('config_limit_admin'))) ? $service_centres_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $service_centres_total, ceil($service_centres_total / $this->config->get('config_limit_admin')));

		foreach($this->index_keys as $key => $value) {
			$value[0] = 'filter_' . $value[0];
			$data[$value[0]] = $filter_data[$value[0]];
		}
	
		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/service_centre_list.tpl', $data));
	}

	protected function getForm() {
		$data = array();

		$data['text_form'] = !isset($this->request->get['return_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$data += $this->language->load('sale/service_centre');

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
			'href' => $this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['service_centre_id'])) {
			$data['action'] = $this->url->link('sale/service_centre/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('sale/service_centre/edit', 'token=' . $this->session->data['token'] . '&service_centre_id=' . $this->request->get['service_centre_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('sale/service_centre', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['service_centre_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$service_centre_info = $this->model_sale_service_centre->getServiceCentre($this->request->get['service_centre_id']);
		}

		foreach($this->data_keys as $key) {
			if(isset($this->request->post[$key])) {
				$data[$key] = $this->request->post[$key];
			} else if (!empty($service_centre_info)) {
				$data[$key] = $service_centre_info[$key];
			} else {
				$data[$key] = '';
			}
		}

		$this->load->model('localisation/country');

		$language_id = $this->config->get('config_language_id');

		$results = $this->model_localisation_country->getCountriesByLanguageId($language_id);

		$data['countries'] = array();

		foreach($results as $result) {
			$data['countries'][] = array(
				'id' 	=> $result['country_id'],
				'name' 	=> $result['country_name']
			);
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/service_form.tpl', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'sale/return')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (empty($this->request->post['order_id'])) {
			$this->error['order_id'] = $this->language->get('error_order_id');
		}

		if ((utf8_strlen(trim($this->request->post['customer_name'])) < 1) || (utf8_strlen(trim($this->request->post['customer_name'])) > 32)) {
			$this->error['customer_name'] = $this->language->get('error_customer_name');
		}

		// if ((utf8_strlen(trim($this->request->post['lastname'])) < 1) || (utf8_strlen(trim($this->request->post['lastname'])) > 32)) {
		// 	$this->error['lastname'] = $this->language->get('error_lastname');
		// }

		if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
			$this->error['email'] = $this->language->get('error_email');
		}

		if ((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 32)) {
			$this->error['telephone'] = $this->language->get('error_telephone');
		}

		if ((utf8_strlen($this->request->post['product']) < 1) || (utf8_strlen($this->request->post['product']) > 255)) {
			$this->error['product'] = $this->language->get('error_product');
		}

		if ((utf8_strlen($this->request->post['model']) < 1) || (utf8_strlen($this->request->post['model']) > 64)) {
			$this->error['model'] = $this->language->get('error_model');
		}

		if (empty($this->request->post['return_reason_id'])) {
			$this->error['reason'] = $this->language->get('error_reason');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'sale/service_centre')) {
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

	public function autocomplete() {
		$json = array();

		if(isset($this->request->get['filter_service_centre_name'])) {
			$filter_service_centre_name = $this->request->get['filter_service_centre_name'];
		} else {
			$filter_service_centre_name = '';
		}

		$this->load->model('sale/service_centre');

		$filter_data = array(
			'filter_service_centre_name' => $filter_service_centre_name,
			'start' 										 => 0,
			'limit'											 => 5
		);

		$results = $this->model_sale_service_centre->getServiceCentres($filter_data);

		foreach ($results as $result) {
			$json[] = array(
				'service_centre_name'		 => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
				'service_centre_address'	 => $result['address'],
				'service_centre_phone'       => $result['phone'],
				'service_centre_fax'		 => $result['fax'],
				'service_centre_email'		 => $result['email']
			);
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['service_centre_name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}