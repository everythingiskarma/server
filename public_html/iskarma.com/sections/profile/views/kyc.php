<ul class="actionbar"></ul>

<div class="g49">
	<ul id="id-status" class="ig p20 status-list">
		<div class="title">ID KYC STATUS</div>
		<li status="1" class="ib itxt icon-user-check verified" info="Your identity verification document has been successfully verified.">
			verified
		</li>
		<li status="2" class="ib itxt icon-help unverified" info="You have not yet submitted your identity verification document.">
			unverified
		</li>
		<li status="3" class="ib itxt icon-error incomplete" info="Please upload a supporting document image for your identity proof.">
			incomplete
		</li>
		<li status="4" class="ib itxt icon-cycle pending" info="Your document is pending verification by our security team.">
			pending
		</li>
		<li status="5" class="ib itxt icon-blocked failed" info="The identity verification document uploaded by you has failed our verification process.">
			failed
		</li>
		<div id="id-status-msg" class="pv20"></div>
	</ul>
	<ul id="ap-status" class="ig p20 status-list">
		<div class="title">ADDRESS KYC STATUS</div>
		<li status="1" class="ib itxt icon-user-check verified" info="Your address verification document has been successfully verified.">
			verified
		</li>
		<li status="2" class="ib itxt icon-help unverified" info="You have not yet submitted your address verification document.">
			unverified
		</li>
		<li status="3" class="ib itxt icon-error incomplete" info="Please upload a supporting document image for your address proof.">
			incomplete
		</li>
		<li status="4" class="ib itxt icon-cycle pending" info="Your document is pending verification by our security team.">
			pending
		</li>
		<li status="5" class="ib itxt icon-blocked failed" info="The address verification document uploaded by you has failed our verification process.">
			failed
		</li>
		<div id="ap-status-msg" class="pv20"></div>
	</ul>
</div>

<br>

<div class="identity g49 ig p20">
	<div>
		<div class="title">id verification</div>
		<div class="ii icon-fingerprint">
			<div class="space selector" id="identity" type="" tabindex="0">
				Select ID
			</div>
			<div id="id-type" class="selection-box">
				<h1>SELECT ID TYPE</h1>
				<ul class="selection">
					<li class="space" tabindex="0" type="1" text="Drivers License">
						<a>Drivers License <span class="icon-ecar"></span></a>

					<li class="space" tabindex="0" type="2" text="Passport">
						<a>Passport <span class="icon-book-flip"></span></a>

					<li class="space" tabindex="0" type="3" text="Citizenship Certificate">
						<a>Citizenship Certificate <span class="icon-user-check"></span></a>

					<li class="space" tabindex="0" type="4" text="PAN Card">
						<a>PAN Card <span class="icon-id"></span></a>

					<li class="space" tabindex="0" type="5" text="Voters ID">
						<a>Voters ID <span class="icon-touch"></span></a>

					<li class="space" tabindex="0" type="6" text="Aadhaar Card">
						<a>Aadhaar Card <span class="icon-fingerprint"></span></a>

				</ul>

			</div>

		</div>

		<div class="pv20">
			Select an official identity type that can be verified by your local government authorities.
		</div>

		<hr>

		<div id="id-image" class="upload" allowed="document" api="profile">
			<input type="file" class="file-upload">
		</div>

		<div class="pv20">
			Upload an image of your <idtype></idtype> ID. <br />
			Allowed file types are pdf, png, jpg and jpeg. Maximum allowed file size is 3MB.
		</div>

	</div>
	<div class="center">
		<h2>Identity Document</h2>
		<div class="pv20">
			<div class="doc none">
				<img src="iskarma.com/images/doc.png">
				<br>
				No documents uploaded yet.<br>
			</div>
			<div class="doc img">
				<img id="id-image-img" class="preview" src="" width="auto" height="256">
			</div>
			<div class="doc pdf">
				<img class="pdfview" src="iskarma.com/images/pdf.png" width="auto" height="256">
				<iframe id="id-image-pdf"></iframe>
			</div>
		</div>
	</div>
</div>

<br>

<div class="address-proof g48 ig p20">
	<div>
		<div class="title">address verification</div>
		<div class="ii icon-location">
			<div class="space selector" id="address-proof" type="" tabindex="0">
				Select Address Proof Type
			</div>
			<div id="ap-type" class="selection-box">
				<h1>SELECT ADDRESS PROOF TYPE</h1>
				<ul class="selection">
					<p>
						Utility Bills / Statements<br />
						- Should not be older than 3 months -
						<hr>
					</p>
					<li class="space" tabindex="0" type="1" text="Water Bill">
						<a>Water Bill <span class="icon-water"></span></a>

					<li class="space" tabindex="0" type="2" text="Electricity Bill">
						<a>Electricity Bill <span class="icon-bulb-o"></span></a>

					<li class="space" tabindex="0" type="3" text="Mobile / Telephone Bill">
						<a>Mobile / Telephone Bill <span class="icon-mobile"></span></a>

					<li class="space" tabindex="0" type="4" text="Bank Statement">
						<a>Bank Statement<span class="icon-bank"></span></a>

					<li class="space" tabindex="0" type="5" text="Credit Card Statement">
						<a>Credit Card Statement<span class="icon-credit-card"></span></a>
					</li>

					<p><br>Other
						<hr>
					</p>
					<li class="space" tabindex="0" type="6" text="Passport">
						<a>Passport<span class="icon-book-flip"></span></a>

					<li class="space" tabindex="0" type="7" text="Aadhaar Card">
						<a>Aadhaar Card<span class="icon-fingerprint"></span></a>
				</ul>
			</div>
		</div>
		<div class="pv20">
			Select an address proof type that can be verified by the associated organization or authority.
		</div>
		<hr>
		<div id="ap-image" class="upload" allowed="document" api="profile">
			<input type="file" class="file-upload">
		</div>
		<div class="pv20">
			Upload an image of your <aptype></aptype>. <br />
			Allowed file types are pdf, png, jpg and jpeg. Maximum allowed file size is 3MB.
		</div>
	</div>
	<div class="center">
		<h2>Address Proof Document</h2>
		<div class="pv20">
			<div class="doc none">
				<img src="iskarma.com/images/doc.png">
				<br>
				No documents uploaded yet.<br>
			</div>
			<div class="doc img">
				<img id="ap-image-img" class="preview" src="" width="auto" height="256">
			</div>
			<div class="doc pdf">
				<img class="pdfview" src="iskarma.com/images/pdf.png" width="auto" height="256">
				<iframe id="ap-image-pdf"></iframe>
			</div>
		</div>
	</div>
</div>

<br>

<div class="g48">
	<div class="ig p20">
		<div class="title">Why KYC?</div>
		Completing your KYC verification allows us to verify your identity and enable various services and tools we have developed for you.
	</div>
	<div class="ig p20">
		<div class="title">How?</div>
		➤ Select a document type for your identity & address.<br>
		➤ Upload an image or pdf of the same.<br>
		➤ Our security team will verify the documents and update the status.
	</div>
</div>