<div class="actionbar">
	<ul>
		<li id="add-category" class="space icon-square-edit" tabindex="0">New
	</ul>
</div>

<ul class="category-list">

</ul>

<ul class="hide">
	<li class="cat preload ii sub icon-apps" style="width: 100%; margin-bottom:10px">
		<div class="title">
			<input type="text" class="name" tabindex="0" placeholder="Enter category name" style="display: inline-block">
			<div style="display:block; position:absolute; top:0; right:10px">
				<div class="lex icon-dots-v" style="display: inline-block;"></div>
				<div class="status" style="display: inline-block;">
					<div class="tlist" style="text-align: center; padding:0">
						<div class="tb space" tabindex="0"></div>
					</div>
				</div>
			</div>
		</div>
		<div style="display: grid; grid-template-columns:256px calc(50% - 143px) calc(50% - 143px); grid-column-gap:10px; height:0px; overflow:hidden">

			<div class="image">
				<input type="file" class="file-upload">
				<img class="preview" src="iskarma.com/images/categories.png">
				<div class="ig">
					<ul class="bs alt">
						<li class="space change">Change
							<!--<li class="space edit">Edit-->
						<li class="space icon-trashcan icon delete">
					</ul>
				</div>
			</div>
			<div class="ii sub mv20">
				<label>Meta Keywords</label>
				<textarea class="keywords" placeholder="Enter meta keywords for the category" style="height:180px"></textarea>
			</div>
			<div class="ii sub mv20">
				<label>Meta Description</label>
				<textarea class="description" placeholder="Enter meta description for the category" style="height:180px"></textarea>
			</div>
		</div>
	</li>
</ul>

<div class="category-box ig p20 preload" cat-id="0">
	<div class="title">Create New Category</div>
	<div class="g32">
		<div>
			<div class="ii mv20 icon-offer">
				<label>Category Name</label>
				<input id="cat-name" type="text" placeholder="Enter the category name here" tabindex="0">
			</div>
			<br>
			<div class="ii icon-th-list mv20">
				<label>
					Parent Category
					<tip>Select a parent category if you are creating a new sub-category of an already existing category. You may create as many levels of sub-categories as you need to organize your products. We recommended upto two levels of sub-categories for a better user experience and ease of navigation. </tip>
				</label>
				<select id="cat-parent" tabindex="0" parent="0">
					<option id="0" p="0">Select Parent Category</option>
				</select>
			</div>
		</div>
		<div>
			<div class="ii sub mt20" style="display: block;">
				<label>
					meta keywords
					<tip>Enter keywords relevant to this category. This will help users and search engines find sub-categories and related products when they enter these keywords. Eg. organic seeds, organic seedlings, eco-friendly planters, seedling trays, etc.</tip>

				</label>
				<textarea id="cat-keywords" style="width:calc(100% - 20px)" rows="4" placeholder="Enter keywords here" tabindex="0" autofocus></textarea>
			</div>
		</div>
		<div>
			<div class="ii sub mv20" style="display: block;">
				<label>
					meta description
					<tip>Enter a brief category description here. Eg. Home farming startup kit that will help you build an indoor garden where you can grow your own plants, flowers, fruits and vegetables.</tip>

				</label>
				<textarea id="cat-description" style="width:calc(100% - 20px)" rows="4" placeholder="Enter description here" tabindex="0" autofocus></textarea>
			</div>
		</div>

	</div>
	<hr>

	<center>
		<ul class="tlist" style="text-align: center;">
			Disabled
			<div id="cat-status" class="tb space" tabindex="0"></div>
			Enabled
		</ul>
	</center>
	<hr>

	<center>
		<div id="new-category" class="ib itxt icon-done-all m20 space" tabindex="0">Save Category</div>
	</center>

</div>

<div id="noc" class="hide">
	<h1>No categories created yet!</h1>
</div>