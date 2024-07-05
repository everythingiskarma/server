<?php
trait GetAddresses
{

	public function getAddresses()
	{

		# code...
		try {
			//code...
			$stmt = $this->connection->prepare("SELECT * FROM address WHERE uid = ?");
			$stmt->bind_param("s", $this->sessionUID);
			$stmt->execute();
			$result = $stmt->get_result();
			if (!$result) { // failed to get results
				// create error report

			}

			if ($result->num_rows > 0) {
				// uid entry not found in kyb table
				while ($row = $result->fetch_assoc()) {

					$this->add_id = $row["id"]; //
					$this->add_type = $row["type"]; //
					$this->add_priority = $row["priority"]; //
					$this->add_label = $row["label"]; //
					$this->add_address = $row["address"]; //
					$this->add_country = $row["country"]; //
					$this->add_state = $row["state"]; //
					$this->add_city = $row["city"]; //
					$this->add_zip = $row["zip"]; //


					$this->addresses[] = array(
						"id" => $this->add_id,
						"type" => $this->add_type,
						"priority" => $this->add_priority,
						"label" => $this->add_label,
						"address" => $this->add_address,
						"country" => $this->add_country,
						"state" => $this->add_state,
						"city" => $this->add_city,
						"zip" => $this->add_zip
					);
				}
			} else {
				// no rows fetched !
				$this->report[] = array(
					"api" => "Profile",
					"action" => "get-addresses > fetch rows",
					"message" => "<e><b class='icon-error'></b>No addresses found!</e>"
				);
			}

		} catch (\Throwable $th) {
			//throw $th;
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-addresses > get-address-fields > fetch-fields",
				"message" => "<e><b class='icon-error'></b>" . $th->getMessage() . "</e>"
			);
		}

		// create success report
		$this->report[] = array(
			"api" => "Profile",
			"action" => "get-addresses",
			"got-addresses" => true,
			"addresses" => $this->addresses
		);
	} // end method getAddresses();

} // end trait GetAddresses
