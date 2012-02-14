<?php 
defined('C5_EXECUTE') or die("Access Denied.");

/* Overrides the default Captcha helper in order to use reCAPTCHA */

class SiteValidationCaptchaHelper extends ValidationCaptchaHelper {
	
	var $helperVersion = '1.0.0';

	public function __construct() {
		Loader::library('recaptcha', 'recaptcha');
	}

	public function display() {
		$config = $this->getConfig();
		
		// if this page is secure, make sure the capture uses SSL too
		$ssl = ($_SERVER['HTTPS'] == 'on');
		
		$publicKey = $config->getPublicKey();
		$theme = $config->getTheme();
		
		// Hide any existing captcha inputs that C5 may have displayed
		echo '<style>.ccm-input-captcha { display: none; }</style>';
		
		if ($publicKey != '') {
			// include the theme options
			echo '
			 <script type="text/javascript">
			 var RecaptchaOptions = {
			    theme : "'.$theme.'"
			 };
			 </script>
			';

			// finally spit out the HTML
			echo recaptcha_get_html($publicKey, null, $ssl);	
		}
		else {
			echo '<strong>You need to enter a reCAPTCHA public key! Visit Dashboard > reCAPTCHA Settings to enter one.</strong>';
		}
	}
	
	public function getConfig() {
		Loader::model('recaptcha_config', 'recaptcha');
		$config = new RecaptchaConfig();
		return $config;
	}

	public function showInput($args = false) {
		// Do nothing. Overriding this to hide the text inputs, reCAPTCHA includes its own
	}
	
	/* User can override the challenge and response variables if the POST is empty or whatever */
	public function check($challenge = false, $response = false) {
		$config = $this->getConfig();
		$privateKey = $config->getPrivateKey();
		
		$challenge = ($challenge === false) ? $_POST['recaptcha_challenge_field'] : $challenge;
		$response = ($response === false) ? $_POST['recaptcha_response_field'] : $response;
		
		$resp = recaptcha_check_answer($privateKey, $_SERVER['REMOTE_ADDR'], $challenge, $response);
		
		return $resp->is_valid;
	}
}

?>