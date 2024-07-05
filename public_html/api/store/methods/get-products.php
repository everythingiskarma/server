<?php

trait GetProducts
{

	public function getProducts()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Store",
				"action" => "get-products",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "get-products",
			"got-products" => true,
			"store-products" => $this->products
		);
	} // end method getProducts

} // end trait GetProducts
