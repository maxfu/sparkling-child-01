<?php
// Template Name: Projects
get_header(); ?>
<style type="text/css">
.maxfu-projects-ul {
	margin-bottom: 0;
	margin-top: 12px;
	padding: 0;
}
.maxfu-projects-li {
	line-height: 1.6 !important;
}
.maxfu-projects-li a {
	text-decoration: underline;
	color: #6b6b6b;
}
.maxfu-projects-name {
	margin-bottom: 0;
	font-size: 18px;
	font-weight: normal;
	margin-top: 24px;
}
.maxfu-projects-name a {
	color: #5b5b5b;
}
.maxfu-projects-button {
	float: right;
	margin-top: -23px;
	margin-left: 15px;
	background-color: #9b9b9b;
	border-color: #9b9b9b;
	padding: 2px 6px;
	font-size: 12px;
}
.modal-footer .maxfu-projects-button {
	margin-top: 0;
}
.maxfu-projects-featured {
	width: 100%;
	height: auto;
	min-height: 0;
	overflow: hidden;
}
.maxfu-projects-featured img {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.maxfu-projects-block {
	margin: 7px -8px;
	padding: 15px;
	border: 1px solid #ddd;
	border-radius: 6px;
	-webkit-transition: all .2s ease-in-out;
	-o-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
	box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
.maxfu-projects-new {
	padding: 2px 6px;
	font-size: 12px;
	position: absolute;
	top: 23px;
	right: 23px;
	border-radius: 0;
}
.maxfu-projects-modal {
}
.maxfu-projects-modal .carousel {
		margin-top: 15px;
		width: 75%;
		float: left;
}
.maxfu-projects-modal .carousel.vertical {
    width: 24%;
    float: right;
}
.maxfu-projects-modal .item .thumb {
	width: 100%;
	cursor: pointer;
	float: left;
}
.maxfu-projects-modal .item .thumb img {
	width: 100%;
	margin: 2px;
}
.maxfu-projects-modal .item img {
	width: 100%;
}
.maxfu-projects-modal .vertical .left.carousel-control {
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
.maxfu-projects-modal .vertical .right.carousel-control {
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
.maxfu-projects-modal .vertical .carousel-inner {
	padding-top:0px;
}
.maxfu-projects-modal .carousel.vertical .item {
	-webkit-transition: 0.6s ease-in-out top;
	-moz-transition: 0.6s ease-in-out top;
	-ms-transition: 0.6s ease-in-out top;
	-o-transition: 0.6s ease-in-out top;
	transition: 0.6s ease-in-out top;
}
.maxfu-projects-modal .carousel.vertical .active {
	top: 0;
}
.maxfu-projects-modal .carousel.vertical .next {
	top: 100%;
}
.maxfu-projects-modal .carousel.vertical .prev {
	top: -100%;
}
.maxfu-projects-modal .carousel.vertical .next.left,
.carousel.vertical .prev.right {
	top: 0;
}
.maxfu-projects-modal .carousel.vertical .active.left {
	top: -100%;
}
.maxfu-projects-modal .carousel.vertical .active.right {
	top: 100%;
}
.maxfu-projects-modal .carousel.vertical .item {
	left: 0;
}
.maxfu-projects-li strong {
	font-weight: 600;
}
.maxfu-projects-li capitalize {
	text-transform: capitalize;
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
.maxfu-nav-center {
	clear: both;
	text-align: center;
	padding-top: 7px;
}
.maxfu-nav-center li {
	display: inline-block;
	width: auto;
	position: relative;
	float: none;
}
.maxfu-nav-center li a {
	border-radius: 6px;
	margin-bottom: 14px;
	padding: 2px 6px;
	font-size: 14px;
}
.maxfu-nav-center li.active a {
	color:#fff;
	background-color: #9b9b9b;
	border-color: #9b9b9b;
}
.maxfu-nav-center li a:hover,
.maxfu-nav-center li.active a:focus,
.maxfu-nav-center li.active a:hover {
	color:#fff;
	background-color: #1f1f1f;
}
</style>
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<header class="page-header">
			<?php if(get_post_meta(get_the_ID(), "pyre_display_title", true) == "show"): ?>
				<h1 class="page-title" <?php if( of_get_option( 'title_center' ) ) echo 'style="text-align: center;"'; ?>><?php the_title(); ?></h1>
			<?php endif; ?>
		</header>
		<ul class="nav nav-tabs">
		  <li class="active" style="margin-left: 15px;"><a data-toggle="tab" href="#newProjects"><?php _e( '[:en]FOR SALE[:zh]在售项目', 'sparkling' ); ?></a></li>
		  <li><a data-toggle="tab" href="#pastProjects"><?php _e( '[:en]SOLD[:zh]售罄项目', 'sparkling' ); ?></a></li>
		  <li><a data-toggle="tab" href="#allProjects"><?php _e( '[:en]DEVELOPMENT PROJECTS[:zh]开发众筹项目', 'sparkling' ); ?></a></li>
		</ul>

		<div class="tab-content">
		  <div id="newProjects" class="tab-pane fade in active">
				<?php
				$args = array(
					'post_type' => 'portfolio',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'portfolio_type',
							'field'    => 'slug',
							'terms'    => 'new-portfolios',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<div class="tab-content">
						<?php $tab_counter = 0; ?>
						<?php $item_counter = 0; ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php if ( fmod( $tab_counter, 6) == 0 ) : ?>
								<?php $item_counter ++; ?>
								<div id="new_<?php echo $item_counter; ?>" class="tab-pane fade <?php if ( $tab_counter == 0 ) echo ' in active'?>">
							<?php endif; ?>
							<div class="col-md-4">
								<div class="maxfu-projects-block">
								<!-- div class="grid-item" -->
									<div class="maxfu-projects-featured">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'macland-project-featured', array( 'class' => 'single-featured' )); ?></a>
										<?php if(get_post_meta(get_the_ID(), "pyre_new_project", true) == "yes"): ?>
											<div class="btn btn-default maxfu-projects-new"><?php _e( '[:en]NEW[:zh]最新项目', 'sparkling' ); ?></div>
										<?php endif; ?>
									</div>
									<h6 class="maxfu-projects-name"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h6>
									<ul class="maxfu-projects-ul">
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Suburb:&nbsp;[:zh]所属区域：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_suburb', true); ?></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Price:&nbsp;[:zh]销售价格：", 'sparkling' ); ?></strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/"><?php _e( '[:en]Contact Us[:zh]联系我们', 'sparkling' ); ?></a></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Property Type:&nbsp;[:zh]物业形态：", 'sparkling' ); ?></strong><capitalize><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_type', true); ?></capitalize></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Beds:&nbsp;[:zh]户型比例：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_bedrooms', true); ?></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Sales Stage:&nbsp;[:zh]销售状态：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_sales_stage', true); ?></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Settlement Date:&nbsp;[:zh]交房时间：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_settlement_date', true); ?></li>
									</ul>
									<button type="button" class="btn btn-default maxfu-projects-button" data-toggle="modal" data-target="#myModal-new-<?php the_ID(); ?>"><?php _e( '[:en]Details...[:zh]了解更多', 'sparkling' ); ?></button>
									<!-- Modal -->
									<div id="myModal-new-<?php the_ID(); ?>" class="modal fade maxfu-projects-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title"><?php the_title(); ?></h4>
									      </div>
									      <div class="modal-body">
												<div class="col-md-8">
													<div id="carousel-new-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel" data-interval="false">
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
													<div id="thumbcarousel-new-<?php the_ID(); ?>" class="carousel vertical slide" data-interval="false">
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
																			<div data-target="#carousel-new-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
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
																	<div data-target="#carousel-new-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
																		<?php the_post_thumbnail( 'macland-project-slider-thumb', array( 'class' => 'single-featured' )); ?>
																	</div>
																<?php $counter++; ?>
															<?php endif; ?>
															<?php if ( fmod( $counter, 3) != 0) : ?>
																<?php $x = 1; ?>
																<?php $leftnum = 3 - fmod( $counter, 3); ?>
																<?php while($x <= $leftnum) : ?>
																	<div class="thumb">
																		<?php $image_url = 'http://www.maclandgroup.com/wp-content/uploads/2016/03/watermark.png'; ?>
																		<?php $resizedImage = vt_resize('', $image_url, 320, 200, true); ?>
																		<img src="<?php echo $resizedImage[url]; ?>" width="<?php echo $resizedImage[width]; ?>" height="<?php echo $resizedImage[height]; ?>" alt="<?php echo "slider_option_picture-$x－thumb"; ?>">
																	</div>
																  <?php $x++; ?>
																<?php endwhile; ?>
																</div>
															<?php endif; ?>
														</div>
														<?php if ($counter > 3) : ?>
															<a class="left carousel-control" href="#thumbcarousel-new-<?php the_ID(); ?>" role="button" data-slide="prev">
																<span class="glyphicon glyphicon-chevron-up"></span>
															</a>
															<a class="right carousel-control" href="#thumbcarousel-new-<?php the_ID(); ?>" role="button" data-slide="next">
																<span class="glyphicon glyphicon-chevron-down"></span>
															</a>
														<?php endif; ?>
													</div>
												</div>
												<div class="col-md-4">
													<div class="maxfu-projects-map">
														<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo get_post_meta(get_the_ID(), "pyre_portfolio_street_address", true); ?>&output=embed"></iframe>
													</div>
												</div>
													<?php the_content(); ?>
									      </div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default maxfu-projects-button" data-dismiss="modal"><?php _e( '[:en]Close[:zh]关闭', 'sparkling' ); ?></button>
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/" class="btn btn-default maxfu-projects-button"><?php _e( '[:en]Contact Us[:zh]联系我们', 'sparkling' ); ?></a>
												</div>
									    </div>
									  </div>
									</div>
								</div>
							</div>
							<?php $tab_counter ++; ?>
							<?php if ( fmod( $tab_counter, 6) == 0 ) :?>
							</div>
							<?php endif; ?>
					<?php endwhile; ?>
					<?php if ( fmod( $tab_counter, 6) != 0 ) :?>
					</div>
					<?php endif; ?>
					</div>
					<?php if( $item_counter > 1 ) : ?>
						<ul class="nav nav-pills maxfu-nav-center">
							<?php $x = 1; ?>
							<?php while( $x <= $item_counter ) : ?>
								<li <?php if ( $x == 1 ) echo ' class="active"'?>><a data-toggle="pill" href="#new_<?php echo $x; ?>"><?php _e( '[:en]Page '.$x.'[:zh]第'.$x.'页' ); ?></a></li>
								<?php $x++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
		  </div>
		  <div id="pastProjects" class="tab-pane fade">
				<?php
				$args = array(
					'post_type' => 'portfolio',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'portfolio_type',
							'field'    => 'slug',
							'terms'    => 'past-portfolios',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<div class="tab-content">
						<?php $tab_counter = 0; ?>
						<?php $item_counter = 0; ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php if ( fmod( $tab_counter, 6) == 0 ) : ?>
								<?php $item_counter ++; ?>
								<div id="past_<?php echo $item_counter; ?>" class="tab-pane fade <?php if ( $tab_counter == 0 ) echo ' in active'?>">
							<?php endif; ?>
							<div class="col-md-4">
								<div class="maxfu-projects-block">
								<!-- div class="grid-item" -->
									<div class="maxfu-projects-featured">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'macland-project-featured', array( 'class' => 'single-featured' )); ?></a>
										<?php if(get_post_meta(get_the_ID(), "pyre_new_project", true) == "yes"): ?>
											<div class="btn btn-default maxfu-projects-new"><?php _e( '[:en]NEW[:zh]最新项目', 'sparkling' ); ?></div>
										<?php endif; ?>
									</div>
									<h6 class="maxfu-projects-name"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h6>
									<ul class="maxfu-projects-ul">
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Suburb:&nbsp;[:zh]所属区域：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_suburb', true); ?></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Price:&nbsp;[:zh]销售价格：", 'sparkling' ); ?></strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/"><?php _e( '[:en]Contact Us[:zh]联系我们', 'sparkling' ); ?></a></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Property Type:&nbsp;[:zh]物业形态：", 'sparkling' ); ?></strong><capitalize><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_type', true); ?></capitalize></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Beds:&nbsp;[:zh]户型比例：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_bedrooms', true); ?></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Sales Stage:&nbsp;[:zh]销售状态：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_sales_stage', true); ?></li>
											<li class="maxfu-projects-li"><strong><?php _e( "[:en]Settlement Date:&nbsp;[:zh]交房时间：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_settlement_date', true); ?></li>
									</ul>
									<button type="button" class="btn btn-default maxfu-projects-button" data-toggle="modal" data-target="#myModal-past-<?php the_ID(); ?>"><?php _e( '[:en]Details...[:zh]了解更多', 'sparkling' ); ?></button>
									<!-- Modal -->
									<div id="myModal-past-<?php the_ID(); ?>" class="modal fade maxfu-projects-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title"><?php the_title(); ?></h4>
									      </div>
									      <div class="modal-body">
												<div class="col-md-8">
													<div id="carousel-past-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel" data-interval="false">
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
													<div id="thumbcarousel-past-<?php the_ID(); ?>" class="carousel vertical slide" data-interval="false">
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
																			<div data-target="#carousel-past-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
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
																	<div data-target="#carousel-past-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
																		<?php the_post_thumbnail( 'macland-project-slider-thumb', array( 'class' => 'single-featured' )); ?>
																	</div>
																<?php $counter++; ?>
															<?php endif; ?>
															<?php if ( fmod( $counter, 3) != 0) : ?>
																<?php $x = 1; ?>
																<?php $leftnum = 3 - fmod( $counter, 3); ?>
																<?php while($x <= $leftnum) : ?>
																	<div class="thumb">
																		<?php $image_url = 'http://www.maclandgroup.com/wp-content/uploads/2016/03/watermark.png'; ?>
																		<?php $resizedImage = vt_resize('', $image_url, 320, 200, true); ?>
																		<img src="<?php echo $resizedImage[url]; ?>" width="<?php echo $resizedImage[width]; ?>" height="<?php echo $resizedImage[height]; ?>" alt="<?php echo "slider_option_picture-$x－thumb"; ?>">
																	</div>
																  <?php $x++; ?>
																<?php endwhile; ?>
																</div>
															<?php endif; ?>
														</div>
														<?php if ($counter > 3) : ?>
															<a class="left carousel-control" href="#thumbcarousel-past-<?php the_ID(); ?>" role="button" data-slide="prev">
																<span class="glyphicon glyphicon-chevron-up"></span>
															</a>
															<a class="right carousel-control" href="#thumbcarousel-past-<?php the_ID(); ?>" role="button" data-slide="next">
																<span class="glyphicon glyphicon-chevron-down"></span>
															</a>
														<?php endif; ?>
													</div>
												</div>
												<div class="col-md-4">
													<div class="maxfu-projects-map">
														<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo get_post_meta(get_the_ID(), "pyre_portfolio_street_address", true); ?>&output=embed"></iframe>
													</div>
												</div>
													<?php the_content(); ?>
									      </div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default maxfu-projects-button" data-dismiss="modal"><?php _e( '[:en]Close[:zh]关闭', 'sparkling' ); ?></button>
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/" class="btn btn-default maxfu-projects-button"><?php _e( '[:en]Contact Us[:zh]联系我们', 'sparkling' ); ?></a>
												</div>
									    </div>
									  </div>
									</div>
								</div>
							</div>
							<?php $tab_counter ++; ?>
							<?php if ( fmod( $tab_counter, 6) == 0 ) :?>
							</div>
							<?php endif; ?>
					<?php endwhile; ?>
					<?php if ( fmod( $tab_counter, 6) != 0 ) :?>
					</div>
					<?php endif; ?>
					</div>
					<?php if( $item_counter > 1 ) : ?>
						<ul class="nav nav-pills maxfu-nav-center">
							<?php $x = 1; ?>
							<?php while( $x <= $item_counter ) : ?>
								<li <?php if ( $x == 1 ) echo ' class="active"'?>><a data-toggle="pill" href="#past_<?php echo $x; ?>"><?php _e( '[:en]Page '.$x.'[:zh]第'.$x.'页' ); ?></a></li>
								<?php $x++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
		  </div>
		  <div id="allProjects" class="tab-pane fade">
				<?php
				$args = array(
					'post_type' => 'portfolio',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'portfolio_type',
							'field'    => 'slug',
							'terms'    => 'development-portfolios',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
				  <div class="tab-content">
				    <?php $tab_counter = 0; ?>
				    <?php $item_counter = 0; ?>
				    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				      <?php if ( fmod( $tab_counter, 6) == 0 ) : ?>
				        <?php $item_counter ++; ?>
				        <div id="devel_<?php echo $item_counter; ?>" class="tab-pane fade <?php if ( $tab_counter == 0 ) echo ' in active'?>">
				      <?php endif; ?>
				      <div class="col-md-4">
				        <div class="maxfu-projects-block">
				        <!-- div class="grid-item" -->
				          <div class="maxfu-projects-featured">
				            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'macland-project-featured', array( 'class' => 'single-featured' )); ?></a>
				            <?php if(get_post_meta(get_the_ID(), "pyre_new_project", true) == "yes"): ?>
				              <div class="btn btn-default maxfu-projects-new"><?php _e( '[:en]NEW[:zh]最新项目', 'sparkling' ); ?></div>
				            <?php endif; ?>
				          </div>
				          <h6 class="maxfu-projects-name"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h6>
				          <ul class="maxfu-projects-ul">
				              <li class="maxfu-projects-li"><strong><?php _e( "[:en]Suburb:&nbsp;[:zh]所属区域：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_suburb', true); ?></li>
				              <li class="maxfu-projects-li"><strong><?php _e( "[:en]Price:&nbsp;[:zh]销售价格：", 'sparkling' ); ?></strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/"><?php _e( '[:en]Contact Us[:zh]联系我们', 'sparkling' ); ?></a></li>
				              <li class="maxfu-projects-li"><strong><?php _e( "[:en]Property Type:&nbsp;[:zh]物业形态：", 'sparkling' ); ?></strong><capitalize><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_type', true); ?></capitalize></li>
				              <li class="maxfu-projects-li"><strong><?php _e( "[:en]Beds:&nbsp;[:zh]户型比例：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_bedrooms', true); ?></li>
				              <li class="maxfu-projects-li"><strong><?php _e( "[:en]Sales Stage:&nbsp;[:zh]销售状态：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_sales_stage', true); ?></li>
				              <li class="maxfu-projects-li"><strong><?php _e( "[:en]Settlement Date:&nbsp;[:zh]交房时间：", 'sparkling' ); ?></strong><?php echo get_post_meta(get_the_ID(), 'pyre_portfolio_settlement_date', true); ?></li>
				          </ul>
				          <button type="button" class="btn btn-default maxfu-projects-button" data-toggle="modal" data-target="#myModal-devel-<?php the_ID(); ?>"><?php _e( '[:en]Details...[:zh]了解更多', 'sparkling' ); ?></button>
				          <!-- Modal -->
				          <div id="myModal-devel-<?php the_ID(); ?>" class="modal fade maxfu-projects-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				            <div class="modal-dialog">
				              <!-- Modal content-->
				              <div class="modal-content">
				                <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title"><?php the_title(); ?></h4>
				                </div>
				                <div class="modal-body">
				                <div class="col-md-8">
				                  <div id="carousel-devel-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel" data-interval="false">
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
				                  <div id="thumbcarousel-devel-<?php the_ID(); ?>" class="carousel vertical slide" data-interval="false">
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
				                              <div data-target="#carousel-devel-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
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
				                          <div data-target="#carousel-devel-<?php the_ID(); ?>" data-slide-to="<?php echo $counter; ?>" class="thumb">
				                            <?php the_post_thumbnail( 'macland-project-slider-thumb', array( 'class' => 'single-featured' )); ?>
				                          </div>
				                        <?php $counter++; ?>
				                      <?php endif; ?>
				                      <?php if ( fmod( $counter, 3) != 0) : ?>
				                        <?php $x = 1; ?>
				                        <?php $leftnum = 3 - fmod( $counter, 3); ?>
				                        <?php while($x <= $leftnum) : ?>
				                          <div class="thumb">
				                            <?php $image_url = 'http://www.maclandgroup.com/wp-content/uploads/2016/03/watermark.png'; ?>
				                            <?php $resizedImage = vt_resize('', $image_url, 320, 200, true); ?>
				                            <img src="<?php echo $resizedImage[url]; ?>" width="<?php echo $resizedImage[width]; ?>" height="<?php echo $resizedImage[height]; ?>" alt="<?php echo "slider_option_picture-$x－thumb"; ?>">
				                          </div>
				                          <?php $x++; ?>
				                        <?php endwhile; ?>
				                        </div>
				                      <?php endif; ?>
				                    </div>
				                    <?php if ($counter > 3) : ?>
				                      <a class="left carousel-control" href="#thumbcarousel-devel-<?php the_ID(); ?>" role="button" data-slide="prev">
				                        <span class="glyphicon glyphicon-chevron-up"></span>
				                      </a>
				                      <a class="right carousel-control" href="#thumbcarousel-devel-<?php the_ID(); ?>" role="button" data-slide="next">
				                        <span class="glyphicon glyphicon-chevron-down"></span>
				                      </a>
				                    <?php endif; ?>
				                  </div>
				                </div>
				                <div class="col-md-4">
				                  <div class="maxfu-projects-map">
				                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo get_post_meta(get_the_ID(), "pyre_portfolio_street_address", true); ?>&output=embed"></iframe>
				                  </div>
				                </div>
				                  <?php the_content(); ?>
				                </div>
				                <div class="modal-footer">
				                  <button type="button" class="btn btn-default maxfu-projects-button" data-dismiss="modal"><?php _e( '[:en]Close[:zh]关闭', 'sparkling' ); ?></button>
				                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/" class="btn btn-default maxfu-projects-button"><?php _e( '[:en]Contact Us[:zh]联系我们', 'sparkling' ); ?></a>
				                </div>
				              </div>
				            </div>
				          </div>
				        </div>
				      </div>
				      <?php $tab_counter ++; ?>
				      <?php if ( fmod( $tab_counter, 6) == 0 ) :?>
				      </div>
				      <?php endif; ?>
				  <?php endwhile; ?>
				  <?php if ( fmod( $tab_counter, 6) != 0 ) :?>
				  </div>
				  <?php endif; ?>
				  </div>
					<?php if( $item_counter > 1 ) : ?>
						<ul class="nav nav-pills maxfu-nav-center">
							<?php $x = 1; ?>
							<?php while( $x <= $item_counter ) : ?>
								<li <?php if ( $x == 1 ) echo ' class="active"'?>><a data-toggle="pill" href="#devel_<?php echo $x; ?>"><?php _e( '[:en]Page '.$x.'[:zh]第'.$x.'页' ); ?></a></li>
								<?php $x++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
		  </div>
		</div>	</main><!-- #main maxfu -->
</section><!-- #primary -->
<?php get_footer(); ?>
