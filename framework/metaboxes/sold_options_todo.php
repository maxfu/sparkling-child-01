<div class='pyre_metabox'>
<?php 
if(isset($_GET['post']) && $_GET['post']){
	$current_post_id=$_GET['post'];
}else{
	$current_post_id=get_the_ID();
}
$postInfor=get_post_meta($current_post_id,'pyre_agent','true');
$oldSoldStatus=get_post_meta($current_post_id,'pyre_sold_status','true');
if($oldSoldStatus=="reserved" && current_user_can('manage_options')!=1){
	$onlyRead=true;
}else{
	$onlyRead=false;
}		
$agents = freehold_all_authors();
$newSelectAgent[0]=null;
if($postInfor){
	foreach($agents as $key=>$ag)
	{
		if(in_array($key,$postInfor))
		{
			$newSelectAgent[$key]=$ag;
		}
	}	
}
//print_r($newSelectAgent);
/*$this->select(	'order_person',
			'Order Agent',
			$newSelectAgent,
			'',
			$onlyRead
			);*/
	
?>
</div>
<table style="border-collapse:collapse; margin-bottom:5px;" borderColor="#D1E5EE" border="1" cellPadding=1>
<tr style="background-color:#C4E6F8;">
<th style="padding:5px 10px;">Agent</th>
<th style="padding:5px 10px;">Reservation</th>
<th style="padding:5px 10px;">Reservation Time</th>
<th style="padding:5px 10px;">Confirmation Status</th>
<th style="padding:5px 10px;">Confirmation Time</th>
<th style="padding:5px 10px;">Reservation Request</th>
</tr>
<?php 
    $curent_userId=get_current_user_id();
	$pro_order_items=linksforce_get_all_preorder_by_id($current_post_id);
	$personal_order=linksforce_get_preorder_by_ids($current_post_id,$curent_userId);
	$user = get_userdata($curent_userId);
if(current_user_can('manage_options')!=1 &&(get_post_meta($current_post_id,'pyre_status','true')=='For Rent' ||get_post_meta($current_post_id,'pyre_status','true')=='For Sale')){
?>
<?php if(isset($personal_order['pre_state']) && $personal_order['pre_state']=='reserved' ){?>
	<tr>
		<td style="padding:5px 10px;"><?php echo $user->display_name?></td>
		<td style="padding:5px 10px;">reserved</td>
		<td style="padding:5px 10px;"><?php echo($personal_order['pre_order'])?></td>
		<td style="padding:5px 10px;"><?php echo($personal_order['confirm'])?></td>
		<td style="padding:5px 10px;"><?php if($personal_order['confirm_time']=="0000-00-00 00:00:00"){echo null;}else{echo $personal_order['confirm_time'];}?></td>
		<?php if($personal_order['confirm']!='confirm'){?>
		<td style="padding:5px 10px;">
	      <input name="click_ornot" type="hidden" value="0"/>
		  <input name="pre_post_id" type="hidden" value="<?php echo  $current_post_id?>"/>
		  <input name="pre_agent_id" type="hidden" value="<?php echo $curent_userId?>"/>
		  <input name="pre_action_type" type="hidden" value="del"/>
		  <input class="button button-primary sold_status_action" type="button" value="Cancel"/>
	  </td>
	  <?php }?>
	</tr>
	<?php }else{?>
	<tr>
		<td style="padding:5px 10px;"><?php echo $user->display_name?></td>
		<td style="padding:5px 10px;">available</td>
		<td style="padding:5px 10px;"><?php echo null?></td>
		<td style="padding:5px 10px;"><?php echo null?></td>
		<td style="padding:5px 10px;"><?php echo null?></td>
		<td style="padding:5px 10px;">
			  <input name="click_ornot" type="hidden" value="0"/>
			  <input name="pre_post_id" type="hidden" value="<?php echo  $current_post_id?>"/>
			  <input name="pre_agent_id" type="hidden" value="<?php echo $curent_userId?>"/>
			  <input name="pre_action_type" type="hidden" value="add"/>
			  <input class="button button-primary sold_status_action" type="button" value="Submit"/>	
	  </td>
	</tr>


<?php }?>
  <?php foreach($pro_order_items as $item){
	  	if($item['agent_id']!=$curent_userId){
	  	    $curentUser = get_userdata($item['agent_id']);?>
	    <tr>
		<td style="padding:5px 10px;"><?php echo $curentUser->display_name?></td>
		<td style="padding:5px 10px;">reserved</td>
		<td style="padding:5px 10px;"><?php echo $item['pre_order']?></td>
		<td style="padding:5px 10px;"><?php echo $item['confirm'];?></td>
		<td style="padding:5px 10px;"><?php if($item['confirm_time']=="0000-00-00 00:00:00"){echo null;}else{echo $item['confirm_time'];}?></td>
		<td style="padding:5px 10px;"></td>
		</tr>
<?php }
  }
}else{?>
  <?php foreach($pro_order_items as $item){?>
  <?php   	$curentUser = get_userdata($item['agent_id']);?>
  <tr>
	<td style="padding:5px 10px;"><?php echo $curentUser->display_name?></td>
	<td style="padding:5px 10px;">reserved</td>
	<td style="padding:5px 10px;"><?php echo $item['pre_order']?></td>
	<td style="padding:5px 10px;"><?php echo $item['confirm'];?></td>
	<td style="padding:5px 10px;"><?php if($item['confirm_time']=="0000-00-00 00:00:00"){echo null;}else{echo $item['confirm_time'];}?></td>
	<td style="padding:5px 10px;"></td>
	</tr>
<?php 
  }?>
<?php }?>
 </table>
<script type="text/javascript">
jQuery(document).ready(function ($){
	$("input.sold_status_action").on('click',function(){
		$("input[name='click_ornot']").val(1);//alert($("input[name='click_ornot']").val())
		var submit_msg = $(this).val();
		var r = confirm("Do do you want to "+submit_msg+" this property?");
		if(r==true){
			$("input#publish").trigger('click');
		}else{
			$("input[name='click_ornot']").val(0);
		}
	});
});
</script>
