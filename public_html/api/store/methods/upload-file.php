<?php

trait UploadFile
{

	public function uploadFile()
	{
		$this->file_mime = $_POST["mime"];
		$this->file_data = $_POST["data"];
		$this->file_name = $_POST["name"];

		try {
			// code...

			switch ($this->file_name) {
				case "cat-image":
					# code to upload category image...
					$stmt = $this->connection->prepare("UPDATE user SET avatar = ?, avatar_mime = ? WHERE uid = ?");
					$stmt->bind_param("sss", $this->file_data, $this->file_mime, $this->sessionUID);
					break;
				case "product-image":					
					$status = "4";
					$stmt = $this->connection->prepare("UPDATE kyc SET id_image = ?, id_mime = ?, id_status = ? WHERE uid = ?");
					$stmt->bind_param("ssis", $this->file_data, $this->file_mime, $status, $this->sessionUID);
					break;
				case "ap-image":
					$status = "4";
					$stmt = $this->connection->prepare("UPDATE kyc SET ap_image = ?, ap_mime = ?, ap_status = ? WHERE uid = ?");
					$stmt->bind_param("ssis", $this->file_data, $this->file_mime, $status, $this->sessionUID);
					break;
				case "cert-image":
					$status = "4"; // sets status to pending
					$stmt = $this->connection->prepare("UPDATE kyb SET cert_image = ?, cert_mime = ?, cert_status = ? WHERE uid = ?");
					$stmt->bind_param("ssis", $this->file_data, $this->file_mime, $status, $this->sessionUID);
					break;
				default:
					# code...
					break;
			}

			$stmt->execute();
			$stmt->close();

		} catch (Exception $e) {
			// create error report...
			$this->report[] = array(
				"api" => "Store",
				"action" => "upload-file",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>" . $e->getMessage() . "</e>"
			);

		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "upload-file",
			"file-uploaded" => true,
			"message" => "<s><b class='icon-image'></b>File uploaded successfully!</s>"
		);
	} // end method uploadFile();

} // end trait UploadFile
