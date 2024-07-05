/* report and alert system messages */
/*-------------------------------------------------------------------------------------------------*/
function report(type, message) {
	switch (type) {
		case "e":
			var report = $("<e>").text(message).append("<b class='icon-error'></b>");
			break;
		case "s":
			var report = $("<s>").text(message).append("<b class='icon-done-all'></b>");
			break;
		case "in":
			$("<in>").text(message).append("<b class='icon-info'></b>");
			break;
		default:
			break;
	}
	var ncount = parseInt($(".rCount .ncount").text(), 10);
	if (isNaN(ncount)) {
		ncount = 0;
	}
	ncount++;
	$(".ncount").text(ncount).show();
	$(".reports").append(report);
	rScroll();
	alert(message);
}

/* show / hide element */
/*-------------------------------------------------------------------------------------------------*/
function show(element) {
	$(element).removeClass("hide").attr("tabindex", "0");
}


function hide(element) {
	$(element).addClass("hide").attr("tabindex", "-1");
}

/* trigger click on pressing space or enter */
/*-------------------------------------------------------------------------------------------------*/
$(document).on("keydown", ".space", function (e) {
	if (e.which === 32 || e.which === 13) {
		e.preventDefault();
		$(this).click();
	}
});


/* country select menu */
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".selector", function () {
	var selection = $(this).next().clone();
	$("overload").fadeIn();
	$("overload .content").empty().html(selection);
	$(".selection-filter").focus();
});


/* selection list */
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "overload .selection li", function () {
	$("overload .selection li").removeClass("selected");
	$(this).addClass("selected");
	$(".x-overload").trigger("click");
	var id = $(this).parent().parent().attr("id");
	switch (id) {
		case "id-type":
			var text = $(this).attr("text");
			var type = $(this).attr("type");
			$("#identity, idtype").text(text);
			$("#identity").attr("type", type);
			updateKYC(id, type);
			$("#id-image-img").attr("src", "");
			$(".identity .doc.none").show().siblings().hide();
			$("#id-image .file-upload").trigger("click");
			break;
		case "ap-type":
			var text = $(this).attr("text");
			var type = $(this).attr("type");
			$("#address-proof, aptype").text(text);
			$("#address-proof").attr("type", type);
			updateKYC(id, type);
			$("#ap-image-img").attr("src", "");
			$(".address-proof .doc.none").show().siblings().hide();
			$("#ap-image .file-upload").trigger("click");
			break;
		case "cert-types":
			var text = $(this).attr("text");
			var type = $(this).attr("type");
			$("#cert-type, certtype").text(text);
			$("#cert-type").attr("type", type);
			$("#update-kyb").trigger("click");
			$("#cert-image-img").attr("src", "");
			$(".certificate .doc.none").show().siblings().hide();
			$("#cert-image .file-upload").trigger("click");
		case "countries":
			var dialCode = $(this).attr("dc");
			var countryCode = $(this).attr("cc");
			var countryName = $(this).attr("cn");
			$("#country").attr({
				"dialCode": dialCode,
				"countryCode": countryCode,
				"countryName": countryName
			});
			$("#country").text(countryName);
			$("#mobile").focus();
			$(".dialCode").text(dialCode);
			break;
		default:
			break;
	}
});


/* selection filter */
/*-------------------------------------------------------------------------------------------------*/
$(document).on("keyup", ".selection-filter", function () {
	var input = $(this).val().toLowerCase();
	var selection = $(this).parent().next().children("li");
	if (input.length > 0) {
		selection.each(function () {
			var xt = $(this).text().toLowerCase();
			if (xt.includes(input)) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	} else if (input.length < 1) {
		selection.each(function () {
			$(this).show();	
		});
	}
});


// on pressing ctrl+shift+z hard refresh the page bypassing the cache
/*-------------------------------------------------------------------------------------------------*/
$(document).keydown(function (e) {
	// Check if Ctrl + Shift + Z is pressed
	if (e.ctrlKey && e.shiftKey && e.key === "Z") {
		// Refresh the page
		location.reload(true);
	}
});


// scroll element to top of the page
/*-------------------------------------------------------------------------------------------------*/
function st(element) {
	$(element).animate({ scrollTop: 0 }, 'slow');
}


// Show or hide the scroll-to-top button based on scroll position
/*-------------------------------------------------------------------------------------------------*/
$(window).on("scroll", function () {
	if ($(this).scrollTop() > 100) { // Adjust the scroll distance as needed
		$("#toTop").fadeIn();
	} else {
		$("#toTop").fadeOut();
	}
});


// SCROLL HTML, FULL MODAL WRAPPERS AND OTHER OVERLAYS
/*-------------------------------------------------------------------------------------------------*/
$(document).on("scroll", ".full-modal-wrapper, #searchResultDetails, #searchResults, .tab-content", function () {
	if ($(this).scrollTop() > 400) { // Adjust the scroll distance as needed
		$("#toTop").fadeIn();
		$("#floatNav").addClass("floatNav");
	} else {
		$("#toTop").stop().fadeOut();
		$("#floatNav").removeClass("floatNav");
	}
});


// scroll search input box
/*-------------------------------------------------------------------------------------------------*/
$(document).on("scroll", "search", function () {
	if ($(this).scrollTop() > 100) { // Adjust the scroll distance as needed
		$(this).addClass("sticky");
	} else {
		$(this).removeClass("sticky");
	}
});


// toggle button
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".tb", function () {
	$(this).toggleClass("on");
});