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
require_once "methods/get-store.php"; // provides trait GetStore
require_once "methods/get-orders.php"; // provides trait GetOrders
require_once "methods/get-returns.php"; // provides trait GetReturns
require_once "methods/get-products.php"; // provides trait GetProducts
require_once "methods/get-categories.php"; // provides trait GetCategories
require_once "methods/get-attributes.php"; // provides trait GetAttributes
require_once "methods/get-shipping.php"; // provides trait GetShipping
require_once "methods/get-payments.php"; // provides trait GetPayments
require_once "methods/get-reviews.php"; // provides trait GetReviews
require_once "methods/get-statistics.php"; // provides trait GetStatistics
require_once "methods/get-settings.php"; // provides trait GetSettings
require_once "methods/upload-file.php"; // provides trait UploadFile
require_once "methods/delete-image.php"; // provides trait DeleteImage
require_once "methods/update-category.php"; // provides trait UpdateCategory

class Store extends Connect
{

	use Properties; // provides Profile class properties
	use GetStore; // provides method getStore();
	use GetOrders; // provides method getOrders();
	use GetReturns; // provides method getReturns();
	use GetProducts; // provides method getProducts();
	use GetCategories; // provides method getCategories();
	use GetAttributes; // provides method getAttributes();
	use GetShipping; // provides method getShipping();
	use GetPayments; // provides method getPayments();
	use GetReviews; // provides method getReviews();
	use GetStatistics; // provides method getStatistics();
	use GetSettings; // provides method getSettings();
	use UploadFile; // provides method uploadFile();
	use DeleteImage; // provides method deleteImage();
	use UpdateCategory; // provides method updateCategory();

	public function __construct()
	{
		parent::__construct(); // call the constructor of the parent class conDb;
		$this->store();
	} // end function __construct

	private function store()
	{
		if (!isset($_SESSION["uid"])) {
			// user is not logged in return to login
			$this->report[] = array(
				"loggedOut" => true,
				"message" => "<e><b class='icon-error'></b>Login session has expired! Please login again to continue."
			);
			return false;
		}

		$this->sessionID = $_SESSION["id"]; // set id based on current session
		$this->sessionUID = $_SESSION["uid"]; // set uid based on current session

		if (isset($_POST["action"])) {
			$this->action = $_POST["action"];

			switch ($this->action) {
				case "get-store":
					$this->getStore();
					break;
				case "get-store-orders":
					$this->getOrders();
					break;
				case "get-store-returns":
					$this->getReturns();
					break;
				case "get-store-products":
					$this->getProducts();
					break;
				case "get-store-categories":
					$this->getCategories();
					break;
				case "get-store-attributes":
					$this->getAttributes();
					break;
				case "get-store-shipping":
					$this->getShipping();
					break;
				case "get-store-payments":
					$this->getPayments();
					break;
				case "get-store-reviews":
					$this->getReviews();
					break;
				case "get-store-statistics":
					$this->getStatistics();
					break;
				case "get-store-settings":
					$this->getSettings();
					break;
				case "upload-file":
					$this->uploadFile();
					break;
				case "update-category":
					$this->updateCategory();
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
} // end class Store

// instantiate the class Store
$store = new Store();

// output report arrays as json
echo $store->getReport();
