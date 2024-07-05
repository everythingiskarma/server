<?php

trait GetDebits
{

	public function getDebits()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Wallet",
				"action" => "get-debits",
				"got-debits" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Wallet",
			"action" => "get-debits",
			"got-debits" => true,
			"debits" => $this->debits
		);

	} // end method getDebits

} // end trait GetDebits