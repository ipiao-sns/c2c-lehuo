<?php if (!defined('THINK_PATH')) exit();?><script>
$(function(){
	$("#__MODULE__Tree li a").contextMenu('__MODULE__TreeCM', {

	      bindings:{

	    	  	indexData:function(t){
	    	  		var cid = t.attr('cid');
	            	var url = APP+'/Goods/index/cid/'+cid;
	            	var tabid = 'Goods';
					navTab.openTab(tabid, url, { title:"商品管理", fresh:false, data:{}});
	                  // TODO
	            },
	            addList:function(t){
	            	var cid = t.attr('cid');
	            	var url = APP+'/Goods/add/cid/'+cid;
	            	var dlgId = 'Goods_add';
					$.pdialog.open(url,dlgId,'添加',{height: 300,width: 580,close:function(){
						var urls = APP+'/__MODULE__/tree';
						var dlgId = '__MODULE___tree';
						$.pdialog.open(urls,dlgId);
						return true;}});
	            },
	            
	            deleteList:function(t){
	            	var cid = t.attr('cid');
					var url = APP+'/Goods/clearList/cid/'+cid;
					var title='确定要清空吗？';
					alertMsg.confirm(title, {
	                        okCall: function(){
	                              ajaxTodo(url,function(data){
	                            	  if(data.status == 1){
		                            	  var url = APP+'/Goods/index/cid/'+cid;
		              	            	  var tabid = 'Goods';
		              					  navTab.reloadFlag(tabid);
	                            	  }else{
	                            		  alertMsg.error(data.info);
	                            	  }
	                              });
	                        }
	               });
	            },

	            addData:function(t){
	            	var cid = t.attr('cid');
	            	var url = APP+'/__MODULE__/add/id/'+cid;
	            	var dlgId = '__MODULE___add';
					$.pdialog.open(url,dlgId,'添加',{height: 300,width: 580,close:function(data){
							var urls = APP+'/__MODULE__/tree';
							var tree_dlgId = '__MODULE___tree';
							$.pdialog.open(urls,tree_dlgId);
							return true;}});
	                  // TODO
	            },
	            editData:function(t){
					var cid = t.attr('cid');
					var url = APP+'/__MODULE__/edit/id/'+cid;
					var dlgId = '__MODULE___edit';
					$.pdialog.open(url,dlgId,'编辑',{height: 300,width: 580,close:function(){
							var urls = APP+'/__MODULE__/tree';
							var tree_dlgId = '__MODULE___tree';
							$.pdialog.open(urls,tree_dlgId);
							return true;}});
	                  // TODO
	            },
	            deleteData:function(t){
	            	var cid = t.attr('cid');
					var url = APP+'/__MODULE__/foreverdelete/id/'+cid;
					var title=' 确定要删除吗？';
					alertMsg.confirm(title, {
	                        okCall: function(){
	                              ajaxTodo(url,function(data){
	  	                        	 if(data.status == 1){
	  	                        		  var url = APP+'/__MODULE__/tree';
			          					  var dlgId = '__MODULE___tree';
			          					  $.pdialog.reload(url,'',dlgId);
	  	                        	 }else{
	  	                        		alertMsg.error(data.info);
	  	                        	 }
	                              });
	                        }
	               });


	                // TODO

	            }

	      },

	      ctrSub:function(t,m){
				$('#__MODULE__Tree div[class="selected"]').removeClass('selected');
	            t.parent().addClass('selected');
	      }

	});
})
</script>
<div style="float:left; display:block; overflow:auto; width:100%; border:solid 1px #CCC; line-height:21px; background:#fff">
    <ul class="tree" id="__MODULE__Tree">
    <li><a href="javascript:;" cid="0">无</a>
    <ul>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php $before = intval($data[$key-1]['level']);
			if($vo['level'] > $before){
				echo '<ul>';
			} ?>
		<li><a href="javascript:;" cid="<?php echo ($vo['id']); ?>"><?php echo ($vo["name"]); ?></a>
			<?php $after = intval($data[$key+1]['level']);
			if($vo['level'] > $after){
				$n = $vo['level'] - $after;
				for($i=0;$i<$n;$i++){
					echo '</li>';
				}
				echo '</ul>';
			} ?><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	</li>
     </ul>
</div>