<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp64\www\think\public/../application/pyadminurl\view\config\index.html";i:1526220243;}*/ ?>
<style type="text/css">
	label.control-label {
		width: 120px;
	}
    .bjui-pageFooter > ul > li{ display: inline-block;float:none;text-align:center}
    .bjui-pageFooter > ul{ text-align: center }
</style>

<div class="bjui-pageContent">
	<form action="<?php echo url('Config/switchs'); ?>" method="post" data-toggle="validate">
       
		<table class="table-bordered table-condensed table-hover" width="100%">
			<tbody>

				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								网站开关：
						</label>
				
							<input type="radio" name="web"    value='1' <?php if($data['web'] == '1'): ?> checked <?php endif; ?>	data-toggle="icheck" data-label="开">
			                <input type="radio" name="web"    value='0'	<?php if($data['web'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								登陆开关：
						</label>
				
						<input type="radio" name="login"   	value='1'	<?php if($data['login'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="login"  	value='0'	<?php if($data['login'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								注册开关：
						</label>
				
						<input type="radio" name="register"   	value='1'	<?php if($data['register'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="register"  	value='0'	 <?php if($data['register'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								充值开关：
						</label>
				
						<input type="radio" name="recharge"   	value='1'	<?php if($data['recharge'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="recharge"  	value='0'	 <?php if($data['recharge'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								提现开关：
						</label>
				
						<input type="radio" name="withdrawals"   	value='1'	 <?php if($data['withdrawals'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="withdrawals"  	value='0'	  <?php if($data['withdrawals'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
							自动提现开关：
						</label>

						<input type="radio" name="withdrawalsAuto"   	value='1'	 <?php if($data['withdrawalsAuto'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
						<input type="radio" name="withdrawalsAuto"  	value='0'	  <?php if($data['withdrawalsAuto'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								普通购买开关：
						</label>
				
						<input type="radio" name="buy"   	value='1'	<?php if($data['buy'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="buy"  	value='0'	<?php if($data['buy'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
<!-- 				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								UGT购买开关：
						</label>
				
						<input type="radio" name="ugtbuy"   	value='1'	<?php if($data['ugtbuy'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="ugtbuy"  	value='0'	<?php if($data['ugtbuy'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr> -->
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								纯净购买开关：
						</label>
				
						<input type="radio" name="purebuy"   	value='1'	<?php if($data['purebuy'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="purebuy"  	value='0'	<?php if($data['purebuy'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>

				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								存入开关：
						</label>
				
						<input type="radio" name="deposit"   	value='1'	<?php if($data['deposit'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="deposit"  	value='0'	<?php if($data['deposit'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>

				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								取出开关：
						</label>
				
						<input type="radio" name="take"   	value='1'	<?php if($data['take'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="take"  	value='0'	<?php if($data['take'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>
				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								租赁开关：
						</label>
				
						<input type="radio" name="lease"   	value='1'	<?php if($data['lease'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="lease"  	value='0'	<?php if($data['lease'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>

				<tr>
					<td>
						<label for="j_custom_number" class="control-label x85">
								归还开关：
						</label>
				
						<input type="radio" name="lease_reclaim"   	value='1'	<?php if($data['lease_reclaim'] == '1'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="开">
                        <input type="radio" name="lease_reclaim"  	value='0'	<?php if($data['lease_reclaim'] == '0'): ?> checked <?php endif; ?> data-toggle="icheck" data-label="关">
					</td>
				</tr>



 



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