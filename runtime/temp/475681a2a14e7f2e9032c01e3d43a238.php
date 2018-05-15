<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp64\www\think\public/../application/pyadminurl\view\nav\save.html";i:1526385177;}*/ ?>
<style type="text/css">
	label.control-label {
		width: 80px;
	}
    .bjui-pageFooter > ul > li{ display: inline-block;float:none;text-align:center}
    .bjui-pageFooter > ul{ text-align: center }
</style>

<div class="bjui-pageContent">
	<form action="<?php echo url('Nav/save'); ?>" method="post" data-toggle="ajaxform"  >
        <input type = "hidden" name = 'nav_id'  value="<?php echo $data['nav_id']; ?>"/>
		<table class="table-bordered table-condensed table-hover" width="100%">
			<tbody>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								菜单名称：
							</label>
						<input type="text" name="nav_name"  value="<?php echo $data['nav_name']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								菜单链接：
							</label>
						<input type="text" name="nav_alias" value="<?php echo $data['nav_url']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
							菜单别名：
						</label>
						<input type="text" name="nav_alias" value="<?php echo $data['nav_alias']; ?>">
					</td>
				</tr>
				<!-- <tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								菜单图标：
							</label>
						<input type="text" name="ico"  value="<?php echo $data['ico']; ?>"><a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">图标参照</a>
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