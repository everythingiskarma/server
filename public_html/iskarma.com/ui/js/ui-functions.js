// load mobile css
/*-------------------------------------------------------------------------------------------------*/
function isPhone() {
	return /Android|webOS|iPhone|iPad|iPod|Blackberry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

function loadMobileCSS() {
	if (isPhone()) {
		var cssLink = document.createElement("link");
		cssLink.href = domain + "/mobile.css";
		cssLink.rel = "stylesheet";
		cssLink.type = "text/css";
		document.head.appendChild(cssLink);
	}
}
loadMobileCSS();


// Function to toggle fullscreen mode
/*-------------------------------------------------------------------------------------------------*/
function toggleFullScreen() {
	if (!document.fullscreenElement && !document.mozFullScreenElement &&
		!document.webkitFullscreenElement && !document.msFullscreenElement) {
		var e = document.documentElement;
		(e.requestFullscreen) ? e.requestFullscreen() : (e.webkitRequestFullscreen) ? e.webkitRequestFullscreen() : (e.mozRequestFullScreen) ? e.mozRequestFullScreen() : (e.msRequestFullscreen) ? e.msRequestFullscreen() : null;
	} else {
		(document.exitFullscreen) ? document.exitFullscreen() :
			(document.mozCancelFullScreen) ? document.mozCancelFullScreen() :
				(document.webkitExitFullscreen) ? document.webkitExitFullscreen() :
					(document.msExitFullscreen) ? document.msExitFullscreen() : null;
	}
}

// Add event listener for fullscreen change event
/*-------------------------------------------------------------------------------------------------*/
document.addEventListener('fullscreenchange', function () { toggleFsIcon(); });
document.addEventListener('mozfullscreenchange', function () { toggleFsIcon(); });
document.addEventListener('MSFullscreenChange', function () { toggleFsIcon(); });
document.addEventListener('mozfullscreenchange', function () { toggleFsIcon(); });

// place this html element anywhere in your site and style it
// <toggle id="efs" class="icon-fs"></toggle>


// function to strip html tags
/*-------------------------------------------------------------------------------------------------*/
function stripHtmlTags(html) {
	// replace any html tag with empty string.
	return html.replace(/<[^>]*>/g, ' ');
}


// clock UTC
/*-------------------------------------------------------------------------------------------------*/
function clock() {
	var now = new Date();
	var h = now.getUTCHours();
	var m = now.getUTCMinutes();
	var s = now.getUTCSeconds();

	var ampm = h >= 12 ? 'PM' : 'AM';
	h = h % 12;
	h = h ? h : 12;

	h = (h < 10 ? '0' : '') + h;
	m = (m < 10 ? '0' : '') + m;
	s = (s < 10 ? '0' : '') + s;

	var time = h + ':' + m + ':' + s + ' ' + ampm + ' UTC';
	$("clock").text(time);
}
setInterval(clock, 1000);
clock();


// Function to delay execution
/*-------------------------------------------------------------------------------------------------*/
var delayTimer;
function delay(callback, ms) {
	clearTimeout(delayTimer);
	delayTimer = setTimeout(callback, ms);
}
/*
// USAGE
$(document).on("click", "#element", function() {
	delay(function() {
		execute some code after 2 seconds!!
	}, 2000);
});
*/

/* load togglebar on startup / reload */
/*-------------------------------------------------------------------------------------------------*/
function reloadTogglebar() {
	// reloads any modals that were open before reload
	$("togglebar li.modal").each(function () {
		var view = $(this).attr("view");
		var viewState = localStorage.getItem(view); // checks if the toggle was on before reload
		if (viewState === 'on') { // if it was on it triggers a click after reload to turn it on again
			$(this).trigger("click");
		}
	});
}


// reload Notifications on startup
/*-------------------------------------------------------------------------------------------------*/
function reloadNotifications() {
	var notView = localStorage.getItem('notifications'); // if notifications were turned on before reload
	if (notView === 'on') { // if it was on it toggles class to set it to on
		$(".rCount").fadeOut();
		$('#notifications').removeClass("icon-bell-o").addClass("on icon-bell");
		$(".reporting").fadeIn();
	}
}

// validate email input
/*-------------------------------------------------------------------------------------------------*/
function validateEmail(email) {
	var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
	return re.test(email);
}

// validate otp input
/*-------------------------------------------------------------------------------------------------*/
function validateOTP(data) {
	var re = /^\d{6}$/;
	return re.test(data);
}
