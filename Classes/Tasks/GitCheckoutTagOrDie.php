<?php

class Tasks_GitCheckoutTagOrDie extends Tasks_AbstractTask {
	function execute() {
		$ref           = $this->factory->payload['ref'];
		$commitMessage = $this->factory->payload['head_commit']['message'];
		if(!$this->checkTag($ref)) {
			throw new Exception('No Tag');
		}
		$extensionName = $this->extractExtName($this->factory->payload['repository']['name']);

		$ter = new Ter_Upload();
		$ter
			->setUsername($GLOBALS['config']['terAccount'])
			->setPassword($GLOBALS['config']['terPassword'])
			->setExtensionKey($extensionName)
			->setUploadComment($commitMessage)
			->setPath($this->factory->tempDir . 'gitRepository');
		$ter->execute();
	}
	function checkTag($ref) {
		$tagParts = explode('/', $ref);
		if($tagParts[1] === 'tags') {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function extractExtName($name) {
		return str_replace('TYPO3.', '', $name);
	}
}