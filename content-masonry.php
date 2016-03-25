<?php
/**
 * @package sparkling
 */
?>
<style type="text/css">
.maxfu-masonry-grid-sizer,
.maxfu-masonry-grid-item {
	width: 32%;
	margin-left: 1%;
	margin-bottom: 1%;
}
.maxfu-masonry-grid-item--width2 {
	width: 65%;
	margin-left: 1%;
	margin-bottom: 1%;
}
.maxfu-masonry-featured {
	width: 100%;
	height: 236px;
	min-height: 236px;
	overflow: hidden;
}
.maxfu-masonry-featured img {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.maxfu-masonry-header {
	height: 1.1em;
	overflow: hidden;
}
.maxfu-masonry-excerpt {
	overflow: hidden;
}
.maxfu-masonry-excerpt p {
	height: 3.4em;
}
.maxfu-masonry-excerpt button.btn.btn-default.read-more {
	margin-top: 0;
	border: 1px solid #1f1f1f;
	color: #1f1f1f;
	background-color: #fff;
}
.maxfu-masonry-excerpt button.btn.btn-default.read-more:hover {
	color: #fff;
	background-color: #1f1f1f;
}
.maxfu-masonry-block {
	margin: 7px -8px;
	padding: 15px;
	border: 1px solid #ddd;
	border-radius: 6px;
	-webkit-transition: all .2s ease-in-out;
	-o-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
	box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
</style>
<div class="maxfu-masonry-block">
<!-- div class="grid-item" -->
	<div class="maxfu-masonry-featured">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'sparkling-featured', array( 'class' => 'single-featured' )); ?></a>
	</div>

	<h2 class="maxfu-masonry-header"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta">
		<?php sparkling_posted_on(); ?><?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
	<span class="comments-link"><i class="fa fa-comment-o"></i><?php comments_popup_link( esc_html__( 'Leave a comment', 'sparkling' ), esc_html__( '1 Comment', 'sparkling' ), esc_html__( '% Comments', 'sparkling' ) ); ?></span>
	<?php endif; ?>

	<?php edit_post_link( esc_html__( 'Edit', 'sparkling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>

	</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="maxfu-masonry-excerpt">
		<?php the_excerpt(); ?>
		<button type="button" class="btn btn-default read-more" data-toggle="modal" data-target="#myModal-<?php the_ID(); ?>"><?php esc_html_e( 'Read More', 'sparkling' ); ?></button>
	</div>

	<!-- Modal -->
	<div id="myModal-<?php the_ID(); ?>" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title"><?php the_title(); ?></h4>
	      </div>
	      <div class="modal-body">
	        <?php the_content(); ?>
	      </div>
	    </div>
	  </div>
	</div>
</div>
