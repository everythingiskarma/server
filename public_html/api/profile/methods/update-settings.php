<?php
trait UpdateSettings {

	public function updateSettings() {
		$msg = "";
		$this->set_action = $_POST["set_action"];
		switch ($this->set_action) {
			case "set-lang":
				$field = "language";
				$value = $_POST["language"];
				# code...
				break;
			case "set-tz":
				$field = "timezone";
				$value = $_POST["timezone"];
				# code...
				break;
			case "set-mode":
				$field = "mode";
				# code...
				break;
			case "set-newsletters":
				$field = "newsletters";
				# code...
				break;
			case "set-notifications":
				$field = "notifications";
				# code...
				break;
			case "set-recovery":
				$field = "recovery";
				$value = $_POST["recovery"];
				# code...
				break;
			case "set-two-factor":
				$field = "two_factor";
				# code...
				break;
			case "set-terms":
				$field = "terms";
				# code...
				break;
			case "set-privacy":
				$field = "privacy";
				# code...
				break;
			case "set-multisite":
				$field = "multisite";
				# code...
				break;
			default:
				# code...
				break;
		}

		try {
			switch ($field) {
				case 'language':
				case 'timezone':
				case 'recovery':
					# code...
					$sql = $this->connection->prepare("UPDATE `settings` SET $field = ? WHERE `uid` = ?");
					$sql->bind_param("ss", $value, $this->sessionUID);
					break;
				case 'mode':
				case 'newsletters':
				case 'notifications':
				case 'two_factor':
				case 'terms':
				case 'privacy':
				case 'multisite':
					$one = "1";
					$two = "2";
					$sql = $this->connection->prepare("UPDATE `settings` SET $field = CASE WHEN $field = ? THEN ? ELSE ? END WHERE `uid` = ?");
					$sql->bind_param("iiis", $one, $two, $one, $this->sessionUID);
					# code...
					break;

				default:
					# code...
					break;
			}

			$sql->execute();
			$sql->close();

		} catch (Exception $e) {
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "update settings",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update setting! " . $e->getMessage() . "</e>"
			);
			return false;
		}

		// create success report
		$msg = "<s><b class='icon-done-all'>" . $field . " setting has been updated successfully!</b></s>";
		$this->report[] = array(
			"api" => "Profile",
			"action" => "update settings",
			"result" => true,
			"message" => $msg
		);


	} // end method updateSettings();

} // end method UpdateSettings
?>