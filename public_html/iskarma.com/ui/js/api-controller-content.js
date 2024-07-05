// load content categories
function loadContentCategories(obj) {
	var f = obj['content-categories'];
	$(".tab-content").load("iskarma.com/sections/content/views/categories.php", function () {
		hide("#processing");

	});
}

// load content menus
function loadContentMenus(obj) {
	var f = obj['content-menus'];
	$(".tab-content").load("iskarma.com/sections/content/views/menus.php", function () {
		hide("#processing");

	});
}

// load content categories
function loadContentPages(obj) {
	var f = obj['content-pages'];
	$(".tab-content").load("iskarma.com/sections/content/views/pages.php", function () {
		hide("#processing");

	});
}
