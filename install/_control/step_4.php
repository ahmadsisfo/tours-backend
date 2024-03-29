<?php
class CStep4 extends Controller {
	public function index() {
		$this->document->setTitle($this->bahasa->get('heading_step_4'));

		$data['heading_step_4'] = $this->bahasa->get('heading_step_4');
		$data['heading_step_4_small'] = $this->bahasa->get('heading_step_4_small');

		$data['text_license'] = $this->bahasa->get('text_license');
		$data['text_installation'] = $this->bahasa->get('text_installation');
		$data['text_configuration'] = $this->bahasa->get('text_configuration');
		$data['text_finished'] = $this->bahasa->get('text_finished');
		$data['text_congratulation'] = $this->bahasa->get('text_congratulation');
		$data['text_forget'] = $this->bahasa->get('text_forget');
		$data['text_shop'] = $this->bahasa->get('text_shop');
		$data['text_login'] = $this->bahasa->get('text_login');

		$data['text_loading'] = $this->bahasa->get('text_loading');
		$data['text_store'] = $this->bahasa->get('text_store');
		$data['text_mail_list'] = $this->bahasa->get('text_mail_list');
		$data['text_mail_list_small'] = $this->bahasa->get('text_mail_list_small');
		$data['text_openbay'] = $this->bahasa->get('text_openbay');
		$data['text_maxmind'] = $this->bahasa->get('text_maxmind');
		$data['text_more_info'] = $this->bahasa->get('text_more_info');
		$data['text_facebook'] = $this->bahasa->get('text_facebook');
		$data['text_facebook_info'] = $this->bahasa->get('text_facebook_info');
		$data['text_facebook_link'] = $this->bahasa->get('text_facebook_link');
		$data['text_forum'] = $this->bahasa->get('text_forum');
		$data['text_forum_info'] = $this->bahasa->get('text_forum_info');
		$data['text_forum_link'] = $this->bahasa->get('text_forum_link');
		$data['text_commercial'] = $this->bahasa->get('text_commercial');
		$data['text_commercial_info'] = $this->bahasa->get('text_commercial_info');
		$data['text_commercial_link'] = $this->bahasa->get('text_commercial_link');
		$data['text_view'] = $this->bahasa->get('text_view');
		$data['text_download'] = $this->bahasa->get('text_download');
		$data['text_downloads'] = $this->bahasa->get('text_downloads');
		$data['text_price'] = $this->bahasa->get('text_price');
		$data['text_view'] = $this->bahasa->get('text_view');

		$data['button_join'] = $this->bahasa->get('button_join');
		$data['button_setup'] = $this->bahasa->get('button_setup');

		$data['link_maxmind'] = $this->url->link('maxmind');
		$data['link_openbay'] = $this->url->link('openbay');
		
		$url_admin = $this->request->server['HTTPS']? HTTPS_RNF:  HTTP_RNF;
		
		$data['url_admin'] = $url_admin.'?way=admin/login';
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$languages = array();

		if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $language_parse);

			if (count($language_parse[1])) {
				$languages = array_combine($language_parse[1], $language_parse[4]);

				foreach ($languages as $lang => $val) {
					if ($val === '') {
						$languages[$lang] = 1;
					}
				}

				arsort($languages, SORT_NUMERIC);
			}
		}

		if (!empty($languages)) {
			reset($languages);
			$data['language'] = key($languages);
		} else {
			$data['language'] = '';
		}

		$data['footer'] = $this->load->control('footer');
		$data['header'] = $this->load->control('header');

		$this->response->setOutput($this->load->view('step_4.tpl', $data));
	}

	public function extensions() {
		$defaults = array(
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_URL => 'http://www.opencart.com/index.php?route=extension/json/extensions',
			CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1",
			CURLOPT_FRESH_CONNECT => 1,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_FORBID_REUSE => 1,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_POSTFIELDS => array(),
		);

		$ch = curl_init();
		curl_setopt_array($ch, ($defaults));
		$result = curl_exec($ch);
		curl_close($ch);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput($result);
	}

	public function language() {
		$language = $this->request->post['language'];

		$defaults = array(
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_URL => 'http://www.opencart.com/index.php?route=extension/json/languages',
			CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1",
			CURLOPT_FRESH_CONNECT => 1,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_FORBID_REUSE => 1,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_POSTFIELDS => array('language' => $language),
		);

		$ch = curl_init();
		curl_setopt_array($ch, ($defaults));
		$result = curl_exec($ch);
		curl_close($ch);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput($result);
	}
}