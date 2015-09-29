<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink(HTTP_SERVER, 'canonical');
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$blue_line = $this->model_catalog_category->getCategory(59);
		$green_line = $this->model_catalog_category->getCategory(60);

		$data['blue_line']['title'] = $blue_line['name'];
		$data['green_line']['title'] = $green_line['name'];

		$data['blue_line']['description'] = html_entity_decode($blue_line['description']);
		$data['green_line']['description'] = html_entity_decode($green_line['description']);		

		$data['blue_line']['headline'] = $this->language->get('home_blueline');
		$data['green_line']['headline'] = $this->language->get('home_greenline');

		$data['newsletter_index']['text'] = $this->language->get('index_newsletter');
		$data['newsletter_index']['email'] = $this->language->get('index_newsletter_email');
		$data['newsletter_index']['button'] = $this->language->get('index_newsletter_button');

		$data += $this->load->language('common/home');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/common/home.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/common/home.tpl', $data));
		}
	}
}