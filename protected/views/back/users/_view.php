<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('email_address')); ?>:
	<?php echo GxHtml::encode($data->email_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('password')); ?>:
	<?php echo GxHtml::encode($data->password); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('first_name')); ?>:
	<?php echo GxHtml::encode($data->first_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_name')); ?>:
	<?php echo GxHtml::encode($data->last_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address')); ?>:
	<?php echo GxHtml::encode($data->address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('city')); ?>:
	<?php echo GxHtml::encode($data->city); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('state')); ?>:
	<?php echo GxHtml::encode($data->state); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('country')); ?>:
	<?php echo GxHtml::encode($data->country); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('zip')); ?>:
	<?php echo GxHtml::encode($data->zip); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone')); ?>:
	<?php echo GxHtml::encode($data->phone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fax')); ?>:
	<?php echo GxHtml::encode($data->fax); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mobile')); ?>:
	<?php echo GxHtml::encode($data->mobile); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mobilecarrier')); ?>:
	<?php echo GxHtml::encode($data->mobilecarrier); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dot')); ?>:
	<?php echo GxHtml::encode($data->dot); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_type')); ?>:
	<?php echo GxHtml::encode($data->user_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_login')); ?>:
	<?php echo GxHtml::encode($data->last_login); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated')); ?>:
	<?php echo GxHtml::encode($data->updated); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created')); ?>:
	<?php echo GxHtml::encode($data->created); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('activation_code')); ?>:
	<?php echo GxHtml::encode($data->activation_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('activation_status')); ?>:
	<?php echo GxHtml::encode($data->activation_status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gov_auth_number')); ?>:
	<?php echo GxHtml::encode($data->gov_auth_number); ?>
	<br />
	*/ ?>

</div>