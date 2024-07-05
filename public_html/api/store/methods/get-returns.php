<?php

trait GetReturns
{

	public function getReturns()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Store",
				"action" => "get-returns",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "get-returns",
			"got-returns" => true,
			"store-returns" => $this->returns
		);
	} // end method getReturns

} // end trait GetReturns
