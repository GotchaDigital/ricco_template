	<?php focuson_ninzio_global_variables();?>
		<!-- footer start -->
		<footer class='footer'>

			<?php //include "mktz/templates/footer/top.php"; ?>

			<div class="footer-widget-area nz-clearfix">
				<div class="container">
					<?php get_sidebar('footer'); ?>
				</div>
			</div>
			<div class="footer-info-area nz-clearfix">
				<div class="container">
					<?php if (isset($GLOBALS['focuson_ninzio']['footer-copy']) && $GLOBALS['focuson_ninzio']['footer-copy']): ?>
						<div class="footer-copyright nz-clearfix">
							<?php echo $GLOBALS['focuson_ninzio']['footer-copy']; ?>
						</div>
					<?php endif ?>
					<?php if (isset($GLOBALS['focuson_ninzio']['footer-social']) && $GLOBALS['focuson_ninzio']['footer-social'] == 1): ?>
						<div class="social-links">
							<?php include(get_template_directory().'/includes/social-links.php'); ?>
						</div>
					<?php endif ?>
					<?php if(has_nav_menu("footer-menu")): ?>
						<nav class="footer-menu nz-clearfix">
							<?php wp_nav_menu(array( 
								'theme_location' => 'footer-menu', 
								'depth'          => 1, 
								'container'      => false, 
								'menu_id'        => 'footer-menu',
								'link_before'    => '',
								'link_after'     => ''
							)); ?>
						</nav>
					<?php endif; ?>
				</div>
			</div>
		</footer>
		<!-- footer end -->
		</div>
	</div>
	<!-- wrap end -->
</div>
<a id="top" href="#wrap"></a>
<!-- general wrap end -->

<script>
	document.write(
		'<script src="http://' +
		(location.host || 'localhost').split(':')[0] +
		':35729/livereload.js?snipver=1"></' +
		'script>')
</script>

<?php include(get_template_directory()."/includes/dynamic-scripts.php"); ?>
<?php wp_footer(); ?>
</body>
</html>