<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Shift_Business
 */

get_header();

?>

	<section id="content" class="blog-content">
		<div class="container">
			<div id="primary" class="content-area error-404">
				<main id="main" class="site-page">
					<h1 class="text-center">404! ERROR</h1>
					<h2 class="text-center">Not Found What You Are Lookin For</h2>
					<p class="text-center"><a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i> Go Back To Home</a></p>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</section>
<?php
get_template_part('template-parts/call-to-action');
get_footer();
