<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\think\public/../application/pyadminurl\view\nav\index.html";i:1526385045;}*/ ?>
<style type="text/css">
   .tableContent form table  thead tr th{background:#1078C1;color:#fff;}
   .bjui-pageHeader {padding:0px 5px;}
</style>

<!--排序请求链接-->
<!-- <div class="bjui-pageHeader">
	<form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo url('Nav/index'); ?>" method="get">
	</form>
	
</div> -->

<div class="bjui-pageContent tableContent">
	<form name="sortform" data-toggle="ajaxform" action="<?php echo url('Nav/sort'); ?>" method="post">
		<table data-toggle="tablefixed" data-width="100%" data-nowrap="true">
			<thead>
				<tr style="height: 36px; line-height: 36px;">
					<th >ID</th>
					<th data-order-field="sort" width="50">排序</th>
					<th >菜单名称</th>
					<th >菜单链接</th>
					<th >菜单别名</th>
					<th >操作
                    &nbsp;&nbsp;&nbsp;&nbsp;<a  href="<?php echo url('Nav/add'); ?>" 
					data-toggle="dialog" class="btn btn-green"
					data-id="Nav_add" data-mask="true"
					data-reload="true" data-width="400"
					data-height="220" 
                    data-on-close="refresh">添加菜单</a>
                    </th>
				</tr>
			</thead>
			<tbody>

				<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $k=>$v): ?>
				<tr data-id="<?php echo $k; ?>">
					<td><?php echo $v['nav_id']; ?></td>
					<td>
						<input type="text" class="ids" name="sort[<?php echo $v['nav_id']; ?>]" value="<?php echo $v['nav_order']; ?>" style="width:100%" />
					</td>
					<td><?php echo $v['nav_name']; ?></td>
				    <td><?php echo $v['nav_url']; ?></td>
		            <td><?php echo $v['nav_alias']; ?></td>
					<td>
						<!-- <a href="<?php echo url('Nav/add', ['id' => $v['nav_id']]); ?>" class="btn btn-orange" 
						data-toggle="dialog"
						data-id="Nav_add" data-mask="true"
						data-reload="true" data-width="400"
						data-height="220" 
	                    data-on-close="refresh">添加子菜单
	                    </a> -->

					   <a href="<?php echo url('Nav/save',['id' => $v['nav_id']]); ?>" class="btn btn-green" 
						data-toggle="dialog"
						data-id="Nav_save" data-mask="true"
						data-reload="true" data-width="400"
						data-height="220" 
	                    data-on-close="refresh">修改
	                   </a>


						<a href="<?php echo url('Nav/delete', ['id' => $v['nav_id']]); ?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="子导航也会永久删除，确定要删除吗？">删除</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</form>
</div>

<div class="bjui-pageFooter">
	<button type="submit" class="btn-blue" data-icon="refresh" style="float:left">
		更新排序
	</button>
</div>