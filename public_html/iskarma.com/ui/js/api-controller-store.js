// load store overview
function loadStoreOverview(obj) {
	var f = obj.store;
	$(".tab-content").load("iskarma.com/sections/store/views/store.php", function () {
		hide("#processing");

	});
}

// load store orders
function loadStoreOrders(obj) {
	var f = obj['store-orders'];
	$(".tab-content").load("iskarma.com/sections/store/views/orders.php", function () {
		hide("#processing");

	});
}

// load store returns
function loadStoreReturns(obj) {
	var f = obj['store-returns'];
	$(".tab-content").load("iskarma.com/sections/store/views/returns.php", function () {
		hide("#processing");

	});
}

// load store products
function loadStoreProducts(obj) {
	var f = obj['store-products'];
	$(".tab-content").load("iskarma.com/sections/store/views/products.php", function () {
		hide("#processing");

	});
}

// load store categories
function loadStoreCategories(obj) {
	$(".tab-content").load("iskarma.com/sections/store/views/categories.php", function () {

		var categories = obj['store-categories'];
		if (Array.isArray(categories) && categories.length === 0) {

			show("#noc");

		} else {

			$.each(categories, function (index, cats) {
				var id = cats.id;
				var parent = cats.parent;
				var name = cats.name;
				var image = cats.image;
				var status = cats.status;
				var keywords = cats.keywords;
				var description = cats.description;

				var item = $("li.cat.preload").clone();
				item.attr({ "cat_id": id, "status": status });

				if (name !== null) {
					item.find(".name").val(name);
				}

				if (status !== null && status == "1") {
					item.find(".status .tb").addClass("on");
				}

				if (keywords !== null) {
					item.find(".keywords").val(keywords);
				}

				if (description !== null) {
					item.find(".description").val(description);
				}

				item.removeClass("preload");
				$(".category-list").append(item);

			});

		}

		hide("#processing");

	});

}

// add category
$(document).on("click", "#add-category", function () {
	$("overload .content").empty();
	var form = $(".category-box").clone();
	$("overload .content").append(form);
	$("overload #update-category").attr("action", "add");
	$("overload").fadeIn();
});

// select parent category
$(document).on("change", "#cat-parent", function () {
	var parent = $(this).find("option:selected").attr("p");
	$(this).attr("parent", parent);
});

$(document).on("blur", "#cat-name", function () {
	//alert($(this).val());
});

// create new category
$(document).on("click", "#new-category", function () {

	var name = $("overload #cat-name").val();
	var parent = $("overload #cat-parent").attr("parent");
	var keywords = $("overload #cat-keywords").val();
	var description = $("overload #cat-description").val();

	if ($("overload #cat-status").hasClass("on")) {
		var status = "1";
	} else {
		var status = "2";
	}

	if (name.length < 3) {
		report("e", "Please enter a name for the category");
		return;
	}

	var requestData = {
		api: "store",
		action: "update-category",
		add_action: "add",
		name: name,
		parent: parent,
		keywords: keywords,
		description: description,
		status: status
	}

	show("#processing");

	// send ajax request to add new category
	processRequest("store", requestData, successCallback, errorCallback);

	// close overload
	$(".x-overload").trigger("click");

});

// load store attributes
function loadStoreAttributes(obj) {
	var f = obj['store-attributes'];
	$(".tab-content").load("iskarma.com/sections/store/views/attributes.php", function () {
		hide("#processing");

	});
}

// load store shipping
function loadStoreShipping(obj) {
	var f = obj['store-shipping'];
	$(".tab-content").load("iskarma.com/sections/store/views/shipping.php", function () {
		hide("#processing");

	});
}

// load store payments
function loadStorePayments(obj) {
	var f = obj['store-payments'];
	$(".tab-content").load("iskarma.com/sections/store/views/payments.php", function () {
		hide("#processing");

	});
}

// load store reviews
function loadStoreReviews(obj) {
	var f = obj['store-reviews'];
	$(".tab-content").load("iskarma.com/sections/store/views/reviews.php", function () {
		hide("#processing");

	});
}

// load store statistics
function loadStoreStatistics(obj) {
	var f = obj['store-statistics'];
	$(".tab-content").load("iskarma.com/sections/store/views/statistics.php", function () {
		hide("#processing");

	});
}

// load store settings
function loadStoreSettings(obj) {
	var f = obj['store-settings'];
	$(".tab-content").load("iskarma.com/sections/store/views/settings.php", function () {

		hide("#processing");
	});
}