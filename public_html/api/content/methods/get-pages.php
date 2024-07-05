<?php

trait GetPages
{

	public function getPages()
	{
		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "content > get-pages",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Profile",
			"action" => "get-pages",
			"got-pages" => true,
			"content-pages" => $this->pages
		);

	} // end method getPages

} // end trait GetPages

?>