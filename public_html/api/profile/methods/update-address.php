<?php
trait UpdateAddress {

	public function updateAddress() {
		$msg = "";
		$this->add_action = $_POST["add_action"];
		switch ($this->add_action) {
			case "delete":
			case "priority":
				# code...
				$this->add_id = $_POST["id"];
				break;
			case "add":
			case "update":
				$this->add_id = $_POST["id"];
				$this->add_type = $_POST["type"];
				$this->add_label = $_POST["label"];
				$this->add_address = $_POST["address"];
				$this->add_city = $_POST["city"];
				$this->add_state = $_POST["state"];
				$this->add_country = $_POST["country"];
				$this->add_zip = $_POST["zip"];
			default:
				# code...
				break;
		}
		try {
			//code...
			switch ($this->add_action) {
				case "add":
					# create new address
					$sql = $this->connection->prepare("INSERT INTO address (`type`, `priority`, `label`, `address`, `city`, `state`, `country`, `zip`, `uid`) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$sql->bind_param("iisssssss", $this->add_type, $this->add_priority, $this->add_label, $this->add_address, $this->add_city, $this->add_state, $this->add_country, $this->add_zip, $this->sessionUID);
					$result = "address-added";
					$msg = "<s><b class='icon-done-all'></b>New address has been successfully created!</s>";
					break;
				case "delete":
					# delete existing address
					$sql = $this->connection->prepare("DELETE FROM address WHERE `id` = ? AND `uid` = ?");
					$sql->bind_param("is", $this->add_id, $this->sessionUID);
					$result = "address-deleted";
					$msg = "<s><b class='icon-done-all'></b>Address has been successfully deleted!</s>";
					break;
				case "update":
					# update existing address...
					$sql = $this->connection->prepare("UPDATE address SET `type` = ?, `label` = ?, `address` = ?, `city` = ?, `state` = ?, `country` = ?, `zip` = ? WHERE id = ? AND uid = ?");
					$sql->bind_param("issssssis", $this->add_type, $this->add_label, $this->add_address, $this->add_city, $this->add_state, $this->add_country, $this->add_zip, $this->add_id, $this->sessionUID);
					$result = "address-updated";
					$msg = "<s><b class='icon-done-all'></b>Address information has been successfully updated!</s>";
					break;
				case "priority":
					# set priority to address
					$p = "2";
					$sql = $this->connection->prepare("UPDATE address SET `priority` = ? WHERE uid = ?");
					$sql->bind_param("is", $p, $this->sessionUID);
					$sql->execute();
					$this->add_priority = "1";
					$sql = $this->connection->prepare("UPDATE address SET `priority` = ? WHERE id = ? AND uid = ?");
					$sql->bind_param("iis", $this->add_priority, $this->add_id, $this->sessionUID);
					$result = "address-prioritized";
					$msg = "<s><b class='icon-done-all'></b>Address priority has been successfully updated!</s>";
					break;
				default:
					break;
			}
	
			$sql->execute();
			$sql->close();

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "profile",
				"action" => "update-address",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>" . $th->getMessage() . "</e>"
			);

			return false;
		}

		$this->report[] = array(
			"api" => "Profile",
			"action" => "update-address",
			"response" => true,
			"message" => $msg,
			$result => true
		);


	} // end method updateAddress();

} // end trait UpdateAddress
?>