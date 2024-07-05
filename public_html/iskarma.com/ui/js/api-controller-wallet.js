// load wallet
function loadWallet(obj) {
	var f = obj.wallet;
	$(".tab-content").load("iskarma.com/sections/wallet/views/wallet.php", function () {

		hide("#processing");

	});
}


// load credits
function loadCredits(obj) {
	var f = obj.credits;
	$(".tab-content").load("iskarma.com/sections/wallet/views/credits.php", function () {

		hide("#processing");

	});
}


// load debits
function loadDebits(obj) {
	var f = obj.debits;
	$(".tab-content").load("iskarma.com/sections/wallet/views/debits.php", function () {

		hide("#processing");

	});
}


// load settings
function loadWalletSettings(obj) {
	var f = obj.settings;
	$(".tab-content").load("iskarma.com/sections/wallet/views/settings.php", function () {

		hide("#processing");

	});
}