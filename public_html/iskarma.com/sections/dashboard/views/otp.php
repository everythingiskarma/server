<div id="logo">
	<a class="icon-iskarma" href="#welcome" location="iskarma.com/content/articles" title="Welcome to isKarma Inc">
		<span class="path1"></span>
		<span class="path2"></span>
		<span class="path3"></span>
		<span class="path4"></span>
	</a>
</div>

<center class="p20">
	<h3 class="m20">One Time Password</h3>
	<div class="ii icon-key m20">
		<label>otp</label>
		<input id="otp" type="password" maxlength="6" placeholder="Enter 6 digit OTP" autofocus autocomplete="off">
	</div>
	<x></x>
	<div id="confirm" class="ib space icon-right hide m20" otpid="" otptype="" uid="" tabindex="0">
		Confirm OTP
	</div>
	<x></x>
	<div id="cancel" class="ib space icon-right m20" tabindex="0">
		Cancel
	</div>

	<messages></messages>
	<div class="bbx" id="resendTimer"></div>
</center>