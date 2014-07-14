<?php

class Tasks_AbstractTask {
	function __construct($factory) {
		$this->factory = $factory;
	}
	function shouldBeExecuted() {
		return TRUE;
	}
	function execute() {
	
	}
}