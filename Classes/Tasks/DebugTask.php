<?php

class Tasks_DebugTask extends Tasks_AbstractTask{
	function execute() {
		header('Content-Type: text/plain');
		print_r($this->factory);
	}
}