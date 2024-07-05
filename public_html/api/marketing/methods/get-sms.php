<?php

trait GetSMS
{

	public function getSMS()
	{
		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Marketing",
				"action" => "get-sms",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Marketing",
			"action" => "get-sms",
			"got-sms" => true,
			"sms-marketing" => $this->sms
		);

	} // end method getSMS

} // end trait GetSMS
