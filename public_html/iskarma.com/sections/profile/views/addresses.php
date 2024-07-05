<div class="actionbar">
	<ul>
		<li id="add-address" class="space icon-address-add" tabindex="0">New
	</ul>
</div>

<ul class="address-list g32">

	<li class="address ig p20 preload" add_id="">

		<div class="title"><input class="add-label" placeholder="enter a nickname" tabindex="0"></div>

		<center>
			<div class="ii" style="width: auto;">
				<ul class="bs select add-type">
					<li class="space" type="1" tabindex="0">Home
					<li class="space" type="2" tabindex="0">Office
					<li class="space" type="3" tabindex="0">Other
				</ul>
			</div>
		</center>
		<br>
		<textarea class="add-address" style="width:100%" rows="3" placeholder="enter your street address and landmark" tabindex="0"></textarea>

		<div class="">
			<input class="add-city" placeholder="enter name of your city" tabindex="0">
			<input class="add-state" placeholder="enter name of your state" tabindex="0">
			<input class="add-country" placeholder="enter name of your country" tabindex="0">
			<input class="add-zip" placeholder="enter your area zip code" tabindex="0">
		</div>

		<hr>

		<center class="mt20">
			<div class="icon bs ii" style="width: auto;">
				<ul>
					<li class="space update-address" title="update address" tabindex="0">UPDATE
					<li class="space delete-address icon-trashcan icon" title="delete address" tabindex="0">
					<li class="space add-priority icon-location icon" title="set as primary address" tabindex="0">
				</ul>
			</div>
		</center>
	</li>

</ul>

<div class="address-box ig p20 preload" add_id="0">
	<div class="title">Create New Address</div>

	<div class="icon bs select center ii m20">
		<label>Address Type</label>
		<ul id="address-type">
			<li class="space itxt icon-home" type="1" tabindex="0">Home
			<li class="space itxt icon-office" type="2" tabindex="0">Office
			<li class="space itxt icon-business-add" type="3" tabindex="0">Other
		</ul>
	</div>

	<br>
	<div class="ii icon-offer mv20">
		<label>label</label>
		<input id="label" type="text" placeholder="Nickname for your address" tabindex="0" autofocus>
	</div>
	<div class="g32 mv20">

		<div>
			<div class="ii sub mt20" style="display: block;">
				<label>street address</label>
				<textarea id="address" style="width:100%" rows="4" placeholder="Enter your house/apartment/office number, street and landmark here" tabindex="0" autofocus></textarea>
			</div>
		</div>

		<div>
			<div class="ii icon-address-add mv20">
				<label>city</label>
				<input id="city" type="text" placeholder="Enter your city here" tabindex="0">
			</div>
			<div class="ii icon-address-add mv20">
				<label>state</label>
				<input id="state" type="text" placeholder="Enter your state here" tabindex="0">
			</div>
		</div>

		<div>
			<div class="ii icon-address-add mv20">
				<label>country</label>
				<input id="country" type="text" placeholder="Enter your country here" tabindex="0">
			</div>
			<div class="ii icon-network mv20">
				<label>zip code</label>
				<input id="zip" type="text" placeholder="Enter your area zip code here" tabindex="0">
			</div>
		</div>
	</div>

	<hr>

	<center>
		<div id="new-address" class="ib itxt icon-done-all m20 space" tabindex="0">Save Address</div>
	</center>

</div>