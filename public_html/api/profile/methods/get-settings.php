<?php
trait GetSettings {

	public function getSettings() {

		$stmt = $this->connection->prepare("SELECT * FROM settings WHERE uid = ?");
		$stmt->bind_param("s", $this->sessionUID);
		$stmt->execute();
		$result = $stmt->get_result();
		if (!$result) { // failed to get results
			// create error report
			return false;
		}

		if (!$result->num_rows > 0) {
			// uid entry not found in settings table
			// create error report
			return false;
		}

		$row = $result->fetch_assoc();
		if (!$row) { // failed to fetch row
			// create error report
			return false;
		}

		try {

			$this->language = $row["language"]; // get kyc ID type
			$this->mode = $row["mode"]; // get kyc ID image
			$this->timezone = $row["timezone"]; // get kyc ID image mime
			$this->newsletters = $row["newsletters"]; // verification status
			$this->notifications = $row["notifications"]; // verification status message
			$this->recovery = $row["recovery"]; // get id address proof
			$this->two_factor = $row["two_factor"]; // get id address proof image
			$this->two_factor_key = $row["two_factor_key"]; // get address proof image mime
			$this->terms = $row["terms"]; // verification status
			$this->privacy = $row["privacy"]; // verification status message
			$this->multisite = $row["multisite"]; // verification status message

		} catch (Exception $e) {
			// some fields were not fetched
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-settings > get-settings-fields > fetch-fields",
				"message" => "<e><b class='icon-error'></b>" . $e->getMessage() . "</e>"
			);
		}

		$this->settings = array(
			"language" => $this->language,
			"mode" => $this->mode,
			"timezone" => $this->timezone,
			"newsletters" => $this->newsletters,
			"notifications" => $this->notifications,
			"recovery" => $this->recovery,
			"two_factor" => $this->two_factor,
			"two_factor_key" => $this->two_factor_key,
			"terms" => $this->terms,
			"privacy" => $this->privacy,
			"multisite" => $this->multisite
		);

		// create success report
		$this->report[] = array(
			"api" => "Profile",
			"action" => "get-settings",
			"got-settings" => true,
			"settings" => $this->settings
		);


	} // end method getSettings();

} // end trait GetSettings
?>