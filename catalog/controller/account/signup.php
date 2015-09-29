<?php
class ControllerAccountAccount extends Controller {
	public function index() {
		//if (!$this->customer->isLogged()) {}

		$this->load->language('account/signup');	

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_signup'),
			'href' => $this->url->link('account/account', '', 'SSL')
		);

	}
}
