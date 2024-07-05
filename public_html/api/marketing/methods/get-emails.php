<?php

trait GetEmails
{

	public function getEmails()
	{
		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Marketing",
				"action" => "get-emails",
				"got-emails" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Marketing",
			"action" => "get-emails",
			"got-emails" => true,
			"email-marketing" => $this->emails
		);

	} // end method getEmails

} // end trait GetEmails
