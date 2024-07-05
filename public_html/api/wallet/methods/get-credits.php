<?php

trait GetCredits
{

	public function getCredits()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Wallet",
				"action" => "get-credits",
				"got-credits" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Wallet",
			"action" => "get-credits",
			"got-credits" => true,
			"credits" => $this->credits
		);
	} // end method getCredits

} // end trait GetCredits
