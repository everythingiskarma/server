<?php

trait GetCategories
{

	public function getCategories()
	{

		try {
			//code...
			$stmt = $this->connection->prepare("SELECT * FROM `categories` WHERE `uid` = ?");
			$stmt->bind_param("s", $this->sessionUID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {
					// get category information
					// create a new categories array object
					$this->categories[] = array(
						"id" => $row["id"],
						"parent" => $row["parent"],
						"name" => $row["name"],
						"image" => $row["image"],
						"status" => $row["status"],
						"keywords" => $row["keywords"],
						"description" => $row["description"]
					);
				}

			} else {
				// no rows fetched !
				$this->report[] = array(
					"api" => "Store",
					"action" => "get-categories > fetch rows",
					"result" => false,
					"message" => "<e><b class='icon-error'></b>No categories found!</e>"
				);
			}

		} catch (\Throwable $th) {
			// create error report
			$this->report[] = array(
				"api" => "Store",
				"action" => "get-categories",
				"result" => false,
				"message" => "<e><b class='icon-error'></b>Unable to get categories! " . $th->getMessage() . "</e>"
			);

			return false;

		}

		// create success report
		$this->report[] = array(
			"api" => "Store",
			"action" => "get-categories",
			"got-categories" => true,
			"store-categories" => $this->categories
		);

	} // end method getCategories

} // end trait GetCategories