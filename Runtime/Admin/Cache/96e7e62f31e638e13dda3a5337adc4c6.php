<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	
	<form method="post" action="__URL__/checkLogin/" class="pageForm" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>帐号：</label>
				<input type="text" name="account" size="20" class="required" />
			</div>
			<div class="unit">
				<label>密码：</label>
				<input type="password" name="password" size="20" class="required" />
			</div>
			<div class="unit">
				<label>验证码：</label>
				<input class="code" name="verify" type="text" size="5" />
				<span><img id="verifyImg" SRC="__URL__/verify/" onClick="fleshVerify()" border="0" alt="点击刷新验证码" style="cursor: pointer; margin-left: 15px; margin-top: -1px;" align="absmiddle"></span>
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>