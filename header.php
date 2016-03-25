<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */
?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php $options = get_option( 'macland-options', array() ); ?>
<?php if( of_get_option( 'masonry_layout' ) ) echo '<script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>'; ?>
</head>

<body <?php body_class(); ?>>
<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-default <?php if( of_get_option( 'sticky_header' ) ) echo 'navbar-fixed-top'; ?>" role="navigation">
			<div class="container<?php if( of_get_option( 'fluid_layout' ) ) echo '-fluid'; ?>">
				<div class="row">
					<div class="site-navigation-inner col-sm-12">
						<div class="navbar-header">
							<button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div id="logo">
								<?php if( get_header_image() != '' ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
							<?php else : ?>
									<?php echo is_home() ?  '<h1 class="site-name">' : '<p class="site-name">'; ?>
									<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
									<?php echo is_home() ?  '</h1>' : '</p>'; ?>
								<?php endif; // header image was removed (again) ?>
							</div><!-- end of #logo -->
						</div>
						<?php if( $options['menu_search'] == 'on' ) : ?>
						<style type="text/css">
						.maxfu-header-search {
							position: relative;
							float: right;
							margin-top: 47px;
							padding-left: 15px;
							margin-right: 25px;
						}
						.maxfu-header-search .form-control:focus, .maxfu-footer-search .form-control:focus {
							border-color: #1f1f1f;
							-webkit-box-shadow: inset 0 0 0 rgba(0,0,0,.075), 0 0 0 rgba(0,0,0,.6);
							box-shadow: inset 0 0 0 rgba(0,0,0,.075), 0 0 0 rgba(0,0,0,.6);
						}
						.maxfu-header-search .input-group {
							width: auto;
						}
						.maxfu-header-search .input-group input.form-control.search-query {
							width: auto;
						}
						.maxfu-header-search .input-group span.input-group-btn {
							display: inline-block;
							float: left;
						}
						.maxfu-header-search input.form-control.search-query {
							border: 1px solid #1f1f1f;
						}
						.maxfu-header-search button#searchsubmit.btn.btn-default {
							color: #1f1f1f;
							background-color: #ffffff;
							border-color: #ffffff;
						}
						</style>
						<div class="maxfu-header-search">
							<form role="search" method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							  <div class="input-group">
							  	<label class="screen-reader-text" for="s"><?php _e( '[:en]Search for:[:zh]搜索：', 'sparkling' ); ?></label>
							    <input type="text" class="form-control search-query" placeholder="<?php _e( '[:en]Search...[:zh]搜索…', 'sparkling' ); ?>" value="" name="s" title="<?php _e( '[:en]Search for:[:zh]搜索：', 'sparkling' ); ?>">
							    <span class="input-group-btn">
							      <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Search" style=""><span class="glyphicon glyphicon-search"></span></button>
							    </span>
							  </div>
							</form>
						</div>
						<?php endif; ?>
						<?php sparkling_header_menu(); // main navigation ?>
					</div>
				</div>
			</div>
		</nav><!-- .site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if ( of_get_option( 'hide_caption' ) == 1 && of_get_option( 'sparkling_slider_checkbox' ) == 1 ) : ?>
		<style type="text/css">
		.maxfu-hide-flex-caption .flex-caption {
			display: none;
		}
		</style>
		<?php endif; ?>
		<div class="top-section<?php if( of_get_option( 'hide_caption' ) == 1 && of_get_option( 'sparkling_slider_checkbox' ) == 1 ) echo ' maxfu-hide-flex-caption'; ?>">
			<?php sparkling_featured_slider(); ?>
			<?php sparkling_call_for_action(); ?>
			<?php $activityDate = strtotime( $options['activity_date'] ); ?>
			<?php $todaysDate = time() - (time() % 86400); ?>
			<?php if ( is_front_page() && $options['activity_pic'] != '' && $todaysDate <= $activityDate) : ?>
				<style type="text/css">
				.maxfu-float-button {
					position: absolute;
					top: 128px;
					right: 0;
					background: #E83E33;
					color: #FFF;
					cursor: pointer;
					z-index: 999;
					padding-left: 18px;
					font-size: 14px;
					text-align: left;
					line-height: 32px;
					width: 128px;
					border-radius: 8px 0 0 8px;
					-webkit-transition: background-color .3s linear;
					-moz-transition: background-color .3s linear;
					-o-transition: background-color .3s linear;
					transition: background-color .3s linear;
				}
				#myModal-event .modal-dialog {
					margin-top: 5vh auto;
					text-align: center;
				}
				#myModal-event button.close {
					margin-top: 0;
					padding: 0 0 0 5px;
					font-size: 28px;
					color: #fff;
					opacity: .5;
				}
				#myModal-event button.close:hover {
					background: none;
				}
				#myModal-event .modal-content {
					display: inline-block;
				}
				#myModal-event .modal-body {
					display: inline-block;
					max-height: 90vh;
					overflow: hidden;
					text-align: center;
					padding: 0;
				}
				#myModal-event img {
					padding: 3px;
					border: 1px solid rgba(0,0,0,.2);
					border-radius: 6px;
					background-color: #fff;
					-webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
					box-shadow: 0 5px 15px rgba(0,0,0,.5);
					max-height: 100%;
				}
				@media (min-width: 768px) {
					#myModal-event .modal-content {
						-webkit-box-shadow: none;
						box-shadow: none;
						border: none;
						background: none;
					}
				}
				</style>
				<div class="maxfu-float-button" data-toggle="modal" data-target="#myModal-event">
				<span><?php _e( '[:en]Activity[:zh]近期活动', 'sparkling' ) ?></span>
				</div>
				<!-- Modal -->
				<div id="myModal-event" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-body">
				        <img src="<?php echo $options['activity_pic']; ?>"/>
								<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i></button>
				      </div>
				    </div>
				  </div>
				</div>
			<?php endif; ?>

		</div>

		<div class="container<?php if( of_get_option( 'fluid_layout' ) ) echo '-fluid'; ?> main-content-area">
            <?php $layout_class = get_layout_class(); ?>
			<div class="row <?php echo $layout_class; ?>">
				<div class="main-content-inner <?php echo sparkling_main_content_bootstrap_classes(); ?>">
