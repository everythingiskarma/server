<?php

trait GetFunnels
{

	public function getFunnels()
	{
		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Marketing",
				"action" => "get-funnels",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Marketing",
			"action" => "get-funnels",
			"got-funnels" => true,
			"sales-funnels" => $this->funnels
		);

	} // end method getFunnels

} // end trait GetFunnels
