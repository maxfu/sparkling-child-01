<?php
// Add Metaboxes
get_template_part( 'framework/metaboxes' );
if( !current_user_can( 'subscriber' ) ){
	get_template_part( 'framework/profile' );
}
?>
