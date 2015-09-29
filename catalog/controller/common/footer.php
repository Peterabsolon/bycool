<?php
class ControllerCommonFooter extends Controller {
	public function index() {
		$this->load->language('common/footer');
		
		$data['scripts'] = $this->document->getScripts();
		$data['text_information'] = $this->language->get('text_information');
		$data['text_service'] = $this->language->get('text_service');
		$data['text_extra'] = $this->language->get('text_extra');
		$data['text_contact'] = $this->language->get('text_contact');
		$data['text_return'] = $this->language->get('text_return');
		$data['text_sitemap'] = $this->language->get('text_sitemap');
		$data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$data['text_voucher'] = $this->language->get('text_voucher');
		$data['text_affiliate'] = $this->language->get('text_affiliate');
		$data['text_special'] = $this->language->get('text_special');
		$data['text_account'] = $this->language->get('text_account');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_wishlist'] = $this->language->get('text_wishlist');
		$data['text_newsletter'] = $this->language->get('text_newsletter');

		$data['text_contactus'] = $this->language->get('text_contactus');
		$data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
		$data['text_shopping'] = $this->language->get('text_shopping');
		$data['text_login'] = $this->language->get('text_login');
		$data['text_partner_login'] = $this->language->get('text_partner_login');
		$data['text_logout'] = $this->language->get('text_logout');
		$data['text_register'] = $this->language->get('text_register');
		$data['text_terms'] = $this->language->get('text_terms');
		$data['text_aboutus'] = $this->language->get('text_aboutus');
		$data['menu_accessories'] = $this->language->get('menu_accessories');
		$data['menu_services'] = $this->language->get('menu_services');
		$data['menu_spareparts'] = $this->language->get('menu_spareparts');

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

		$data['styles'] = $this->document->getStyles();
		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', 'SSL');
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
		$data['affiliate'] = $this->url->link('affiliate/account', '', 'SSL');
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', 'SSL');
		$data['register'] = $this->url->link('account/register', '', 'SSL');
		$data['login'] = $this->url->link('account/login', '', 'SSL');
		$data['logout'] = $this->url->link('account/logout', '', 'SSL');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');
		$data['servis'] = $this->url->link('information/service_centres');
		$data['cart'] = $this->url->link('checkout/cart');

		// Blue line
		$data['revolution'] = $this->url->link('blueline/revolution');
		$data['flat'] = $this->url->link('blueline/flat');
		$data['mochilla'] = $this->url->link('blueline/mochilla');
		$data['camper'] = $this->url->link('blueline/camper');

		// Green line
		$data['compact'] = $this->url->link('greenline/compact');
		$data['dinamic'] = $this->url->link('greenline/dinamic');
		$data['inegralpower'] = $this->url->link('greenline/inegralpower');
		$data['split'] = $this->url->link('greenline/split');		
		$data['sun'] = $this->url->link('greenline/sun');		

		$data['accessories'] = $this->url->link('prislusenstvo');		
		$data['spareparts'] = $this->url->link('diely');		

		$data['logged'] = $this->customer->isLogged();

		$data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = 'http://' . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->whosonline($ip, $this->customer->getId(), $url, $referer);
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/footer.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/footer.tpl', $data);
		} else {
			return $this->load->view('default/template/common/footer.tpl', $data);
		}
	}
}