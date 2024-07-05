<?php
trait GetKYB
{

	public function getKYB()
	{
		// fetch kyb information
		$stmt = $this->connection->prepare("SELECT * FROM kyb WHERE uid = ?");
		$stmt->bind_param("s", $this->sessionUID);
		$stmt->execute();
		$result = $stmt->get_result();
		if (!$result) { // failed to get result
			// create error report
			return false;
		}

		if (!$result->num_rows > 0) {
			// uid entry not found in kyb table
			return false;
		}

		$row = $result->fetch_assoc();
		if (!$row) { // failed to fetch row
			// create error report
			return false;
		}

		try {

			$this->biz_name = $row["biz_name"]; //
			$this->biz_url = $row["biz_url"]; //
			$this->biz_type = $row["biz_type"]; //
			$this->biz_industry = $row["biz_industry"]; //
			$this->biz_category = $row["biz_category"]; //

			$this->biz_desc = $row["biz_desc"]; //
			$this->biz_role = $row["biz_role"]; //
			$this->biz_income = $row["biz_income"]; //
			$this->biz_employees = $row["biz_employees"]; //

			$this->cert_type = $row["cert_type"]; //
			$this->cert_validity = $row["cert_validity"]; //
			$this->cert_image = $row["cert_image"]; //
			$this->cert_mime = $row["cert_mime"]; //
			$this->cert_status = $row["cert_status"]; // verification status
			$this->cert_status_msg = $row["cert_status_msg"]; // verification status message

		} catch (Exception $e) {
			// some fields were not fetched
			// create error report
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-kyb > get-kyb-fields > fetch-fields",
				"message" => "<e><b class='icon-error'></b>" . $e->getMessage() . "</e>"
			);
		}

		$this->kyb = array(
			"biz_name" => $this->biz_name,
			"biz_url" => $this->biz_url,
			"biz_type" => $this->biz_type,
			"biz_industry" => $this->biz_industry,
			"biz_category" => $this->biz_category,
			"biz_role" => $this->biz_role,
			"biz_income" => $this->biz_income,
			"biz_desc" => $this->biz_desc,
			"biz_employees" => $this->biz_employees,
			"cert_type" => $this->cert_type,
			"cert_validity" => $this->cert_validity,
			"cert_image" => $this->cert_image,
			"cert_mime" => $this->cert_mime,
			"cert_status" => $this->cert_status,
			"cert_status_msg" => $this->cert_status_msg
		);

		// create success report
		$this->report[] = array(
			"api" => "Profile",
			"action" => "get-kyb",
			"got-kyb" => true,
			"kyb" => $this->kyb
		);

	} // end method getKYB();

} // end trait GetKYB