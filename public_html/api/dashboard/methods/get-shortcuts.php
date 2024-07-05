<?php

trait GetShortcuts {

	public function getShortcuts() {
		$this->report[] = array(
			'api' => 'Dashboard',
			'action' => 'get-shortcuts',
			'got-shortcuts' => true,
			'shortcuts' => 'this is the shortcuts area that can display custom shortcuts on this page!'
		);

		return;

	}
	
}