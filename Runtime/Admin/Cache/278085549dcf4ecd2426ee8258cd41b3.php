<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>



<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="__URL__" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>导航名称：</label>
				<input type="text" name="title">
			</li>
            <li>
				<label>导航类型：</label>
				<select class="combox" name="type">
					<option value="">所有</option>
					<option value="1">主菜单</option>
					<option value="2">顶部菜单</option>
					<option value="3">底部菜单</option>
				</select>
			</li>
            <li>
				<label>是否新窗口：</label>
				<select class="combox" name="isblank">
					<option value="">所有</option>
					<option value="0">否</option>
					<option value="1">是</option>
				</select>
			</li>
            <li>
				<label>是否默认：</label>
				<select class="combox" name="isdefault">
					<option value="">所有</option>
					<option value="0">否</option>
					<option value="1">是</option>
				</select>
			</li>
            <li>
				<label>状态：</label>
				<SELECT class="combox" name="status">
					<option value="">所有</option>
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</SELECT>
			</li>
		</ul>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>

<div class="pageContent">
    <!--  功能操作区域  -->
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="__URL__/add" target="dialog" rel="__MODULE___add"><span>新增</span></a></li>
			<li><a class="delete" href="__URL__/foreverdelete/id/{sid_node}/navTabId/__MODULE__" target="ajaxTodo" calback="navTabAjaxMenu" title="你确定要删除吗？" warn="请选择"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/id/{sid_node}" target="dialog" rel="__MODULE___edit" warn="请选择"><span>修改</span></a></li>
		</ul>
	</div>
   <!-- 功能操作区域结束 -->
	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="60">编号</th>
			<th width="600" orderField="title" <?php if($_REQUEST["_order"] == 'title'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>名称</th>
			<th width="80">导航类型</th>
			<th width="80" orderField="sort" <?php if($_REQUEST["_order"] == 'sort'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>序号</th>
			<th width="80" orderField="isblank" <?php if($_REQUEST["_order"] == 'isblank'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>新窗口</th>
			<th width="80" orderField="isdefault" <?php if($_REQUEST["_order"] == 'isdefault'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>默认</th>
			<th width="80" orderField="status" <?php if($_REQUEST["_order"] == 'status'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>状态</th>
			<th width="80">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr target="sid_node" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($vo['id']); ?></td>
				<td><?php echo ($vo['title']); ?></td>
				<td><?php echo (getNavLocal($vo["type"])); ?></td>
				<td>
					<div class="jvf_fl"><?php echo ($vo['sort']); ?></div>
                	<div style=" height: 17px; padding: 2px 6px 0 0; float:right;">
                    	<a class="jvf_jia" href="__URL__/sortInc/id/<?php echo ($vo['id']); ?>"></a>
                        <a class="jvf_jian" href="__URL__/sortDec/id/<?php echo ($vo['id']); ?>"></a>
                    </div>
                    <div class="jvf_cl"></div>
				</td>
				<td><?php echo (getWhether($vo['isblank'])); ?></td>
				<td><?php echo (getWhether($vo['isdefault'])); ?></td>
				<td><?php echo (getStatus($vo['status'])); ?></td>
				<td><?php echo (showStatus($vo['status'],$vo['id'])); ?> <a href="__URL__/edit/id/<?php echo ($vo['id']); ?>" target="dialog" rel="__MODULE___edit">编辑</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>
</div>