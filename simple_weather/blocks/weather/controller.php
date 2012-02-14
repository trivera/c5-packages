<?php
	class WeatherBlockController extends BlockController {
		
		var $pobj;
		
		protected $btDescription = 'Displays the current weather for a ZIP Code.';
		protected $btName = 'Weather';
		protected $btTable = 'btWeather';
		protected $btInterfaceWidth = '350';
		protected $btInterfaceHeight = '300';
		
		public function on_start() {
			$this->set('weatherUrl', $this->getToolsUrl('ajax_weather').'?zip='.$this->zip);
		}
		
		public function getToolsUrl($tool) {
			// $tool is a string that references a .php file in the block's tools directory
			$uh = Loader::helper('concrete/urls');
			$b = $this->getBlockObject();
			if (is_object($b)) {
				$btID = $b->getBlockTypeID();
				$bt = BlockType::getByID($btID);
				$url = $uh->getBlockTypeToolsURL($bt)."/".$tool;
				return $url;	
			}
		}
	}
	
?>