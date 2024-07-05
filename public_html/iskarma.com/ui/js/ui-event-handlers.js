// onboarding - go to previous step
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".step-back", function () {
	var selected = $(".tab.active");
	selected.removeClass("active").prev().addClass("active");
});

// list button select 
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".select li", function () {
	$(this).siblings().removeClass("selected");
	$(this).addClass("selected");
});

// enter exit full screen functionality
// Add event listener to toggle fullscreen on icon click
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#efs", function () {
	toggleFullScreen();
});

function toggleFsIcon() {
	$("#efs").toggleClass("icon-efs icon-fs");
}

// override default f11 behaviour and trigger full screen
/*-------------------------------------------------------------------------------------------------*/
document.addEventListener('keydown', function (event) {
	if (event.key === 'F11') {
		event.preventDefault(); // Prevent default browser behavior for F11 key
		$("#efs").trigger("click");
	}
});

// show/hide toggles 
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "toggles", function () {
	$("togglebar").animate({ opacity: "toggle" });
	$(this).toggleClass("icon-toggle-on icon-toggle-off");
	newState = $(this).hasClass("icon-toggle-on") ? 'on' : 'off';
	localStorage.setItem('toggleState', newState);
});


// exit modal and update localStorage
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "esc", function () {
	$("wrapper, load").fadeOut();
	var view = $(".loaded").attr('view');
	localStorage.setItem(view, 'off');
	$(".loaded").removeClass("loaded");
});


// exit overload modal
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".x-overload", function () {
	$("overload content").empty();
	$("overload").fadeOut();
});


// togglebar modals click event handler
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "togglebar li.modal", function () {
	$("wrapper").fadeIn();
	show("#processing");
	var view = $(this).attr('view');
	$(this).addClass("loaded");
	$("load").load("/iskarma.com/sections/" + view + "/layout.php", function () {
		$(this).show();
		localStorage.setItem(view, 'on');
		hide("#processing");
		if (view === 'profile') {
			$("#email").focus();
		}
	});
});


// notifications toggle
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#notifications", function () {
	$(".ncount").text("").fadeOut();
	$(this).toggleClass("on icon-bell icon-bell-o");

	newState = $("#notifications").hasClass("on") ? 'on' : 'off';
	localStorage.setItem('notifications', newState);

	if (newState === 'on') {
		$(".reporting").fadeIn();
		$(".rCount").hide();
	} else {
		$(".reporting").fadeOut();
		$(".rCount").fadeIn();
	}
	rScroll();
});


// scroll reports to bottom
function rScroll() {
	var scroll = $(".reports");
	delay(function () {
		scroll.scrollTop(scroll.prop("scrollHeight"));
	}, 500);
}


// close notifications box
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#x-reporting, .rCount", function () {
	$("#notifications").trigger("click");
});


// clear notification messages
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#x-messages", function () {
	$(".reports").children().not(':first').remove();
});


// ESCAPE TOGGLES: exit modal wrapper and return toggle icons to closed state
/*-------------------------------------------------------------------------------------------------*/
$(document).keyup(function (e) {
	// check if pressed key is esc
	if (e.keyCode === 27) {
		$(".article.icon-left, .account.icon-close, .search.icon-close").trigger("click");
		$("#efsToggle").removeClass("icon-efs").addClass("icon-fs");
	}
});


// close article and reopen sidebar
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#articleToggle", function () {
	$(this).fadeOut();
	$("article").fadeOut();
	$("#sidebarToggle").trigger("click");
});


// toggle sidebar
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#sidebarToggle", function () {
	// toggle sidebarToggle button icon class
	$(this).toggleClass("icon-th-list icon-close");
	// toggle sidebar
	$("sidebar").stop().animate({
		height: "toggle",
		width: "toggle",
		opacity: "toggle"
	}, 100);
});


// toggle search
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".icon-search.modal", function () {
	$("#searchInput input").focus();
});


// Scroll to top when the button is clicked
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "#toTop", function () {
	$("html, body, .full-modal-wrapper, #searchResultDetails, #searchResults").animate({
		scrollTop: 0
	}, 400); // Adjust the animation speed as needed
});




/* date input */
// Allow only digits and restrict input to specified ranges
/*-------------------------------------------------------------------------------------------------*/
$(document).on("input", ".date input", function (e) {

	var input = $(this).val().replace(/\D/g, ""); // Remove non-digit characters

	// Define range based on input class
	if ($(this).hasClass("month")) {
		if (input.length > 1) {
			$(this).val(input.slice(0, 2)); // limit to 2 digits
		}
		if (input > 12) {
			$(this).val("12");
		}
	} else if ($(this).hasClass("day")) {
		if (input.length > 1) {
			$(this).val(input.slice(0, 2)); // limit to 2 digits
		}
		if (input > 31) {
			$(this).val("31");
		}
	} else if ($(this).hasClass("year")) {
		if (input.length > 2) {
			$(this).val(input.slice(0, 4)); // limit to 4 digits
		}
		if (input > 2024) {
			$(this).val("2024");
		}
	}
	if (input < 1) {
		$(this).val("");
	}

});


