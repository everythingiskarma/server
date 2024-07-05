<ul class="actionbar">
	<li id="update-kyb" class="space icon-square-check" tabindex="0">Update
</ul>

<div class="g49 mb20">

	<ul id="cert-status" class="ig p20 status-list">
		<div class="title">Business KYB Status</div>
		<li status="1" class="ib itxt icon-user-check verified" info="Your business registration certificate document has been successfully verified.">
			verified
		</li>
		<li status="2" class="ib itxt icon-help unverified" info="You have not yet submitted your business registration certificate verification document.">
			unverified
		</li>
		<li status="3" class="ib itxt icon-error incomplete" info="Please upload a supporting document image for your business registration certificate.">
			incomplete
		</li>
		<li status="4" class="ib itxt icon-cycle pending" info="Your business registration certificate document is pending verification by our security team.">
			pending
		</li>
		<li status="5" class="ib itxt icon-blocked failed" info="The business registration certificate document uploaded by you has failed our verification process.">
			failed
		</li>
		<div id="cert-status-msg" class="pv20"></div>
	</ul>

	<div class="ig p20 si">
		<div class="title">Business Details</div>
		<div class="ii icon-office">
			<label>Business Name</label>
			<input id="biz-name" type="text" placeholder="Enter name of your business" tabindex="0" autofocus autocomplete="off">
		</div>
		<br>
		<div class="ii icon-office">
			<label>Company Website URL</label>
			<input id="biz-url" type="text" placeholder="Enter website url of your business" tabindex="0" autofocus autocomplete="off">
		</div>
		<br>
	</div>
</div>

<br>

<div class="ig p20 mv20">
	<div class="title">Business Registration Certificate</div>
	<div class="g49">
		<div>
			<div class="ii icon-grid1 mv20">
				<label>Business Registration Type</label>
				<div id="cert-type" class="space selector" type="" tabindex="0">
					Select Registration Type
				</div>
				<div id="cert-types" class="selection-box">
					<h1>Select Business Registration Type</h1>
					<ul class="selection">
						<li class="space" tabindex="0" type="1" text="Sole Proprietorship">Sole Proprietorship
						<li class="space" tabindex="0" type="2" text="Partnership">Partnership (Pvt. Ltd.)
						<li class="space" tabindex="0" type="3" text="Limited Liability Company">Limited Liability Company (LLC)
						<li class="space" tabindex="0" type="4" text="Corporation">Corporation (Corp)
						<li class="space" tabindex="0" type="5" text="Co-Operative">Co-Operative (Co-Op)
						<li class="space" tabindex="0" type="6" text="Non-Profit Organization">Non-Profit Organization</li>
					</ul>
				</div>
			</div>

			<div class="">
				Select a business registraton certificate type that can be verified by your local government authorities.
			</div>

			<div id="cert-image" class="upload" allowed="document" api="profile">
				<input type="file" class="file-upload">
			</div>
			<br>
			<div class="ii mv20 sub">
				<label>Business Registration Validity</label>
				<div class="ii m20 icon-calendar ">
					<label>month</label>
					<input id="cert-month" class="month" type="number" min="1" max="12" placeholder="01" tabindex="0" autofocus>
				</div>
				<div class="ii m20 icon-calendar ">
					<label>year</label>
					<input id="cert-year" class="year" type="number" min="2024" max="2124" placeholder="01" tabindex="0" autofocus>
				</div>
			</div>
		</div>

		<div class="certificate center tip">
			<h2>Registration Document</h2>
			<div class="pv20">
				<div class="doc none">
					<img src="iskarma.com/images/doc.png">
					<br>
					No documents uploaded yet.<br>
				</div>
				<div class="doc img">
					<img id="cert-image-img" class="preview" src="" width="auto" height="256">
				</div>
				<div class="doc pdf">
					<img class="pdfview" src="iskarma.com/images/pdf.png" width="auto" height="256">
					<iframe id="cert-image-pdf"></iframe>
				</div>
			</div>
			<tip>
				Upload an image of your <certtype></certtype> registration certificate. <br />
				Allowed file types are pdf, png, jpg and jpeg. Maximum allowed file size is 3MB.
			</tip>
		</div>
	</div>
</div>

<br>

<div class="ig p20">

	<div class="title">Business Profile</div>
	<div class="mb20">
		Completing your business profile will allow us to understand your business specific requirements and personalize tools and services for you.
	</div>
	<br>
	<div class="ii mv20">
		<label>Business Type</label>
		<ul id="biz-type" class="icon bs select">
			<li class="space" tabindex="0" type="1">
				Manufacturing
			<li class="space" tabindex="0" type="2">
				Retail
			<li class="space" tabindex="0" type="3">
				Services
			<li class="space" tabindex="0" type="4">
				eCommerce
			<li class="space" tabindex="0" type="5">
				Other
		</ul>
	</div>


	<div class="g49">

		<div class="si">
			<div class="ii icon-cubes tip">
				<label>Industry</label>
				<input id="biz-industry" type="text" placeholder="Enter name of your industry" tabindex="0" autofocus autocomplete="off">
				<tip>
					➤ Enter your industry name.<br>
					➤ Example: Agriculture, Textile, Energy, Construction, Healthcare, Fitness, etc...
				</tip>
			</div>


			<div class="ii icon-flow-tree tip">
				<label>Category</label>
				<input id="biz-category" type="text" placeholder="Enter category of your business" tabindex="0" autofocus autocomplete="off">
				<tip>
					➤ Enter one or more categories specific to your business within the industry.<br>
					➤ Example: Agricultural Products, Farming Equipments, etc...
				</tip>
			</div>


			<div class="ii icon-flow-tree">
				<label>Role</label>
				<input id="biz-role" type="text" placeholder="Enter your role in the company" tabindex="0" autofocus autocomplete="off">
			</div>


			<div class="ii icon-flow-tree">
				<label>Annual Income</label>
				<input id="biz-income" type="text" placeholder="Enter company's annual income" tabindex="0" autofocus autocomplete="off">
			</div>



			<div class="ii icon-flow-tree">
				<label>Employees</label>
				<input id="biz-employees" type="text" placeholder="Enter total number of employees" tabindex="0" autofocus autocomplete="off">
			</div>
		</div>
		<div class="si">
			<div class="ii sub mt20">
				<label>Business Description</label>
				<textarea id="biz-desc" placeholder="Enter a brief description about your business" tabindex="0" autocomplete="off" style="min-height: 355px; padding:10px; width:calc(100% - 20px)"></textarea>
			</div>
		</div>
	</div>

</div>