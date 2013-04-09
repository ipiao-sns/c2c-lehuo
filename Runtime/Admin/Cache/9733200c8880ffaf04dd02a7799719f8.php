<?php if (!defined('THINK_PATH')) exit();?>
<script language="JavaScript">
<!--
function checkName(){
	ThinkAjax.send('__URL__/checkAccount/','ajax=1&account='+$F('account'));
}
//-->
</script>


<div class="pageContent">
	
	<form method="post" action="__URL__/insert/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">

			<div class="unit">
				<label>用户名：</label>
				<input type="text" class="required alphanumeric" size="30" maxlength="20" name="account" value="<?php echo ($vo["account"]); ?>" />
			</div>
			<div class="unit">
				<label>密码：</label>
				<input type="text" name="password" size="30" maxlength="20" class="required alphanumeric"/>
			</div>
			<div class="unit">
				<label>邮箱：</label>
				<input type="text" name="email" size="30" maxlength="100" class="required email"/>
			</div>
			<div class="unit">
				<label>状态：</label>
				<select name="status" class="combox">
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</select>
			</div>
			
			<div class="unit">
				<label>备注：</label>
				<textarea name="remark" rows="3" cols="57"></textarea>
			</div>
			
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>