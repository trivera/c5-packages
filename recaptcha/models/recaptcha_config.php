<?php 
defined('C5_EXECUTE') or die("Access Denied.");

/* TODO: Make these keys package-specific */

class RecaptchaConfig {
	
	protected $publicKeyName = 'recaptcha_public_key';
	protected $privateKeyName = 'recaptcha_private_key';
	protected $themeKeyName = 'recaptcha_theme';
	
	public function save($data) {
		$publicKey = $data['public_key'];
		$privateKey = $data['private_key'];
		$theme = $data['theme'];
		
		$this->configSave($this->publicKeyName, $publicKey);
		$this->configSave($this->privateKeyName, $privateKey);
		$this->configSave($this->themeKeyName, $theme);
	}
	
	public function getPublicKey() {
		return $this->configGet($this->publicKeyName);
	}
	
	public function getPrivateKey() {
		return $this->configGet($this->privateKeyName);
	}
	
	public function getTheme() {
		return $this->configGet($this->themeKeyName);
	}
	
	public function getConfig() {
		$data = array(
			'public_key' => $this->configGet($this->publicKeyName),
			'private_key' => $this->configGet($this->privateKeyName),
			'theme' => $this->configGet($this->themeKeyName)
		);
		
		return $data;
	}
	
	private function configSave($key, $value) {
		$co = $this->getConfigObject();
		$co->save($key, $value);
	}
	
	private function configGet($key) {
		$co = $this->getConfigObject();
		return $co->get($key);
	}
	
	private function getConfigObject() {
		$co = new Config();
		$pkg = Package::getByHandle('recaptcha');
		$co->setPackageObject($pkg);
		return $co;
	}
	
}