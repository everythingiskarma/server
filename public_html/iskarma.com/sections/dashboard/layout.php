<?php
// Set custom name for the session cookie
session_name('everythingIsKarma');
// start session before processing the post request (via ajax or php form)
session_start();
// report all errors in case the script fails to execute at some point
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (!isset($_SESSION['loggedIn'])) {
	require_once 'views/login.php';
} else {
?>
	<div class="tabs sidebar">
		<div class="tab-content"></div>
		<ul class="tab-menu">
			<li id="dashboard">
				<h2>Dashboard</h2>
				<ul>
					<li id="get-dashboard">Overview</li>
					<li id="get-dashboard-shortcuts">Shortcuts / Bookmarks</li>
				</ul>
			</li>
			<li id="profile">
				<h2>Profile</h2>
				<ul>
					<li id="get-profile">Overview</li>
					<li id="get-profile-kyc">Personal KYC</li>
					<li id="get-profile-kyb">Business KYB</li>
					<li id="get-profile-addresses">Addresses</li>
					<li id="get-profile-settings">Settings</li>
				</ul>
			</li>
			<li id="wallet">
				<h2>Wallet</h2>
				<ul>
					<li id="get-wallet">Overview</li>
					<li id="get-wallet-credits">Credits</li>
					<li id="get-wallet-debits">Debits</li>
					<li id="get-wallet-settings">Settings</li>
				</ul>
			</li>
			<li id="store">
				<h2>Store</h2>
				<ul>
					<li id="get-store">Overview</li>
					<li id="get-store-orders">Orders</li>
					<li id="get-store-returns">Returns</li>
					<li id="get-store-products">Products</li>
					<li id="get-store-categories">Categories</li>
					<li id="get-store-attributes">Attributes</li>
					<li id="get-store-shipping">Shipping</li>
					<li id="get-store-payments">Payments</li>
					<li id="get-store-reviews">Reviews</li>
					<li id="get-store-statistics">Statistics</li>
					<li id="get-store-settings">Settings</li>
				</ul>
			</li>
			<li id="content">
				<h2>Content</h2>
				<ul>
					<li id="get-content-pages">Pages</li>
					<li id="get-content-categories">Categories</li>
					<li id="get-content-menus">Menus</li>
				</ul>
			</li>
			<li id="marketing">
				<h2>Marketing</h2>
				<ul>
					<li id="get-marketing-advertising">Advertising</li>
					<li id="get-marketing-emails">Email Marketing</li>
					<li id="get-marketing-newsletters">Newsletters</li>
					<li id="get-marketing-sms">SMS</li>
					<li id="get-marketing-funnels">Funnels</li>
					<li id="get-marketing-social">Social Broadcasting</li>
				</ul>
			</li>
		</ul>
	</div>
	<script>
		reloadActiveMenu();
	</script>
<?php
}
?>