<?php
class ControllerInformationPartnerRequest extends Controller {
	private $error = array();

	private $data_keys = array(
		'name',
		'address',
		'country',
		'contact_person',
		'phone',
		'fax',
		'email',
		'ico',
		'dic',
		'icdph',
		'note',
		'message',
		'opening_hours'
	);

	public function index() {
		$this->load->language('information/partner_request');

		$data = array();

		$data += $this->load->language('information/partner_request');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/partner_request')
		);

		foreach($this->data_keys as $key) {
			if (isset($this->error[$key])) {
				$data['error_' . $key] = $this->error[$key];
			} else {
				$data['error_' . $key] = '';
			}
		}

		$data['button_submit'] = $this->language->get('button_submit');

		$data['action'] = $this->url->link('information/partner_request');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		foreach($this->data_keys as $key) {
			if(isset($this->request->post[$key])) {
				$data[$key] = $this->request->post[$key];
			} else {
				$data[$key] = '';
			}
		}

		if ($this->config->get('config_google_captcha_status')) {
			$this->document->addScript('https://www.google.com/recaptcha/api.js');

			$data['site_key'] = $this->config->get('config_google_captcha_public');
		} else {
			$data['site_key'] = '';
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/partner_request.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/partner_request.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/information/partner_request.tpl', $data));
		}
	}
}