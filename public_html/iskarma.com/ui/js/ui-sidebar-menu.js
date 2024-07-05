// toggle open selected menu item group
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".tab-menu h2", function () {
	// turn off all menu items
	toggleMenusOff();
	if (!$(this).parent().hasClass("active")) {
		$(".tab-menu li").removeClass("active");
		$(".tab-menu ul").slideUp();
		$(this).next().slideToggle();
		$(this).parent().toggleClass("active");
	}
	toggleActiveMenu();
});


// request menu item data from server and open tab menu item in tab content
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".tab-menu li li", function () {
	show("#processing");
	$(".tab-menu li li").removeClass("active");
	// 
	toggleMenuItemsOff();
	$(this).addClass("active");
	var api = $(this).parent().parent().attr("id");
	var action = $(this).attr("id");
	localStorage.setItem("toggle-" + action, "on");
	// send ajax request for selected menu item
	var requestData = {
		api: api, // indicates which api / database to send request to 
		action: action, // indicates which api action to perform
		uid: uid,
		domain: domain
	}

	processRequest(api, requestData, successCallback, errorCallback);
	
	st($(".tab-content"));
	
});
/*-------------------------------------------------------------------------------------------------*/


// toggle all menu item groups off and change localStorage status to off
/*-------------------------------------------------------------------------------------------------*/
function toggleMenusOff() {
	$(".tab-menu > li").each(function () {
		var togMenuID = $(this).attr("id");
		localStorage.setItem('toggle-' + togMenuID, 'off');
	});
}


// toggle on current menu item group and change localStorage status to on
/*-------------------------------------------------------------------------------------------------*/
function toggleActiveMenu() {
	$(".tab-menu li").each(function () {
		if ($(this).hasClass("active")) {
			var menuID = $(this).attr("id");
			localStorage.setItem('toggle-' + menuID, 'on');
		}
	});
}


// toggle off all menu items and change localStorage status to off
/*-------------------------------------------------------------------------------------------------*/
function toggleMenuItemsOff() {
	$(".tab-menu li li").each(function () {
		var menuID = $(this).attr("id");
		localStorage.setItem('toggle-' + menuID, 'off');
	});
}


// reload active menu item on page reload
/*-------------------------------------------------------------------------------------------------*/
function reloadActiveMenu() {
	// reload active menu item group
	$(".tab-menu li").each(function () {
		var menuID = $(this).attr("id");
		var item = localStorage.getItem('toggle-' + menuID);
		if (item == 'on') {
			$(this).children("h2").trigger("click");
		}
	});
	// reload active menu item
	$(".tab-menu li li").each(function () {
		var menuID = $(this).attr("id");
		var item = localStorage.getItem('toggle-' + menuID);
		if (item == 'on') {
			$(this).trigger("click");
		}
	});
}