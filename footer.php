<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shift_Business
 */

?>
	<footer id="footer">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-3">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
				<!-- end .col-lg-3 -->
			
				<div class="col-lg-7">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
				<!-- end .col-lg-7 -->
			
				<div class="col-lg-2">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
				<!-- end .col-lg-2 -->
			</div>
			
			<?php if(get_field('copyright_text','option')): ?>
				<p class="copyright"><?php echo str_replace('/20\d{2}/', date('Y'), get_field('copyright_text','option')); ?></p>
			<?php else: ?>
				<p class="copyright">© <?php echo date('Y'); ?> Shift Consulting — All Rights Reserved.</p>
			<?php endif; ?>
		</div><!-- end .container -->
	</footer><!-- end -->
</div><!-- end #wrapper -->

	<?php wp_footer(); ?>
    </body>
</html>
