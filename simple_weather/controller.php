<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class SimpleWeatherPackage extends Package {
	protected $pkgHandle = 'simple_weather';
	protected $appVersionRequired = '5.4.1';
	protected $pkgVersion = '1.0.0';
	
	public function getPackageDescription() {
		return t("Installs a custom weather block that displays the forecast for a given ZIP code.");
	}
	
	public function getPackageName() {
		return t("Simple Weather");
	}
	
	public function install() {
		Loader::model('block');
		$pkg = parent::install();
		BlockType::installBlockTypeFromPackage('weather', $pkg);
	}
	
	public function upgrade(){
		return parent::upgrade();
	}
	
	public function uninstall() {
		parent::uninstall();
	}
}
?>