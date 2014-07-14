<?php

class TaskFactory {
	public $payload = array();
	public $tasks   = array();
	public $taskObj = array();
	public $tempDir = '';
	
	function __construct($payload, $tasks = array()) {
		$this->payload = json_decode($payload, TRUE);
		$this->tasks   = $tasks;
		$this->tempDir = dirname(dirname(__FILE__)) . '/temp/' . md5($payload) . '/';
		@mkdir($this->tempDir);
	}
	function executeTasks() {
		foreach($this->tasks as $taskName) {
			$task = new $taskName($this);
			if($task->shouldBeExecuted()) {
				$task->execute();
				chdir(dirname(dirname(__FILE__)));
			}
			$this->taskObj[] = $task;
		}
	}
}