<?php
// Template Name: Agents
get_header(); ?>
<style type="text/css">
.maxfu-agents-dl {
	margin-bottom: 0;
	margin-top: 24px;
}
.maxfu-agents-dt {
	width: 15px !important;
	font-size: 16px;
}
.maxfu-agents-dd {
	margin-left: 20px !important;
}
.maxfu-agents-dd a {
	color: #535353;
}
.maxfu-agents-name {
	margin-bottom: 0;
	font-size: 18px;
	font-weight: normal;
	color: #6B6B6B;
}
.maxfu-agents-name a {
	color: #5b5b5b;
}
.maxfu-agents-position {
	margin-bottom: 0;
	font-size: 16px;
	font-weight: normal;
	color: #6B6B6B;
}
.maxfu-agents-email {
	float: right;
	color: orangered;
	font-size: 16px;
}
.maxfu-agents-featured {
	width: 100%;
	height: auto;
	min-height: 0;
	overflow: hidden;
}
.maxfu-agents-featured img {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.maxfu-agents-block, .maxfu-team-block {
	margin: 7px -8px;
	padding: 15px;
	border: 1px solid #ddd;
	border-radius: 6px;
	-webkit-transition: all .2s ease-in-out;
	-o-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
	box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
.maxfu-team-block {
	border: none;
	border-radius: none;
	box-shadow: none;
}
.maxfu-team-introdution {
	margin-top: 60px;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: normal;
}
.maxfu-team-introdution a {
	color: #535353;
}
.maxfu-team-row {
	padding: 30px 30px;
}
.maxfu-col-md-20p, .maxfu-col-md-60p {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
@media (min-width: 992px) {
  .maxfu-col-md-20p, .maxfu-col-md-60p {
    float: left;
  }
  .maxfu-col-md-20p {
    width: 20%;
  }
  .maxfu-col-md-60p {
    width: 60%;
  }
  .maxfu-col-md-pull-20p {
    right: 20%;
  }
  .maxfu-col-md-pull-60p {
    right: 60%;
  }
  .maxfu-col-md-pull-0 {
    right: auto;
  }
  .maxfu-col-md-push-20p {
    left: 20%;
  }
  .maxfu-col-md-push-60p {
    left: 60%;
  }
  .maxfu-col-md-push-0 {
    left: auto;
  }
  .maxfu-col-md-offset-20p {
    margin-left: 20%;
  }
  .maxfu-col-md-offset-60p {
    margin-left: 60%;
  }
  .maxfu-col-md-offset-0 {
    margin-left: 0;
  }
}
</style>
<?php $options = get_option( 'macland-options', array() ); ?>
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<header class="page-header">
			<?php if(get_post_meta(get_the_ID(), "pyre_display_title", true) == "show"): ?>
				<h1 class="page-title" <?php if( of_get_option( 'title_center' ) ) echo 'style="text-align: center;"'; ?>><?php the_title(); ?></h1>
			<?php endif; ?>
		</header>
		<ul class="nav nav-tabs">
			<li class="active" style="margin-left: 15px;"><a data-toggle="tab" href="#sales"><?php _e( '[:en]Sales Team[:zh]销售团队', 'sparkling' ); ?></a></li>
			<li><a data-toggle="tab" href="#lease"><?php _e( '[:en]Lease & Resell Property Sales Team[:zh]租赁&二手房团队', 'sparkling' ); ?></a></li>
			<li><a data-toggle="tab" href="#finance"><?php _e( '[:en]Finance Team[:zh]贷款团队', 'sparkling' ); ?></a></li>
			<li><a data-toggle="tab" href="#executive"><?php _e( '[:en]Operation Team[:zh]行政团队', 'sparkling' ); ?></a></li>
		</ul>
		<div class="tab-content">
			<div id="sales" class="tab-pane fade in active">
				<?php
				$args = array(
					'post_type' => 'staff',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order'   => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'team',
							'field'    => 'slug',
							'terms'    => 'sales-team',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="maxfu-col-md-20p">
							  <div class="maxfu-agents-block">
							    <div class="maxfu-agents-featured">
							      <?php the_post_thumbnail( 'macland-agents-featured', array( 'class' => 'single-featured' )); ?>
							    </div>
							    <h6 class="maxfu-agents-name"><?php echo substr(get_the_title(), 4); ?></h6>
							    <h6 class="maxfu-agents-position"><?php _e( get_post_meta(get_the_ID(), 'staff_option_position', true), 'sparkling' ); ?></h6>
							    <?php if( $options['display_contact'] == 'on' ) : ?>
							      <dl class="dl-horizontal maxfu-agents-dl">
							        <dt class="maxfu-agents-dt">
							          <?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true) ): ?>
							            <i class="fa fa-phone"></i>
							          <?php endif; ?>
							        </dt>
							        <dd class="maxfu-agents-dd">
							          <?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true)): ?>
							            <?php echo get_post_meta(get_the_ID(), 'staff_option_telephone', true); ?>
							          <?php endif; ?>
							          <?php if(get_post_meta(get_the_ID(), 'staff_option_email', true)): ?>
							            <a class="maxfu-agents-email" href="mailto:<?php echo get_post_meta(get_the_ID(), 'staff_option_email', true); ?>"><i class="fa fa-envelope-o"></i></a>
							          <?php endif; ?>
							        </dd>
							      </dl>
							    <?php endif; ?>
							  </div>
							</div>
					<?php endwhile; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div id="lease" class="tab-pane fade">
				<?php
				$args = array(
					'post_type' => 'staff',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order'   => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'team',
							'field'    => 'slug',
							'terms'    => 'lease-team',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="col-md-12 maxfu-team-row">
							<?php if(get_post_meta(get_the_ID(), "team_options_leader", true) == "1"): ?>
								<div class="maxfu-col-md-20p">
									<div class="maxfu-team-block">
										<div class="maxfu-agents-featured">
											<a href="http://<?php echo get_post_meta(get_the_ID(), 'team_options_website', true); ?>" target="_blank"><img src="<?php echo get_post_meta(get_the_ID(), 'team_options_logo', true); ?>"/></a>
										</div>
										<p class="maxfu-team-introdution"><?php _e(get_post_meta(get_the_ID(), 'team_options_introduction', true)); ?><?php _e('[:en]Tel: [:zh]电话：'); ?><?php _e(get_post_meta(get_the_ID(), 'team_options_phone', true)); ?><?php _e('<br>'); ?><a href="http://<?php echo get_post_meta(get_the_ID(), 'team_options_website', true); ?>" target="_blank"><?php echo get_post_meta(get_the_ID(), 'team_options_website', true); ?></a></p>
									</div>
								</div>
							<?php endif; ?>
							<div class="maxfu-col-md-20p">
								<div class="maxfu-team-block">
									<div class="maxfu-agents-featured">
										<?php the_post_thumbnail( 'macland-agents-featured', array( 'class' => 'single-featured' )); ?>
									</div>
									<h6 class="maxfu-agents-name"><?php echo substr(get_the_title(), 4); ?></h6>
									<h6 class="maxfu-agents-position"><?php _e( get_post_meta(get_the_ID(), 'team_options_role', true), 'sparkling' ); ?></h6>
									<?php if( $options['display_contact'] == 'on' ) : ?>
										<dl class="dl-horizontal maxfu-agents-dl">
											<dt class="maxfu-agents-dt">
												<?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true) ): ?>
													<i class="fa fa-phone"></i>
												<?php endif; ?>
											</dt>
										  <dd class="maxfu-agents-dd">
												<?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true)): ?>
													<?php echo get_post_meta(get_the_ID(), 'staff_option_telephone', true); ?>
												<?php endif; ?>
												<?php if(get_post_meta(get_the_ID(), 'staff_option_email', true)): ?>
													<a class="maxfu-agents-email" href="mailto:<?php echo get_post_meta(get_the_ID(), 'staff_option_email', true); ?>"><i class="fa fa-envelope-o"></i></a>
												<?php endif; ?>
											</dd>
										</dl>
									<?php endif; ?>
								</div>
							</div>
							<?php if(get_post_meta(get_the_ID(), "team_options_leader", true) == "1"): ?>
								<div class="maxfu-col-md-60p">
									<div class="maxfu-team-block">
										<div class="maxfu-agents-featured">
											<img src="<?php echo get_post_meta(get_the_ID(), 'team_options_photo', true); ?>"/>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div id="finance" class="tab-pane fade">
				<?php
				$args = array(
					'post_type' => 'staff',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order'   => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'team',
							'field'    => 'slug',
							'terms'    => 'finance-team',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="col-md-12 maxfu-team-row">
							<?php if(get_post_meta(get_the_ID(), "team_options_leader", true) == "1"): ?>
								<div class="maxfu-col-md-20p">
									<div class="maxfu-team-block">
										<div class="maxfu-agents-featured">
											<img src="<?php echo get_post_meta(get_the_ID(), 'team_options_logo', true); ?>"/>
										</div>
										<p class="maxfu-team-introdution"><?php _e(get_post_meta(get_the_ID(), 'team_options_introduction', true)); ?><?php _e('[:en]Tel: [:zh]电话：'); ?><?php _e(get_post_meta(get_the_ID(), 'team_options_phone', true)); ?><?php _e('<br>'); ?><a href="http://<?php echo get_post_meta(get_the_ID(), 'team_options_website', true); ?>" target="_blank"><?php echo get_post_meta(get_the_ID(), 'team_options_website', true); ?></a></p>
									</div>
								</div>
							<?php endif; ?>
							<div class="maxfu-col-md-20p">
								<div class="maxfu-team-block">
									<div class="maxfu-agents-featured">
										<?php the_post_thumbnail( 'macland-agents-featured', array( 'class' => 'single-featured' )); ?>
									</div>
									<h6 class="maxfu-agents-name"><?php echo substr(get_the_title(), 4); ?></h6>
									<h6 class="maxfu-agents-position"><?php _e( get_post_meta(get_the_ID(), 'team_options_role', true), 'sparkling' ); ?></h6>
									<?php if( $options['display_contact'] == 'on' ) : ?>
										<dl class="dl-horizontal maxfu-agents-dl">
											<dt class="maxfu-agents-dt">
												<?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true) ): ?>
													<i class="fa fa-phone"></i>
												<?php endif; ?>
											</dt>
										  <dd class="maxfu-agents-dd">
												<?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true)): ?>
													<?php echo get_post_meta(get_the_ID(), 'staff_option_telephone', true); ?>
												<?php endif; ?>
												<?php if(get_post_meta(get_the_ID(), 'staff_option_email', true)): ?>
													<a class="maxfu-agents-email" href="mailto:<?php echo get_post_meta(get_the_ID(), 'staff_option_email', true); ?>"><i class="fa fa-envelope-o"></i></a>
												<?php endif; ?>
											</dd>
										</dl>
									<?php endif; ?>
								</div>
							</div>
							<?php if(get_post_meta(get_the_ID(), "team_options_leader", true) == "1"): ?>
								<div class="maxfu-col-md-60p">
									<div class="maxfu-team-block">
										<div class="maxfu-agents-featured">
											<img src="<?php echo get_post_meta(get_the_ID(), 'team_options_photo', true); ?>"/>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div id="executive" class="tab-pane fade">
				<?php
				$args = array(
					'post_type' => 'staff',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order'   => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'team',
							'field'    => 'slug',
							'terms'    => 'executive-team',
						),
					),
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="maxfu-col-md-20p">
							  <div class="maxfu-agents-block">
							    <div class="maxfu-agents-featured">
							      <?php the_post_thumbnail( 'macland-agents-featured', array( 'class' => 'single-featured' )); ?>
							    </div>
							    <h6 class="maxfu-agents-name"><?php echo substr(get_the_title(), 4); ?></h6>
							    <h6 class="maxfu-agents-position"><?php _e( get_post_meta(get_the_ID(), 'staff_option_position', true), 'sparkling' ); ?></h6>
							    <?php if( $options['display_contact'] == 'on' ) : ?>
							      <dl class="dl-horizontal maxfu-agents-dl">
							        <dt class="maxfu-agents-dt">
							          <?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true) ): ?>
							            <i class="fa fa-phone"></i>
							          <?php endif; ?>
							        </dt>
							        <dd class="maxfu-agents-dd">
							          <?php if(get_post_meta(get_the_ID(), 'staff_option_telephone', true)): ?>
							            <?php echo get_post_meta(get_the_ID(), 'staff_option_telephone', true); ?>
							          <?php endif; ?>
							          <?php if(get_post_meta(get_the_ID(), 'staff_option_email', true)): ?>
							            <a class="maxfu-agents-email" href="mailto:<?php echo get_post_meta(get_the_ID(), 'staff_option_email', true); ?>"><i class="fa fa-envelope-o"></i></a>
							          <?php endif; ?>
							        </dd>
							      </dl>
							    <?php endif; ?>
							  </div>
							</div>
					<?php endwhile; ?>
				<?php else : ?>
					<h1 style="text-align: center; margin: 20px; font-size: 32px; font-weight: 300"><?php _e('[:en]Coming soon...[:zh]敬请期待'); ?></h1>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</main><!-- #main maxfu -->
</section><!-- #primary -->
<?php get_footer(); ?>
