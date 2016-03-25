<?php
// Template Name: Test
get_header(); ?>
<?php $options = get_option( 'macland-options', array() ); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php $activityDate = strtotime( $options['activity_date'] ); ?>
		<?php $todaysDate = time() - (time() % 86400); ?>
		<?php if ($todaysDate <= $postDate_1) : ?>
		<p><?php echo $options['activity_date']; ?></p>
		<p><?php echo $postDate_1; ?></p>
		<p><?php echo $todaysDate; ?></p>
	<?php endif; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'news' ); ?>
		<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
