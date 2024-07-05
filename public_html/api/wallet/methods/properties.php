<?php

trait Properties {

	// Common properties
	protected $uid; // to store uid from database
	protected $sessionUID; // to store current session UID
	protected $incomingUID; // to store UID of incoming post request
	protected $domain; // to store domain from database
	protected $sessionDomain; // to store domain from session variable
	protected $incomingDomain; // to store domain of incoming post request
	protected $action; // to store action from incoming post request

	// wallet related properties
	protected $wallet = array(); // array to store wallet properties
	protected $balance = ""; // current wallet balance
	protected $currency = ""; // selected local currency
	protected $secret = ""; // wallet secret
	protected $status = ""; // wallet status
	
	// credits related properties
	protected $credits = array(); // array to store credits properties


	// debit related properties
	protected $debits = array(); // array to store debits properties


	// wallet settings related properties
	protected $settings = array(); // array to store wallet settings

}

?>