// click handler for onboarding continue button
$(document).on("click", "#step1", function () {
	// validate inputs
	var firstname = btoa($("#firstname").val());
	var lastname = btoa($("#lastname").val());
	var cc = btoa($("#country").attr("countrycode"));
	var cn = btoa($("#country").attr("countryname"));
	var dc = btoa($("#country").attr("dialcode"));
	var mobile = btoa($("#mobile").val());
	if (firstname.length === 0) {
		report("e", "First name cannot be empty");
		$("#firstname").focus();
		return;
	}
	if (lastname.length === 0) {
		report("e", "Last name cannot be empty");
		$("#lastname").focus();
		return;
	}
	if (cc.length === 0 || cn.length === 0 || dc.length === 0) {
		report("e", "Please select your country and dial code");
		$("#country").trigger("click");
		return;
	}
	if (mobile.length === 0) {
		report("e", "Phone number cannot be empty");
		$("#mobile").focus();
		return;
	}
	// If all conditions are met, proceed with further logic here
	show("#processing");
	var requestData = {
		api: 'profile',
		action: 'step1',
		//uid: uid,
		firstname: firstname,
		lastname: lastname,
		cc: cc,
		cn: cn,
		dc: dc,
		mobile: mobile
	}
	// send an ajax request to store onboarding step 1 information
	processRequest("profile", requestData, successCallback, errorCallback);
});


$(document).on("click", "#step2", function () {
	// api section
	var section = "profile";
	// validate inputs
	var gender = $(".gender.selected").attr("gender");
	var month = $(".month").val();
	var day = $(".day").val();
	var year = $(".year").val();
	var dob = btoa(month + '-' + day + '-' + year);
	if (month.length === 0) {
		report("e", "Month cannot be empty. Please enter the month for your date of birth!");
		$(".month").focus();
		return;
	}
	if (day.length === 0) {
		report("e", "Day cannot be empty. Please enter the day for your date of birth!");
		$(".day").focus();
		return;
	}
	if (year.length === 0) {
		report("e", "Year cannot be empty. Please enter the year for your date of birth!");
		$(".year").focus();
		return;
	}
	if (!gender || gender.length === 0) {
		report("e", "Please select a gender to continue!");
		return;
	}
	show("#processing");

	var requestData = {
		api: 'profile',
		action: 'step2',
		//uid: 'uid',
		gender: gender,
		dob: dob
	}
	// send an ajax request to store onboarding step 2 information
	processRequest("profile", requestData, successCallback, errorCallback);
});


$(document).on("click", "#step3", function () {
	// api section
	var section = "profile";
	// validate inputs
	var message;
	var type = $(".type.selected").attr("type"); // type of business address
	var label = btoa($("#label").val());
	var address = btoa($("#address").val());
	var city = btoa($("#city").val());
	var state = btoa($("#state").val());
	var country = btoa($("#add-country").val());
	var zip = btoa($("#zip").val());
	if (!type) {
		report("e", "Please select a type of address!");
		return;
	}
	if (label.length === 0) {
		report("e", "Label cannot be empty. Please enter a suitable label to identify this address");
		$("#label").focus();
		return;
	}
	if (address.length === 0) {
		report("e", "Address cannot be empty. Please enter your street address");
		$("#address").focus();
		return;
	}
	if (country.length === 0) {
		report("e", "Country cannot be empty. Please enter the country for your address");
		$("#country").focus();
		return;
	}
	if (state.length === 0) {
		report("e", "State cannot be empty. Please enter the state for your address");
		$("#state").focus();
		return;
	}
	if (city.length === 0) {
		report("e", "City cannot be empty. Please enter the city for your address");
		$("#city").focus();
		return;
	}
	if (zip.length === 0) {
		report("e", "Zip Code cannot be empty. Please enter your area postal code for your address");
		$("#zip").focus();
		return;
	}

	show("#processing");

	var requestData = {
		api: 'profile',
		action: 'step3',
		//uid: 'uid',
		type: type,
		label: label,
		address: address,
		country: country,
		state: state,
		city: city,
		zip: zip
	}
	// send an ajax request to store onboarding step 2 information
	processRequest("profile", requestData, successCallback, errorCallback);
});


function onBoarding(obj) {
	var step = obj.step;
	var f = obj.profile;
	var month;
	var day;
	var year;
	if (f.dob !== null) { // Check if fields.dob is not null
		var dob = atob(f.dob); // Decode the base64-encoded date string
		var parts = dob.split('-'); // Split the date string into parts
		var month = parts[0]; // Extract the month part
		var day = parts[1]; // Extract the day part
		var year = parts[2]; // Extract the year part
	}
	var firstname = f.firstname;
	var lastname = f.lastname;
	var cc = f.cc;
	var cn = f.cn;
	var dc = f.dc;
	var mobile = f.mobile;
	var gender = f.gender;
	var type = f.type;
	var label = f.label;
	var address = f.address;
	var country = f.country;
	var state = f.state;
	var city = f.city;
	var zip = f.zip;
	$(".tab-content").load('/iskarma.com/sections/profile/views/onboarding.php', function () {
		$(".tab").removeClass("active");
		$(".tab." + step).addClass("active");
		switch (step) {
			case "step1":
				$("#firstname").focus();
				break;
			case "step2":
				$(".month").focus();
				break;
			case "step3":
				$(".type").focus();
				break;
			default:
				// Handle other cases if needed
				break;
		}
		// populate each field with returned values
		if (firstname !== null) {
			$("#firstname").val(atob(firstname));
		}
		if (lastname !== null) {
			$("#lastname").val(atob(lastname));
		}
		if (cc != null || cn != null || dc != null) {
			$("#country").attr({
				"countrycode": atob(cc),
				"countryname": atob(cn),
				"dialcode": atob(dc)
			});
			$("#country").text(atob(cn));
			$(".dialCode").text(atob(dc));
		}
		if (mobile != null) {
			$("#mobile").val(atob(mobile));
		}
		if (gender != null) {
			$(".gender").each(function () {
				$(this).removeClass("selected");
				if ($(this).attr("gender") == gender) {
					$(this).addClass("selected");
				}
			});
		}
		$("#month").val(month);
		$("#day").val(day);
		$("#year").val(year);
		$(".type").each(function () {
			if ($(this).attr("type") === type) {
				$(this).addClass("selected");
			}
		});
		if (label !== null) {
			$("#label").val(atob(label));
		}
		if (address !== null) {
			$("#address").val(atob(address));
		}
		if (country !== null) {
			$("#add-country").val(atob(country));
		}
		if (state !== null) {
			$("#state").val(atob(state));
		}
		if (city !== null) {
			$("#city").val(atob(city));
		}
		if (zip !== null) {
			$("#zip").val(atob(zip));
		}

		hide("#processing");

	});
}