// load advertising
function loadAdvertising(obj) {
	var f = obj['advertising'];
	$(".tab-content").load("iskarma.com/sections/marketing/views/advertising.php", function () {
		hide("#processing");

	});
}

// load email marketing
function loadEmailMarketing(obj) {
	var f = obj['email-marketing'];
	$(".tab-content").load("iskarma.com/sections/marketing/views/emails.php", function () {
		hide("#processing");

	});
}

// load sales funnels
function loadSalesFunnels(obj) {
	var f = obj['sales-funnels'];
	$(".tab-content").load("iskarma.com/sections/marketing/views/funnels.php", function () {
		hide("#processing");

	});
}

// load newsletter marketing
function loadNewsletterMarketing(obj) {
	var f = obj['newsletter-marketing'];
	$(".tab-content").load("iskarma.com/sections/marketing/views/newsletters.php", function () {

		hide("#processing");

	});
}

// load sms marketing
function loadSMSMarketing(obj) {
	var f = obj['sms-marketing'];
	$(".tab-content").load("iskarma.com/sections/marketing/views/sms.php", function () {
		hide("#processing");

	});
}

// load social broadcasting
function loadSocialBroadcasting(obj) {
	var f = obj['social-broadcasting'];
	$(".tab-content").load("iskarma.com/sections/marketing/views/social.php", function () {
		hide("#processing");

	});
}