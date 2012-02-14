<?php $form = Loader::helper('form'); ?>
<div>
	<label for="zip">Zip Code</label>
</div>
<?php echo $form->text('zip', $zip); ?>