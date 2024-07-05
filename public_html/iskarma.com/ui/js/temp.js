
function editImage(name, api) {
	$("overload").fadeIn();
	var img = $(".editing img");
	var src = img.attr("src");
	var w = img.attr("w");
	var h = img.attr("h");
	// load overlay and image editing
	$("overload .content").load("iskarma.com/sections/header/views/images.php", function () {

		$(".save").attr({ "api": api, "name": name });
		// Update base64 data


		var canvas = document.getElementById("canvas");
		var ctx = canvas.getContext("2d");
		var image = document.getElementById("canvasImage");

		image.src = src;

		image.onload = function () {
			if (image.width > w) {
				maxW = 800; // set this to max 400px
				var scale = maxW / image.width;
				image.width = maxW;
				image.height *= scale; // set this proportional to the width
			}
			canvas.width = image.width;
			canvas.height = image.height;
			ctx.drawImage(image, 0, 0, image.width, image.height);
		}

	});
}

// rotate image 
/*-------------------------------------------------------------------------------------------------*/
var angleInDegrees = 0; // Initialize the angle outside the click event handler

$(document).on("click", ".controls .rotate", function () {
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var image = document.getElementById("canvasImage");

	// Increment or decrement angle based on rotation direction
	angleInDegrees += ($(this).hasClass("cw") ? 90 : -90);

	drawRotated(angleInDegrees);

	function drawRotated(degrees) {
		// Clear the canvas before drawing
		ctx.clearRect(0, 0, canvas.width, canvas.height);

		// Calculate the dimensions of the canvas based on the rotated image
		var radians = degrees * Math.PI / 180;
		var cos = Math.abs(Math.cos(radians));
		var sin = Math.abs(Math.sin(radians));
		var width = image.width * cos + image.height * sin;
		var height = image.width * sin + image.height * cos;

		// Set canvas dimensions to fit the rotated image
		canvas.width = width;
		canvas.height = height;

		// Save the current transformation matrix
		ctx.save();

		// Move registration point to the center of the canvas
		ctx.translate(width / 2, height / 2);

		// Rotate the canvas around the center
		ctx.rotate(radians);

		// Draw the image
		ctx.drawImage(image, -image.width / 2, -image.height / 2, image.width, image.height);

		// Restore the transformation matrix
		ctx.restore();

		//angleInDegrees %= 360; // Normalize angle to be within 0 to 360 degrees
		angleInDegrees %= 360; // Normalize angle to be within 0 to 360 degrees

		// Convert canvas to data URL and set as image source
		var src = canvas.toDataURL("image/png");
		//image.src = src;
	}
});



// save edited image 
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".controls .save", function () {
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var image = document.getElementById("canvasImage");

	canvas.width = image.width;
	canvas.height = image.height;

	ctx.drawImage(image, 0, 0);

	// get edited base64 image data
	var src = canvas.toDataURL("image/png");

	// get api
	var api = $(this).attr("api");
	// get image name
	var file_name = $(this).attr("name");
	// Extract base64-encoded image data
	var file_data = src.split(',')[1];
	// Extract the MIME type
	var file_mime = "image/png";

	// Update avatar
	var requestData = {
		api: api,
		action: "upload-file",
		name: file_name,
		mime: file_mime,
		data: file_data
	};

	// Send an AJAX request to store onboarding step 2 information
	processRequest(api, requestData, successCallback, errorCallback);

	// update the preview
	$("#" + file_name + " img").attr("src", src);
	// close the editor
	$(".x-overload").trigger("click");

});



// open upload dialog editing uploaded image
/*-------------------------------------------------------------------------------------------------*/
$(document).on("click", ".ig .edit", function () {
	$(this).parent().parent().parent().addClass("editing");
	var name = $(".editing").attr("id");
	var api = $(".editing").attr("api");
	var img = $(".editing img");
	if (img.attr("src") === "" || !img.attr("src")) {
		$(".editing .upload-file").trigger("click");
		return;
	}
	editImage(name, api, img);
});

