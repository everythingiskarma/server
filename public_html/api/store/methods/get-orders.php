<?php

trait GetOrders
{

	public function getOrders()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Store",
				"action" => "get-orders",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "get-orders",
			"got-orders" => true,
			"store-orders" => $this->orders
		);
	} // end method getOrders

} // end trait GetOrders
