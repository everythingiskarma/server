<?php

trait GetSettings
{

	public function getSettings()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Store",
				"action" => "get-settings",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "get-settings",
			"got-settings" => true,
			"store-settings" => $this->settings
		);
	} // end method getSettings

} // end trait GetSettings