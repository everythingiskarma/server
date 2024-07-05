<?php

trait GetMenus
{

	public function getMenus()
	{
		try {
			//code...

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "content > get-menus",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to get menus! " . $th->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$this->report[] = array(
			"api" => "Profile",
			"action" => "get-menus",
			"got-menus" => true,
			"content-menus" => $this->menus
		);

	} // end method getMenus

} // end trait GetMenus

?>