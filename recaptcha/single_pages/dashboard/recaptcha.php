<?php $form = Loader::helper('form') ?>
<style type="text/css" media="screen">
	span.label { display: block; font-weight: bold; }
	div.field input[type=text] { width: 250px; }
	div.field {margin: 5px 0; }
	div.controls { margin: 10px 0; }
	h2 { margin-top: 10px; }
	#recaptcha-settings { width: 100%; }
	div.ccm-dashboard-inner { padding: 10px 20px; }
</style>
<div id="recaptcha-settings">
	<h1><span>reCAPTCHA Settings</span></h1>
	<div class="ccm-dashboard-inner">
		<form action="<?php echo $this->action('save') ?>" method="POST">
			<h2>API Keys</h2>
			<p>Get your reCAPTCHA API keys at <a href="https://www.google.com/recaptcha">https://www.google.com/recaptcha</a></p>
			<div class="field">
				<span class="label">Public Key</span>
				<?php echo $form->text('public_key', $data['public_key']) ?>
			</div>
			<div class="field">
				<span class="label">Private Key</span>
				<?php echo $form->text('private_key', $data['private_key']) ?>
			</div>
			<h2>Theme Options</h2>
			<div class="field">
				<?php echo $form->select('theme', $themes, $data['theme']) ?>
			</div>
			<div class="field controls">
				<?php echo $form->submit('submit', 'Save Settings') ?>
			</div>
		</form>
	</div>
</div>