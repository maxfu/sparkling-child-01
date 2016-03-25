<?php
/**
 * @package sparkling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner-content">
		<header class="entry-header page-header">
			<?php $news_date = '[:en] - ' . get_the_date('d') . '/' . get_the_date('m') . '/' . get_the_date('Y') . '[:zh] - ' . get_the_date('Y') . '年' . get_the_date('m') . '月' . get_the_date('d') . '日'; ?>
				<h1 class="entry-title" <?php if( of_get_option( 'title_center' ) ) echo 'style="text-align: center;"'; ?>><?php the_title(); ?><small style="margin-left: 6px;"><?php _e( $news_date ); ?></small></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_post_thumbnail( 'sparkling-featured', array( 'class' => 'single-featured' )); ?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before'            => '<div class="page-links">'.esc_html__( 'Pages:', 'sparkling' ),
					'after'             => '</div>',
					'link_before'       => '<span>',
					'link_after'        => '</span>',
					'pagelink'          => '%',
					'echo'              => 1
	       		) );
	    	?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
