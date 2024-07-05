<?php
// Set custom name for the session cookie
session_name('everythingIsKarma');
// start session before processing the post request (via ajax or php form)
session_start();
// report all errors in case the script fails to execute at some point
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/////////////////////////////////////////////////////////////////////////////////////////
// initiate a database connection
require_once "../../api-helpers/connect.php";
// declare class properties used across the api
require_once "methods/properties.php"; // provides trait Properties
require_once "methods/get-wallet.php"; // provides trait GetWallet
require_once "methods/get-credits.php"; // provides trait GetCredits
require_once "methods/get-debits.php"; // provides trait GetDebits
require_once "methods/get-settings.php"; // provides trait GetSettings

class Wallet extends Connect
{

	use Properties; // provides class properties
	use GetWallet; // provides class getWallet();
	use GetCredits; // provides class getCredits();
	use GetDebits; // provides class getDebits();
	use GetSettings; // provides class getSettings();

	public function __construct()
	{
		parent::__construct(); // call the constructor of the parent class conDb;
		$this->wallet();
	} // end function __construct

	private function wallet()
	{
		if (!isset($_SESSION['uid'])) {
			// user is not logged in return to login
			$this->report[] = array(
				'loggedOut' => true
			);
			return false;
		}

		$this->sessionUID = $_SESSION['uid']; // set uid based on current session
		$this->sessionDomain = $_SESSION['domain']; // set uid based on current session
		if (isset($_POST['action'])) {
			$this->action = $_POST['action'];

			switch ($this->action) {
				case 'get-wallet':
					$this->getWallet();
					# code...
					break;

				case 'get-wallet-credits':
					$this->getCredits();
					# code...
					break;

				case 'get-wallet-debits':
					$this->getDebits();
					# code...
					break;

				case 'get-wallet-settings':
					$this->getSettings();
					# code...
					break;

				default:
					# code...
					break;
			}
		}
	}

	// method to access success array
	public function getReport()
	{
		return json_encode($this->report);
	}
} // end class Dashboard

// instantiate the class Profile
$wallet = new Wallet();

// output report arrays as json
echo $wallet->getReport();
