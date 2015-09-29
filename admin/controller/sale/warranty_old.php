<?php
class ControllerSaleWarranty extends Controller {
	private $error = array();

	private $index_keys = array(
		array('warranty_id', 0),
		array('warranty_code', 0),
		array('service_centre_id', 1),
		array('product', 1),
		array('order_code', 0),
		array('date_added', 0),
		array('date_modified', 0),
		array('date_installed', 0)
	);

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

		if (($this->request->server['REQUEST_METHOD'] == 'POST') /*&& $this->validateForm() */) {
			$this->model_sale_warranty->addWarranty($this->request->post);

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

			$this->response->redirect($this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('sale/warranty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/warranty');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') /* && $this->validateForm() */) {
			$this->model_sale_warranty->editWarranty($this->request->get['warranty_id'], $this->request->post);

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

		if (!isset($this->request->get['lang'])) {
			echo '$lang not set';
		} else {
			$lang = $this->request->get['lang'];
		}

		if (!isset($this->request->get['version'])) {
			echo '$version not set';
		} else {
			$version = $this->request->get['version'];
		}

		$data = array();

		$data += $this->load->languageSelected('sale/printwarranty', $lang);

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

		$data['warranty_info'] = $this->model_sale_warranty->printWarranty($warranty_id);

		if($version == 'store') {
			$this->response->setOutput($this->load->view('sale/warranty_print_store.tpl', $data));
		} else if ($version == 'customer') {
			$this->response->setOutput($this->load->view('sale/warranty_print_customer.tpl', $data));
		}
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
			'href' => $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('sale/warranty/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('sale/warranty/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$warranty_total = $this->model_sale_warranty->getTotalWarranties($filter_data);

		$results = $this->model_sale_warranty->getWarranties($filter_data);

		$data['warranties'] = array();

		foreach ($results as $result) {
			$data['warranties'][] = array(
				'warranty_id'			 => $result['warranty_id'],
				'warranty_code'    => $result['warranty_code'],
				'service_centre'   => $result['name'],
			 	'order_code' 			 => $result['order_code'],
			 	'vehicle_type'		 => $result['vehicle_type'],
			 	'ecv'							 => $result['ecv'],
			 	'vin'							 => $result['vin'],
			 	'compressor_number'=> $result['compressor_number'],	
			 	'model'						 => $result['model'],	
			 	'product_id'			 => $result['product_id'],	
			 	'serial_number'		 => $result['serial_number'],	
			 	'customer_name'		 => $result['customer_name'],	
			 	'customer_address' => $result['customer_address'],		
			 	'customer_country' => $result['customer_country'],		
			 	'customer_phone'	 => $result['customer_phone'],	
			 	'customer_email'	 => $result['customer_email'],		
			 	'date_installed'	 => date($this->language->get('date_format_short'), strtotime($result['date_installed'])),
				'date_added'    	 => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified' 	 => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				'edit'          	 => $this->url->link('sale/warranty/edit', 'token=' . $this->session->data['token'] . '&warranty_id=' . $result['warranty_id'] . $url, 'SSL'),
				'print_store'			 => $this->url->link('sale/warranty/printWarranty&version=store&lang=slovak', 'token=' . $this->session->data['token'] . '&warranty_id=' . $result['warranty_id'] . $url, 'SSL' ),
				'print_customer'	 => $this->url->link('sale/warranty/printWarranty&version=customer&lang=slovak', 'token=' . $this->session->data['token'] . '&warranty_id=' . $result['warranty_id'] . $url, 'SSL' )
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
			$data['sort_' . $value[0]] = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . '&sort=w.' . $value[0] . $url, 'SSL');
		}

		// print_r($data);
		// die;
	
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
		$pagination->url = $this->url->link('sale/warranty', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

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
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/warranty_list.tpl', $data));
	}

	protected function getForm() {
		$data = array();

		$data['text_form'] = !isset($this->request->get['warranty_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$data += $this->language->load('sale/warranty');

		$data['token'] = $this->session->data['token'];

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

		// // if (isset($this->error['order_id'])) {
		// // 	$data['error_order_id'] = $this->error['order_id'];
		// // } else {
		// // 	$data['error_order_id'] = '';
		// // }

		// // if (isset($this->error['customer_name'])) {
		// // 	$data['error_customer_name'] = $this->error['customer_name'];
		// // } else {
		// // 	$data['error_customer_name'] = '';
		// // }

		// // if (isset($this->error['email'])) {
		// // 	$data['error_email'] = $this->error['email'];
		// // } else {
		// // 	$data['error_email'] = '';
		// // }

		// // if (isset($this->error['telephone'])) {
		// // 	$data['error_telephone'] = $this->error['telephone'];
		// // } else {
		// // 	$data['error_telephone'] = '';
		// // }

		// // if (isset($this->error['product'])) {
		// // 	$data['error_product'] = $this->error['product'];
		// // } else {
		// // 	$data['error_product'] = '';
		// // }

		// // if (isset($this->error['model'])) {
		// // 	$data['error_model'] = $this->error['model'];
		// // } else {
		// // 	$data['error_model'] = '';
		// }

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

		if (isset($this->request->get['warranty_code'])) {
			$data['warranty_code'] = $this->request->post['warranty_code'];
		} else if (!empty($warranty_info)) {
			$data['warranty_code'] = $warranty_info['warranty_code'];
		} else {
			$data['warranty_code'] = '';
		}

		if (isset($this->request->get['order_code'])) {
			$data['order_code'] = $this->request->post['order_code'];
		} else if (!empty($warranty_info)) {
			$data['order_code'] = $warranty_info['order_code'];
		} else {
			$data['order_code'] = '';
		}

		if (isset($this->request->get['vehicle_type'])) {
			$data['vehicle_type'] = $this->request->post['vehicle_type'];
		} else if (!empty($warranty_info)) {
			$data['vehicle_type'] = $warranty_info['vehicle_type'];
		} else {
			$data['vehicle_type'] = '';
		}

		if (isset($this->request->get['ecv'])) {
			$data['ecv'] = $this->request->post['ecv'];
		} else if (!empty($warranty_info)) {
			$data['ecv'] = $warranty_info['ecv'];
		} else {
			$data['ecv'] = '';
		}

		if (isset($this->request->get['vin'])) {
			$data['vin'] = $this->request->post['vin'];
		} else if (!empty($warranty_info)) {
			$data['vin'] = $warranty_info['vin'];
		} else {
			$data['vin'] = '';
		}

		if (isset($this->request->get['compressor_number'])) {
			$data['compressor_number'] = $this->request->post['compressor_number'];
		} else if (!empty($warranty_info)) {
			$data['compressor_number'] = $warranty_info['compressor_number'];
		} else {
			$data['compressor_number'] = '';
		}

		if (isset($this->request->get['model'])) {
			$data['model'] = $this->request->post['model'];
		} else if (!empty($warranty_info)) {
			$data['model'] = $warranty_info['model'];
		} else {
			$data['model'] = '';
		}

		if (isset($this->request->get['product_id'])) {
			$data['product_id'] = $this->request->post['product_id'];
		} else if (!empty($warranty_info)) {
			$data['product_id'] = $warranty_info['product_id'];
		} else {
			$data['product_id'] = '';
		}

		if (isset($this->request->get['serial_number'])) {
			$data['serial_number'] = $this->request->post['serial_number'];
		} else if (!empty($warranty_info)) {
			$data['serial_number'] = $warranty_info['serial_number'];
		} else {
			$data['serial_number'] = '';
		}

		if (isset($this->request->get['customer_name'])) {
			$data['customer_name'] = $this->request->post['customer_name'];
		} else if (!empty($warranty_info)) {
			$data['customer_name'] = $warranty_info['customer_name'];
		} else {
			$data['customer_name'] = '';
		}

		if (isset($this->request->get['customer_address'])) {
			$data['customer_address'] = $this->request->post['customer_address'];
		} else if (!empty($warranty_info)) {
			$data['customer_address'] = $warranty_info['customer_address'];
		} else {
			$data['customer_address'] = '';
		}

		if (isset($this->request->get['customer_country'])) {
			$data['customer_country'] = $this->request->post['customer_country'];
		} else if (!empty($warranty_info)) {
			$data['customer_country'] = $warranty_info['customer_country'];
		} else {
			$data['customer_country'] = '';
		}

		if (isset($this->request->get['customer_phone'])) {
			$data['customer_phone'] = $this->request->post['customer_phone'];
		} else if (!empty($warranty_info)) {
			$data['customer_phone'] = $warranty_info['customer_phone'];
		} else {
			$data['customer_phone'] = '';
		}

		if (isset($this->request->get['customer_email'])) {
			$data['customer_email'] = $this->request->post['customer_email'];
		} else if (!empty($warranty_info)) {
			$data['customer_email'] = $warranty_info['customer_email'];
		} else {
			$data['customer_email'] = '';
		}

		if (isset($this->request->get['service_centre_id'])) {
			$data['service_centre_id'] = $this->request->post['service_centre_id'];
		} else if (!empty($warranty_info)) {
			$data['service_centre_id'] = $warranty_info['service_centre_id'];
		} else {
			$data['service_centre_id'] = '';
		}

		if (isset($this->request->post['date_installed'])) {
			$data['date_installed'] = $this->request->post['date_installed'];
		} elseif (!empty($warranty_info)) {
			$data['date_installed'] = ($warranty_info['date_installed'] != '0000-00-00' ? $warranty_info['date_installed'] : '');
		} else {
			$data['date_installed'] = '';
		}

		$this->load->model('sale/service_centre');

		$data['service_centres'] = array();

		$results = $this->model_sale_service_centre->getServiceCentres();

		foreach ($results as $result) {
			$data['service_centres'][] = array(
				'id'			 => $result['service_centre_id'],
				'name'     => $result['name']
			);
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/warranty_form.tpl', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'sale/warranty')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		// if (empty($this->request->post['order_id'])) {
		// 	$this->error['order_id'] = $this->language->get('error_order_id');
		// }

		// if ((utf8_strlen(trim($this->request->post['customer_name'])) < 1) || (utf8_strlen(trim($this->request->post['customer_name'])) > 32)) {
		// 	$this->error['customer_name'] = $this->language->get('error_customer_name');
		// }

		// if ((utf8_strlen(trim($this->request->post['lastname'])) < 1) || (utf8_strlen(trim($this->request->post['lastname'])) > 32)) {
		// 	$this->error['lastname'] = $this->language->get('error_lastname');
		// }

		// if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
		// 	$this->error['email'] = $this->language->get('error_email');
		// }

		// if ((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 32)) {
		// 	$this->error['telephone'] = $this->language->get('error_telephone');
		// }

		// if ((utf8_strlen($this->request->post['product']) < 1) || (utf8_strlen($this->request->post['product']) > 255)) {
		// 	$this->error['product'] = $this->language->get('error_product');
		// }

		// if ((utf8_strlen($this->request->post['model']) < 1) || (utf8_strlen($this->request->post['model']) > 64)) {
		// 	$this->error['model'] = $this->language->get('error_model');
		// }

		// if (empty($this->request->post['return_reason_id'])) {
		// 	$this->error['reason'] = $this->language->get('error_reason');
		// }

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'sale/warranty')) {
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
}