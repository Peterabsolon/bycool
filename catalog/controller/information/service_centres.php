<?php 
class ControllerInformationServiceCentres extends Controller {
	public function index() {
		$data = array();

		$data += $this->language->load('information/service_centres');
		
		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/service_centres')
		);

		$this->load->model('catalog/service_centres');

		$results = $this->model_catalog_service_centres->getServiceCentres();

		$data['service_centres'] = array();

		foreach($results as $result) {
			$data['service_centres'][] = array(
				'id' => $result['service_centre_id'],
				'name' => $result['name'],
				'address' => $result['address'],
				'city' => $result['city'],
				'country_id' => $result['country_id'],
				'phone' => $result['phone'],
				'fax' => $result['fax'],
				'email' => $result['service_centre_email'],
				'opening_hours' => html_entity_decode($result['opening_hours']),
				'contact_person' => $result['contact_person'],
				'note' => $result['note']
			);
		}

		$language_id = $this->config->get('config_language_id');

		$results = $this->model_catalog_service_centres->getCountries($language_id);

		$data['countries'] = array();

		foreach($results as $result) {
			$data['countries'][] = array(
				'country_id' => $result['country_id'],
				'country_name' => $result['country_name']
			);
		}

		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/service_centres.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/service_centres.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/information/service_centres.tpl', $data));
		}
	}
}