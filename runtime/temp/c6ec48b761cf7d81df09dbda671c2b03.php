<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wamp64\www\think\public/../application/pyadminurl\view\nav\add.html";i:1526385117;}*/ ?>
<style type="text/css">
	label.control-label {
		width: 80px;
	}
    .bjui-pageFooter > ul > li{ display: inline-block;float:none;text-align:center}
    .bjui-pageFooter > ul{ text-align: center }
</style>

<div class="bjui-pageContent">
	<form action="<?php echo url('Nav/add'); ?>" method="post" data-toggle="ajaxform" >
        
        <input type = "hidden" name = 'pid'  value="<?php echo \think\Request::instance()->param('id'); ?>"/>
		<table class="table-bordered table-condensed table-hover" width="100%">
			<tbody>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								菜单名称：
							</label>
						<input type="text" name="nav_name"  value="">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								菜单链接：
							</label>
						<input type="text" name="nav_url"  value="">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
							菜单别名：
						</label>
						<input type="text" name="nav_alias" value="">
					</td>
				</tr>
				<!-- <tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								菜单图标：
							</label>
							
						<input type="text" name="ico"  value=""><a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">图标参照</a>
					</td>
				</tr> -->


 
			</tbody>
		</table>
</div>
<div class="bjui-pageFooter">
	<ul>
		<li><button type="submit" class="but btn-blue" data-icon="save">保存</button></li>
		<li><button type="button" class="btn-close" data-icon="close">取消</button></li>
	</ul>
</div>
</form>