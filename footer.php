<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sparkling
 */
?>
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .site-content -->
<style type="text/css">
.maxfu-footer-search button#searchsubmit.btn.btn-default {
	background-color: #1f1f1f;
	border-color: #1f1f1f;
}
.maxfu-footer-row {
	text-align: center;
	padding: 0 70px;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-weight: lighter;
	color: #999999;
}
.maxfu-footer-nopadding {
	padding-left: 0;
	padding-right: 0;
}
.maxfu-footer-row a {
	color: #999999 !important;
}
</style>
<?php $options = get_option( 'macland-options', array() ); ?>
	<div id="footer-area">
		<div class="container<?php if( of_get_option( 'fluid_layout' ) ) echo '-fluid'; ?> footer-inner">
			<div class="row">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info container<?php if( of_get_option( 'fluid_layout' ) ) echo '-fluid'; ?>">
				<div class="row">
					<nav role="navigation" class="col-md-6">
						<?php sparkling_footer_links(); ?>
					</nav>
					<div class="col-md-6">
						<?php if( of_get_option('footer_social') ) sparkling_social_icons(); ?>
					</div>
				</div>
				<div class="row maxfu-footer-row">
					<div class="col-md-11 maxfu-footer-nopadding">
						<div class="col-md-12 maxfu-footer-nopadding" style="text-align: left;">
							<div class="col-md-7 maxfu-footer-nopadding" style="text-align: left; font-size: 14px;">
								<?php _e( '[:en]Macland Investment Group[:zh]麦克兰投资集团', 'sparkling' ); ?><br>
								<span style="margin-right: 8px;"><?php _e( '[:en]Tel: [:zh]电话：[:]' . $options['company_tel'], 'sparkling' ); ?></span><span style="margin-right: 8px;"><?php _e( '[:en]Fax: [:zh]传真：[:]' . $options['company_fax'], 'sparkling' ); ?></span><span><?php _e( '[:en]Address: [:zh]地址：[:]'. $options['company_address'], 'sparkling' ); ?></span>
							</div>
							<div class="col-md-2 maxfu-footer-nopadding" style="font-size: 22px; padding-top: 16px;">
								<i class="fa fa-facebook"></i>  <i class="fa fa-twitter"></i>  <i class="fa fa-linkedin"></i>  <i class="fa fa-google-plus"></i>  <i class="fa fa-weibo"></i>  <i class="fa fa-weixin"></i>
							</div>
							<div class="col-md-3 maxfu-footer-nopadding" style="padding-top: 19px;">
								<div class="maxfu-footer-search">
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
							</div>
						</div>
						<div class="col-md-12 maxfu-footer-nopadding" style="text-align: left;">
							<?php echo of_get_option( 'custom_footer_text', 'sparkling' ); ?>
							<?php sparkling_footer_info(); ?>
						</div>
					</div>
					<div class="col-md-1 maxfu-footer-nopadding">
						<img src="<?php echo $options['company_wechat']; ?>" style="max-width: 80px; max-height: 80px; float: right;">
					</div>
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php theme_insert_js( HEAD_CONTENT ); ?>
</body>
</html>
