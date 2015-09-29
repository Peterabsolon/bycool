<?php
class ControllerSaleWarranty extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('sale/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/warranty');

		$this->getList();
	}

	public function add() {
		$this->load->language('sale/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/warranty');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_sale_warranty->addWarranty($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_warranty_id'])) {
				$url .= '&filter_warranty_id=' . $this->request->get['filter_warranty_id'];
			}

			if (isset($this->request->get['filter_warranty_code'])) {
				$url .= '&filter_warranty_code=' . $this->request->get['filter_warranty_code'];
			}

			if (isset($this->request->get['filter_ecv'])) {
				$url .= '&filter_ecv=' . $this->request->get['filter_ecv'];
			}

			if (isset($this->request->get['filter_customer'])) {
				$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_client'])) {
				$url .= '&filter_client=' . html_entity_decode($this->request->get['filter_client'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_serial_number'])) {
				$url .= '&filter_serial_number=' . html_entity_decode($this->request->get['filter_serial_number'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_order_code'])) {
				$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
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

			$this->response->redirect($this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('sale/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/warranty');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_sale_warranty->editWarranty($this->request->get['warranty_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_warranty_id'])) {
				$url .= '&filter_warranty_id=' . $this->request->get['filter_warranty_id'];
			}

			if (isset($this->request->get['filter_warranty_code'])) {
				$url .= '&filter_warranty_code=' . $this->request->get['filter_warranty_code'];
			}

			if (isset($this->request->get['filter_ecv'])) {
				$url .= '&filter_ecv=' . $this->request->get['filter_ecv'];
			}

			if (isset($this->request->get['filter_customer'])) {
				$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_client'])) {
				$url .= '&filter_client=' . html_entity_decode($this->request->get['filter_client'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_serial_number'])) {
				$url .= '&filter_serial_number=' . html_entity_decode($this->request->get['filter_serial_number'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_order_code'])) {
				$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
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

			$this->response->redirect($this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('sale/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/warranty');

		if (isset($this->request->post['selected']) /* && $this->validateDelete() */) {
			foreach ($this->request->post['selected'] as $warranty_id) {
				$this->model_sale_warranty->deleteWarranty($warranty_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_warranty_id'])) {
				$url .= '&filter_warranty_id=' . $this->request->get['filter_warranty_id'];
			}

			if (isset($this->request->get['filter_warranty_code'])) {
				$url .= '&filter_warranty_code=' . $this->request->get['filter_warranty_code'];
			}

			if (isset($this->request->get['filter_ecv'])) {
				$url .= '&filter_ecv=' . $this->request->get['filter_ecv'];
			}

			if (isset($this->request->get['filter_customer'])) {
				$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_client'])) {
				$url .= '&filter_client=' . html_entity_decode($this->request->get['filter_client'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_serial_number'])) {
				$url .= '&filter_serial_number=' . html_entity_decode($this->request->get['filter_serial_number'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8');
			}

			if (isset($this->request->get['filter_order_code'])) {
				$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
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

			$this->response->redirect($this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL'));
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

		$data += $this->load->language('sale/printwarranty');

		$data['direction'] = $this->language->get('direction');
		$data['lang'] = $this->language->get('code');
		
		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$this->load->model('sale/warranty');

		$this->load->model('setting/setting');

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['store_info'] = $this->model_setting_setting->getSetting('config', 0);

		$result = $this->model_sale_warranty->printWarranty($warranty_id);

		$data['warranty_info'] = array();

		$data['warranty_info'] += $result;

		$this->response->setOutput($this->load->view('sale/warranty_print.tpl', $data));
	}	

	protected function getList() {
		if (isset($this->request->get['filter_warranty_id'])) {
			$filter_warranty_id = $this->request->get['filter_warranty_id'];
		} else {
			$filter_warranty_id = null;
		}

		if (isset($this->request->get['filter_warranty_code'])) {
			$filter_warranty_code = $this->request->get['filter_warranty_code'];
		} else {
			$filter_warranty_code = null;
		}

		if (isset($this->request->get['filter_serial_number'])) {
			$filter_serial_number = $this->request->get['filter_serial_number'];
		} else {
			$filter_serial_number = null;
		}

		if (isset($this->request->get['filter_customer'])) {
			$filter_customer = $this->request->get['filter_customer'];
		} else {
			$filter_customer = null;
		}

		if (isset($this->request->get['filter_client'])) {
			$filter_client = $this->request->get['filter_client'];
		} else {
			$filter_client = null;
		}

		if (isset($this->request->get['filter_product'])) {
			$filter_product = $this->request->get['filter_product'];
		} else {
			$filter_product = null;
		}

		if (isset($this->request->get['filter_ecv'])) {
			$filter_ecv = $this->request->get['filter_ecv'];
		} else {
			$filter_ecv = null;
		}

		if (isset($this->request->get['filter_order_code'])) {
			$filter_order_code = $this->request->get['filter_order_code'];
		} else {
			$filter_order_code = null;
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
			$sort = 'w.warranty_id';
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

		if (isset($this->request->get['filter_warranty_id'])) {
			$url .= '&filter_warranty_id=' . $this->request->get['filter_warranty_id'];
		}

		if (isset($this->request->get['filter_warranty_code'])) {
			$url .= '&filter_warranty_code=' . $this->request->get['filter_warranty_code'];
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . $this->request->get['filter_ecv'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_client'])) {
			$url .= '&filter_client=' . html_entity_decode($this->request->get['filter_client'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_serial_number'])) {
			$url .= '&filter_serial_number=' . html_entity_decode($this->request->get['filter_serial_number'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_product'])) {
			$url .= '&filter_product=' . html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
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
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('sale/warranty/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('sale/warranty/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['warranties'] = array();

		$filter_data = array(
			'filter_warranty_id'				=> $filter_warranty_id,
			'filter_warranty_code'			=> $filter_warranty_code,
			'filter_serial_number'			=> $filter_serial_number,
			'filter_client'							=> $filter_client,
			'filter_customer'						=> $filter_customer,
			'filter_product'						=> $filter_product,
			'filter_ecv'								=> $filter_ecv,
			'filter_order_code'					=> $filter_order_code,
			'filter_date_added'					=> $filter_date_added,
			'filter_date_modified'			=> $filter_date_modified,
			'sort'											=> $sort,
			'order'           					=> $order,
			'start'           					=> ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           					=> $this->config->get('config_limit_admin')
		);

		$warranty_total = $this->model_sale_warranty->getTotalWarranties($filter_data);

		$results = $this->model_sale_warranty->getWarranties($filter_data);

		foreach ($results as $result) {
			$data['warranties'][] = array(
				'warranty_id'			 => $result['warranty_id'],
				'warranty_code'    => $result['warranty_code'],
				'customer'   	 		 => $result['customer'],
				'client'					 => $result['customer_name'],
				'product'					 => $result['product'],
			 	'order_code' 			 => $result['order_code'],
			 	'ecv'				 			 => $result['ecv'],
			 	'serial_number'		 => $result['serial_number'],
			 	'date_added'    	 => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified' 	 => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'edit'          	 => $this->url->link('sale/warranty/edit', 'token=' . $this->session->data['token'] . '&warranty_id=' . $result['warranty_id'] . $url, 'SSL'),
				'print'						 => $this->url->link('sale/warranty/printWarranty&version=store&lang=slovak', 'token=' . $this->session->data['token'] . '&warranty_id=' . $result['warranty_id'] . $url, 'SSL' )
			);
		}

		$data += $this->language->load('sale/warranty');

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

		if (isset($this->request->get['filter_warranty_id'])) {
			$url .= '&filter_warranty_id=' . $this->request->get['filter_warranty_id'];
		}

		if (isset($this->request->get['filter_warranty_code'])) {
			$url .= '&filter_warranty_code=' . $this->request->get['filter_warranty_code'];
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . $this->request->get['filter_ecv'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_client'])) {
			$url .= '&filter_client=' . html_entity_decode($this->request->get['filter_client'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_serial_number'])) {
				$url .= '&filter_serial_number=' . html_entity_decode($this->request->get['filter_serial_number'], ENT_QUOTES, 'UTF-8');
			}

		if (isset($this->request->get['filter_product'])) {
			$url .= '&filter_product=' . html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
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

		$data['sort_warranty_id'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.warranty_id' . $url, 'SSL');
		$data['sort_warranty_code'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.warranty_code' . $url, 'SSL');
		$data['sort_customer'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=customer' . $url, 'SSL');
		$data['sort_product'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.product' . $url, 'SSL');
		$data['sort_ecv'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.ecv' . $url, 'SSL');
		$data['sort_order_code'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.order_code' . $url, 'SSL');
		$data['sort_serial_number'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.serial_number' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.date_added' . $url, 'SSL');
		$data['sort_date_modified'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.date_modified' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_warranty_id'])) {
			$url .= '&filter_warranty_id=' . $this->request->get['filter_warranty_id'];
		}

		if (isset($this->request->get['filter_warranty_code'])) {
			$url .= '&filter_warranty_code=' . $this->request->get['filter_warranty_code'];
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . $this->request->get['filter_ecv'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_client'])) {
			$url .= '&filter_client=' . html_entity_decode($this->request->get['filter_client'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_serial_number'])) {
				$url .= '&filter_serial_number=' . html_entity_decode($this->request->get['filter_serial_number'], ENT_QUOTES, 'UTF-8');
			}

		if (isset($this->request->get['filter_product'])) {
			$url .= '&filter_product=' . html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
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
		$pagination->total = $warranty_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($warranty_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($warranty_total - $this->config->get('config_limit_admin'))) ? $warranty_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $warranty_total, ceil($warranty_total / $this->config->get('config_limit_admin')));

		$data['filter_warranty_id'] = $filter_warranty_id;
		$data['filter_warranty_code'] = $filter_warranty_code;
		$data['filter_customer'] = $filter_customer;
		$data['filter_client'] = $filter_client;
		$data['filter_product'] = $filter_product;
		$data['filter_serial_number'] = $filter_serial_number;
		$data['filter_ecv'] = $filter_ecv;
		$data['filter_order_code'] = $filter_order_code;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_date_modified'] = $filter_date_modified;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/warranty_list.tpl', $data));
	}

	protected function getForm() {
		$data = array();

		$data += $this->language->load('sale/warranty');

		$data['text_form'] = !isset($this->request->get['warranty_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

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

		if (isset($this->error['warranty_code'])) {
			$data['error_warranty_code'] = $this->error['warranty_code'];
		} else {
			$data['error_warranty_code'] = '';
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

		if (isset($this->error['vin'])) {
			$data['error_vin'] = $this->error['vin'];
		} else {
			$data['error_vin'] = '';
		}

		if (isset($this->error['compressor_number'])) {
			$data['error_compressor_number'] = $this->error['compressor_number'];
		} else {
			$data['error_compressor_number'] = '';
		}

		if (isset($this->error['product'])) {
			$data['error_product'] = $this->error['product'];
		} else {
			$data['error_product'] = '';
		}

		if (isset($this->error['serial_number'])) {
			$data['error_serial_number'] = $this->error['serial_number'];
		} else {
			$data['error_serial_number'] = '';
		}

		if (isset($this->error['customer_name'])) {
			$data['error_customer_name'] = $this->error['customer_name'];
		} else {
			$data['error_customer_name'] = '';
		}

		if (isset($this->error['customer_address'])) {
			$data['error_customer_address'] = $this->error['customer_address'];
		} else {
			$data['error_customer_address'] = '';
		}

		if (isset($this->error['customer_country'])) {
			$data['error_customer_country'] = $this->error['customer_country'];
		} else {
			$data['error_customer_country'] = '';
		}

		if (isset($this->error['customer_phone'])) {
			$data['error_customer_phone'] = $this->error['customer_phone'];
		} else {
			$data['error_customer_phone'] = '';
		}

		if (isset($this->error['customer_email'])) {
			$data['error_customer_email'] = $this->error['customer_email'];
		} else {
			$data['error_customer_email'] = '';
		}

		if (isset($this->error['date_added'])) {
			$data['error_date_added'] = $this->error['date_added'];
		} else {
			$data['error_date_added'] = '';
		}

		if (isset($this->error['date_modified'])) {
			$data['error_date_modified'] = $this->error['date_modified'];
		} else {
			$data['error_date_modified'] = '';
		}

		if (isset($this->error['date_installed'])) {
			$data['error_date_installed'] = $this->error['date_installed'];
		} else {
			$data['error_date_installed'] = '';
		}


		$url = '';

		if (isset($this->request->get['filter_warranty_id'])) {
			$url .= '&filter_warranty_id=' . $this->request->get['filter_warranty_id'];
		}

		if (isset($this->request->get['filter_warranty_code'])) {
			$url .= '&filter_warranty_code=' . $this->request->get['filter_warranty_code'];
		}

		if (isset($this->request->get['filter_ecv'])) {
			$url .= '&filter_ecv=' . $this->request->get['filter_ecv'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_client'])) {
			$url .= '&filter_client=' . html_entity_decode($this->request->get['filter_client'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_serial_number'])) {
				$url .= '&filter_serial_number=' . html_entity_decode($this->request->get['filter_serial_number'], ENT_QUOTES, 'UTF-8');
			}

		if (isset($this->request->get['filter_product'])) {
			$url .= '&filter_product=' . html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8');
		}

		if (isset($this->request->get['filter_order_code'])) {
			$url .= '&filter_order_code=' . $this->request->get['filter_order_code'];
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
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['warranty_id'])) {
			$data['action'] = $this->url->link('sale/warranty/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('sale/warranty/edit', 'token=' . $this->session->data['token'] . '&warranty_id=' . $this->request->get['warranty_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['warranty_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$warranty_info = $this->model_sale_warranty->getWarranty($this->request->get['warranty_id']);
		}

		if (!empty($warranty_info)) {
			$data['customer_id'] = $warranty_info['customer_id'];
		} else {
			$data['customer_id'] = '';
		}

		if (isset($this->request->post['warranty_code'])) {
			$data['warranty_code'] = $this->request->post['warranty_code'];
		} else if (!empty($warranty_info)) {
			$data['warranty_code'] = $warranty_info['warranty_code'];
		} else {
			$data['warranty_code'] = '';
		}

		if (isset($this->request->post['order_code'])) {
			$data['order_code'] = $this->request->post['order_code'];
		} else if (!empty($warranty_info)) {
			$data['order_code'] = $warranty_info['order_code'];
		} else {
			$data['order_code'] = '';
		}

		if (isset($this->request->post['vehicle_type'])) {
			$data['vehicle_type'] = $this->request->post['vehicle_type'];
		} else if (!empty($warranty_info)) {
			$data['vehicle_type'] = $warranty_info['vehicle_type'];
		} else {
			$data['vehicle_type'] = '';
		}

		if (isset($this->request->post['ecv'])) {
			$data['ecv'] = $this->request->post['ecv'];
		} else if (!empty($warranty_info)) {
			$data['ecv'] = $warranty_info['ecv'];
		} else {
			$data['ecv'] = '';
		}

		if (isset($this->request->post['vin'])) {
			$data['vin'] = $this->request->post['vin'];
		} else if (!empty($warranty_info)) {
			$data['vin'] = $warranty_info['vin'];
		} else {
			$data['vin'] = '';
		}

		if (isset($this->request->post['compressor_number'])) {
			$data['compressor_number'] = $this->request->post['compressor_number'];
		} else if (!empty($warranty_info)) {
			$data['compressor_number'] = $warranty_info['compressor_number'];
		} else {
			$data['compressor_number'] = '';
		}

		if (isset($this->request->post['product'])) {
			$data['product'] = $this->request->post['product'];
		} else if (!empty($warranty_info)) {
			$data['product'] = $warranty_info['product'];
		} else {
			$data['product'] = '';
		}

		if (isset($this->request->post['serial_number'])) {
			$data['serial_number'] = $this->request->post['serial_number'];
		} else if (!empty($warranty_info)) {
			$data['serial_number'] = $warranty_info['serial_number'];
		} else {
			$data['serial_number'] = '';
		}

		if (isset($this->request->post['customer_name'])) {
			$data['customer_name'] = $this->request->post['customer_name'];
		} else if (!empty($warranty_info)) {
			$data['customer_name'] = $warranty_info['customer_name'];
		} else {
			$data['customer_name'] = '';
		}

		if (isset($this->request->post['customer_address'])) {
			$data['customer_address'] = $this->request->post['customer_address'];
		} else if (!empty($warranty_info)) {
			$data['customer_address'] = $warranty_info['customer_address'];
		} else {
			$data['customer_address'] = '';
		}

		if (isset($this->request->post['customer_country'])) {
			$data['customer_country'] = $this->request->post['customer_country'];
		} else if (!empty($warranty_info)) {
			$data['customer_country'] = $warranty_info['customer_country'];
		} else {
			$data['customer_country'] = '';
		}

		if (isset($this->request->post['customer_phone'])) {
			$data['customer_phone'] = $this->request->post['customer_phone'];
		} else if (!empty($warranty_info)) {
			$data['customer_phone'] = $warranty_info['customer_phone'];
		} else {
			$data['customer_phone'] = '';
		}

		if (isset($this->request->post['customer_email'])) {
			$data['customer_email'] = $this->request->post['customer_email'];
		} else if (!empty($warranty_info)) {
			$data['customer_email'] = $warranty_info['customer_email'];
		} else {
			$data['customer_email'] = '';
		}

		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} else if (!empty($warranty_info)) {
			$data['date_added'] = $warranty_info['date_added'];
		} else {
			$data['date_added'] = '';
		}

		if (isset($this->request->post['date_modified'])) {
			$data['date_modified'] = $this->request->post['date_modified'];
		} else if (!empty($warranty_info)) {
			$data['date_modified'] = $warranty_info['date_modified'];
		} else {
			$data['date_modified'] = '';
		}

		if (isset($this->request->post['date_installed'])) {
			$data['date_installed'] = $this->request->post['date_installed'];
		} else if (!empty($warranty_info)) {
			$data['date_installed'] = $warranty_info['date_installed'];
		} else {
			$data['date_installed'] = '';
		}

		$this->load->model('sale/customer');

		$data['customers'] = array();

		$results = $this->model_sale_customer->getCustomers();

		foreach ($results as $result) {
			$data['customers'][] = array(
				'id' 		=> $result['customer_id'],
				'name' 	=> $result['firstname'] . $result['lastname']
			);
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/warranty_form.tpl', $data));
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

		if ((utf8_strlen($this->request->post['product']) < 3) || (utf8_strlen($this->request->post['product']) > 50)) {
			$this->error['product'] = $this->language->get('error_product');
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

		// if ((utf8_strlen($this->request->post['customer_country']) < 3) || (utf8_strlen($this->request->post['customer_country']) > 100)) {
		// 	$this->error['customer_country'] = $this->language->get('error_customer_country');
		// }

		// if ((utf8_strlen($this->request->post['customer_email']) < 3) || (utf8_strlen($this->request->post['customer_email']) > 50)) {
		// 	$this->error['customer_email'] = $this->language->get('error_customer_email');
		// }

		if ((utf8_strlen($this->request->post['date_installed']) < 3) || (utf8_strlen($this->request->post['date_installed']) > 30)) {
		 	$this->error['date_installed'] = $this->language->get('error_date_installed');
		}

		if ((utf8_strlen($this->request->post['serial_number']) < 3) || (utf8_strlen($this->request->post['serial_number']) > 20)) {
		 	$this->error['serial_number'] = $this->language->get('error_serial_number');
		}

		// if ((utf8_strlen($this->request->post['customer_phone']) < 3) || (utf8_strlen($this->request->post['customer_phone']) > 20) || !is_numeric($this->request->post['customer_phone'])) {
		//  	$this->error['customer_phone'] = $this->language->get('error_customer_phone');
		// }

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'sale/warranty')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}