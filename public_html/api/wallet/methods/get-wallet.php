<?php
trait GetWallet
{

	public function getWallet()
	{
		try {

			//code...
			$stmt = $this->connection->prepare("SELECT * FROM `wallet_balance` WHERE `uid` = ?");
			$stmt->bind_param("s", $this->sessionUID);
			$stmt->execute();
			$result = $stmt->get_result();

			if(!$result) {
				// create error report
			}

			if(!$result->num_rows > 0) {
				// create error report
			}

			$row = $result->fetch_assoc();
			if(!$row) {
				// create error report
			}

			$this->balance = $row["balance"];
			$this->currency = $row["currency"];
			$this->status = $row["status"];
			$this->secret = $row["secret"];

		} catch (\Throwable $th) {

			//throw $th;
			$this->report[] = array(
				"api" => "Profile",
				"action" => "get-wallet > get-wallet-fields > fetch-fields",
				"message" => "<e><b class='icon-error'></b>" . $th->getMessage() . "</e>"
			);

		}

		$this->wallet = array(
			"balance" => $this->balance,
			"currency" => $this->currency,
			"status" => $this->status,
			"secret" => $this->secret
		);

		// create success report
		$this->report[] = array(
			"api" => "Wallet",
			"action" => "get-wallet",
			"got-wallet" => true,
			"wallet" => $this->wallet
		);

	} // end method getWallet();

} // end trait GetWallet