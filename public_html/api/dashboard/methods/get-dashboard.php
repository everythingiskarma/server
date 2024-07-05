<?php

trait GetDashboard
{
	public function getDashboard()
	{
		// keep adding overview elements as you build them..
		// start with hello world!
		$this->report[] = array(
			'api' => 'Dashboard',
			'action' => 'get-dashboard',
			'got-dashboard' => true,
			'dashboard' => 'this is the dashboard stuff that can be displayed on this page!'
		);

		return;

	} // end method getDashboard();

} // end trait GetDashboard

?>