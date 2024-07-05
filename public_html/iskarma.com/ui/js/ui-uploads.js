// open upload dialog for selected input
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".ig .change", function () {
	var target = $(this).parent().parent().siblings("input");
	target.trigger("click");
});

// fullview thumbnail images
// load image fullview in overload content
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", "img.preview", function () {
	var image = $(this).clone();
	$("overload .content").empty().html(image);
	$("overload").fadeIn();
});

$(document).on("click", "img.pdfview", function () {
	var iframe = $(this).next().clone();
	$("overload .content").empty().html(iframe);
	$("overload").fadeIn();
});
/*-------------------------------------------------------------------------------------------------*/



// delete image preview and database blob entry
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".ig .delete", function () {
	var parent = $(this).parent().parent().parent();
	var name = parent.attr("id");
	var api = parent.attr("api");
	var img = $("#" + name + " img");
	var src = img.attr("altsrc");
	img.attr("src", src);
	var requestData = {
		'api': api,
		'action': "delete-image",
		'name': name
	}
	show("#processing");
	processRequest(api, requestData, successCallback, errorCallback);
});


// on upload file
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".uploader", function () {
	$(this).prev().trigger("click");
});


// on upload file
/*-------------------------------------------------------------------------------------------------*/
$(document).on("change", ".file-upload", function () {
	var p = $(this).parent();
	var allowed = p.attr("allowed");
	var api = p.attr("api");
	var name = p.attr("id"); // id of the parent container of the upload input
	var file = this.files[0]; // uploaded file
	var reader = new FileReader();
	reader.onload = function (event) {
		var data = event.target.result.split(",")[1];
		// check file size
		if (file.size > 3 * 1024 * 1024) {
			report("e", "The selected file exceeds the maximum allowed filesize limit of 3MB!");
			return;
		}
		var mime = file.type;
		//alert(name);
		if (mime) {
			if (mime.includes("image")) {
				// load image preview
				switch (name) {
					case "id-image":
						$(".identity .doc.img").show().siblings().hide();
						$("#id-status li").each(function () {
							if ($(this).attr("status") == "4") {
								$(this).addClass("active");
								var info = $(this).attr("info");
								$("#id-status-msg").text(info);
						} else {
								$(this).removeClass("active");
							}
						});
						break;
					case "ap-image":
						$(".address-proof .doc.img").show().siblings().hide();
						$("#ap-status li").each(function () {
							if ($(this).attr("status") == "4") {
								$(this).addClass("active");
								var info = $(this).attr("info");
								$("#ap-status-msg").text(info);
							} else {
								$(this).removeClass("active");
							}
						});
						break;
					case "cert-image":
						$(".certificate .doc.img").show().siblings().hide();
						$("#cert-status li").each(function () {
							if ($(this).attr("status") == "4") {
								$(this).addClass("active");
								var info = $(this).attr("info");
								$("#cert-status-msg").text(info);
							} else {
								$(this).removeClass("active");
							}
						})
						break;
					default:
						break;
				}
				$("#" + name + "-img").attr("src", "data:" + mime + ";base64," + data);
			} else if (mime.includes("pdf")) {
				if (allowed === "image") {
					report("e", "Invalid file type. Please select a valid image file type. Allowed types are jpg, jpeg, png, and gif");
					return false;
				} else if (allowed === "document") {
					switch (name) {
						case "id-image":
							$(".identity .doc.pdf").show().siblings().hide();
							$("#id-status li").each(function () {
								if ($(this).attr("status") == "4") {
									$(this).addClass("active");
									var info = $(this).attr("info");
									$("id-status-msg").text(info);
								} else {
									$(this).removeClass("active");
								}
							});
							break;
						case "ap-image":
							$(".address-proof .doc.pdf").show().siblings().hide();
							$("#ap-status li").each(function () {
								if ($(this).attr("status") == "4") {
									$(this).addClass("active");
									var info = $(this).attr("info");
									$("ap-status-msg").text(info);
								} else {
									$(this).removeClass("active");
								}
							});
							break;
						case "cert-image":
							$(".certificate .doc.pdf").show().siblings().hide();
							$("#cert-status li").each(function () {
								if ($(this).attr("status") == "4") {
									$(this).addClass("active");
									var info = $(this).attr("info");
									$("#cert-status-msg").text(info);
								} else {
									$(this).removeClass("active");
								}
							});
							break;
						default:
							break;
					}
					$("#" + name + "-pdf").attr("src", "data:" + mime + ";base64," + data);
				}
			}
		} else {
			report("e", "Invalid file type. Please select a valid file type!");
			return false;
		}
		show("#processing");
		// Update avatar
		var requestData = {
			api: api,
			action: "upload-file",
			name: name,
			mime: mime,
			data: data
		};
		// Send an AJAX request to store onboarding step 2 information
		processRequest(api, requestData, successCallback, errorCallback);
		// load overlay and image editing
		//editImage(file_name);
	};
	reader.readAsDataURL(file);
});