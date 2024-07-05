<div class="actionbar">
	<ul>
		<li id="update-profile" class="space icon-square-check" tabindex="0">Update
	</ul>
</div>

<div class="profile-top">
	<div id="avatar" class="image tip" allowed="image" api="profile">
		<input type="file" class="file-upload">
		<img id="avatar-img" src="iskarma.com/images/user.png" altsrc="iskarma.com/images/user.png" class="preview">
		<div class="ig">
			<ul class="bs alt">
				<li class="space change">Change
					<!--<li class="space edit">Edit-->
				<li class="space icon-trashcan icon delete">
			</ul>
		</div>
		<tip>
			➤ Upload an avatar to display as your profile picture across the site.<br />
			➤ Allowed file types are png, jpg, jpeg & gif. <br />
			➤ Maximum allowed filesize is 2mb.<br />
			➤ Recommended sizes (256 x 256) or (512 x 512) px.
		</tip>
	</div>
	<div class="right">
		<div>
			<div class="ii icon-user">
				<label>first name *</label>
				<input class="firstname" id="firstname" type="text" placeholder="Enter first name" tabindex="0" autofocus autocomplete="off">
			</div>
		</div>
		<div>
			<div class="ii icon-user">
				<label>last name *</label>
				<input class="lastname" id="lastname" type="text" placeholder="Enter last name" tabindex="0">
			</div>
		</div>
		<div>
			<div class="ii icon-location">
				<label>location *</label>
				<div class="space selector" id="country" countrycode="" countryname="" dialcode="" tabindex="0">Select Country ( Dial Code )</div>
				<div id="countries" class="selection-box">
					<div class="ii icon-search" style="margin:20px auto; width:300px">
						<input class="selection-filter" placeholder="Search Country Name" autofocus tabindex="0">
					</div>
					<ul class="selection"></ul>
				</div>
			</div>
		</div>
		<div>
			<div class="ii icon-phone">
				<label>mobile *</label>
				<div class="dialCode">+</div>
				<input class="mobile" id="mobile" type="text" placeholder="Enter phone number here" tabindex="0">
			</div>
		</div>
	</div>
</div>

<div class="ig p20">
	<div class="title">Address</div>

	<div class="icon bs select center ii m20">
		<label>Address Type</label>
		<ul id="address-type">
			<li class="space itxt icon-home" type="1" tabindex="0">Home
			<li class="space itxt icon-office" type="2" tabindex="0">Office
			<li class="space itxt icon-business-add" type="3" tabindex="0">Other
		</ul>
	</div>

	<div class="profile-mid mv20">

		<div class="ii icon-offer m20">
			<label>label</label>
			<input id="label" type="text" placeholder="Nickname for your address" tabindex="0" autofocus>
		</div>

		<div class="ii icon-location m20">
			<label>street address</label>
			<input id="address" type="text" placeholder="Enter your home / street address here" tabindex="0" autofocus>
		</div>

		<div class="ii icon-address-add m20">
			<label>city</label>
			<input id="city" type="text" placeholder="Enter your city here" tabindex="0">
		</div>

		<div class="ii icon-address-add m20">
			<label>state</label>
			<input id="state" type="text" placeholder="Enter your state here" tabindex="0">
		</div>

		<div class="ii icon-address-add m20">
			<label>country</label>
			<input id="add-country" type="text" placeholder="Enter your country here" tabindex="0">
		</div>

		<div class="ii icon-network m20">
			<label>zip code</label>
			<input id="zip" type="text" placeholder="Enter your area zip code here" tabindex="0">
		</div>
	</div>

</div>


<div class="profile-bottom">
	<div class="ig p20">
		<div class="title">Date Of Birth</div>
		<div class="dob pv20 center">
			<div class="ii icon-calendar">
				<label>month</label>
				<input class="month" id="month" type="number" min="01" max="12" placeholder="01" tabindex="0" autofocus>
			</div>
			<div class="ii icon-calendar">
				<label>day</label>
				<input class="day" id="day" type="number" min="01" max="31" placeholder="01" tabindex="0">
			</div>
			<div class="ii icon-calendar">
				<label>year</label>
				<input class="year" id="year" type="number" min="1924" max="2024" placeholder="1924" tabindex="0">
			</div>
		</div>
	</div>
	<div class="ig p20 center">
		<div class="title">gender</div>
		<ul class="icon bs select ii m20">
			<li class="space gender itxt icon-male" gender="1" tabindex="0">Male
			<li class="space gender itxt icon-female" gender="2" tabindex="0">Female
		</ul>
	</div>
</div>

<script>
	$(document).ready(function() {
		$.each(countries, function(index, country) {
			$("#countries ul").append(
				$('<li class="space" tabindex="0" cn="' + country.cn + '" dc="' + country.dc + '" cc="' + country.cc + '"> ' + country.cn + ' ( ' + country.dc + ' )</li>')
			);
		});
	});
</script>