function loadDashboard(obj) {

	$(".tab-content").load("iskarma.com/sections/dashboard/views/dashboard.php", function () {

		hide("#processing");

	});
}

function loadShortcuts(obj) {

	$(".tab-content").load("iskarma.com/sections/dashboard/views/shortcuts.php", function () {

		hide("#processing");

	})
}
