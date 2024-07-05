<?php

trait GetPayments
{

	public function getPayments()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Store",
				"action" => "get-payments",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "get-payments",
			"got-payments" => true,
			"store-payments" => $this->payments
		);
	} // end method getPayments

} // end trait GetPayments
