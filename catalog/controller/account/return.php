<?php
class ControllerAccountReturn extends Controller {
	private $error = array();

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->response->redirect($this->url->link('account/account', '', 'SSL'));
		}

		$this->load->language('account/return');

		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');


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
			$this->model_account_return->addReturn($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_return_id'])) {
				$url .= '&filter_return_id=' . $this->request->get['filter_return_id'];
			}

			if (isset($this->request->get['filter_return_code'])) {
				$url .= '&filter_return_code=' . $this->request->get['filter_return_code'];
			}

			if (isset($this->request->get['filter_customer'])) {
				$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_ecv'])) {
				$url .= '&filter_ecv=' . html_entity_decode($this->request->get['filter_ecv'], ENT_QUOTES,'UTF-8');
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_order_code'])) {
				$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
			}

			if (isset($this->request->get['filter_return_status_id'])) {
				$url .= '&filter_return_status_id=' . $this->request->get['filter_return_status_id'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['filter_date_modified'])) {
				$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
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

			$this->response->redirect($this->url->link('account/return', $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('account/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('account/return');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_account_return->editReturn($this->request->get['return_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_return_id'])) {
				$url .= '&filter_return_id=' . $this->request->get['filter_return_id'];
			}

			if (isset($this->request->get['filter_return_code'])) {
				$url .= '&filter_return_code=' . $this->request->get['filter_return_code'];
			}

			if (isset($this->request->get['filter_customer'])) {
				$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_ecv'])) {
				$url .= '&filter_ecv=' . html_entity_decode($this->request->get['filter_ecv'], ENT_QUOTES,'UTF-8');
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_order_code'])) {
				$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
			}

			if (isset($this->request->get['filter_return_status_id'])) {
				$url .= '&filter_return_status_id=' . $this->request->get['filter_return_status_id'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['filter_date_modified'])) {
				$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
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

			$this->response->redirect($this->url->link('account/return', $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('account/return');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('account/return');

		if (isset($this->request->post['selected'])) {
			foreach ($this->request->post['selected'] as $return_id) {
				$this->model_account_return->deleteReturn($return_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_return_id'])) {
				$url .= '&filter_return_id=' . $this->request->get['filter_return_id'];
			}

			if (isset($this->request->get['filter_return_code'])) {
				$url .= '&filter_return_code=' . $this->request->get['filter_return_code'];
			}

			if (isset($this->request->get['filter_customer'])) {
				$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_ecv'])) {
				$url .= '&filter_ecv=' . html_entity_decode($this->request->get['filter_ecv'], ENT_QUOTES,'UTF-8');
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_order_code'])) {
				$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
			}

			if (isset($this->request->get['filter_return_status_id'])) {
				$url .= '&filter_return_status_id=' . $this->request->get['filter_return_status_id'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['filter_date_modified'])) {
				$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
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

			$this->response->redirect($this->url->link('account/return', $url, 'SSL'));
		}
	}

	protected function getList() {
		if (isset($this->request->get['filter_return_id'])) {
			$filter_return_id = $this->request->get['filter_return_id'];
		} else {
			$filter_return_id = null;
		}

		if (isset($this->request->get['filter_return_code'])) {
			$filter_return_code = $this->request->get['filter_return_code'];
		} else {
			$filter_return_code = null;
		}

		if (isset($this->request->get['filter_customer'])) {
			$filter_customer = $this->request->get['filter_customer'];
		} else {
			$filter_customer = null;
		}

		if (isset($this->request->get['filter_ecv'])) {
			$filter_ecv = $this->request->get['filter_ecv'];
		} else {
			$filter_ecv = null;
		}

		if (isset($this->request->get['filter_model'])) {
			$filter_model = $this->request->get['filter_model'];
		} else {
			$filter_model = null;
		}

		if (isset($this->request->get['filter_order_code'])) {
			$filter_order_code = $this->request->get['filter_order_code'];
		} else {
			$filter_order_code = null;
		}

		if (isset($this->request->get['filter_return_status_id'])) {
			$filter_return_status_id = $this->request->get['filter_return_status_id'];
		} else {
			$filter_return_status_id = null;
		}

		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = null;
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$filter_date_modified = $this->request->get['filter_date_modified'];
		} else {
			$filter_date_modified = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'r.return_id';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_return_id'])) {
			$url .= '&filter_return_id=' . $this->request->get['filter_return_id'];
		}

		if (isset($this->request->get['filter_return_code'])) {
			$url .= '&filter_return_code=' . $this->request->get['filter_return_code'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . html_entity_decode($this->request->get['filter_ecv'], ENT_QUOTES,'UTF-8');
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
		}

		if (isset($this->request->get['filter_return_status_id'])) {
			$url .= '&filter_return_status_id=' . $this->request->get['filter_return_status_id'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
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

		$data['returns'] = array();

		$this->load->model('account/customer');

		$customer_id = $this->customer->getId();

		$customer_data = $this->model_account_customer->getCustomer($customer_id);

		$customer_group_id = $customer_data['customer_group_id'];

		$data['customer_group_id'] = $customer_group_id;

		$filter_data = array();

		if ($customer_group_id != 3) { // if not admin 
			$filter_data = array(
				'filter_customer_id'	=> $customer_id
			);
		}

		$filter_data += array(
			'filter_return_id' 					=> $filter_return_id,
			'filter_return_code' 				=> $filter_return_code,
			'filter_customer' 					=> $filter_customer,
			'filter_ecv' 								=> $filter_ecv,
			'filter_model' 							=> $filter_model,
			'filter_order_code' 				=> $filter_order_code,
			'filter_return_status_id' 	=> $filter_return_status_id,
			'filter_date_added' 				=> $filter_date_added,
			'filter_date_modified' 			=> $filter_date_modified,
			'sort'											=> $sort,
			'order'           					=> $order,
			'start'           					=> ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           					=> $this->config->get('config_limit_admin')
		);

		$return_total = $this->model_account_return->getTotalReturns($filter_data);

		$results = $this->model_account_return->getReturns($filter_data);

		foreach ($results as $result) {
			$data['returns'][] = array(
				'return_id'				=> $result['return_id'],	
				'return_code'			=> $result['return_code'],
				'customer'				=> $result['customer'],
				'model'						=> $result['model'],
				'order_code'			=> $result['order_code'],
				'status'					=> $result['status'],
				'ecv'							=> $result['ecv'],
				'date_added'  		=> date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified'  	=> date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'details'     		=> $this->url->link('account/return/details', '&return_id=' . $result['return_id'] . $url, 'SSL'),
				'edit'       			=> $this->url->link('account/return/edit', '&return_id=' . $result['return_id'] . $url, 'SSL')
			);
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

		if (isset($this->request->get['filter_return_id'])) {
			$url .= '&filter_return_id=' . $this->request->get['filter_return_id'];
		}

		if (isset($this->request->get['filter_return_code'])) {
			$url .= '&filter_return_code=' . $this->request->get['filter_return_code'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . html_entity_decode($this->request->get['filter_ecv'], ENT_QUOTES,'UTF-8');
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
		}

		if (isset($this->request->get['filter_return_status_id'])) {
			$url .= '&filter_return_status_id=' . $this->request->get['filter_return_status_id'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_return_id'] = $this->url->link('account/return', '&sort=r.return_id' . $url, 'SSL');
		$data['sort_return_code'] = $this->url->link('account/return', '&sort=r.return_code' . $url, 'SSL');
		$data['sort_customer'] = $this->url->link('account/return', '&sort=customer' . $url, 'SSL');
		$data['sort_model'] = $this->url->link('account/return', '&sort=r.model' . $url, 'SSL');
		$data['sort_ecv'] = $this->url->link('account/return', '&sort=r.ecv' . $url, 'SSL');
		$data['sort_order_code'] = $this->url->link('account/return', '&sort=r.order_code' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('account/return', '&sort=status' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('account/return', '&sort=r.date_added' . $url, 'SSL');
		$data['sort_date_modified'] = $this->url->link('account/return', '&sort=r.date_modified' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_return_id'])) {
			$url .= '&filter_return_id=' . $this->request->get['filter_return_id'];
		}

		if (isset($this->request->get['filter_return_code'])) {
			$url .= '&filter_return_code=' . $this->request->get['filter_return_code'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . html_entity_decode($this->request->get['filter_ecv'], ENT_QUOTES,'UTF-8');
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
		}

		if (isset($this->request->get['filter_return_status_id'])) {
			$url .= '&filter_return_status_id=' . $this->request->get['filter_return_status_id'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

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
		$pagination->url = $this->url->link('account/return', $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($return_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($return_total - $this->config->get('config_limit_admin'))) ? $return_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $return_total, ceil($return_total / $this->config->get('config_limit_admin')));

		$data['filter_return_id'] = $filter_return_id;
		$data['filter_return_code'] = $filter_return_code;
		$data['filter_customer'] = $filter_customer;
		$data['filter_model'] = $filter_model;
		$data['filter_order_code'] = $filter_order_code;
		$data['filter_ecv'] = $filter_ecv;
		$data['filter_return_status_id'] = $filter_return_status_id;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_date_modified'] = $filter_date_modified;

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

		if (isset($this->error['return_code'])) {
			$data['error_return_code'] = $this->error['return_code'];
		} else {
			$data['error_return_code'] = '';
		}

		if (isset($this->error['date_return'])) {
			$data['error_date_return'] = $this->error['date_return'];
		} else {
			$data['error_date_return'] = '';
		}

		if (isset($this->error['service_centre'])) {
			$data['error_service_centre'] = $this->error['service_centre'];
		} else {
			$data['error_service_centre'] = '';
		}

		if (isset($this->error['address'])) {
			$data['error_address'] = $this->error['address'];
		} else {
			$data['error_address'] = '';
		}

		if (isset($this->error['city_postcode'])) {
			$data['error_city_postcode'] = $this->error['city_postcode'];
		} else {
			$data['error_city_postcode'] = '';
		}

		if (isset($this->error['contact_person'])) {
			$data['error_contact_person'] = $this->error['contact_person'];
		} else {
			$data['error_contact_person'] = '';
		}

		if (isset($this->error['phone'])) {
			$data['error_phone'] = $this->error['phone'];
		} else {
			$data['error_phone'] = '';
		}

		if (isset($this->error['date_installed'])) {
			$data['error_date_installed'] = $this->error['date_installed'];
		} else {
			$data['error_date_installed'] = '';
		}

		if (isset($this->error['model'])) {
			$data['error_model'] = $this->error['model'];
		} else {
			$data['error_model'] = '';
		}

		if (isset($this->error['serial_number'])) {
			$data['error_serial_number'] = $this->error['serial_number'];
		} else {
			$data['error_serial_number'] = '';
		}

		if (isset($this->error['order_code'])) {
			$data['error_order_code'] = $this->error['order_code'];
		} else {
			$data['error_order_code'] = '';
		}

		if (isset($this->error['vehicle_type'])) {
			$data['error_vehicle_type'] = $this->error['vehicle_type'];
		} else {
			$data['error_vehicle_type'] = '';
		}

		if (isset($this->error['ecv'])) {
			$data['error_ecv'] = $this->error['ecv'];
		} else {
			$data['error_ecv'] = '';
		}

		if (isset($this->error['fault_description'])) {
			$data['error_fault_description'] = $this->error['fault_description'];
		} else {
			$data['error_fault_description'] = '';
		}

		if (isset($this->error['invoice_code'])) {
			$data['error_invoice_code'] = $this->error['invoice_code'];
		} else {
			$data['error_invoice_code'] = '';
		}

		if (isset($this->error['warranty_code'])) {
			$data['error_warranty_code'] = $this->error['warranty_code'];
		} else {
			$data['error_warranty_code'] = '';
		}

		if (isset($this->error['solution'])) {
			$data['error_solution'] = $this->error['solution'];
		} else {
			$data['error_solution'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_return_id'])) {
			$url .= '&filter_return_id=' . $this->request->get['filter_return_id'];
		}

		if (isset($this->request->get['filter_return_code'])) {
			$url .= '&filter_return_code=' . $this->request->get['filter_return_code'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . html_entity_decode($this->request->get['filter_ecv'], ENT_QUOTES,'UTF-8');
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
		}

		if (isset($this->request->get['filter_return_status_id'])) {
			$url .= '&filter_return_status_id=' . $this->request->get['filter_return_status_id'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
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

		$customer_id = $this->customer->getId();

		$data['customer_id'] = $customer_id;

		if (isset($this->request->post['return_code'])) {
			$data['return_code'] = $this->request->post['return_code'];
		} elseif (!empty($return_info)) {
			$data['return_code'] = $return_info['return_code'];
		} else {
			$data['return_code'] = '';
		}

		if (isset($this->request->post['date_return'])) {
			$data['date_return'] = $this->request->post['date_return'];
		} elseif (!empty($return_info)) {
			$data['date_return'] = $return_info['date_return'];
		} else {
			$data['date_return'] = '';
		}

		if (isset($this->request->post['service_centre'])) {
			$data['service_centre'] = $this->request->post['service_centre'];
		} elseif (!empty($return_info)) {
			$data['service_centre'] = $return_info['service_centre'];
		} else {
			$data['service_centre'] = '';
		}

		if (isset($this->request->post['address'])) {
			$data['address'] = $this->request->post['address'];
		} elseif (!empty($return_info)) {
			$data['address'] = $return_info['address'];
		} else {
			$data['address'] = '';
		}

		if (isset($this->request->post['city_postcode'])) {
			$data['city_postcode'] = $this->request->post['city_postcode'];
		} elseif (!empty($return_info)) {
			$data['city_postcode'] = $return_info['city_postcode'];
		} else {
			$data['city_postcode'] = '';
		}

		if (isset($this->request->post['contact_person'])) {
			$data['contact_person'] = $this->request->post['contact_person'];
		} elseif (!empty($return_info)) {
			$data['contact_person'] = $return_info['contact_person'];
		} else {
			$data['contact_person'] = '';
		}

		if (isset($this->request->post['phone'])) {
			$data['phone'] = $this->request->post['phone'];
		} elseif (!empty($return_info)) {
			$data['phone'] = $return_info['phone'];
		} else {
			$data['phone'] = '';
		}

		if (isset($this->request->post['date_installed'])) {
			$data['date_installed'] = $this->request->post['date_installed'];
		} elseif (!empty($return_info)) {
			$data['date_installed'] = $return_info['date_installed'];
		} else {
			$data['date_installed'] = '';
		}

		if (isset($this->request->post['model'])) {
			$data['model'] = $this->request->post['model'];
		} elseif (!empty($return_info)) {
			$data['model'] = $return_info['model'];
		} else {
			$data['model'] = '';
		}

		if (isset($this->request->post['serial_number'])) {
			$data['serial_number'] = $this->request->post['serial_number'];
		} elseif (!empty($return_info)) {
			$data['serial_number'] = $return_info['serial_number'];
		} else {
			$data['serial_number'] = '';
		}

		if (isset($this->request->post['order_code'])) {
			$data['order_code'] = $this->request->post['order_code'];
		} elseif (!empty($return_info)) {
			$data['order_code'] = $return_info['order_code'];
		} else {
			$data['order_code'] = '';
		}

		if (isset($this->request->post['vehicle_type'])) {
			$data['vehicle_type'] = $this->request->post['vehicle_type'];
		} elseif (!empty($return_info)) {
			$data['vehicle_type'] = $return_info['vehicle_type'];
		} else {
			$data['vehicle_type'] = '';
		}

		if (isset($this->request->post['vehicle_model'])) {
			$data['vehicle_model'] = $this->request->post['vehicle_model'];
		} elseif (!empty($return_info)) {
			$data['vehicle_model'] = $return_info['vehicle_model'];
		} else {
			$data['vehicle_model'] = '';
		}

		if (isset($this->request->post['ecv'])) {
			$data['ecv'] = $this->request->post['ecv'];
		} elseif (!empty($return_info)) {
			$data['ecv'] = $return_info['ecv'];
		} else {
			$data['ecv'] = '';
		}

		if (isset($this->request->post['vehicle_year'])) {
			$data['vehicle_year'] = $this->request->post['vehicle_year'];
		} elseif (!empty($return_info)) {
			$data['vehicle_year'] = $return_info['vehicle_year'];
		} else {
			$data['vehicle_year'] = '';
		}

		if (isset($this->request->post['return_item_1_name'])) {
			$data['return_item_1_name'] = $this->request->post['return_item_1_name'];
		} elseif (!empty($return_info)) {
			$data['return_item_1_name'] = $return_info['return_item_1_name'];
		} else {
			$data['return_item_1_name'] = '';
		}

		if (isset($this->request->post['return_item_1_order_code'])) {
			$data['return_item_1_order_code'] = $this->request->post['return_item_1_order_code'];
		} elseif (!empty($return_info)) {
			$data['return_item_1_order_code'] = $return_info['return_item_1_order_code'];
		} else {
			$data['return_item_1_order_code'] = '';
		}

		if (isset($this->request->post['return_item_1_quantity'])) {
			$data['return_item_1_quantity'] = $this->request->post['return_item_1_quantity'];
		} elseif (!empty($return_info)) {
			$data['return_item_1_quantity'] = $return_info['return_item_1_quantity'];
		} else {
			$data['return_item_1_quantity'] = '';
		}

		if (isset($this->request->post['return_item_2_name'])) {
			$data['return_item_2_name'] = $this->request->post['return_item_2_name'];
		} elseif (!empty($return_info)) {
			$data['return_item_2_name'] = $return_info['return_item_2_name'];
		} else {
			$data['return_item_2_name'] = '';
		}

		if (isset($this->request->post['return_item_2_order_code'])) {
			$data['return_item_2_order_code'] = $this->request->post['return_item_2_order_code'];
		} elseif (!empty($return_info)) {
			$data['return_item_2_order_code'] = $return_info['return_item_2_order_code'];
		} else {
			$data['return_item_2_order_code'] = '';
		}

		if (isset($this->request->post['return_item_2_quantity'])) {
			$data['return_item_2_quantity'] = $this->request->post['return_item_2_quantity'];
		} elseif (!empty($return_info)) {
			$data['return_item_2_quantity'] = $return_info['return_item_2_quantity'];
		} else {
			$data['return_item_2_quantity'] = '';
		}

		if (isset($this->request->post['return_item_3_name'])) {
			$data['return_item_3_name'] = $this->request->post['return_item_3_name'];
		} elseif (!empty($return_info)) {
			$data['return_item_3_name'] = $return_info['return_item_3_name'];
		} else {
			$data['return_item_3_name'] = '';
		}

		if (isset($this->request->post['return_item_3_order_code'])) {
			$data['return_item_3_order_code'] = $this->request->post['return_item_3_order_code'];
		} elseif (!empty($return_info)) {
			$data['return_item_3_order_code'] = $return_info['return_item_3_order_code'];
		} else {
			$data['return_item_3_order_code'] = '';
		}

		if (isset($this->request->post['return_item_3_quantity'])) {
			$data['return_item_3_quantity'] = $this->request->post['return_item_3_quantity'];
		} elseif (!empty($return_info)) {
			$data['return_item_3_quantity'] = $return_info['return_item_3_quantity'];
		} else {
			$data['return_item_3_quantity'] = '';
		}

		if (isset($this->request->post['return_item_4_name'])) {
			$data['return_item_4_name'] = $this->request->post['return_item_4_name'];
		} elseif (!empty($return_info)) {
			$data['return_item_4_name'] = $return_info['return_item_4_name'];
		} else {
			$data['return_item_4_name'] = '';
		}

		if (isset($this->request->post['return_item_4_order_code'])) {
			$data['return_item_4_order_code'] = $this->request->post['return_item_4_order_code'];
		} elseif (!empty($return_info)) {
			$data['return_item_4_order_code'] = $return_info['return_item_4_order_code'];
		} else {
			$data['return_item_4_order_code'] = '';
		}

		if (isset($this->request->post['return_item_4_quantity'])) {
			$data['return_item_4_quantity'] = $this->request->post['return_item_4_quantity'];
		} elseif (!empty($return_info)) {
			$data['return_item_4_quantity'] = $return_info['return_item_4_quantity'];
		} else {
			$data['return_item_4_quantity'] = '';
		}

		if (isset($this->request->post['return_item_5_name'])) {
			$data['return_item_5_name'] = $this->request->post['return_item_5_name'];
		} elseif (!empty($return_info)) {
			$data['return_item_5_name'] = $return_info['return_item_5_name'];
		} else {
			$data['return_item_5_name'] = '';
		}

		if (isset($this->request->post['return_item_5_order_code'])) {
			$data['return_item_5_order_code'] = $this->request->post['return_item_5_order_code'];
		} elseif (!empty($return_info)) {
			$data['return_item_5_order_code'] = $return_info['return_item_5_order_code'];
		} else {
			$data['return_item_5_order_code'] = '';
		}

		if (isset($this->request->post['return_item_5_quantity'])) {
			$data['return_item_5_quantity'] = $this->request->post['return_item_5_quantity'];
		} elseif (!empty($return_info)) {
			$data['return_item_5_quantity'] = $return_info['return_item_5_quantity'];
		} else {
			$data['return_item_5_quantity'] = '';
		}

		if (isset($this->request->post['fault_description'])) {
			$data['fault_description'] = $this->request->post['fault_description'];
		} elseif (!empty($return_info)) {
			$data['fault_description'] = $return_info['fault_description'];
		} else {
			$data['fault_description'] = '';
		}

		if (isset($this->request->post['invoice_code'])) {
			$data['invoice_code'] = $this->request->post['invoice_code'];
		} elseif (!empty($return_info)) {
			$data['invoice_code'] = $return_info['invoice_code'];
		} else {
			$data['invoice_code'] = '';
		}

		if (isset($this->request->post['warranty_code'])) {
			$data['warranty_code'] = $this->request->post['warranty_code'];
		} elseif (!empty($return_info)) {
			$data['warranty_code'] = $return_info['warranty_code'];
		} else {
			$data['warranty_code'] = '';
		}

		if (isset($this->request->post['note'])) {
			$data['note'] = $this->request->post['note'];
		} elseif (!empty($return_info)) {
			$data['note'] = $return_info['note'];
		} else {
			$data['note'] = '';
		}

		if (isset($this->request->post['solution'])) {
			$data['solution'] = $this->request->post['solution'];
		} elseif (!empty($return_info)) {
			$data['solution'] = $return_info['solution'];
		} else {
			$data['solution'] = '';
		}

		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($return_info)) {
			$data['date_added'] = $return_info['date_added'];
		} else {
			$data['date_added'] = '';
		}

		if (isset($this->request->post['date_modified'])) {
			$data['date_modified'] = $this->request->post['date_modified'];
		} elseif (!empty($return_info)) {
			$data['date_modified'] = $return_info['date_modified'];
		} else {
			$data['date_modified'] = '';
		}

		if (isset($this->request->post['return_status_id'])) {
			$data['return_status_id'] = $this->request->post['return_status_id'];
		} elseif (!empty($return_info)) {
			$data['return_status_id'] = $return_info['return_status_id'];
		} else {
			$data['return_status_id'] = '';
		}

		if (isset($this->request->post['return_action_id'])) {
			$data['return_action_id'] = $this->request->post['return_action_id'];
		} elseif (!empty($return_info)) {
			$data['return_action_id'] = $return_info['return_action_id'];
		} else {
			$data['return_action_id'] = '';
		}		

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

		// if ((utf8_strlen($this->request->post['return_code']) < 3) || (utf8_strlen($this->request->post['return_code']) > 20)) {
		// 	$this->error['return_code'] = $this->language->get('error_return_code');
		// }

		if ((utf8_strlen($this->request->post['date_return']) < 3) || (utf8_strlen($this->request->post['date_return']) > 20)) {
			$this->error['date_return'] = $this->language->get('error_date_return');
		}

		if ((utf8_strlen($this->request->post['warranty_code']) < 3) || (utf8_strlen($this->request->post['warranty_code']) > 20)) {
			$this->error['warranty_code'] = $this->language->get('error_warranty_code');
		}

		if ((utf8_strlen($this->request->post['invoice_code']) < 3) || (utf8_strlen($this->request->post['invoice_code']) > 20)) {
			$this->error['invoice_code'] = $this->language->get('error_invoice_code');
		}

		if ((utf8_strlen($this->request->post['fault_description']) < 1) || (utf8_strlen($this->request->post['fault_description']) > 800)) {
			$this->error['fault_description'] = $this->language->get('error_fault_description');
		}

		if ((utf8_strlen($this->request->post['solution']) < 1) || (utf8_strlen($this->request->post['solution']) > 100)) {
			$this->error['solution'] = $this->language->get('error_solution');
		}

	  if ((utf8_strlen($this->request->post['service_centre']) < 1) || (utf8_strlen($this->request->post['service_centre']) > 100)) {
	  	$this->error['service_centre'] = $this->language->get('error_service_centre');
	  }

	  if ((utf8_strlen($this->request->post['address']) < 1) || (utf8_strlen($this->request->post['address']) > 100)) {
	  	$this->error['address'] = $this->language->get('error_address');
	  }

	  if ((utf8_strlen($this->request->post['city_postcode']) < 1) || (utf8_strlen($this->request->post['city_postcode']) > 100)) {
	  	$this->error['city_postcode'] = $this->language->get('error_city_postcode');
	  }

	  if ((utf8_strlen($this->request->post['contact_person']) < 1) || (utf8_strlen($this->request->post['contact_person']) > 100)) {
	  	$this->error['contact_person'] = $this->language->get('error_contact_person');
	  }

	  if ((utf8_strlen($this->request->post['phone']) < 1) || (utf8_strlen($this->request->post['phone']) > 100)) {
	  	$this->error['phone'] = $this->language->get('error_phone');
	  }

		if ((utf8_strlen($this->request->post['vehicle_type']) < 1) || (utf8_strlen($this->request->post['vehicle_type']) > 50)) {
			$this->error['vehicle_type'] = $this->language->get('error_vehicle_type');
		}

		if ((utf8_strlen($this->request->post['ecv']) < 1) || (utf8_strlen($this->request->post['ecv']) > 50)) {
			$this->error['ecv'] = $this->language->get('error_ecv');
		}

		if ((utf8_strlen($this->request->post['vehicle_year']) != 4) || !is_numeric($this->request->post['vehicle_year'])) {
		 	$this->error['vehicle_year'] = $this->language->get('error_vehicle_year');
		}

		if ((utf8_strlen($this->request->post['model']) < 1) || (utf8_strlen($this->request->post['model']) > 100)) {
			$this->error['model'] = $this->language->get('error_model');
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

	public function details() {
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

		$data['return_details'] = $this->model_account_return->getReturnDetails($return_id);
		
		for($i = 1; $i <= 5; $i++) {
			if(isset($data['return_details']['return_item_' . $i . '_id'])) {
				$id = $data['return_details']['return_item_' . $i . '_id'];
				$data['return_details']['items'][$i] = $this->model_catalog_product->getProduct($id);
			}
		}

		$data['return_details']['date_added'] = date($this->language->get('date_format_short'), strtotime($data['return_details']['date_added']));

		$data['return_details']['date_installed'] = date($this->language->get('date_format_short'), strtotime($data['return_details']['date_installed']));

		$this->response->setOutput($this->load->view('default/template/account/return_details.tpl', $data));
	}
}























































