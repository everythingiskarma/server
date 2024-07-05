// # SEND OTP
$(document).on("click", "#login", function (event) {
    show("#processing");
    var email = $("#email").val();
    var requestData = {
        api: "authenticator", // indicates which database to use
        action: "sendOTP", // indicates which api action to perform
        email: email, // indicates which user requested the action
        domain: domain // indicates which domain requested the action
    };
    // Sending an AJAX request to the server to authenticate the email
    processRequest("authenticator", requestData, successCallback, errorCallback);
});

// # RESEND OTP
$(document).on("click", "#resend", function (event) {
    show("#processing");
    var email = $("#confirm").attr("email");
    var requestData = {
        api: "authenticator", // indicates which database to use
        action: "resendOTP", // indicates which api action to perform
        email: email, // indicates which user requested the action
        domain: domain // indicates which domain requested the action
    };
    // Sending an AJAX request to the server to authenticate the email
    processRequest("authenticator", requestData, successCallback, errorCallback);

});

// # CONFIRM OTP
$(document).on("click", "#confirm", function () {
    show("#processing");
    hide("#confirm");
    show("#validOTP");
    var otp = $("#otp").val();
    var uid = $(this).attr("uid");
    var otpId = $(this).attr("otpid");
    var otpType = $(this).attr("otptype");
    var requestData = {
        api: 'authenticator',
        action: 'confirmOTP',
        otp: otp,
        uid: uid,
        otpId: otpId,
        otpType: otpType,
        domain: domain
    }
    // Sending an AJAX request to the server to confirm OTP
    processRequest("authenticator", requestData, successCallback, errorCallback);
});

// # CANCEL LOGIN # -----------------------------------------------------------
$(document).on("click", "#cancel", function () {
    show("#processing");
    $("load").load('/iskarma.com/sections/dashboard/views/login.php', function () {
        hide("#processing");
    });
    $("#resendTimer").html('');
});
// # END CANCEL LOGIN # -----------------------------------------------------------

// ## RESEND OTP TIMER ## ----------------------------------------------------------------
var interval; // Declare the interval variable outside the function scope
function resendOTPTimer(time) {
    hide("#resend");
    // Clear any existing interval
    if (interval) {
        clearInterval(interval);
    }
    var countdown = time;
    interval = setInterval(function () {
        countdown--;
        if (countdown < 0) {
            clearInterval(interval);
            hide("#resendTimer");
            var resend = '<div id="resend" class="ib space icon-mail hide m20" tabindex="0">Resend</div>';
            $("#validOTP").append(resend);
            show("#resend");
        } else {
            $("#resendTimer").html("Didn't recieve the email? Resend OTP in " + countdown + " seconds");
            show("#resendTimer");
        }
    }, 1000);
}
// ## END RESEND OTP TIMER ## ----------------------------------------------------------------

// # validate otp based on validation rules
$(document).on("keyup", "#otp", function () {
    var message = $("messages");
    var otp = $("#otp").val();
    //alert(otp);
    if (validateOTP(otp)) {
        // Remove error message
        message.html('<i>&check; Yes! That appears to be a valid OTP!</i>');
        // add green border to indicate valid email id
        $(this).addClass("valid");
        // show send OTP button
        show("#confirm");
        hide("#cancel");
    } else {
        // If input is not valid, show error and hide continue button
        $(this).removeClass("valid");
        message.html('<blink>validating...</blink><i>example: 123456</i>');
        hide("#confirm");
        show("#cancel");
    }
});

// # on blur event handler for otp field
$(document).on("blur", "#otp", function (event) {
    var input = $(this).val();
    if (input === '') {
        $("messages").html('<i>Check your inbox & enter the OTP you just received!</i>');
        hide("#confirm");
    }
});

$(document).on("input", "#otp", function (event) {
    var message = $("messages");
    var otp = $(this).val();
    otp = otp.replace(/\D/g, "");
    if (otp.length > 6) {
        otp = otp.slice(0, 6);
    }
    $(this).val(otp);
});


// // ## EMAIL FIELD VALIDATION RULES ## // //
// # restrict invalid input characters in email input
$(document).on("keydown", "#email, #otp", function (event) {
    var message = $("messages");
    if (event.key === ' ') {
        event.preventDefault();
        message.html('<i>Uh uh! No spaces allowed here!</i>');
    }
});


// # Event handler for input blur
$(document).on("blur", "#email", function (event) {
    var input = $(this).val();
    if (input === '') {
        $("messages").html('<blink>Please enter your email!</blink>');
        // hide send otp button
        hide("#login");
    }    
});    

// # Event handler for keyup (typing) in the email input
$(document).on("keyup", "#email", function (event) {
    var message = $("messages");
    var email = $("#email").val();
    if (email === '') {
        // hide send otp button
        hide("#login");
        message.html('<blink>waiting for input...</blink>');
        return;
    }
    // Check if input is valid
    if (validateEmail(email)) {
        // Remove error message
        message.html('<i>&check; Yes! That appears to be a valid email address!</i>');
        // add green border to indicate valid email id
        $(this).addClass("valid");
        // show send OTP button
        show("#login");
    } else {
        // If input is not valid, show error and hide continue button
        $(this).removeClass("valid");
        message.html('<blink>validating...</blink><i>example: support@iskarma.com</i>');
        // hide send otp button
        hide("#login");
    }
});

function loadOTP(obj) {
    var otpId = obj.otpId;
    var otpType = obj.otpType;
    var uid = obj.uid;
    var email = obj.email;
    $("load").load('/iskarma.com/sections/dashboard/views/otp.php', function () {
        $("#confirm").attr({
            "otptype": otpType,
            "otpid": otpId,
            "uid": uid,
            "email": email
        });
        $("#otp").focus();
        hide("#processing");
    });
    resendOTPTimer(120);
}