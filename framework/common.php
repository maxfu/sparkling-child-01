<?php
function freehold_all_authors()
{
	global $wpdb;
	$order = 'user_nicename';
	$user_ids = $wpdb->get_col("SELECT ID FROM $wpdb->users ORDER BY $order");
	foreach($user_ids as $user_id) :
		$user = get_userdata($user_id);
		if(get_the_author_meta('is_agent', $user_id) == 'yes' && $user->roles[0]!='administrator') {
			$all_authors[$user_id] = $user->display_name;
		}
	endforeach;
	return $all_authors;
}

//add 2014-2-17
function linksforce_insert_preorder_data($postId,$agentId,$time)
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'agent_preorder';
	$rows_affected =$wpdb->insert( $table_name, array('id'=>null,'post_id'=>$postId,'agent_id'=>$agentId,'pre_order' => $time,'pre_state'=>'reserved'));
	$to_email_array=array();
	if(of_get_option('recipient_email',true)){
		$to_email_array[]=of_get_option('recipient_email',true);
	}
	if(of_get_option('cc_email',true)){
		$to_email_array[]=of_get_option('cc_email',true);
	}
	if(of_get_option('bcc_email',true)){
		$to_email_array[]=of_get_option('bcc_email',true);
	}
	$agent=get_userdata($agentId);
	$agentName=$agent->user_login;
	$fromEmail=$agent->user_email;
	$headers="From: ".$agentName." <".$fromEmail."> \r\n";
	if($to_email_array){
		wp_mail($to_email_array,$agentName.' Reservation',linksforce_to_reservation_mes($agentName,$postId,$time,'Reservated'),$headers,'');
	}
}

function  linksforce_get_all_preorder_by_id($id)
{
	global $wpdb;
	$pro_prder_items=array();
	$table_name = $wpdb->prefix . 'agent_preorder';
	$resultss = $wpdb->get_results( $wpdb->prepare('SELECT * FROM '.$table_name.' WHERE post_id = %d and old_pre_order=%d ORDER BY  `pre_order` ASC', $id,0),ARRAY_A);
	return $resultss;
}

function linksforce_delete_preorder_data($postId,$agentId)
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'agent_preorder';
	$rows_affected =$wpdb->query(
	$wpdb->prepare( 'DELETE FROM `'. $table_name.'` WHERE `post_id` = %d AND `agent_id` = %d and `old_pre_order`=%d', $postId, $agentId ,0));
	$to_email_array=array();
	if(of_get_option('recipient_email',true)){
		$to_email_array[]=of_get_option('recipient_email',true);
	}
	if(of_get_option('cc_email',true)){
		$to_email_array[]=of_get_option('cc_email',true);
	}
	if(of_get_option('bcc_email',true)){
		$to_email_array[]=of_get_option('bcc_email',true);
	}
	$agent=get_userdata($agentId);
	$agentName=$agent->user_login;
	$fromEmail=$agent->user_email;
	$headers="From: ".$agentName." <".$fromEmail."> \r\n";
	if($to_email_array){
		wp_mail($to_email_array,$agentName.' delected the reservation',linksforce_del_reservation_mes($agentName,$postId,current_time('mysql'),' delect the reservation of'),$headers,'');
	}
}

function linksforce_get_preorder_by_ids($postId,$agentId)
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'agent_preorder';
	$results = $wpdb->get_row( $wpdb->prepare('SELECT * FROM '.$table_name.' WHERE post_id = %d AND `agent_id` = %d and `old_pre_order`=%d', $postId, $agentId,0),ARRAY_A);
	return $results;
}

function linksforce_update_preorder_data($orderId,$time)
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'agent_preorder';
	$rows_affected =$wpdb->update( $table_name, array('confirm'=>'confirm','confirm_time'=>$time),array('id'=>$orderId));
}

function linksforce_update_preorder_old($orderId)
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'agent_preorder';
	$rows_affected =$wpdb->update( $table_name, array('old_pre_order'=>'1'),array('id'=>$orderId));
}

// Pagination
function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows icon-double-angle-left'></span></a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><span class='arrows icon-angle-left'></span></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a href='#' class='selected'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'><span class='arrows icon-angle-right'></span></a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'><span class='arrows icon-double-angle-right'></span></a>";
         echo "</div>\n";
     }
}

//add // Pagination
function kriesi_pagination_page($pages = '', $range = 2,$portfilioId)
{
     $showitems = ($range * 2)+1;

     //global $paged;
     //if(empty($paged)) $paged = 1;
	 if($_GET['pag']){
			 $paged=$_GET['pag'];
		}else{
			 $paged=1;
		}

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_permalink($portfilioId)."'><span class='arrows icon-double-angle-left'></span></a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".add_query_arg( 'pag', $paged - 1, get_permalink($portfilioId))."'><span class='arrows icon-angle-left'></span></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a href='#' class='selected'>".$i."</a>":"<a href='".add_query_arg( 'pag', $i, get_permalink($portfilioId))."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".add_query_arg( 'pag', $paged + 1, get_permalink($portfilioId))."'><span class='arrows icon-angle-right'></span></a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".add_query_arg( 'pag', $pages, get_permalink($portfilioId))."'><span class='arrows icon-double-angle-right'></span></a>";
         echo "</div>\n";
     }
}


if ( ! function_exists( 'macland_image_sizes' ) ) :
function macland_image_sizes() {
  add_image_size( 'macland-project-featured', 720, 450, true );
	add_image_size( 'macland-project-slider', 1280, 800, true );
	add_image_size( 'macland-project-slider-thumb', 320, 200, true );
  add_image_size( 'macland-agents-featured', 480, 640, true );
  add_image_size( 'macland-news-featured', 720, 450, true );
}
endif; // macland_image_sizes
add_action( 'after_setup_theme', 'macland_image_sizes' );
?>
