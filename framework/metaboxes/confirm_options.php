<div class='pyre_metabox'>
<?php 
/*$this->select(	'confirm_status',
			'Confirm Status',
			array('' => ' ', 'pending' => 'Pending Confirm' , 'cofirm'=>'Confirm'),
			''
			);*/
				
?>
</div>
<table style="border-collapse:collapse;" borderColor="#D1E5EE" border="1" cellPadding=1>
<tr style="background-color:#C4E6F8;">
<th style="padding:5px 10px;"></th>
<th style="padding:5px 10px;">Agent</th>
<th style="padding:5px 10px;">Reservation</th>
<th style="padding:5px 10px;">Reservation Time</th>
<th style="padding:5px 10px;">Confirmation Status</th>
<th style="padding:5px 10px;">Confirmation Time</th>
</tr>
<?php 
	$current_post_id=get_the_ID();
	$pro_order_items=linksforce_get_all_preorder_by_id($current_post_id);
    $num=1;
	foreach($pro_order_items as $item){?>
	<?php $curentUser = get_userdata($item['agent_id']);?>
	<tr>
	<td style="padding:5px 10px;"><input type="checkbox" value="<?php echo $item['id']?>" name="reomve_old_pre_order[]"/></td>
	<td style="padding:5px 10px;"><?php echo $curentUser->display_name?></td>
	<td style="padding:5px 10px;">reserved</td>
	<td style="padding:5px 10px;"><?php echo $item['pre_order']?></td>
	<td style="padding:5px 10px;"><?php if($num==1 && $item['confirm']!='confirm'){?>
		  <input name="confirm_click_ornot" type="hidden" value="0"/>
		  <input name="confirm_preorder_id" type="hidden" value="<?php echo  $item['id']?>"/>
		  <input class="button button-primary confirm_status_action" type="button" value="Confirm"/>		  		
	  	<?php }else{
		echo $item['confirm'];}
	  	$num++;?>
	</td>
	<td style="padding:5px 10px;"><?php if($item['confirm_time']=="0000-00-00 00:00:00"){echo null;}else{echo $item['confirm_time'];}?></td>
	  	
<?php ?>
</tr>
<?php }?>
</table>
	<input name="remove_old_click_ornot" type="hidden" value="0"/>
	<input name="confirm_user_id" type="hidden" value="<?php echo get_current_user_id();?>"/>
    <input style="margin-top:10px; margin-bottom:5px;" class="button old_status_action button-primary" type="button" value="Remove"/>	
<script type="text/javascript">
jQuery(document).ready(function ($){

	$("input.confirm_status_action").on('click',function(){
		$("input[name='confirm_click_ornot']").val(1);//alert($("input[name='click_ornot']").val())
		var submit_msg = $(this).val();
		var r = confirm("Do do you want to "+submit_msg+" this apply?");
		if(r==true){
			$("input#publish").trigger('click');
		}else{
			$("input[name='confirm_click_ornot']").val(0);
		}
	});

	$("input.old_status_action").on('click',function(){
		$("input[name='remove_old_click_ornot']").val(1);//alert($("input[name='click_ornot']").val())
		var submit_msg = $(this).val();
		var r = confirm("Do do you want to "+submit_msg+" ?");
		if(r==true){
			$("input#publish").trigger('click');
		}else{
			$("input[name='remove_old_click_ornot']").val(0);
		}
	});
	
});
</script>