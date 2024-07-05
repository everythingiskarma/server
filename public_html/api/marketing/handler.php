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
require_once "methods/get-advertising.php"; // provides trait GetAdvertising
require_once "methods/get-emails.php"; // provides trait GetEmails
require_once "methods/get-funnels.php"; // provides trait GetFunnels
require_once "methods/get-newsletters.php"; // provides trait GetNewsletters
require_once "methods/get-sms.php"; // provides trait GetSMS
require_once "methods/get-social.php"; // provides trait GetSocial

class Store extends Connect
{

	use Properties; // provides Profile class properties
	use GetAdvertising; // provides method getAdvertising
	use GetEmails; // provides method getEmails
	use GetFunnels; // provides method getFunnels
	use GetNewsletters; // provides method getNewsletters
	use GetSMS; // provides method getSMS
	use GetSocial; // provides method getSocial

	public function __construct()
	{
		parent::__construct(); // call the constructor of the parent class conDb;
		$this->store();

	} // end function __construct

	private function store() {
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
				case "get-marketing-advertising":
					$this->getAdvertising();
					break;
				case "get-marketing-emails":
					$this->getEmails();
					break;
				case "get-marketing-funnels":
					$this->getFunnels();
					break;
				case "get-marketing-newsletters":
					$this->getNewsletters();
					break;
				case "get-marketing-sms":
					$this->getSMS();
					break;
				case "get-marketing-social":
					$this->getSocial();
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

} // end class Profile

// instantiate the class Profile
$store = new Store();

// output report arrays as json
echo $store->getReport(); 

?>