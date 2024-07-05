<?php

trait GetReviews
{

	public function getReviews()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Store",
				"action" => "get-reviews",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to get reviews! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "get-reviews",
			"got-reviews" => true,
			"store-reviews" => $this->reviews
		);
	} // end method getReviews

} // end trait GetReviews
