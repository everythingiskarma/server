// show/hide toggles on startup / reload
/*-------------------------------------------------------------------------------------------------*/
var toggleState = localStorage.getItem('toggleState');
if (toggleState === 'on') {
	$('toggles').addClass("icon-toggle-on");
	$("togglebar").slideDown();
} else {
	$("toggles").addClass("icon-toggle-off");
}


// togglebar on reload
/*-------------------------------------------------------------------------------------------------*/
$("togglebar").load("iskarma.com/sections/header/views/togglebar.php", function () {
	reloadTogglebar();
	reloadNotifications();
});