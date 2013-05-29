<?php
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'init.php');
require_once('site.header.php');

$config = array(
	array(
		'id'    => 'first_name',
		'type'  => 'text',
		'label' => 'First Name'
	),
	array(
		'id'    => 'last_name',
		'type'  => 'text',
		'label' => 'Last Name'
	),
	array(
		'id'    => 'am_awesome',
		'type'  => 'checkbox',
		'label' => 'Are you awesome?'
	),
	array(
		'id'    => 'submit',
		'type'  => 'Submit',
		'label' => 'Save Form'
	)
);


$s = new Spruce($config);
$s->render();

require_once('site.footer.php');
