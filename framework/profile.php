<?php
add_action('show_user_profile', 'wpsplash_extraProfileFields');
add_action('edit_user_profile', 'wpsplash_extraProfileFields');
add_action('personal_options_update', 'wpsplash_saveExtraProfileFields');
add_action('edit_user_profile_update', 'wpsplash_saveExtraProfileFields');
 wp_enqueue_style('thickbox');
 wp_enqueue_script('thickbox');
function wpsplash_saveExtraProfileFields($userID) {

	if (!current_user_can('edit_user', $userID)) {
		return false;
	}

	//add 2013-12-13
	//update_user_meta($userID, 'avatar_img', $_POST['avatar_img']);
	update_user_meta($userID, 'is_agent', $_POST['is_agent']);
	update_user_meta($userID, 'is_gold_agent', $_POST['is_gold_agent']);
	update_user_meta($userID, 'agent_sort_by', $_POST['agent_sort_by']);
	update_user_meta($userID, 'subtitle', $_POST['subtitle']);
	update_user_meta($userID, 'office', $_POST['office']);
	update_user_meta($userID, 'mobile', $_POST['mobile']);
	update_user_meta($userID, 'telephone', $_POST['telephone']);
	update_user_meta($userID, 'fax', $_POST['fax']);
	update_user_meta($userID, 'twitter', $_POST['twitter']);
	update_user_meta($userID, 'facebook', $_POST['facebook']);
	update_user_meta($userID, 'linkedin', $_POST['linkedin']);
	update_user_meta($userID, 'skype', $_POST['skype']);
	update_user_meta($userID, 'weibo', $_POST['weibo']);
  update_user_meta($userID, 'wechat', $_POST['wechat']);
}

function wpsplash_extraProfileFields($user)
{
?>
	<table class='form-table'>
		<!-- tr>
			<th><label for='avatar_img'>Update Avatar</label></th>
			<td>
			<div class="field">
		    <?php $image = wp_get_attachment_image_src(get_the_author_meta('avatar_img', $user->ID), 'thumb'); $image = $image[0]; $image_w=$image[1];$image_h=$image[2];?>
		        <input name="avatar_img" type="hidden" class="custom_upload_image" value="<?php echo get_the_author_meta('avatar_img', $user->ID);?>" />
                <img src="<?php echo $image;?>" width="50" height="50" class="custom_preview_image" alt="" /><br />
                    <input class="custom_upload_image_button button" type="button" value="Update Image" />
                    <small> <a href="#" class="custom_clear_image_button">Remove Image</a></small>
                    <br clear="all" /><span class="description"></div>
			</td>
		</tr> -->

		<tr>
			<th><label for='is_agent'>Is an agent?</label></th>
			<td>
			  <?php if(current_user_can('manage_options')){?>
				<select name="is_agent">
				<?php }else{?>
                <select name="is_agent" disabled="true">
				<?php	}?>
					<option value="no" <?php if(get_the_author_meta('is_agent', $user->ID) == 'no'): ?>selected="selected"<?php endif; ?>>No</option>
					<option value="yes" <?php if(get_the_author_meta('is_agent', $user->ID) == 'yes'): ?>selected="selected"<?php endif; ?>>Yes</option>
				</select>
			</td>
		</tr>

		<tr>
			<th><label for='is_gold_agent'>Is a top agent?</label></th>
			<td>
			  <?php if(current_user_can('manage_options')){?>
				<select name="is_gold_agent">
				<?php }else{?>
                <select name="is_gold_agent" disabled="true">
				<?php	}?>
					<option value="no" <?php if(get_the_author_meta('is_gold_agent', $user->ID) == 'no'): ?>selected="selected"<?php endif; ?>>No</option>
					<option value="yes" <?php if(get_the_author_meta('is_gold_agent', $user->ID) == 'yes'): ?>selected="selected"<?php endif; ?>>Yes</option>
				</select>
			</td>
		</tr>

		<tr>
			<th><label for='agent_sort_by'>Agent Sort By</label></th>
			<td>
			<?php
			if (get_the_author_meta('agent_sort_by', $user->ID)){
			      $sort_by=get_the_author_meta('agent_sort_by', $user->ID);
				}else{
				  $sort_by=20;
			}
			$sortArray=array();
			for($i=1;$i<=20;$i++) $sortArray[$i]=$i;
			?>
			<?php if(current_user_can('manage_options')){?>
               <select name="agent_sort_by">
			<?php }else{?>
               <select name="agent_sort_by" disabled="true">
			<?php }?>
               <?php foreach($sortArray as $v){?>
					<option value="<?php echo $v?>" <?php if($sort_by == $v): ?>selected="selected"<?php endif; ?>><?php echo $v?></option>
			<?php }?>
				</select>
			</td>
		</tr>

		<tr>
			<th><label for='subtitle'>Subtitle</label></th>
			<td>
				<input type='text' name='subtitle' id='subtitle' value='<?php echo esc_attr(get_the_author_meta('subtitle', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>


		<tr>
			<th><label for='office'>Office</label></th>
			<td>
				<input type='text' name='office' id='office' value='<?php echo esc_attr(get_the_author_meta('office', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='mobile'>Mobile</label></th>
			<td>
				<input type='text' name='mobile' id='mobile' value='<?php echo esc_attr(get_the_author_meta('mobile', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='telephone'>Telephone</label></th>
			<td>
				<input type='text' name='telephone' id='telephone' value='<?php echo esc_attr(get_the_author_meta('telephone', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='fax'>Fax</label></th>
			<td>
				<input type='text' name='fax' id='fax' value='<?php echo esc_attr(get_the_author_meta('fax', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
	</table>

	<h3>Social Information</h3>

	<table class='form-table'>
		<tr>
			<th><label for='twitter'>Twitter Link</label></th>
			<td>
				<input type='text' name='twitter' id='twitter' value='<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='facebook'>Facebook Link</label></th>
			<td>
				<input type='text' name='facebook' id='facebook' value='<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='linkedin'>LinkedIn Link</label></th>
			<td>
				<input type='text' name='linkedin' id='linkedin' value='<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='skype'>Skype Link</label></th>
			<td>
				<input type='text' name='skype' id='skype' value='<?php echo esc_attr(get_the_author_meta('skype', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='weibo'>Weibo Link</label></th>
			<td>
				<input type='text' name='weibo' id='weibo' value='<?php echo esc_attr(get_the_author_meta('weibo', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
    <tr>
			<th><label for='wechat'>Wechat Account</label></th>
			<td>
				<input type='text' name='wechat' id='wechat' value='<?php echo esc_attr(get_the_author_meta('wechat', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
	</table>
<?php } ?>
