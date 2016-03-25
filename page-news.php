<?php
// Template Name: News
get_header(); ?>
<style type="text/css">
.maxfu-news-block {
	margin: 7px -8px;
	padding: 15px;
	border: 1px solid #ddd;
	border-radius: 6px;
	-webkit-transition: all .2s ease-in-out;
	-o-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
	box-shadow: 0 6px 12px rgba(0,0,0,.175);
	clear: both;
	overflow: hidden;
}
.maxfu-news-title {
	margin: 10px 0;
	font-size: 18px;
	font-weight: normal;
	color: #6B6B6B;
}
.maxfu-news-title a{
	color: #5b5b5b;
}
.maxfu-news-button {
	float: right;
	background-color: #9b9b9b;
	border-color: #9b9b9b;
	padding: 2px 6px;
	font-size: 12px;
	position: absolute;
	bottom: 15px;
	right: 15px;
}
.modal-footer .maxfu-news-button {
	float: right;
	background-color: #9b9b9b;
	border-color: #9b9b9b;
	padding: 2px 6px;
	font-size: 12px;
	position: relative;;
	bottom: 0;
	right: 0;
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
			<li class="active" style="margin-left: 15px;"><a data-toggle="tab" href="#activities"><?php _e( '[:en]Events[:zh]活动回顾', 'sparkling' ); ?></a></li>
			<li><a data-toggle="tab" href="#hot-posts"><?php _e( '[:en]Hot Posts[:zh]热帖', 'sparkling' ); ?></a></li>
			<li><a data-toggle="tab" href="#policy"><?php _e( '[:en]Policies[:zh]购房政策', 'sparkling' ); ?></a></li>
		</ul>
		<div class="tab-content">
			<div id="activities" class="tab-pane fade in active">
				<?php
				$args = array(
					'post_type' => 'news',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'news_type',
							'field'    => 'slug',
							'terms'    => 'activities',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<div class="tab-content">
						<?php $tab_counter = 0; ?>
						<?php $item_counter = 0; ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php if ( fmod( $tab_counter, 5) == 0 ) : ?>
								<?php $item_counter ++; ?>
								<div id="activities_<?php echo $item_counter; ?>" class="tab-pane fade <?php if ( $tab_counter == 0 ) echo ' in active'?>">
							<?php endif; ?>
							<div class="col-md-12">
							  <div class="maxfu-news-block">
							    <div class="col-md-3">
							      <a href="#" data-toggle="modal" data-target="#myModal-activities-<?php the_ID(); ?>"><?php the_post_thumbnail( 'macland-news-featured', array( 'class' => 'single-featured' )); ?></a>
							    </div>
							    <div class="col-md-9">
							      <?php $news_date = '[:en]- ' . get_the_date('d') . '/' . get_the_date('m') . '/' . get_the_date('Y') . '[:zh]- ' . get_the_date('Y') . '年' . get_the_date('m') . '月' . get_the_date('d') . '日'; ?>
							      <h1 class="maxfu-news-title"><a href="#" data-toggle="modal" data-target="#myModal-activities-<?php the_ID(); ?>" style="margin-right: 4px;"><?php the_title(); ?></a><small><?php _e( $news_date ); ?></small></h1>
							      <?php the_excerpt(); ?>
							    </div>
							    <button type="button" class="btn btn-default maxfu-news-button" data-toggle="modal" data-target="#myModal-activities-<?php the_ID(); ?>"><?php _e( '[:en]Details...[:zh]了解更多', 'sparkling' ); ?></button>
							    <!-- Modal -->
							    <div id="myModal-activities-<?php the_ID(); ?>" class="modal fade" role="dialog">
							      <div class="modal-dialog">
							        <!-- Modal content-->
							        <div class="modal-content">
							          <div class="modal-header">
							            <button type="button" class="close" data-dismiss="modal">&times;</button>
							            <h4 class="modal-title"><?php the_title(); ?><small style="margin-left: 4px;"><?php _e( $news_date ); ?></small></h4>
							          </div>
							          <div class="modal-body">
							            <?php the_content(); ?>
							          </div>
							          <div class="modal-footer">
							            <button type="button" class="btn btn-default maxfu-news-button" data-dismiss="modal"><?php _e( '[:en]CLOSE[:zh]关闭' ); ?></button>
							          </div>
							        </div>
							      </div>
							    </div>
							  </div>
							</div>
							<?php $tab_counter ++; ?>
							<?php if ( fmod( $tab_counter, 5) == 0 ) :?>
							</div>
							<?php endif; ?>
					<?php endwhile; ?>
					<?php if ( fmod( $tab_counter, 5) != 0 ) :?>
					</div>
					<?php endif; ?>
					</div>
					<?php if( $item_counter > 1 ) : ?>
						<ul class="nav nav-pills maxfu-nav-center">
							<?php $x = 1; ?>
							<?php while( $x <= $item_counter ) : ?>
								<li <?php if ( $x == 1 ) echo ' class="active"'?>><a data-toggle="pill" href="#activities_<?php echo $x; ?>"><?php _e( '[:en]Page '.$x.'[:zh]第'.$x.'页' ); ?></a></li>
								<?php $x++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div id="hot-posts" class="tab-pane fade">
				<?php
				$args = array(
					'post_type' => 'news',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'news_type',
							'field'    => 'slug',
							'terms'    => 'hot-posts',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<div class="tab-content">
						<?php $tab_counter = 0; ?>
						<?php $item_counter = 0; ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php if ( fmod( $tab_counter, 5) == 0 ) : ?>
								<?php $item_counter ++; ?>
								<div id="hot_<?php echo $item_counter; ?>" class="tab-pane fade <?php if ( $tab_counter == 0 ) echo ' in active'?>">
							<?php endif; ?>
							<div class="col-md-12">
							  <div class="maxfu-news-block">
							    <div class="col-md-3">
							      <a href="#" data-toggle="modal" data-target="#myModal-hot-<?php the_ID(); ?>"><?php the_post_thumbnail( 'macland-news-featured', array( 'class' => 'single-featured' )); ?></a>
							    </div>
							    <div class="col-md-9">
							      <?php $news_date = '[:en]- ' . get_the_date('d') . '/' . get_the_date('m') . '/' . get_the_date('Y') . '[:zh]- ' . get_the_date('Y') . '年' . get_the_date('m') . '月' . get_the_date('d') . '日'; ?>
							      <h1 class="maxfu-news-title"><a href="#" data-toggle="modal" data-target="#myModal-hot-<?php the_ID(); ?>" style="margin-right: 4px;"><?php the_title(); ?></a><small><?php _e( $news_date ); ?></small></h1>
							      <?php the_excerpt(); ?>
							    </div>
							    <button type="button" class="btn btn-default maxfu-news-button" data-toggle="modal" data-target="#myModal-hot-<?php the_ID(); ?>"><?php _e( '[:en]Details...[:zh]了解更多', 'sparkling' ); ?></button>
							    <!-- Modal -->
							    <div id="myModal-hot-<?php the_ID(); ?>" class="modal fade" role="dialog">
							      <div class="modal-dialog">
							        <!-- Modal content-->
							        <div class="modal-content">
							          <div class="modal-header">
							            <button type="button" class="close" data-dismiss="modal">&times;</button>
							            <h4 class="modal-title"><?php the_title(); ?><small style="margin-left: 4px;"><?php _e( $news_date ); ?></small></h4>
							          </div>
							          <div class="modal-body">
							            <?php the_content(); ?>
							          </div>
							          <div class="modal-footer">
							            <button type="button" class="btn btn-default maxfu-news-button" data-dismiss="modal"><?php _e( '[:en]CLOSE[:zh]关闭' ); ?></button>
							          </div>
							        </div>
							      </div>
							    </div>
							  </div>
							</div>
							<?php $tab_counter ++; ?>
							<?php if ( fmod( $tab_counter, 5) == 0 ) :?>
							</div>
							<?php endif; ?>
					<?php endwhile; ?>
					<?php if ( fmod( $tab_counter, 5) != 0 ) :?>
					</div>
					<?php endif; ?>
					</div>
					<?php if( $item_counter > 1 ) : ?>
						<ul class="nav nav-pills maxfu-nav-center">
							<?php $x = 1; ?>
							<?php while( $x <= $item_counter ) : ?>
								<li <?php if ( $x == 1 ) echo ' class="active"'?>><a data-toggle="pill" href="#hot_<?php echo $x; ?>"><?php _e( '[:en]Page '.$x.'[:zh]第'.$x.'页' ); ?></a></li>
								<?php $x++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div id="policy" class="tab-pane fade">
				<?php
				$args = array(
					'post_type' => 'news',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'news_type',
							'field'    => 'slug',
							'terms'    => 'policies',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<div class="col-md-12">
						<div class="maxfu-news-block">
							<div class="tab-content">
								<?php $tab_counter = 0; ?>
								<?php $item_counter = 0; ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<?php if ( fmod( $tab_counter, 15) == 0 ) : ?>
										<?php $item_counter ++; ?>
										<div id="policies_<?php echo $item_counter; ?>" class="tab-pane fade <?php if ( $tab_counter == 0 ) echo ' in active'?>">
									<?php endif; ?>
									<?php $news_date = '[:en]- ' . get_the_date('d') . '/' . get_the_date('m') . '/' . get_the_date('Y') . '[:zh]- ' . get_the_date('Y') . '年' . get_the_date('m') . '月' . get_the_date('d') . '日'; ?>
									<h1 class="maxfu-news-title"><a href="#" data-toggle="modal" data-target="#myModal-policies-<?php the_ID(); ?>" style="margin-right: 4px;"><?php the_title(); ?></a><small><?php _e( $news_date ); ?></small></h1>
									<div id="myModal-policies-<?php the_ID(); ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title"><?php the_title(); ?><small style="margin-left: 4px;"><?php _e( $news_date ); ?></small></h4>
									      </div>
									      <div class="modal-body">
									        <?php the_content(); ?>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default maxfu-news-button" data-dismiss="modal"><?php _e( '[:en]CLOSE[:zh]关闭' ); ?></button>
									      </div>
									    </div>
									  </div>
									</div>
									<?php $tab_counter ++; ?>
									<?php if ( fmod( $tab_counter, 15) == 0 ) :?>
									</div>
									<?php endif; ?>
							<?php endwhile; ?>
							<?php if ( fmod( $tab_counter, 15) != 0 ) :?>
							</div>
							<?php endif; ?>
							</div>
						</div>
					</div>
					<?php if( $item_counter > 1 ) : ?>
						<ul class="nav nav-pills maxfu-nav-center">
							<?php $x = 1; ?>
							<?php while( $x <= $item_counter ) : ?>
								<li <?php if ( $x == 1 ) echo ' class="active"'?>><a data-toggle="pill" href="#policies_<?php echo $x; ?>"><?php _e( '[:en]Page '.$x.'[:zh]第'.$x.'页' ); ?></a></li>
								<?php $x++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</main><!-- #main maxfu -->
</section><!-- #primary -->
<?php get_footer(); ?>
