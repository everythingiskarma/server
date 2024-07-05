<?php

trait UpdateCategory {

	public function updateCategory() {
		$action = $_POST["add_action"];
		switch ($action) {
			case "add":
				$name = $_POST["name"];
				$parent = $_POST["parent"];
				$keywords = $_POST["keywords"];
				$description = $_POST["description"];
				$status = $_POST["status"];
				# code...
				break;

			default:
				# code...
				break;
		}

		try {
			//code...
			switch($action) {
				case "add":
					$sql = $this->connection->prepare("INSERT INTO `categories` (`uid`, `store_id`, `name`, `parent`, `keywords`, `description`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)");
					$sql->bind_param("sisissi", $this->sessionUID, $_SESSION["id"], $name, $parent, $keywords, $description, $status);
					$result = "category-updated";
					$msg = "<s><b class='icon-done-all'></b>New category " . $name . " has been successfully created!</s>";
					# code...
					break;
			}
			$sql->execute();
			$sql->close();

		} catch (\Throwable $th) {
			//throw $th;
			$this->report[] = array(
				"api" => "Store",
				"action" => "update-category",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>" . $th->getMessage() . "</e>"
			);

			return false;
		}

		$this->report[] = array(
			"api" => "Store",
			"action" => "update-category",
			"response" => true,
			"message" => $msg,
			$result => true
		);
	}
}

?>