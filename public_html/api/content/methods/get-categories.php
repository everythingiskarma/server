<?php

trait GetCategories
{

	public function getCategories()
	{

		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "content > get-categories",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Profile",
			"action" => "get-categories",
			"got-categories" => true,
			"content-categories" => $this->categories
		);

	} // end method getCategories

} // end trait GetCategories

?>