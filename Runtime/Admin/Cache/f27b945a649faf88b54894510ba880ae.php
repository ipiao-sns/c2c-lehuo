<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
<script src="__PUBLIC__/dwz/js/baidumap.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	try{
		initialize();
	}catch(e){

	}

	//setMapsCenter('<?php echo ($location); ?>');
	new AjaxUpload('#upload_button', {
	    action: APP+'/Xheditor/goodsImgLoad',
	    name: 'images',
	    onSubmit : function(file , ext){
	        if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
	            this.setData({
	            'ext': ext
	            });
	            this.disable();
	        } else {
	            return false;
	        }

	    },
	    onComplete : function(file,response){
	    	var data=eval("("+response+")");
	    	insertGoodsImg(data);
	        this.enable();
	    }
	});
	imgBoxdrag();

	$('input[name="payment"]').click(function(){
		var type = $('input[name="payment"]:checked').val();
		if(type == 0){
			$('#price').show();
			$('#deposit').hide();
		}else if(type == 1){
			$('#price').hide();
			$('#deposit').show();
		}
	});
});
function selectExpand_group(Id){
	var url = "__URL__/expand/id/"+ Id;
	$("#expandBox", $.pdialog.getCurrent()).loadUrl(url);
}
</script>
	<form method="post" action="__URL__/insert/navTabId/<?php echo (($_REQUEST["module"])?($_REQUEST["module"]):__MODULE__); ?>" class="pageForm required-validate" enctype="multipart/form-data" onsubmit="return iframeCallback(this, dialogAjaxDone)">
		<?php if(($_REQUEST["module"])  ==  "Release"): ?><input type="hidden" name="audit" value="1"><?php endif; ?>
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>商品标题：</label>
				<input type="text" class="required" name="title" style="width: 385px;" value="<?php echo ($releasedata["title"]); ?>">
			</div>

			<div class="unit">
				<label>商品简略标题：</label>
				<input type="text" class="required" name="short_title" maxlength="20" style="width: 385px;">
			</div>

            <div class="unit">
				<label>分类：</label>
				<SELECT name="cid" class="combox">
					<option value="">无</option>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php $n = (substr_count($vo['path'],',') - 1) * 24 + 3 ?>
						<option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"])  ==  $_REQUEST['cid']): ?>selected="selected"<?php else: ?><?php if(($releasedata["category"])  ==  $vo['id']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo str_pad('∟',$n,'&nbsp;',STR_PAD_LEFT);?><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>

			<div class="unit">
				<label>地区：</label>
				<SELECT name="rid" class="combox">
					<option value="">无</option>
					<?php if(is_array($region)): $i = 0; $__LIST__ = $region;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php $n = (substr_count($vo['path'],',') - 1) * 24 + 3 ?>
						<option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"])  ==  $_REQUEST['rid']): ?>selected="selected"<?php else: ?><?php if(($releasedata["region"])  ==  $vo['id']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo str_pad('∟',$n,'&nbsp;',STR_PAD_LEFT);?><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>
			<div class="unit">
				<label>发布商家：</label>
				<input type="hidden" name="promulgator" group="businesses" field="id" value="<?php echo ($releasedata["promulgator"]); ?>">
				<input name="businesses_name" type="text" readonly="readonly" group="businesses" field="name" value="<?php echo (getParent('Businesses',$releasedata["promulgator"])); ?>" />
				<a class="btnLook" href="<?php echo U('Businesses/lookUp/group/businesses/dialogId/'.MODULE_NAME.'_'.ACTION_NAME);?>" target="dialog" rel="businesses_lookup">查找带回</a>
			</div>
			<div class="unit">
				<label>排序：</label>
				<input type="text" class="digits textInput valid" name="sort">
			</div>

			<div class="unit">
				<label>数量：</label>
				<input type="text" class="digits textInput valid" name="num" value="<?php echo ($releasedata["num"]); ?>">
			</div>

			<div class="unit">
				<label>限购：</label>
				<input type="text" class="digits textInput valid" name="onenum">
				<span>(单用户购买数量)</span>
			</div>

			<div class="unit">
				<label>原价：</label>
				<input type="text" class="number textInput valid" name="original">
			</div>

			<?php if(C('sysconfig.distribution_goods_open') == 1): ?><div class="unit">
				<label>佣金类型：</label>
				<label class="radioButton"><input type="radio" name="commission_type" value="0" checked="checked" />固定</label>
				<label class="radioButton"><input type="radio" name="commission_type" value="1" />比例</label>
			</div>

			<div class="unit">
				<label>佣金：</label>
				<input type="text" class="number textInput valid" name="commission" value="0">
			</div><?php endif; ?>
			<div class="unit">
				<label>支付方式：</label>
				<label class="radioButton"><input type="radio" name="payment" value="0" checked="checked" />现价</label>
				<label class="radioButton"><input type="radio" name="payment" value="1" />定金</label>
			</div>

			<div class="unit">
				<label id="price">现价：</label>
				<label id="deposit" style="display: none;">定金：</label>
				<input type="text" class="number textInput valid" name="price" value="<?php echo ($releasedata["price"]); ?>">
			</div>

			<div class="unit">
				<label>结束时间：</label>
				<input type="text" name="finishtime" class="date" readonly="true" format="yyyy-MM-dd HH:mm:ss" value="<?php echo toDate(time());?>" />
				<a class="inputDateButton" href="javascript:;">选择</a>
			</div>

			<div class="unit">
				<label><?php echo C("sysconfig.site_couponname");?>前缀：</label>
				<input type="text" name="pre">
			</div>

            <div class="unit">
				<label><?php echo C("sysconfig.site_couponname");?>有效期：</label>
				<input type="text" name="starttime" class="date" readonly="true" value="<?php echo date('Y-m-d',time());?>" />
				<a class="inputDateButton" href="javascript:;">选择</a>
				<span style="float: left;" >&nbsp;～&nbsp;</span>
				<input type="text" name="endtime" class="date" readonly="true" value="<?php echo date('Y-m-d',time() + 86400*30);?>"/>
				<a class="inputDateButton" href="javascript:;">选择</a>
			</div>

   			<div class="unit">
				<label>SEO关键字：</label>
				<textarea rows="2" cols="60" name="keywords" class="textInput"></textarea>
			</div>

			<div class="unit">
				<label>SEO描述：</label>
				<textarea rows="2" cols="60" name="description" class="textInput"><?php echo ($releasedata["description"]); ?></textarea>
			</div>

			<div class="unit">
				<label>内容：</label>
				<textarea class="editor" name="detail" rows="15" cols="55" tools="mfull"
					upLinkUrl="<?php echo U('Xheditor/fileUpload');?>" upLinkExt="zip,rar,txt"
					upImgUrl="<?php echo U('Xheditor/upLoadImg');?>" upImgExt="jpg,jpeg,gif,png"
					upFlashUrl="<?php echo U('Xheditor/fileUpload');?>" upFlashExt="swf"
					upMediaUrl="<?php echo U('Xheditor/fileUpload');?>" upMediaExt="avi">
				</textarea>
			</div>

            <div class="unit">
				<label>电话：</label>
				<input type="text" class="required textInput" name="tel" id="tel" style="width:330px;" value="<?php echo ($releasedata["phone"]); ?>">
			</div>

            <div class="unit">
				<label>地址：</label>
				<input type="text" class="required textInput" name="address" id="address" style="width:330px;"><input type="button" value="标记" onClick="codeAddress()"><input onClick="showMarker();" type="button" value="显示标记"/>
			</div>

			<div class="unit">
				<label>地图：</label>
				<div id="map_canvas"></div>
			</div>

            <div class="unit">
                <label>地图属性：</label>
			      <div class="fl"><span>经度：</span><input name="longitude" type="text" id="longitude" value="" readonly="readonly" class="w70"/></div>
			      <div class="fl ml10"><span>纬度：</span><input name="latitude" type="text" id="latitude" value="" readonly="readonly" class="w70"/></div>
			      <div class="fl ml10"><span>缩放级别：</span><input name="zoom" type="text" id="zoom" value="" readonly="readonly" class="w70"/></div>
            </div>
			<div class="unit">
				<label>状态：</label>
				<SELECT name="status" class="combox">
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</SELECT>
			</div>

			<div class="unit">
				<label>图片：</label>
				<div style="float: left;">
				<div class="button" id="upload_button"><div class="buttonContent"><button type="button">上传</button></div></div>
				</div>
			</div>

			<div class="unit">
				<label>已上传图片：</label>
                <div style="width:475px; float:left">
				<ul id="imgBox">

				</ul>
                </div>
			</div>

            <!-- <div class="unit">
                <label>商品扩展:</label>
                <select name="egid" class="" onchange="selectExpand_group(this.value)">
                    <option value="0">请选择</option>
                    <?php if(is_array($expand_groupList)): $i = 0; $__LIST__ = $expand_groupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div id="expandBox"></div> -->

		</div>

		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>

</div>