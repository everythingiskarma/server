<?php

trait GetSocial
{

	public function getSocial()
	{
		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Marketing",
				"action" => "get-social-broadcasting",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Marketing",
			"action" => "get-social-broadcasting",
			"got-social-broadcasting" => true,
			"social-broadcasting" => $this->social
		);

	} // end method getSocial

} // end trait GetSocial
