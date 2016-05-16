<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays full width page without sidebar
 *
 * @package sparkling
 */
get_header(); ?>
<?php $options = get_option( 'macland-options', array() ); ?>
<section id="primary" class="content-area">
	<style type="text/css">
	.maxfu-home-slider .carousel{
		margin-top: 0;
		margin-bottom: 0;
	}
	</style>
	<div class="maxfu-home-slider">
		<div id="myCarousel-slider" class="carousel slide" data-ride="carousel">
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <?php $x = 1; ?>
		    <?php $counter = 0; ?>
		    <?php while($x <= 3) : ?>
		      <?php if ( $options["home_slider_$x"] != '' ) : ?>
		        <div class="item <?php if ($counter == 0) echo 'active'; ?>">
							<?php if ( $options["home_slider_link_$x"] != '' ) : ?>
								<a href="<?php echo $options["home_slider_link_$x"]; ?>"><img src="<?php echo $options["home_slider_$x"]; ?>" alt="<?php echo "home_slider_$x"; ?>"></a>
							<?php else : ?>
								<img src="<?php echo $options["home_slider_$x"]; ?>" alt="<?php echo "home_slider_$x"; ?>">
							<?php endif; ?>
		        </div>
		        <?php $counter++; ?>
		      <?php endif; ?>
		      <?php $x++; ?>
		    <?php endwhile; ?>
		  </div>

		<?php if ($counter >= 2) : ?>
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <?php $x = 1; ?>
		    <?php $num = 0; ?>
		    <?php while($x <= 3) : ?>
		      <?php if (get_post_meta(get_the_ID(), "slider_option_picture-$x", true)) : ?>
		        <li data-target="#myCarousel-slider" data-slide-to="<?php echo $num; ?>" <?php if ($num == 0) echo 'class="active"'; ?>></li>
						<?php $num++; ?>
		      <?php endif; ?>
		      <?php $x++; ?>
		    <?php endwhile; ?>
		  </ol>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel-slider" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel-slider" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		<?php endif; ?>
		</div>
	</div>
	<main id="main" class="site-main" role="main">
		<img src="http://www.maclandgroup.com/wp-content/uploads/2016/03/main-page-<?php _e( '[:en]en[:zh]zh', 'sparkling' ); ?>.png" alt="main-page" width="100%" class="aligncenter size-full wp-image-1213" />
	</main><!-- #main -->
	<style type="text/css">
	.maxfu-home-video {
		width: 100vw;
		height: 100vh;
		text-align: center;
		padding-top: 128px;
		margin-top: -128px;
		background-color: #000000;
	}
	.maxfu-home-video video {
		height: 100%;
	}
	</style>
	<div class="maxfu-home-video">
		<video controls poster="http://www.maclandgroup.com/video/macland_intro_poster.jpg" preload="none">
		  <source src="http://www.maclandgroup.com/video/macland_intro.mp4" type="video/mp4">
		  Your browser does not support HTML5 video.
		</video>
	</div>
	<?php
	$args = array(
		'post_type' => 'partner',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order'   => 'ASC',
		'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'partner_option_hide',
            'value' => '0',
        ),
        array(
            'key' => 'partner_option_hide',
            'compare' => 'NOT EXISTS'
        )
    )
	);
	$the_query = new WP_Query( $args ); ?>
	<?php if ( $the_query->have_posts() ) : ?>
		<style type="text/css">
		.maxfu-partners-box {
			height: 128px;
			text-align: center;
		}
		.maxfu-partners-box:before {
			content: "";
			display: inline-block;
			vertical-align: middle;
			height: 100%;
		}
		.maxfu-partners-box img {
			margin-left: -15px;
			margin-right: -15px;
			max-height: 100%;
			max-width: 100%;
			display: inline-block;
		}
		.maxfu-partners-title {
			font-size: 22px;
			font-weight: lighter;
			margin-bottom: 100px;
			color: #4c4c4c;
			letter-spacing: 2px;
			text-transform: uppercase;
		}
		.maxfu-partners-carousel-inner {
			padding: 0 30px;
		}
		</style>
		<div id="partners">
			<div class="post-inner-content">
				<article class="page type-page status-publish hentry">
					<header class="entry-header page-header">
						<h1 class="entry-title maxfu-partners-title" <?php if( of_get_option( 'title_center' ) ) echo 'style="text-align: center;"'; ?>><?php _e( '[:en]Our Partners[:zh]合作伙伴', 'sparkling' ); ?></h1>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<div id="myCarousel-partners" class="carousel slide" data-ride="carousel"  data-interval="8000">
							<!-- Wrapper for slides -->
							<div class="carousel-inner maxfu-partners-carousel-inner" role="listbox">
								<?php $counter = 0; ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php if ( fmod( $counter, 6) == 0 ) : ?>
								<div class="item <?php if ( $counter == 0 ) echo ' active'?>">
								<?php endif; ?>
									<div class="col-md-2 maxfu-partners-box">
										<?php $picture = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' ); ?>
										<a href="<?php echo get_post_meta(get_the_ID(), 'partner_option_website', true); ?>" title="<?php echo substr(get_the_title(), 4); ?>" target="_blank"><img src="<?php echo $picture[0]; ?>" alt="<?php echo substr(get_the_title(), 4); ?>"/></a>
									</div>
								<?php $counter ++; ?>
								<?php if ( fmod( $counter, 6) == 0 ) :?>
								</div>
								<?php endif; ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
								<?php if ( fmod( $counter, 6) != 0 ) :?>
								</div>
								<?php endif; ?>
							</div>
							<?php if( $counter > 6 ) : ?>
								<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel-partners" role="button" data-slide="prev" style="width: auto; margin-left: -20px; background-image: none;">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/left.png" alt="main-page" class="aligncenter size-full wp-image-1213" style="width: 40px;"/>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel-partners" role="button" data-slide="next" style="width: auto;margin-right: -20px; background-image: none;">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/right.png" alt="main-page" class="aligncenter size-full wp-image-1213" style="width: 40px;"/>
								<span class="sr-only">Next</span>
							</a>
						<?php endif; ?>
						</div>
					</div>
				</article>
			</div>
		</div>
	<?php endif; ?>
	</section><!-- #primary -->
<?php get_footer(); ?>
