<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class RecaptchaPackage extends Package {
	protected $pkgHandle = 'recaptcha';
	protected $appVersionRequired = '5.4.0';
	protected $pkgVersion = '1.0.0';
	
	public function getPackageDescription() {
		return t('Use reCAPTCHA to fight spam instead of the native C5 CAPTCHA');
	}
	
	public function getPackageName() {
		return t('reCAPTCHA');
	}
	
	public function install() {
		$pkg = parent::install();		
		$this->load_required_models();
		$recaptchaPage = SinglePage::add('/dashboard/recaptcha/', $pkg);
		$recaptchaPage->update(array('cName'=>'reCAPTCHA', 'cDescription'=>'Manage reCAPTCHA settings'));
	}
	
	public function upgrade(){
		$this->load_required_models();
		return parent::upgrade();
	}
	
	public function uninstall() {
		parent::uninstall();
	}
	
	private function load_required_models() {
		Loader::model('single_page');
		Loader::model('collection');
		Loader::model('page');
		Loader::model('block');
		Loader::model('collection_types');
		Loader::model('/attribute/categories/collection');
		Loader::model('/attribute/types/select/controller');
  	}
}
?>