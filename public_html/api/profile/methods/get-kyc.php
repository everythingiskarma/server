<?php
trait GetKYC {
	public function getKYC() {
		// fetch kyc information
		$stmt = $this->connection->prepare("SELECT * FROM kyc WHERE uid = ?");
		$stmt->bind_param('s', $this->sessionUID);
		$stmt->execute();
		$result = $stmt->get_result();
		if(!$result) { // failed to get results
			// create error report
			return false;
		}

		if(!$result->num_rows > 0) {
			// uid entry not found in kyc table
			// create error report
			return false;
		}

		$row = $result->fetch_assoc();
		if(!$row) { // failed to fetch row
			// create error report
			return false;
		}

		try {
			$this->id_type = $row['id_type']; // get kyc ID type
			$this->id_image = $row['id_image']; // get kyc ID image
			$this->id_mime = $row['id_mime']; // get kyc ID image mime
			$this->id_status = $row['id_status']; // verification status
			$this->id_status_msg = $row['id_status_msg']; // verification status message
			$this->ap_type = $row['ap_type']; // get id address proof
			$this->ap_image = $row['ap_image']; // get id address proof image
			$this->ap_mime = $row['ap_mime']; // get address proof image mime
			$this->ap_status = $row['ap_status']; // verification status
			$this->ap_status_msg = $row['ap_status_msg']; // verification status message
		} catch(Exception $e) {
			// some fields were not fetched
			// create error report
			$this->report[] = array(
				'api' => 'Profile',
				'action' => 'get-kyc-personal > get-kyc-personal-fields > fetch-fields',
				'message' => '<e><b class="icon-error"></b>' . $e->getMessage() . '</e>'
			);
		}

		$this->kyc = array(
			'id_type' => $this->id_type,
			'id_image' => $this->id_image,
			'id_mime' => $this->id_mime,
			'id_status' => $this->id_status,
			'id_status_msg' => $this->id_status_msg,
			'ap_type' => $this->ap_type,
			'ap_image' => $this->ap_image,
			'ap_mime' => $this->ap_mime,
			'ap_status' => $this->ap_status,
			'ap_status_msg' => $this->ap_status_msg
		);

		// create success report
		$this->report[] = array(
			'api' => 'Profile',
			'action' => 'get-kyc',
			'got-kyc' => true,
			'kyc' => $this->kyc
		);
	} // end method getKYC
} // end trait GetKYC
?>