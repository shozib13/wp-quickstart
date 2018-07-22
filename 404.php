<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Shift_Business
 */

get_header();
$banner_image = get_field('blog_banner', 'option');
$banner_title = '404 Error!';
?>
	<section id="page-banner">
		<div class="container">
			<div class="banner-capton" style="background-image: url(<?php echo $banner_image;  ?>)">
				<?php if(!empty($banner_title)): ?>
					<h1><?php echo $banner_title; ?></h1>
				<?php endif; ?>
			</div>
		</div>
	</section><!-- end #page-banner -->

	<section id="content" class="site-content">
		<div class="container">
			<div id="primary" class="content-area error-404">
				<main id="main" class="site-page">
					<h2 style="text-center">Not Found What You Are Lookin For</h2>
					<p style="text-center"><a href="<?php the_permalink(); ?>"><i class="fa fa-home"></i> Go Back To Home</a> <br><br> Or Search Following</p>
					<?php get_search_form(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</section>
<?php
get_template_part('template-parts/call-to-action');
get_footer();
