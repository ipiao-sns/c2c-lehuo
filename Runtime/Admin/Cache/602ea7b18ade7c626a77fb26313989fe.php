<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
<style type="text/css">
#batch_result{ color:#f30; padding-left:20px;}
</style>
<script type="text/javascript">
function batch(id){
	if(id){
		$.ajax({
			  url: APP+'/Goods/doBatch/id/'+id,
			  cache: false,
			  success:function(data)
			  {
			  	$("#batch_result").append(data.html);
			  	if(data.id!=0)
			  	{
					batch(data.id);
				}	
			  	else
			  	{
			  		$("#batch_result").append("end");
				}			
			  },
			  dataType: "json"
			});	
	}else{
		$("#batch_result").html("");
		$.ajax({
			  url: APP+'/Goods/doBatch/',
			  cache: false,
			  success:function(data)
			  { 
			  	$("#batch_result").append(data.html);
			  	if(data.id!=0)
			  	{
					batch(data.id);
				}	
			  	else
			  	{
			  		$("#batch_result").append("end");
				}				
			  },
			  dataType: "json"
			});	
	}
}
</script>
<div style="background: #D2DBEA; border-top:1px solid #B8D0D6; padding: 5px 8px;">
<div class="button"><div class="buttonContent"><button onclick="batch()">开始批量生成</button></div></div>
<div style="clear:both;"></div>
</div>
<div style="padding-left:20px; background:#fff; line-height:30px;">地图批量生成时请勿刷当前页</div>
<div id="batch_result" style="background:#fff; border-bottom:1px solid #B8D0D6; padding-bottom:5px;"></div>
</div>