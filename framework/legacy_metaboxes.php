<?php

class PyreThemeFrameworkMetaboxes {

	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
	}

	public function add_meta_boxes()
	{
		$this->add_meta_box('post_options', 'Post Options', 'post');
		$this->add_meta_box('page_options', 'Page Options', 'page');
		$this->add_meta_box('portfolio_options', 'Portfolio Options', 'portfolio');
	}

	public function add_meta_box($id, $label, $post_type)
	{
	    add_meta_box(
	        'pyre_' . $id,
	        __($label),
	        array($this, $id),
	        $post_type
	    );
	}

	public function save_meta_boxes($post_id)
	{

		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		//Portfolio, Post, and Page Wraps to Prevent WooCommerce Forcing Data Save
		if ( 'page' == $_POST['post_type'] || 'property' == $_POST['post_type'] || 'portfolio' == $_POST['post_type'] || 'post' == $_POST['post_type'] || 'partner' == $_POST['post_type'] || 'staff' == $_POST['post_type'] )
		{
			$oldState=get_post_meta($post_id, 'pyre_sold_status', true);
			foreach($_POST as $key => $value) {
    			update_post_meta($post_id, $key, $value);
		}
		if('property' == $_POST['post_type']){
			$preOrderTime=$_POST['pyre_pre_order_time'];
			$preOrderStatus=$_POST['pyre_sold_status'];
			$preOrderAgent=$_POST['pyre_order_person'];
			update_post_meta($post_id, 'pyre_agent', $_POST['pyre_agent']);
			if($_POST['pyre_sold_status']=='reserved' && $_POST['pyre_order_person']!=null && $_POST['pyre_confirm_status']==null)
			{
				update_post_meta($post_id, 'pyre_confirm_status', 'pending');
			}
		}
		if($_POST['click_ornot']){
			if($_POST['pre_action_type']=='add' ){

				linksforce_insert_preorder_data($_POST['pre_post_id'],$_POST['pre_agent_id'],current_time('mysql'));
			}else{
				linksforce_delete_preorder_data($_POST['pre_post_id'],$_POST['pre_agent_id']);
				update_post_meta($post_id, 'pyre_sold_status', 'available');
			}
		}
		if($_POST['confirm_click_ornot']){
			$time=current_time('mysql');
			linksforce_update_preorder_data($_POST['confirm_preorder_id'],$time);
			$currentPostOrders=linksforce_get_all_preorder_by_id($post_id);
			$to_email_array=array();
			foreach($currentPostOrders as $itmes){
				$agent=get_userdata($itmes['agent_id']);
				$agentName=$agent->user_login;
				$fromEmail=$agent->user_email;
				$to_email_array[]=$agent->user_email;
				if($itmes['confirm']=="confirm"){
					$sucName=$agentName;
					$sucTime=$itmes['pre_order'];
				}
			}
			//print_r($to_email_array);exit;
			$agentAdmin=get_userdata($_POST['confirm_user_id']);
			$agentNameAdmin=$agentAdmin->user_login;
			$fromEmailAdmin=$agentAdmin->user_email;
			$header="From: ".$fromEmailAdmin;
			if($to_email_array){
				wp_mail($to_email_array,'Reservation Confirmmation',linksforce_confirm_reservation_mes($agentNameAdmin,$post_id,$time,$sucName,$sucTime),$header,'');
			}
		}
		if($_POST['remove_old_click_ornot']){
			for($i=0;$i<count($_POST['reomve_old_pre_order']);$i++)
	       {
	       	linksforce_update_preorder_old($_POST['reomve_old_pre_order'][$i]);
	       }
		}

	}

	}

	public function post_options()
	{
		include 'metaboxes/style.php';
		include 'metaboxes/post_options.php';
	}

	public function page_options()
	{
		include 'metaboxes/style.php';
		include 'metaboxes/page_options.php';
	}

	public function portfolio_options()
	{
		include 'metaboxes/style.php';
		include 'metaboxes/portfolio_options.php';
	}

	public function text($id, $label, $desc, $read=null,$html = '')
	{
		global $post;

		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
			if($read=='true'){
				$html .= '<input type="text" id="pyre_' . $id . '" name="pyre_' . $id . '" value="' . get_post_meta($post->ID, 'pyre_' . $id, true) .'" readonly="readonly"/>';
			}else{
				$html .= '<input type="text" id="pyre_' . $id . '" name="pyre_' . $id . '" value="' . get_post_meta($post->ID, 'pyre_' . $id, true) .'" />';
			}

				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function textarea($id, $label, $desc,$read=null, $html = '')
	{
		global $post;

		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
			if($read=='true'){
			     $html .= '<textarea id="pyre_' . $id . '" name="pyre_' . $id . '" cols="110" rows="5" readonly="readonly">' . get_post_meta($post->ID, 'pyre_' . $id, true)  . '</textarea>';
			}else{
				$html .= '<textarea id="pyre_' . $id . '" name="pyre_' . $id . '" cols="110" rows="5">' . get_post_meta($post->ID, 'pyre_' . $id, true)  . '</textarea>';
			}

				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function select($id, $label, $options, $desc, $read=null,$html = '')
	{
		global $post;

		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
			if($read=='true'){
				$html .= '<select id="pyre_' . $id . '" name="pyre_' . $id . '" disabled="true">';
			}else{
				$html .= '<select id="pyre_' . $id . '" name="pyre_' . $id . '">';
			}
				foreach($options as $key => $option) {
					if(get_post_meta($post->ID, 'pyre_' . $id, true) == $key) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}

					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

 	public function checkbox_group($id, $label, $options, $desc, $read=null,$html = '')
	{
		global $post;

		$html .= '<div class="pyre_metabox_field metabox_checkbox_group">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if($read=='true'){
			     $html .= '<div class="field">';
			}else{
				 $html .= '<div class="field"><a class="actions" href="javascript:void(0);" onclick="selectAllCheckbox(this); return false;">select all</a>';

			}
			$num=0;
				foreach($options as $key => $option) {
				if($read=='true'){
					$html .= '<div class="checkbox_item"><input type="checkbox"  name="pyre_' . $id.'[]"  id="pyre_' . $id .$num. '"  value="'.$key.'" onclick="return false"
					';
				}else{
					$html .= '<div class="checkbox_item"><input type="checkbox"  name="pyre_' . $id.'[]"  id="pyre_' . $id .$num. '"  value="'.$key.'" ';
				}

				if(is_array(get_post_meta($post->ID, 'pyre_' . $id, true)) && in_array( $key,get_post_meta($post->ID, 'pyre_' . $id, true) ))
				{
                  $html .=' checked="checked" /><label for="pyre_'.$id.$num.'">'.$option.'</label></div>';

				}else{
				   $html .='/><label for="pyre_'.$id.$num.'">'.$option.'</label></div>';
				}
				$num++;
			}
			if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		echo $html;?>
        <script type="text/javascript">
		var pyre_checkbox_flag = false;
		function selectAllCheckbox(txt){
				if (pyre_checkbox_flag == false) {
					jQuery('input[name="pyre_<?php echo $id; ?>[]"]').each(function(elem){
						jQuery(this).attr("checked",true);
					});
					pyre_checkbox_flag = true;
					txt.innerHTML="unselect all";
				} else {
					jQuery('input[name="pyre_<?php echo $id; ?>[]"]').each(function(elem){
						jQuery(this).attr("checked",false);
					});
					pyre_checkbox_flag = false;
					txt.innerHTML="select all";
				}
		}
		</script>
        <?php
	}

	//add 2014-2-17
	public function submit()
	{
		global $post;
	}
}

$metaboxes = new PyreThemeFrameworkMetaboxes;
