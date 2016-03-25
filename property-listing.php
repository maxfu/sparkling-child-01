<div class="property-listing">
	<div class="property-listing-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('property-listing'); ?></a>
	</div>
	<div class="property-information">
    	<div class="property-information-name"><h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3></div>
		<?php if(get_post_meta(get_the_ID(), 'pyre_status', true) == 'Call For Price'): ?>
		<div class="property-information-price"><a href="<?php the_permalink(); ?>"><?php _e('Call For Price','progressionstudios'); ?></a></div>
		<?php else: ?>
		<?php if(get_post_meta(get_the_ID(), 'pyre_price', true)): ?>
		<div class="property-information-price"><a href="<?php the_permalink(); ?>"><?php echo of_get_option('currency_text_opt', '$'); ?><?php echo number_format(get_post_meta(get_the_ID(), 'pyre_price', true),2); ?><?php if(get_post_meta(get_the_ID(), 'pyre_status', true) == 'For Rent'): ?><?php _e('/month','progressionstudios'); ?><?php endif; ?></a></div>
		<?php endif; ?>
		
		<?php endif; ?>
		<div class="property-information-address"><a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_address', true); ?></a></div>
		<?php if(get_post_meta(get_the_ID(), 'pyre_city', true) && get_post_meta(get_the_ID(), 'pyre_state', true) && get_post_meta(get_the_ID(), 'pyre_zip', true)): ?>
		<div class="property-information-location"><a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_city', true); ?>, <?php echo get_post_meta(get_the_ID(), 'pyre_state', true); ?>, <?php echo get_post_meta(get_the_ID(), 'pyre_zip', true); ?></a></div>
		<?php endif; ?>
      <?php 
        //add 2013-12-13
      	$information=get_post(get_the_ID(),ARRAY_A);
		$categories = wp_get_post_terms($post->ID,'unit');	
		if(count($categories)>0):
		?>
        <p class="h_category">
        <?php
		foreach($categories as $category):?>
			<a href="<?php echo get_term_link(intval($category->term_id),'unit');; ?>"><span></span><?php echo $category->name; ?></a>
		<?php endforeach; ?>
		</p>
        <?php endif; ?>
		<?php if(get_post_meta(get_the_ID(), 'pyre_size', true) || get_post_meta(get_the_ID(), 'pyre_bedrooms', true) || get_post_meta(get_the_ID(), 'pyre_bathrooms', true)): ?>
		<div class="property-highlight">
                <?php if(get_post_meta(get_the_ID(), 'pyre_size', true)): ?><div class="sq-highlight" title="<?php echo get_post_meta(get_the_ID(), 'pyre_size', true).' '.of_get_option('square_feet_text_small', 'sqm'); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_size', true); ?> <?php echo _e(of_get_option('square_feet_text_small', 'sqm'));?></div><?php endif; ?>
                <?php if(get_post_meta(get_the_ID(), 'pyre_bedrooms', true)): ?><div class="bed-higlight" title="<?php echo get_post_meta(get_the_ID(), 'pyre_bedrooms', true).' '.of_get_option('beds_text_short', 'bd'); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_bedrooms', true); ?> <?php echo _e(of_get_option('beds_text_short', 'bd'))?></div><?php endif; ?>
                <?php if(get_post_meta(get_the_ID(), 'pyre_bathrooms', true)): ?><div class="bath-higlight" title="<?php echo get_post_meta(get_the_ID(), 'pyre_bathrooms', true).' '.of_get_option('baths_text', 'Baths'); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_bathrooms', true); ?> <?php echo _e(of_get_option('baths_text', 'Baths'))?></div><?php endif; ?>
				<?php if(get_post_meta(get_the_ID(), 'pyre_garage', true)): ?><div class="garage-higlight" title="<?php  echo get_post_meta(get_the_ID(), 'pyre_garage', true).' '.of_get_option('parking_text', 'Parking'); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_garage', true); ?> <?php echo _e(of_get_option('parking_text', 'Parking'))?></div><?php endif; ?>  
		</div>
		<?php endif; ?>
		<?php if(get_post_meta(get_the_ID(), 'pyre_towards', true) || get_post_meta(get_the_ID(), 'pyre_custom_text1', true) || get_post_meta(get_the_ID(), 'pyre_custom_text2', true)): ?>
		<div class="property-highlight">
        <?php if(get_post_meta(get_the_ID(), 'pyre_towards', true)): ?><div class="towards-highlight" style="background:url('<?php echo of_get_option('towards_image', 'true')?>') no-repeat;" title="<?php echo get_post_meta(get_the_ID(), 'pyre_towards', true).' '.of_get_option('towards_text', 'Towards'); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_towards', true); ?> <?php echo _e(of_get_option('towards_text', 'Towards'));?></div><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'pyre_custom_text1', true)): ?><div class="custom-text1-higlight" style="background:url('<?php echo of_get_option('custom_attribute_1_image', 'true')?>') no-repeat;" title="<?php echo get_post_meta(get_the_ID(), 'pyre_custom_text1', true).' '.of_get_option('custom_attribute_1_text', 'Custom Text 1'); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_custom_text1', true); ?> <?php echo _e(of_get_option('custom_attribute_1_text', 'Custom Text 1'))?></div><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'pyre_custom_text2', true)): ?><div class="custom-text2-higlight" style="background:url('<?php echo of_get_option('custom_attribute_2_image', 'true')?>') no-repeat;" title="<?php echo get_post_meta(get_the_ID(), 'pyre_custom_text2', true).' '.of_get_option('custom_attribute_2_text', 'Custom Text 2'); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_custom_text2', true); ?> <?php echo _e(of_get_option('custom_attribute_2_text', 'Custom Text 2'))?></div><?php endif; ?>
		</div>
		<?php endif ?>
		<?php if(get_post_meta(get_the_ID(), 'pyre_status', true) == 'Open House'): ?>
		<div class="property-highlight">
			<div class="open-house"><span><?php _e('Open House','progressionstudios'); ?></span>: <?php echo get_post_meta(get_the_ID(), 'pyre_open', true); ?></div>
		</div>
		<?php endif; ?>
		<div class="clearfix"></div>
        <div class="property-listing-base">
            <div class="property-highlight">
                <?php
                $purl = get_post_type_archive_link('property');
                ?>
                <div class="property-status"><?php echo of_get_option('property_status_text', 'Property Status'); ?>: <a href="<?php echo site_url(); ?>?post_type=property&amp;status=<?php echo get_post_meta(get_the_ID(), 'pyre_status', true); ?>"><?php echo get_post_meta(get_the_ID(), 'pyre_status', true); ?></a></div>
            </div>
            <div class="view_detail">
                <?php if(of_get_option('view_listing_button', 'View Listing')): ?>
                <a href="<?php the_permalink(); ?>" class="button secondary-button"><?php echo of_get_option('view_listing_button', 'View Listing'); ?></a>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            
        </div><!-- close .property-listing-base -->
	</div><!-- close property-information-->
	<div class="clearfix"></div>
    <hr />
</div>