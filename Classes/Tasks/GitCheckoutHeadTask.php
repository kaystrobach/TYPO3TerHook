<?php

class Tasks_GitCheckoutHeadTask extends Tasks_AbstractTask {
	function execute() {
		$uri = str_replace('https://', 'git://', $this->factory->payload['repository']['url']) . '.git';
		$this->command = 'git clone ' . $uri . ' ' . $this->factory->tempDir . 'gitRepository';
		$buffer = exec($this->command, $this->output);
		if(is_dir($this->factory->tempDir . 'gitRepository')) {
			chdir($this->factory->tempDir . 'gitRepository');
			exec('git checkout remotes/origin/master');
		} else {
			throw new Exception("Can't checkout master into " . $this->tempDir . "\n" . $buffer);
			
		}
		
	}
}