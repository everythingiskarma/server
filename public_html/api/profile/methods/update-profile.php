<?php 

trait UpdateProfile {

	public function updateProfile() {

		$this->firstname = $_POST["firstname"];
		$this->lastname = $_POST["lastname"];
		$this->cc = $_POST["cc"];
		$this->cn = $_POST["cn"];
		$this->dc = $_POST["dc"];
		$this->mobile = $_POST["mobile"];
		$this->gender = $_POST["gender"];
		$this->dob = $_POST["dob"];
		$this->add_type = $_POST["type"];
		$this->add_label = $_POST["label"];
		$this->add_address = $_POST["address"];
		$this->add_country = $_POST["country"];
		$this->add_state = $_POST["state"];
		$this->add_city = $_POST["city"];
		$this->add_zip = $_POST["zip"];

		try {
			$stmt = $this->connection->prepare("UPDATE user SET firstname = ?,lastname = ?,cc = ?, cn = ?,dc = ?,mobile = ?,gender = ?,dob = ? WHERE uid = ?");
			if (!$stmt) { // failed to prepare statement
				// create error report
			}
			
			$stmt->bind_param('ssssssiss', $this->firstname, $this->lastname, $this->cc, $this->cn, $this->dc, $this->mobile, $this->gender, $this->dob, $this->sessionUID);
			if (!$stmt) { // failed to bind parameters
				// create error report
			}

			$stmt->execute();
			if (!$stmt) { // failed to execute statement
				// create error report
			}

			$p = 1;
			// prepare statement
			$stmt = $this->connection->prepare("UPDATE 
		address SET `type` = ?, `label` = ?, `address` = ?, `country` = ?, `state` = ?, `city` = ?, `zip` = ? 
		WHERE `uid` = ? AND `priority` = ?");

			if (!$stmt) { // failed to prepare statement
				// create error report
			}

			$stmt->bind_param('isssssssi', $this->add_type, $this->add_label, $this->add_address, $this->add_country, $this->add_state, $this->add_city, $this->add_zip, $this->sessionUID, $p);
			if (!$stmt) { // failed to bind param
				// create error report
			}

			$stmt->execute();
			if (!$stmt) { // failed to execute statement
				// create error report
			}

		} catch (Exception $e) {
			// create error report
			$this->report[] = array(
				'api' => 'Profile',
				'action' => 'update-profile',
				'result' => false,
				'message' => '<e><b class="icon-error"></b>' . $e->getMessage() . '</e>'
			);
			return false;
		}

		$this->report[] = array(
			'api' => 'Profile',
			'action' => 'update-profile',
			'profile-updated' => true,
			'message' => '<s><b class="icon-done-all"></b>Your profile has been successfully updated!</s>'
		);
	}
}
?>
