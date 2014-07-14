<?php

class Tasks_MailTask extends Tasks_AbstractTask{
	function execute() {
		mail('info@kay-strobach.de', 'Mein Betreff', json_encode($this->factory));
	}
}