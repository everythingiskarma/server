/// Shared function to process AJAX requests
/*-------------------------------------------------------------------------------------------------*/
function processRequest(
  url, // url of the requested api file
  requestData, // an array of request variables sent to the api
  successCallback, // function to handle success (must be specified inside the click event handler)
  errorCallback // function to handle error (also to be specified inside the click event handler)
) {
  var apiURL = "api/" + url + "/handler.php";
  $.ajax({
    url: apiURL, // api url that will receive post request
    type: "POST", // method of request
    data: requestData, // array of request data
    dataType: "json", // expecting a json response from the api
    success: successCallback, // to be defined in the click event handler
    error: errorCallback // to be defined in the click event handler
  });
}

// successCallback function for ajax requests
/*-------------------------------------------------------------------------------------------------*/
// performs respective functions after recieving response to the ajax request from php
// every api request sends a report as response that contains specific object properties indicating futher actions that need to be performed on success. Based on which object property is sent, specific jquery functions load respective views and perform other post load actions.
/*-------------------------------------------------------------------------------------------------*/
function successCallback(report) {
  $(".reports > *").addClass("pre");
  var ncount = 0;
  if (Array.isArray(report) && report.length > 0) {
    report.forEach((obj, index) => {
      switch (true) {
        /*==========================================================================================*/
        /*==============================api-controller-authenticator.js=============================*/
        /*==========================================================================================*/
        case obj.hasOwnProperty("authOTP"): // indicates otp has been sent shows confirm otp interface
          loadOTP(obj); // api-controller-authenticator.js
          break;
        case obj.hasOwnProperty("otp-incorrect"):
          // reset otp input // indicates incorrect otp was entered
          $("#otp").val("").focus();
          $("messages").text("Incorrect OTP! Please re-enter the correct OTP!");
          if (!$("#notifications").hasClass("on")) {
            $(".rCount").trigger("click");
          }
          hide("#processing");
          break;
        case obj.hasOwnProperty("reset-login"): // reset login form
          $("#cancel").trigger("click");
          break;
        case obj.hasOwnProperty("loggedOut"): // indicates logout was successful, shows login page
        case obj.hasOwnProperty("loggedIn"): // indicates login was successful, loads profile overview
          // reloads togglebar and loads login or profile overview // ajax.js
          reloadDashboard(obj);
          break;
        /*==========================================================================================*/
        /*==============================api-controller-dashboard.js=============================*/
        /*==========================================================================================*/
        case obj.hasOwnProperty("got-dashboard"): // indicates dashboard was fetched successfully
          // load dashboard overview // api-controller-dashboard.js
          loadDashboard(obj);
          break;
        case obj.hasOwnProperty("got-shortcuts"): // indicates dashboard shortcuts were fetched successfully
          // load dashboard shortcuts // api-controller-dashboard.js
          loadShortcuts(obj);
          break;
        /*==========================================================================================*/
        /*=================================api-controller-profile.js================================*/
        /*==========================================================================================*/
        case obj.hasOwnProperty("onBoarding"): // indicates onboarding is pending
          // loads onboarding view and respective step based on object property step // onboarding.js
          onBoarding(obj); // onboarding.js
          break;
        case obj.hasOwnProperty("profile"): // indicates profile overview was fetched
          // load profile overview // api-controller-profile.js
          loadProfile(obj);
          break;
        case obj.hasOwnProperty("kyc"):
          // load profile kyc
          loadKYC(obj); // api-controller-profile.js
          break;
        case obj.hasOwnProperty("kyb"):
          // load business kyb
          loadKYB(obj); // api-controller-profile.js
          break;
        case obj.hasOwnProperty("addresses"):
          // load addresses
          loadAddresses(obj); // api-controller-profile.js
          break;
        case obj.hasOwnProperty("settings"):
          // load settings
          loadSettings(obj); // api-controller-profile.js
          break;
        case obj.hasOwnProperty("image-deleted"): // indicates image was deleted successfully
        case obj.hasOwnProperty("file-uploaded"): // indicates file was uploaded successfully
        case obj.hasOwnProperty("profile-updated"): // indicates profile was updated successfully
        case obj.hasOwnProperty("kyc-updated"): // indicates personal kyc was updated successfully
        case obj.hasOwnProperty("kyb-updated"): // indicates business kyb was updated successfully
          hide("#processing");
          break;
        case obj.hasOwnProperty("address-added"): // indicates address priority was updated successfully
        case obj.hasOwnProperty("address-deleted"): // indicates address was deleted successfully
        case obj.hasOwnProperty("address-updated"): // indicates address was updated successfully
        case obj.hasOwnProperty("address-prioritized"): // indicates address priority was updated successfully
          hide("#processing");
          $("#get-addresses").trigger("click");
          break;
        /*==========================================================================================*/
        /*=================================api-controller-wallet.js=================================*/
        /*==========================================================================================*/
        case obj.hasOwnProperty("wallet"):
          loadWallet(obj); // load wallet
          break;
        case obj.hasOwnProperty("credits"):
          loadCredits(obj); // load credits
          break;
        case obj.hasOwnProperty("debits"):
          loadDebits(obj); // load debits
          break;
        case obj.hasOwnProperty("wallet-settings"):
          loadWalletSettings(obj); // load debits
          break;
        /*==========================================================================================*/
        /*=================================api-controller-content.js================================*/
        /*==========================================================================================*/
        case obj.hasOwnProperty("content-categories"):
          loadContentCategories(obj); // load content categories
          break;
        case obj.hasOwnProperty("content-menus"):
          loadContentMenus(obj); // load content menus
          break;
        case obj.hasOwnProperty("content-pages"):
          loadContentPages(obj); // load conten pages
          break;
        /*==========================================================================================*/
        /*================================api-controller-marketing.js===============================*/
        /*==========================================================================================*/
        case obj.hasOwnProperty("advertising"):
          loadAdvertising(obj); // load advertising
          break;
        case obj.hasOwnProperty("email-marketing"):
          loadEmailMarketing(obj); // load email marketing
          break;
        case obj.hasOwnProperty("sales-funnels"): // load sales funnels
          loadSalesFunnels(obj);
          break;
        case obj.hasOwnProperty("newsletter-marketing"):
          loadNewsletterMarketing(obj); // load newsletter marketing
          break;
        case obj.hasOwnProperty("sms-marketing"):
          loadSMSMarketing(obj); // load sms marketing
          break;
        case obj.hasOwnProperty("social-broadcasting"):
          loadSocialBroadcasting(obj); // load social broadcasting
          break;
        /*==========================================================================================*/
        /*==================================api-controller-store.js=================================*/
        /*==========================================================================================*/
        case obj.hasOwnProperty("store-overview"):
          loadStoreOverview(obj); // load store overview
          break;
        case obj.hasOwnProperty("store-orders"):
          loadStoreOrders(obj); // load store orders
          break;
        case obj.hasOwnProperty("store-returns"):
          loadStoreReturns(obj); // load store returns
          break;
        case obj.hasOwnProperty("store-products"):
          loadStoreProducts(obj); // load store payments
          break;
        case obj.hasOwnProperty("store-categories"):
          loadStoreCategories(obj); // load store categories
          break;
        case obj.hasOwnProperty("store-attributes"):
          loadStoreAttributes(obj); // load store attributes
          break;
        case obj.hasOwnProperty("store-shipping"):
          loadStoreShipping(obj); // load store shipping
          break;
        case obj.hasOwnProperty("store-payments"):
          loadStorePayments(obj); // load store payments
          break;
        case obj.hasOwnProperty("store-reviews"):
          loadStoreReviews(obj); // load store reviews
          break;
        case obj.hasOwnProperty("store-statistics"):
          loadStoreStatistics(obj); // load store statistics
          break;
        case obj.hasOwnProperty("store-settings"):
          loadStoreSettings(obj); // load store settings
          break;
        case obj.hasOwnProperty("category-updated"):
          $("#get-store-categories").trigger("click");
          break;
      }

      // displays system messages in the report box
      setTimeout(() => {
        if (obj.hasOwnProperty("message")) {
          var reports = $(".reports");
          var msg = obj.message;
          reports.append(msg);
          ncount++;
          $(".ncount").text(ncount).show();
          var scroll = $(".reports");
          scroll.scrollTop(scroll.prop("scrollHeight"));
        }
      }, 500 * index);
    });

  } else {
    console.error("invalid response format: Missing report data!");
    hide("#processing");
  }

  //  hide("#processing");

}


// errorCallback function to display error occurred while processing ajax request
/*-------------------------------------------------------------------------------------------------*/
function errorCallback(xhr, status, error) {
  var errorMessage = "Error occurred while processing the request. Please try again later.";
  console.error("AJAX error:", error);
}


// reload dashboard upon login/logout
/*-------------------------------------------------------------------------------------------------*/
function reloadDashboard() {
  $("load").load("/iskarma.com/sections/dashboard/layout.php"); // reloads load html after login/logout
  $("togglebar").load("/iskarma.com/sections/header/views/togglebar.php", function () {
    reloadNotifications();
    hide("#processing");

  }); // reloads togglebar after login/logout
}

// this must be placed right after login is confirmed
/*-------------------------------------------------------------------------------------------------*/
var uid = $("#uid").val();


// click handler for logout button
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#logout", function () {
  show("#processing");
  var dom = domain;
  var requestData = {
    api: "authenticator",
    action: "logout",
    uid: uid,
    domain: domain
  }
  localStorage.clear();
  // Sending an AJAX request to the server to process and confirm logout
  processRequest("authenticator", requestData, successCallback, errorCallback);
});
