<?php

trait UpdateKYC {

	public function updateKYC() {

		$this->doc_name = $_POST["doc_name"]; // selected doc name
		$this->doc_type = $_POST["doc_type"]; // selected doc type

		$reset = null;

		switch ($this->doc_name) {

			case "id-type":
				$this->doc_name = "id_type";
				$doc_status = "id_status";
				$doc_image = "id_image";
				$doc_mime = "id_mime";				
				break;
			case "ap-type":
				$this->doc_name = "ap_type";
				$doc_status = "ap_status";
				$doc_image = "ap_image";
				$doc_mime = "ap_mime";
				break;
			default:
				break;
		}

		try {

			$stmt = $this->connection->prepare("UPDATE kyc SET $this->doc_name = ?, $doc_status = ?, $doc_image = ?, $doc_mime = ? WHERE uid = ?");
			$status = "3";
			$stmt->bind_param('iisss', $this->doc_type, $status, $reset, $reset, $this->sessionUID);
			$stmt->execute();
			$stmt->close();

		} catch (Exception $e) {

			$this->report[] = array(
				'api' => 'Profile',
				'action' => 'update-kyc',
				'response' => false,
				'message' => '<e><b class="icon-error"></b>Unable to update KYC information. Please try again later! ' . $e->getMessage().'</e>'
			);

			return false;

		}

		$this->report[] = array(
			'api' => 'Profile',
			'action' => 'update-kyc',
			'response' => true,
			'message' => '<s><b class="icon-done-all"></b>KYC information updated successfully!</s>'
		);

	} // end method updateKYC();

} // end trait UpdateKYC
?>