// load personal KYC
/*-------------------------------------------------------------------------------------------------*/
function loadKYC(obj) {
    var fields = obj.kyc;
    var id_type = fields.id_type;
    var id_status = fields.id_status;
    var id_status_msg = fields.id_status_msg;
    var id_image = fields.id_image;
    var id_mime = fields.id_mime;
    var ap_type = fields.ap_type;
    var ap_status = fields.ap_status;
    var ap_status_msg = fields.ap_status_msg;
    var ap_image = fields.ap_image;
    var ap_mime = fields.ap_mime;
    $(".tab-content").load("/iskarma.com/sections/profile/views/kyc.php", function () {

        if (id_status !== null) {
            $("#id-status li").each(function () {
                var getStatus = $(this).attr("status");
                if (getStatus == id_status) {
                    $(this).addClass("active");
                    var info = $(this).attr("info");
                    $("#id-status-msg").text(info);
                }
            });
        }

        if (ap_status !== null) {
            $("#ap-status li").each(function () {
                var getStatus = $(this).attr("status");
                if (getStatus == ap_status) {
                    $(this).addClass("active");
                    var info = $(this).attr("info");
                    $("#ap-status-msg").text(info);
                }
            });
        }

        if (id_status_msg !== null) {
            $("#id-status-msg").append(id_status_msg);
        }

        if (ap_status_msg !== null) {
            $("#ap-status-msg").append(ap_status_msg);
        }

        if (id_type !== null) {
            $("#id-type li").each(function () {
                var type = $(this).attr("type");
                if (type == id_type) {
                    $(this).addClass("selected");
                    var text = $(this).attr("text");
                    $("#identity").attr("type", type);
                    $("#identity").text(text);
                }
            });
        }

        if (ap_type !== null) {
            $("#ap-type li").each(function () {
                var type = $(this).attr("type");
                if (type == ap_type) {
                    $(this).addClass("selected");
                    var text = $(this).attr("text");
                    $("#address-proof").attr("type", type);
                    $("#address-proof").text(text);
                }
            });
        }

        if (id_image !== null) {
            if (id_mime && id_mime.includes("image")) {
                // uploaded file is an image
                $(".identity .doc.img").show().siblings().hide();
                $("#id-image-img").attr("src", "data:" + id_mime + ";base64," + id_image);
            } else if (id_mime && id_mime === "application/pdf") {
                // uploaded file is a pdf document
                $(".identity .doc.pdf").show().siblings().hide();
                var docUrl = "data:application/pdf;base64," + id_image;
                $("#id-image-pdf").attr("src", docUrl);
            }
        }

        if (ap_image !== null) {
            if (ap_mime && ap_mime.includes("image")) {
                // uploaded file is an image
                $(".address-proof .doc.img").show().siblings().hide();
                $("#ap-image-img").attr("src", "data:" + ap_mime + ";base64," + ap_image);
            } else if (ap_mime && ap_mime === "application/pdf") {
                // uploaded file is a pdf document
                $(".address-proof .doc.pdf").show().siblings().hide();
                var docUrl = "data:application/pdf;base64," + ap_image;
                $("#ap-image-pdf").attr("src", docUrl);
            }
        }

        hide("#processing");

    });

}

// update personal kyc 
/*-------------------------------------------------------------------------------------------------*/
function updateKYC(id, type) {

    if (id === "id-type") {
        var element = $("#id-status li");
        var element_info = $("#id-status-msg");
    } else if (id === "ap-type") {
        var element = $("#ap-status li");
        var element_info = $("#ap-status-msg");
    }

    element.each(function () {
        var getStatus = $(this).attr("status");
        if (getStatus == "3") {
            var text = $(this).text();
            var info = $(this).attr("info");
            $(this).addClass("active " + text);
            element_info.text(info);
        } else {
            $(this).removeClass("active text");
        }
    });

    show("#processing");
    var requestData = {
        api: "profile",
        action: "update-kyc",
        doc_name: id,
        doc_type: type
    }
    // send an ajax request to store onboarding step 2 information
    processRequest("profile", requestData, successCallback, errorCallback);

}

// load business KYB
/*-------------------------------------------------------------------------------------------------*/
function loadKYB(obj) {
    var fields = obj.kyb;
    var biz_name = fields.biz_name;
    var biz_url = fields.biz_url;
    var biz_type = fields.biz_type;
    var biz_desc = fields.biz_desc;
    var biz_industry = fields.biz_industry;
    var biz_category = fields.biz_category;
    var biz_role = fields.biz_role;
    var biz_income = fields.biz_income;
    var biz_employees = fields.biz_employees;
    var cert_type = fields.cert_type;
    var cert_validity = fields.cert_validity;
    var cert_image = fields.cert_image;
    var cert_mime = fields.cert_mime;
    var cert_status = fields.cert_status;
    var cert_status_msg = fields.cert_status_msg;

    $(".tab-content").load("/iskarma.com/sections/profile/views/kyb.php", function () {

        if (cert_status !== null) {
            $("#cert-status li").each(function () {
                var getStatus = $(this).attr("status");
                if (getStatus == cert_status) {
                    $(this).addClass("active");
                    var info = $(this).attr("info");
                    $("#cert-status-msg").text(info);
                }
            });
        }

        if (cert_status_msg !== null) {
            $("#cert-status-msg").append(atob(cert_status_msg));
        }

        if (cert_type !== null) {
            $("#cert-types li").each(function () {
                var type = $(this).attr("type");
                if (type == cert_type) {
                    $(this).addClass("selected");
                    var text = $(this).attr("text");
                    $("#cert-type").attr("type", type);
                    $("#cert-type").text(text);
                }
            });
        }

        if (cert_image !== null) {
            if (cert_mime && cert_mime.includes("image")) {
                // uploaded file is an image
                $(".certificate .doc.img").show().siblings().hide();
                $("#cert-image-img").attr("src", "data:" + cert_mime + ";base64," + cert_image);
            } else if (cert_mime && cert_mime === "application/pdf") {
                // uploaded file is a pdf document
                $(".certificate .doc.pdf").show().siblings().hide();
                var docUrl = "data:application/pdf;base64," + cert_image;
                $("#cert-image-pdf").attr("src", docUrl);
            }
        }

        if (cert_validity !== null) {
            var parts = atob(cert_validity).split("-"); // Split the date string into parts
            var month = parts[0]; // Extract the month part
            var year = parts[1]; // Extract the day part
            $("#cert-month").val(month);
            $("#cert-year").val(year);
        }

        if (biz_type !== null) {
            $("#biz-type li").each(function () {
                var type = $(this).attr("type");
                if (type == biz_type) {
                    $(this).addClass("selected");
                }
            });
        }

        if (biz_name !== null) {
            $("#biz-name").val(atob(biz_name));
        }

        if (biz_url !== null) {
            $("#biz-url").val(atob(biz_url));
        }

        if (biz_role !== null) {
            $("#biz-role").val(atob(biz_role));
        }

        if (biz_employees !== null) {
            $("#biz-employees").val(atob(biz_employees));
        }

        if (biz_income !== null) {
            $("#biz-income").val(atob(biz_income));
        }

        if (biz_type !== null) {
            $("#biz-type").each(function () {
                if ($(this).attr("type") == biz_type) {
                    $(this).addClass("selected");
                }
            });
        }

        if (biz_industry !== null) {
            $("#biz-industry").val(atob(biz_industry));
        }

        if (biz_category !== null) {
            $("#biz-category").val(atob(biz_category));
        }

        if (biz_desc !== null) {
            $("#biz-desc").val(atob(biz_desc));
        }

        hide("#processing");

    });

}

// update business KYB
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#update-kyb", function () {

    var biz_name = btoa($("#biz-name").val());
    var biz_url = btoa($("#biz-url").val());
    var biz_industry = btoa($("#biz-industry").val());
    var biz_category = btoa($("#biz-category").val());
    var biz_role = btoa($("#biz-role").val());
    var biz_income = btoa($("#biz-income").val());
    var biz_employees = btoa($("#biz-employees").val());
    var biz_desc = btoa($("#biz-desc").val());
    var biz_type = $("#biz-type li.selected").attr("type");
    var cert_type = $("#cert-type").attr("type");
    var month = $(".month").val();
    var year = $(".year").val();
    var cert_validity = btoa(month + "-" + year);
    var cert_image = $("#cert-image-img").attr("src");
    // field validations
    /*
    if (biz_name.length === 0) {
        report("e", "Please enter the name of your business!");
        $("#biz-name").focus();
        return;
    }
    */
    if (cert_type.length === 0) {
        report("e", "Please select a business registration type!");
        $("#cert-type").trigger("click");
        return;
    }

    if (!biz_type) {
        biz_type = null;
    }

    if (!cert_image) {
        report("e", "Please upload an image of your business registration certificate!");
        $("#cert-image .file-upload").trigger("click");
        return;
    }

    show("#processing");
    var requestData = {
        api: "profile",
        action: "update-kyb",
        biz_name: biz_name,
        biz_url: biz_url,
        biz_type: biz_type,
        biz_desc: biz_desc,
        biz_industry: biz_industry,
        biz_category: biz_category,
        biz_role: biz_role,
        biz_income: biz_income,
        biz_employees: biz_employees,
        cert_type: cert_type,
        cert_validity: cert_validity
    }
    // send an ajax request to store onboarding step 2 information
    processRequest("profile", requestData, successCallback, errorCallback);
});

// load profile
/*-------------------------------------------------------------------------------------------------*/
function loadProfile(obj) {
    var f = obj.profile;
    var avatar = f.avatar;
    var avatar_mime = f.avatar_mime;
    var firstname = f.firstname;
    var lastname = f.lastname;
    var cc = f.cc;
    var cn = f.cn;
    var dc = f.dc;
    var mobile = f.mobile;
    var gender = f.gender;
    var birth = f.dob;
    var type = f.type;
    var label = f.label;
    var address = f.address;
    var country = f.country;
    var state = f.state;
    var city = f.city;
    var zip = f.zip;
    $(".tab-content").load("/iskarma.com/sections/profile/views/profile.php", function () {
        if (avatar != null) {
            $("#avatar img").attr("src", "data:" + avatar_mime + ";base64," + avatar);
        }
        $("#firstname").val(atob(firstname));
        $("#lastname").val(atob(lastname));
        $("#country").attr({ "countrycode": atob(cc), "countryname": atob(cn), "dialcode": atob(dc) });
        $("#country").text(atob(cn));
        $(".dialCode").text(atob(dc));
        $("#mobile").val(atob(mobile));
        $(".gender").each(function () {
            if ($(this).attr("gender") == gender) {
                $(this).addClass("selected");
            }
        });
        if (birth !== null) {
            var dob = atob(birth); // Decode the base64-encoded date string
            var parts = dob.split("-"); // Split the date string into parts
            var month = parts[0]; // Extract the month part
            var day = parts[1]; // Extract the day part
            var year = parts[2]; // Extract the year part
            $("#month").val(month);
            $("#day").val(day);
            $("#year").val(year);
        }
        $("#address-type li").each(function () {
            if ($(this).attr("type") == type) {
                $(this).addClass("selected");
            }
        });
        $("#label").val(atob(label));
        $("#address").val(atob(address));
        $("#add-country").val(atob(country));
        $("#state").val(atob(state));
        $("#city").val(atob(city));
        $("#zip").val(atob(zip));
        // scroll to top after loading
        st(".tab-content");
        hide("#processing");
    });
}

// update profile
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#update-profile", function () {
    var type = $("#address-type li.selected").attr("type"); // type of address
    var label = btoa($("#label").val()); // nickname for address
    var address = btoa($("#address").val()); // street address
    var city = btoa($("#city").val());
    var state = btoa($("#state").val());
    var country = btoa($("#add-country").val());
    var zip = btoa($("#zip").val());
    var gender = $(".gender.selected").attr("gender");
    var month = $(".month").val();
    var day = $(".day").val();
    var year = $(".year").val();
    var dob = btoa(month + "-" + day + "-" + year);
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

    if (gender.length === 0) {
        report("e", "Please select a gender to continue");
        return;
    }
    if (month.length === 0) {
        report("e", "Month cannot be empty. Please enter the month for your date of birth");
        $(".month").focus();
        return;
    }
    if (day.length === 0) {
        report("e", "Day cannot be empty. Please enter the day for your date of birth");
        $(".day").focus();
        return;
    }
    if (year.length === 0) {
        report("e", "Year cannot be empty. Please enter the year for your date of birth");
        $(".year").focus();
        return;
    }

    if (type.length === 0) {
        report("e", "Please select a type of address");
        return;
    }
    if (label.length === 0) {
        report("e", "Label cannot be empty. Please enter suitable label to identify this address");
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
        api: "profile",
        action: "update-profile",
        firstname: firstname,
        lastname: lastname,
        cc: cc,
        cn: cn,
        dc: dc,
        mobile: mobile,
        gender: gender,
        dob: dob,
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

// load addresses
/*-------------------------------------------------------------------------------------------------*/
function loadAddresses(obj) {

    $(".tab-content").load("/iskarma.com/sections/profile/views/addresses.php", function () {

        var addresses = obj.addresses;

        $.each(addresses, function (index, adr) {

            var id = adr.id;
            var type = adr.type;
            var priority = adr.priority;
            var label = adr.label;
            var country = adr.country;
            var address = adr.address;
            var state = adr.state;
            var city = adr.city;
            var zip = adr.zip;
            
            var item = $("li.address.preload").clone();

            item.attr({ "add_id": id, "priority": priority });

            if (label !== null) {
                item.find(".add-label").val(atob(label));
            }

            item.find(".add-type li").each(function () {
                var typ = $(this).attr("type");
                if (typ == type) {
                    $(this).addClass("selected");
                }
            });

            if (priority == "1") {
                item.find(".add-priority").addClass("primary").attr("title", "Primary Address");
            }
            if (address !== null) {                
                item.find(".add-address").val(atob(address));
            }
            if (country !== null) {                
                item.find(".add-country").val(atob(country));
            }
            if (state !== null) {                
                item.find(".add-state").val(atob(state));
            }
            if (city !== null) {
                item.find(".add-city").val(atob(city));
            }
            if (city !== null) {
                item.find(".add-zip").val(atob(zip));
            }
            item.removeClass("preload");
            $(".address-list").append(item);

        });

        hide("#processing");

    });

}

// address priority
$(document).on("click", ".add-priority", function () {
    var priority = $(this).closest(".address").attr("priority");
    // check priority
    if (priority == "1") {
        report("in", "This is already the primary address!");
        return;
    }
    show("#processing");
    var id = $(this).closest(".address").attr("add_id");
    var requestData = {
        api: "profile",
        action: "update-address",
        add_action: "priority",
        id: id
    }
    // send ajax request to add priority to selected address
    processRequest("profile", requestData, successCallback, errorCallback);
});

// confirm delete address
$(document).on("click", ".delete-address", function () {
    var priority = $(this).closest(".address").attr("priority");
    // check priority
    if (priority == "1") {
        report("e", "Can not delete primary address!");
        return;
    }
    $(".delete-address").removeClass("confirm").attr("title", "Delete Address");
    $(this).addClass("confirm").attr("title", "Confirm Delete Address");
    delay(function () {
        $(".delete-address").removeClass("confirm").attr("title", "Delete Address");
    }, 5000);
});

// delete address
$(document).on("click", ".delete-address.confirm", function () {
    show("#processing");
    var id = $(this).closest(".address").attr("add_id");
    var requestData = {
        api: "profile",
        action: "update-address",
        add_action: "delete",
        id: id
    }
    // send ajax request to add priority to selected address
    processRequest("profile", requestData, successCallback, errorCallback);
});

// update addresses
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".update-address", function () {
    $(".address").removeClass("focused");
    $(this).closest(".address").addClass("focused");
    var id = $(".focused").attr("add_id");
    var type = $(".focused .add-type li.selected").attr("type");
    var label = btoa($(".focused .add-label").val());
    var address = btoa($(".focused .add-address").val());
    var city = btoa($(".focused .add-city").val());
    var state = btoa($(".focused .add-state").val());
    var country = btoa($(".focused .add-country").val());
    var zip = btoa($(".focused .add-zip").val());

    if (!type) {
        report("e", "Please select an address type!");
        $(".focused .add-type li").focus();
        return;        
    }

    if (label.length < 1) {
        report("e", "Please enter a nickname for your new address!");
        $(".focused .add-label").focus();
        return;
    }

    if (address.length < 10) {
        report("e", "Please enter your street address with house/apartment/office number and a landmark!");
        $(".focused .add-address").focus();
        return;
    }

    if (country.length < 2) {
        report("e", "Please enter the name of your country!");
        $(".focused .add-country").focus();
        return;
    }

    if (state.length < 2) {
        report("e", "Please enter the name of your state / region!");
        $(".focused .add-state").focus();
        return;
    }

    if (city.length < 2) {
        report("e", "Please enter the name of your city!");
        $(".focused .add-city").focus();
        return;
    }

    if (zip.length < 2) {
        report("e", "Please enter your area postal / zip code!");
        $(".focused .add-zip").focus();
        return;
    }

    show("#processing");

    var requestData = {
        api: "profile",
        action: "update-address",
        add_action: "update",
        id: id,
        type: type,
        label: label,
        address: address,
        city: city,
        state: state,
        country: country,
        zip: zip
    }

    // send an ajax request to update address
    processRequest("profile", requestData, successCallback, errorCallback);

});

// add new addresses
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#add-address", function () {
    $("overload .content").empty();
    var form = $(".address-box").clone();
    $("overload .content").append(form);
//    $("overload .address-box .title").text("Create New Address");
    $("overload #update-address").attr("action", "add");
    $("overload").fadeIn();
});

// add new addresses
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#new-address", function () {

    var type = $("overload #address-type li.selected").attr("type");
    var label = btoa($("overload #label").val());
    var address = btoa($("overload #address").val());
    var country = btoa($("overload #country").val());
    var state = btoa($("overload #state").val());
    var city = btoa($("overload #city").val());
    var zip = btoa($("overload #zip").val());
    var id = "0";

    if (!type) {
        report("e", "Please select an address type!");
        return;
    }

    if (label.length < 1) {
        report("e", "Please enter a nickname for your new address!");
        return;
    }

    if (address.length < 10) {
        report("e", "Please enter your street address with house/apartment/office number and a landmark!");
        return;
    }

    if (country.length < 2) {
        report("e", "Please enter the name of your country!");
        return;
    }

    if (state.length < 2) {
        report("e", "Please enter the name of your state / region!");
        return;
    }

    if (city.length < 2) {
        report("e", "Please enter the name of your city!");
        return;
    }

    if (zip.length < 2) {
        report("e", "Please enter your area postal / zip code!");
        return;
    }

    var requestData = {
        api: "profile",
        action: "update-address",
        add_action: "add",
        id: id,
        type: type,
        label: label,
        address: address,
        country: country,
        state: state,
        city: city,
        zip: zip
    }
    
    show("#processing");
    // send ajax request to add new address
    processRequest("profile", requestData, successCallback, errorCallback);
    // close overload
    $(".x-overload").trigger("click");

});

// load Settings
/*-------------------------------------------------------------------------------------------------*/
function loadSettings(obj) {

    $(".tab-content").load("/iskarma.com/sections/profile/views/settings.php", function () {

        var set = obj.settings;
        var lang = set.language;
        var tz = set.timezone;
        var mode = set.mode;
        var newsletters = set.newsletters;
        var notifications = set.notifications;
        var recovery = set.recovery;
        var two_factor = set.two_factor;
        var two_factor_key = set.two_factor_key;
        var terms = set.terms;
        var privacy = set.privacy;
        var multisite = set.multisite;

        if (lang !== null) {
            $("#set-lang").text(lang);
        }

        if (tz !== null) {
            $("#set-tz").text(tz);
        }

        if (mode == "1") {
            $("#set-mode").addClass("on");
        }

        if (newsletters == "1") {
            $("#set-newsletters").addClass("on");
        }

        if (notifications == "1") {
            $("#set-notifications").addClass("on");
        }

        if (recovery !== null) {
            $("#set-recovery").val(atob(recovery));
        }

        if (two_factor == "1") {
            $("#set-two-factor").addClass("on");
            $("#two-factor-key").text(two_factor_key);
        }

        if (terms == "1") {
            $("#set-terms").addClass("on");
        }

        if (privacy == "1") {
            $("#set-privacy").addClass("on");
        }

        if (multisite == "1") {
            $("#set-multisite").addClass("on");
        }

        hide("#processing");

    });

}

// update Settings > toggle buttons
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#settings .tb", function () {

    var set_action = $(this).attr("id");

    var requestData = {
        api: "profile",
        action: "update-settings",
        set_action: set_action
    }

    // send ajax request to update setting
    processRequest("profile", requestData, successCallback, errorCallback);

});

// update Settings > recover email address
/*-------------------------------------------------------------------------------------------------*/
$(document).on("blur", "#set-recovery", function () {
    var email = $(this).val();
    // Check if input is valid
    var recovery = btoa(email);
    if (validateEmail(email)) {
        // continue to send ajax request
        var requestData = {
            api: "profile",
            action: "update-settings",
            set_action: "set-recovery",
            recovery: recovery
        }

        // send ajax request to update recovery email
        processRequest("profile", requestData, successCallback, errorCallback);

    } else {
        report("e", "Invalid email input. Please enter a valid email address to set as your recovery email address!");
    }

});


