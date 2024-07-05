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
require_once "methods/get-profile.php"; // provides trait GetProfile
require_once "methods/update-profile.php"; // provides trait UpdateProfile
require_once "methods/get-kyc.php"; // provides trait GetKYC
require_once "methods/get-kyb.php"; // provides trait GetKYB
require_once "methods/get-addresses.php"; // provides trait GetAddresses
require_once "methods/get-settings.php"; // provides trait GetSettings
require_once "methods/update-kyc.php"; // provides trait UpdateKYC
require_once "methods/update-kyb.php"; // provides trait UpdateKYC
require_once "methods/update-address.php"; // provides trait UpdateAddress
require_once "methods/update-settings.php"; // provides trait UpdateSettings
require_once "methods/upload-file.php"; // provides trait UploadFile
require_once "methods/delete-image.php"; // provides trait DeleteImage

class Profile extends Connect
{
	use Properties; // provides Profile class properties
	use GetProfile; // provides method getProfile();
	use UpdateProfile; // provides method updateProfile();
	use GetKYC; // provides method getKYC();
	use GetKYB; // provides method getKYC();
	use GetAddresses; // provides method getAddresses();
	use GetSettings; // provides method getSettings();
	use UpdateKYC; // provides method updateKYC();
	use UpdateKYB; // provides method updateKYB();
	use UpdateAddress; // provides method updateAddress();
	use UpdateSettings; // provides method updateSettings();
	use UploadFile; // provides method uploadFile();
	use DeleteImage; // provides method deleteImage();

	public function __construct()
	{
		parent::__construct(); // call the constructor of the parent class conDb;
		$this->profile();
		/*
		if (isset($_SESSION['loggedIn'])) {
			$this->report[] = array(
				'action' => 'session-variables',
				'login' => $_SESSION['loggedIn'],
				'uid' => base64_encode($_SESSION['uid']),
				'domain' => base64_encode($_SESSION['domain'])
			);
		}
		*/
	} // end function __construct

	private function profile()
	{
		if(!isset($_SESSION["uid"])) {
			// user is not logged in return to login
			 $this->report[] = array(
				"loggedOut" => true,
				"message" => "<e><b class='icon-error'></b>Login session has expired! Please login again to continue."
			 );
			 return false;
		}
		$this->sessionUID = $_SESSION["uid"]; // set uid based on current session
		$this->sessionDomain = $_SESSION["domain"]; // set uid based on current session
		$this->onBoardingStep = "step1"; // set default to step for onboarding wizard
		$this->onBoard = false; // set default onboarding status

		if (isset($_POST["action"])) {
			$this->action = $_POST["action"];

			switch ($this->action) {
				case "get-profile":
					// execute method getProfile and create success/error report based on the result
					$this->getProfile();
					break;
				case "delete-image":
					$this->deleteImage();
					break;
				case "upload-file":
					$this->uploadFile();
					break;
				case "update-profile":
					// execute method updateProfile and create success/error report based on the result
					$this->updateProfile();
					break;
				case "get-profile-kyc":					
					$this->getKYC(); // execute method getKYC
					break;
				case "update-kyc":
					// execute method updateKYCPersonal() and create success/error report
					$this->updateKYC();
					break;
				case "get-profile-kyb":					
					$this->getKYB(); // execute method getKYB();
					break;
				case "update-kyb":
					$this->updateKYB();
					// execute method $this->updateKYB();
					break;
				case "get-profile-addresses":
					$this->getAddresses();
					break;
				case "update-address":
					// execute method updateAddress
					$this->updateAddress();
					break;
				case "get-profile-settings":
					$this->getSettings();
					break;
				case "update-settings":
					$this->updateSettings();
					break;
				case "step1":
					// save step1 post data and go to step 2
					$this->onBoardStep1();
					break;
				case "step2":
					// save step2 post data and go to step 3
					$this->onBoardStep2();
					break;
				case "step3":
					// save step3 post data and go to dashboard
					$this->onBoardStep3();
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
$profile = new Profile();

// output report arrays as json
echo $profile->getReport();