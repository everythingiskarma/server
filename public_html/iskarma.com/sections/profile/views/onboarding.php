<center>
	<a class="icon-iskarma" href="#welcome" location="iskarma.com/content/articles" title="Welcome to isKarma Inc">
		<span class="path1"></span>
		<span class="path2"></span>
		<span class="path3"></span>
		<span class="path4"></span>
	</a>
	<br><br>
	<p><big>Welcome Aboard!</big><br>Let's get to know you a little better..</p>
</center>

<ul class="tab-wizard" id="onboarding">
	<li class="tab step1">

		<div class="ii icon-user m20">
			<label>first name *</label>
			<input class="firstname" id="firstname" type="text" placeholder="Enter first name" tabindex="0" autofocus autocomplete="off">
		</div>
		<x></x>
		<div class="ii icon-user m20">
			<label>last name *</label>
			<input class="lastname" id="lastname" type="text" placeholder="Enter last name" tabindex="0">
		</div>
		<x></x>

		<div class="ii m20 icon-location">
			<label>location *</label>
			<div class="space selector" id="country" countrycode="" countryname="" dialcode="" tabindex="0">Select Country ( Dial Code )</div>
			<div id="countries" class="selection-box">
				<div class="ii icon-search m20">
					<input class="selection-filter" placeholder="Search Country Name" autofocus tabindex="0">
				</div>
				<ul class="selection"></ul>
			</div>
		</div>
		<x></x>
		<div class="ii icon-phone m20">
			<label>mobile *</label>
			<div class="dialCode">+</div>
			<input id="mobile" class="mobile" type="text" placeholder="Enter phone number here" tabindex="0">
		</div>
		<hr />
		<div id="step1" class="space ib m20 icon-right" tabindex="0">
			Continue
		</div>

	</li>
	<li class="tab step2" style="max-width:500px; margin:0 auto">
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
		<div class="ig p20">
			<div class="title">gender</div>
			<ul class="icon bs select center pv20">
				<li class="space gender itxt icon-male" gender="1" tabindex="0">Male
				<li class="space gender itxt icon-female" gender="2" tabindex="0">Female
			</ul>
		</div>

		<x class="m20"></x>
		<hr>
		
		<div id="step2" class="ib icon-right space m20" tabindex="0">Continue</div>

		<div class="ib icon-left space step-back m20" tabindex="0">Back</div>


	</li>

	<li class="tab step3">

		<div class="ii mv20">
			<label>Address Type</label>
			<ul class="icon bs select center">
				<li class="space type itxt icon-home" type="1" tabindex="0">Home
				<li class="space type itxt icon-office" type="2" tabindex="0">Office
				<li class="space type itxt icon-business-add" type="3" tabindex="0">Other
			</ul>
		</div>

		<x></x>

		<div class="ii icon-offer mv20">
			<label>label</label>
			<input id="label" type="text" placeholder="Nickname for your address" tabindex="0" autofocus>
		</div>

		<x></x>

		<div class="ii mv20 sub">
			<label>street address</label>
			<textarea id="address" type="text" placeholder="Enter your home / street address here" tabindex="0" autofocus rows="3" style="width: 320px;"></textarea>
		</div>

		<x></x>

		<div class="ii icon-address-add mv20">
			<label>city</label>
			<input id="city" type="text" placeholder="Enter your city here" tabindex="0">
		</div>

		<x></x>

		<div class="ii icon-address-add mv20">
			<label>state</label>
			<input id="state" type="text" placeholder="Enter your state here" tabindex="0">
		</div>

		<x></x>

		<div class="ii icon-address-add mv20">
			<label>country</label>
			<input id="add-country" type="text" placeholder="Enter your country here" tabindex="0">
		</div>

		<x></x>

		<div class="ii icon-network mv20">
			<label>zip code</label>
			<input id="zip" type="text" placeholder="Enter your area zip code here" tabindex="0">
		</div>

		<hr />

		<div id="step3" class="ib space icon-done-all m20" tabindex="0">Finish</div>
		
		<div class="ib space step-back icon-left m20" tabindex="0">Back</div>


	</li>
</ul>

<script>
	$(document).ready(function() {
		$.each(countries, function(index, country) {
			$("#countries ul").append(
				$('<li class="space" tabindex="0" cn="' + country.cn + '" dc="' + country.dc + '" cc="' + country.cc + '"> ' + country.cn + ' ( ' + country.dc + ' )</li>')
			);
		});
	});
</script>