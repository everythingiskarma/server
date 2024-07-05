<?php

trait GetNewsletters
{

	public function getNewsletters()
	{
		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Marketing",
				"action" => "get-newsletters",
				"got-newsletters" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Marketing",
			"action" => "get-newsletters",
			"got-newsletters" => true,
			"newsletter-marketing" => $this->newsletters
		);

	} // end method getNewsletters

} // end trait GetNewsletters
