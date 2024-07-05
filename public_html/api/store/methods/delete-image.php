<?php

trait DeleteImage {

	public function deleteImage() {

		$this->file_name = $_POST["name"];
		$x = NULL;
		try {
			switch ($this->file_name) {
				case "avatar":
					$table = "user";
					$name = "avatar";
					$mime = "avatar_mime";
					# code...
					break;
				
				default:
					# code...
					break;
			}

			$stmt = $this->connection->prepare("UPDATE $table SET $name = ?, $mime = ? WHERE uid = ?");
			$stmt->bind_param('sss', $x, $x, $this->sessionUID);
			$stmt->execute();
			$stmt->close();

		} catch (Exception $e) {
			// create error report
			$this->report[] = array(
				"api" => "profile",
				"action" => "delete-image",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Failed to delete Image</e>"				
			);

		}

		$this->report[] = array(
			"api" => "profile",
			"action" => "delete-image",
			"image-deleted" => true,
			"message" => "<s><b class='icon-done-all'></b>Image deleted successfully!</e>"
		);

	} // end method deleteImage();

} // end trait DeleteImage

?>
