<?php
/**
 * @package sparkling
 */
?>
<style type="text/css">
.maxfu-projects-slider {
}
.maxfu-projects-slider .carousel {
		margin-top: 15px;
		width: 75%;
		float: left;
}
.maxfu-projects-slider .carousel.vertical {
    width: 24%;
    float: right;
}
.maxfu-projects-slider .item .thumb {
	width: 100%;
	cursor: pointer;
	float: left;
}
.maxfu-projects-slider .item .thumb img {
	width: 100%;
	margin: 2px;
}
.maxfu-projects-slider .item img {
	width: 100%;
}
.maxfu-projects-slider .vertical .left.carousel-control {
	position: absolute;;
	top: 0;
	bottom: 90%;
	width: 100%;
	display: inline-block;
	text-align: center;
	background-image:-webkit-linear-gradient(bottom,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
	background-image:-o-linear-gradient(bottom,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
	background-image:-webkit-gradient(linear, bottom, bottom,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));
	background-image:linear-gradient(to top,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
	background-repeat:repeat-x;
}
.maxfu-projects-slider .vertical .right.carousel-control {
	position: absolute;
	top: 90%;
	bottom: 0;
	width: 100%;
	display: inline-block;
	text-align: center;
	background-image:-webkit-linear-gradient(top,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
	background-image:-o-linear-gradient(top,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
	background-image:-webkit-gradient(linear, top, top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));
	background-image:linear-gradient(to bottom,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
	background-repeat:repeat-x;
}
.maxfu-projects-slider .vertical .carousel-inner {
	padding-top:0px;
}
.maxfu-projects-slider .carousel.vertical .item {
	-webkit-transition: 0.6s ease-in-out top;
	-moz-transition: 0.6s ease-in-out top;
	-ms-transition: 0.6s ease-in-out top;
	-o-transition: 0.6s ease-in-out top;
	transition: 0.6s ease-in-out top;
}
.maxfu-projects-slider .carousel.vertical .active {
	top: 0;
}
.maxfu-projects-slider .carousel.vertical .next {
	top: 100%;
}
.maxfu-projects-slider .carousel.vertical .prev {
	top: -100%;
}
.maxfu-projects-slider .carousel.vertical .next.left, .carousel.vertical .prev.right {
	top: 0;
}
.maxfu-projects-slider .carousel.vertical .active.left {
	top: -100%;
}
.maxfu-projects-slider .carousel.vertical .active.right {
	top: 100%;
}
.maxfu-projects-slider .carousel.vertical .item {
	left: 0;
}
.maxfu-projects-map {
	margin-top: 15px;
  position: relative;
  padding-bottom: 100%;
  height: 0;
  overflow: hidden;
}
.maxfu-projects-map iframe {
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner-content">
		<header class="entry-header page-header">
				<h1 class="entry-title" <?php if( of_get_option( 'title_center' ) ) echo 'style="text-align: center;"'; ?>><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<div class="col-md-8">
				<div class="maxfu-projects-slider">
					<div id="carousel-development-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel" data-interval="false">
						<div class="carousel-inner">
							<?php $x = 1; ?>
							<?php $counter = 0; ?>
							<?php while($x <= 15) : ?>
								<?php if (get_post_meta(get_the_ID(), "slider_option_picture-$x", true)) : ?>
									<div class="item <?php if ($counter == 0) echo 'active'; ?>">
										<?php $image_url = get_post_meta(get_the_ID(), "slider_option_picture-$x", true); ?>
										<?php $resizedImage = vt_resize('', $image_url, 1280, 800, true); ?>
										<img src="<?php echo $resizedImage[url]; ?>" width="<?php echo $resizedImage[width]; ?>" height="<?php echo $resizedImage[height]; ?>" alt="<?php echo "slider_option_picture-$x"; ?>">
									</div>
									<?php $counter++; ?>
								<?php endif; ?>
								<?php $x++; ?>
							<?php endwhile; ?>
							<?php if ($counter == 0) : ?>
								<div class="item active">
									<?php the_post_thumbnail( 'macland-project-slider', array( 'class' => 'single-featured' )); ?>
									<?php $counter++; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div id="thumbcarousel-development-<?php the_ID(); ?>" class="carousel vertical slide" data-interval="false">
						<div class="carousel-inner">
							<?php $x = 1; ?>
							<?php $counter = 0; ?>
							<?php while($x <= 15) : ?>
								<?php if (get_post_meta(get_the_ID(), "slider_option_picture-$x", true)) : ?>
									<?php if ($counter == 0) : ?>
										<div class="item active">
									<?php elseif ( fmod( $counter, 3) == 0 ) : ?>
										<div class="item">
									<?php endif; ?>
											<div data-target="#carousel-development-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
												<?php $image_url = get_post_meta(get_the_ID(), "slider_option_picture-$x", true); ?>
												<?php $resizedImage = vt_resize('', $image_url, 320, 200, true); ?>
												<img src="<?php echo $resizedImage[url]; ?>" width="<?php echo $resizedImage[width]; ?>" height="<?php echo $resizedImage[height]; ?>" alt="<?php echo "slider_option_picture-$x－thumb"; ?>">
											</div>
											<?php $counter++; ?>
									<?php if ( fmod( $counter, 3) == 0) : ?>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								<?php $x++; ?>
							<?php endwhile; ?>
							<?php if ($counter == 0) : ?>
								<div class="item active">
									<div data-target="#carousel-development-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
										<?php the_post_thumbnail( 'macland-project-slider-thumb', array( 'class' => 'single-featured' )); ?>
									</div>
								<?php $counter++; ?>
							<?php endif; ?>
							<?php if ( fmod( $counter, 3) != 0) : ?>
								<?php $x = 1; ?>
								<?php $leftnum = 3 - fmod( $counter, 3); ?>
								<?php while($x <= $leftnum) : ?>
									<div class="thumb">
										<?php $image_url = esc_url( home_url( '/' ) ).'wp-content/uploads/2016/03/watermark.png'; ?>
										<?php $resizedImage = vt_resize('', $image_url, 320, 200, true); ?>
										<img src="<?php echo $resizedImage[url]; ?>" width="<?php echo $resizedImage[width]; ?>" height="<?php echo $resizedImage[height]; ?>" alt="<?php echo "slider_option_picture-$x－thumb"; ?>">
									</div>
									<?php $x++; ?>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
						<?php if ($counter > 3) : ?>
							<a class="left carousel-control" href="#thumbcarousel-development-<?php the_ID(); ?>" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-up"></span>
							</a>
							<a class="right carousel-control" href="#thumbcarousel-development-<?php the_ID(); ?>" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-down"></span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="maxfu-projects-map">
					<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo get_post_meta(get_the_ID(), "pyre_portfolio_street_address", true); ?>&output=embed"></iframe>
				</div>
			</div>
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
