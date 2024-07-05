<?php
// Set custom name for the session cookie
session_name("everythingIsKarma");
// start session before processing the post request (via ajax or php form)
session_start();
// report all errors in case the script fails to execute at some point
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
/////////////////////////////////////////////////////////////////////////////////////////
// initiate a database connection
require_once "../../api-helpers/connect.php";
// declare class properties used across the api
require_once "methods/properties.php"; // provides trait Properties
require_once "methods/get-pages.php"; // provides trait GetPages
require_once "methods/get-categories.php"; // provides trait GetCategories
require_once "methods/get-menus.php"; // provides trait GetMenus

class Content extends Connect
{

	use Properties; // provides Profile class properties
	use GetPages; // provides trait GetPages
	use GetCategories; // provides trait GetCategories
	use GetMenus; // provides trait GetMenus

	public function __construct()
	{
		parent::__construct(); // call the constructor of the parent class conDb;
		$this->content();

	} // end function __construct

	private function content()
	{
		if (!isset($_SESSION["uid"])) {
			// user is not logged in return to login
			$this->report[] = array(
				"loggedOut" => true,
				"message" => "<e><b class='icon-error'></b>Login session has expired! Please login again to continue."
			);
			return false;
		}

		$this->sessionUID = $_SESSION["uid"]; // set uid based on current session


		if (isset($_POST["action"])) {
			$this->action = $_POST["action"];

			switch ($this->action) {
				case "get-content-pages":
					// execute method getPages and create success/error report based on the result
					$this->getPages();
					break;
				case "get-content-categories":
					// execute method getCategories and create success/error report based on the result
					$this->getCategories();
					break;
				case "get-content-menus":
					// execute method getMenus and create success/error report based on the result
					$this->getMenus();
					break;
				default:
					// code
					break;
			}
		}
	}

	// method to access success array
	public function getReport()
	{
		return json_encode($this->report);
	}
} // end class Content

// instantiate the class Content
$content = new Content();

// output report arrays as json
echo $content->getReport();
