<?php

trait UpdateKYB {

	public function updateKYB() {

		$this->biz_name = $_POST["biz_name"];
		$this->biz_url = $_POST["biz_url"];
		$this->biz_desc = $_POST["biz_desc"];
		$this->biz_type = $_POST["biz_type"];
		$this->biz_industry = $_POST["biz_industry"];
		$this->biz_category = $_POST["biz_category"];
		$this->biz_role = $_POST["biz_role"];
		$this->biz_income = $_POST["biz_income"];
		$this->biz_employees = $_POST["biz_employees"];
		$this->cert_type = $_POST["cert_type"];
		$this->cert_validity = $_POST["cert_validity"];

		try {
			//code...
			$stmt = $this->connection->prepare("UPDATE kyb SET `biz_name` = ?, `biz_url` = ?, `biz_type` = ?, `biz_desc` = ?, `biz_industry` = ?, `biz_category` = ?, `biz_role` = ?, `biz_income` = ?, `biz_employees` = ?, `cert_type` = ?, `cert_validity` = ? WHERE uid = ?");
			$stmt->bind_param("ssissssssiss", $this->biz_name, $this->biz_url, $this->biz_type, $this->biz_desc, $this->biz_industry, $this->biz_category, $this->biz_role, $this->biz_income, $this->biz_employees, $this->cert_type, $this->cert_validity, $this->sessionUID);
			$stmt->execute();
			$stmt->close();

		} catch (Exception $e) {

			$this->report[] = array(
				"api" => "Profile",
				"action" => "update-kyb",
				"kyb-updated" => false,
				"message" => "<e><b class='icon-error'></b>Unable to update KYB information. Please try again later! " . $e->getMessage() . "</e>"
			);

			return false;

		}

		$this->report[] = array(
			"api" => "Profile",
			"action" => "update-kyb",
			"kyb-updated" => true,
			"message" => "<s><b class='icon-done-all'></b>KYB information updated successfully!</s>"
		);

	} // end method updateKYB();

} // end trait UpdateKYB

?>