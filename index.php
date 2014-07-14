<?php

ini_set('display_errors', 1);
include('config.php');

try {
	include('Classes/Autoloader.php');
	
	$gitPayload = $_POST['payload'];
	
	$TaskFactory = new TaskFactory(
		$_POST['payload'],
		array(
			'Tasks_GitCheckoutHeadTask',
			'Tasks_GitCheckoutTagOrDie',
			'Tasks_DebugTask',
			'Tasks_MailTask',
		)
	);
	$TaskFactory->executeTasks();
} catch(Exception $e) {
	print_r($e);
}
echo '1';