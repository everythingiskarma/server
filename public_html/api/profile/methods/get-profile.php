<?php

trait GetProfile
{
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	// METHOD getProfile(); // method to get full profile with all fields from all tables
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getProfile()
	{
		// if all fields are filled, continue to load full dashboard		
		$this->onBoard = true;
		$this->getProfilefields();
		// check onboarding step 3 if all requried fields are filled
		if (empty($this->add_type) || empty($this->add_label) || empty($this->add_address) || empty($this->add_country) || empty($this->add_state) || empty($this->add_city) || empty($this->add_zip)) {
			// atleast one of the required fields is empty in onboarding step 3
			$this->onBoardingStep = "step3"; // tells jquery to load step3 of onboarding
			$this->onBoard = false; // indicates onboarding is pending
			$msg = "Final step! Please fill in your address to launch your account dashboard."; // adds msg to api report
		} // end if step 3
		// check onboarding step 2 if all required fields are filled
		if (empty($this->gender) || empty($this->dob)) {
			// atleast one of the required fields is empty in onboarding step 2
			$this->onBoardingStep = "step2"; // tells jquery to load step 2 of onboarding
			$this->onBoard = false; // indicates onboarding is pending
			$msg = "Almost done! One more step to go after this! "; // adds msg to api report
		} // end if step 2
		// Check onboarding step 1 if all required fields are filled
		if (empty($this->firstname) || empty($this->lastname) || empty($this->cc) || empty($this->cn) || empty($this->dc) || empty($this->mobile)) {
			// atleast one of the required fields is empty in onboarding step 1
			$this->onBoardingStep = "step1"; // tell jquery to load step 1 of onboarding
			$this->onBoard = false; // indicates onboarding is pending
			$msg = "Lets get you onboarded! Enter the required information while we prepare your account dashboard!"; // adds msg to api report
		} // end if step 1
		if ($this->onBoard === false) {
			// onboarding is not complete
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > onboarding",
				"message" => "<in><b class='icon-info'></b>" . $msg . "</in>",
				"onBoarding" => true, // tells jquery to load onboarding
				"step" => $this->onBoardingStep, // tells jquery which step of onboarding to show
				"profile" => $this->profileFields // sends an array containing all profile fields as key:value pairs
			);
			return;
		} else {
			// onboarding completed show full dashboard
			// create success report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile",
				"got-profile" => true, // tells jquery to load full profile
				"profile" => $this->profileFields // sends an array containing all profile fields as key:value pairs
			);
			return;
		}
	} // end method getProfile();

	////////////////////////////////////////////////////////////////////////////////////////////////////////
	// METHOD getProfileFields(); // method to get an array of all profile fields from all tables
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getProfileFields() {
		//--------------------------------------## ---------------- ##---------------------------------------//
		//--------------------------------------## USER TABLE FIELDS ##---------------------------------------//
		//--------------------------------------## ---------------- ##---------------------------------------//
		// check user table in database for onboarding details
		$stmt = $this->connection->prepare("SELECT * FROM user WHERE `uid` = ?");
		if (!$stmt) { // failed to prepare statement
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields > prepare-statement",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to prepare statement</e>"
			);
			return false;
		}
		// bind parameters
		$stmt->bind_param("s", $this->sessionUID);
		if (!$stmt) { // failed to bind parameters
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields > bind-parameters",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to bind parameters</e>"
			);
			return false;
		}
		// execute query
		$stmt->execute();
		if (!$stmt) { // failed to execute query
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields > execute-query",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to execute query</e>"
			);
			return false;
		}
		$result = $stmt->get_result();
		if (!$result) { // failed to get result
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields > get-query-results",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to get query result</e>"
			);
			return false;
		}
		if (!$result->num_rows > 0) { // failed to find row in user table
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields > find-row-in-user-table",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to find row in user table</e>"
			);
			return false;
		}
		$row = $result->fetch_assoc();
		if (!$row) { // failed to fetch row
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields > fetch-row-from-results",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to fetch row from result</e>"
			);
			return false;
		}
		
		try {

			// Retrieve user information
			$this->avatar = $row["avatar"]; // get avatar
			$this->avatar_mime = $row["avatar_mime"]; // get avatar
			$this->firstname = $row["firstname"]; // get firstname
			$this->lastname = $row["lastname"]; // get lastname
			$this->cc = $row["cc"]; // get country code
			$this->cn = $row["cn"]; // get country name
			$this->dc = $row["dc"]; // get dial code
			$this->mobile = $row["mobile"]; // get mobile number
			$this->gender = $row["gender"]; // get gender
			$this->dob = $row["dob"]; // get date of birth

		} catch (Exception $e) {
			// some fields were not fetched
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"response" => "get-profile > get-profile-fields > fetch-fields",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>" . $e->getMessage() . "</e>"
			);
		}

		// Close result set and statement
		$result->close();
		$stmt->close();


		//---------------------------------## -------------------- ##----------------------------------//
		//---------------------------------## ADDRESS TABLE FIELDS ##----------------------------------//
		//---------------------------------## -------------------- ##----------------------------------//

		$p = "1"; // only check for priority address entry for the user
		$stmt = $this->connection->prepare("SELECT * FROM `address` WHERE `uid` = ? AND `priority` = ?");
		if (!$stmt) { // failed to prepare query
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields-address > prepare-statement",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to prepare statement</e>"
			);
			return false;
		}

		$stmt->bind_param("si", $this->sessionUID, $p);
		if (!$stmt) { // failed to bind params
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields-address > bind-parameters",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to bind parameters</e>"
			);
			return false;
		}

		$stmt->execute();
		if (!$stmt) { // failed to execute statement
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields-address > execute-statement",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to execute query statement</e>"
			);
			return false;
		}

		$result = $stmt->get_result();
		if (!$result) { // failed to get results
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields-address > get-query-results",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to get query results</e>"
			);
			return false;
		}

		if (!$result->num_rows > 0) {
			// uid entry not found in address table
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields-address > get-num-rows",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to get any rows in query result</e>"
			);
			return false;
		}

		$row = $result->fetch_assoc();
		if (!$row) { // failed to fetch row
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields-address > fetch-row",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to fetch row from results</e>"
			);
			return false;
		} 

		try {
			// found a priority address, continue to fetch address details
			$this->add_type = $row["type"]; // address type home/office/other
			$this->add_label = $row["label"]; // nickname to identify individual addresses
			$this->add_address = $row["address"]; // full street address
			$this->add_country = $row["country"]; // country of the address
			$this->add_state = $row["state"]; // state of the address
			$this->add_city = $row["city"]; // city of the address
			$this->add_zip = $row["zip"]; // zip code of the address

		} catch (Exception $e) {
			// some fields were not fetched
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-profile > get-profile-fields-address > fetch-fields",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>" . $e->getMessage() . "</e>"
			);
		}		
		// create an array of variables containing all fields from all databases
		$this->profileFields = array(
			"avatar" => $this->avatar,
			"avatar_mime" => $this->avatar_mime,
			"firstname" => $this->firstname,
			"lastname" => $this->lastname,
			"cc" => $this->cc,
			"cn" => $this->cn,
			"dc" => $this->dc,
			"mobile" => $this->mobile,
			"gender" => $this->gender,
			"dob" => $this->dob,
			"type" => $this->add_type,
			"label" => $this->add_label,
			"address" => $this->add_address,
			"country" => $this->add_country,
			"state" => $this->add_state,
			"city" => $this->add_city,
			"zip" => $this->add_zip
		);
			
	} // end method getProfileFields();

	////////////////////////////////////////////////////////////////////////////////////////////////////////
	// METHOD onBoardStep1(); // method to store user information from onboarding step1
	////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function onBoardStep1() {

		$this->firstname = $_POST["firstname"];
		$this->lastname = $_POST["lastname"];
		$this->cc = $_POST["cc"];
		$this->cn = $_POST["cn"];
		$this->dc = $_POST["dc"];
		$this->mobile = $_POST["mobile"];

		// collect post variables and store them in kyc table
		// prepare statement
		$stmt = $this->connection->prepare("UPDATE user SET `firstname` = ?, `lastname` = ?, `cc` = ?, `cn` = ?, `dc` = ?, `mobile` = ? WHERE `uid` = ?");
		if(!$stmt) { // failed to prepare statement
			// create error report
		}
		$stmt->bind_param('sssssss', $this->firstname, $this->lastname, $this->cc, $this->cn, $this->dc, $this->mobile, $this->sessionUID);
		if(!$stmt) { // failed to bind parameters
			// create error report
		}
		$stmt->execute();
		if(!$stmt) { // failed to execute statement
			// create error report
		}
		// successfully updated kyc table, run method getFullDashboard(); to initiate step 2
		$this->getProfile();
	}

	public function onBoardStep2() {

		$this->gender = $_POST["gender"];
		$this->dob = $_POST["dob"];

		// prepare statement
		$stmt = $this->connection->prepare("UPDATE user SET `gender` = ?, `dob` = ? WHERE `uid` = ?");
		if(!$stmt) { // failed to prepare statement
			// create error report
		}
		$stmt->bind_param("iss", $this->gender, $this->dob, $this->sessionUID);
		if(!$stmt) { // failed to bind parameters
			// create error report
		}
		$stmt->execute();
		if(!$stmt) { // failed to execute statement
			// create error report
		}
		// successfully inserted values into kyc table, run getFullDashboard(); to initiate step 3
		$this->getProfile();
	}

	public function onBoardStep3() {

		$p = 1;
		$this->add_type = $_POST["type"];
		$this->add_label = $_POST["label"];
		$this->add_address = $_POST["address"];
		$this->add_country = $_POST["country"];
		$this->add_state = $_POST["state"];
		$this->add_city = $_POST["city"];
		$this->add_zip = $_POST["zip"];

		// prepare statement
		$stmt = $this->connection->prepare("UPDATE 
		address SET `type` = ?, `label` = ?, `address` = ?, `country` = ?, `state` = ?, `city` = ?, `zip` = ? 
		WHERE `uid` = ? AND `priority` = ?");

		if(!$stmt) { // failed to prepare statement
			// create error report
		}
		$stmt->bind_param('isssssssi', $this->add_type, $this->add_label, $this->add_address, $this->add_country, $this->add_state, $this->add_city, $this->add_zip, $this->sessionUID, $p);
		if(!$stmt) { // failed to bind param
			// create error report
		}
		$stmt->execute();
		if(!$stmt) { // failed to execute statement
			// create error report
		}
		// successfully updated address, run getFullDashboard(); to initiate dashboard
		$this->getProfile();

	}

} // end trait GetProfile