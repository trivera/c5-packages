<?php    
defined('C5_EXECUTE') or die(_("Access Denied.")); 
class DashboardRecaptchaController extends Controller {
	
	public function view() {
		Loader::model('recaptcha_config', 'recaptcha');
		$config = new RecaptchaConfig();
		
		$themes = array(
			'red' => 'Red (Default)',
			'white' => 'White',
			'blackglass' => 'Black Glass',
			'clean' => 'Clean'
		);
		
		$this->set('data', $config->getConfig());
		$this->set('themes', $themes);
	}
	
	public function save() {
		if ($_POST) {
			Loader::model('recaptcha_config', 'recaptcha');
			$config = new RecaptchaConfig();
			$config->save($_POST);	
		}
		
		$this->redirect('/dashboard/recaptcha');
	}
	
}