<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shift_Business
 */

get_header();
$banner_image = get_field('banner_image') ? get_field('banner_image') : get_field('blog_banner', 'option');
$banner_title = get_field('banner_custom_title');
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
			<div id="primary" class="content-area">
				<main id="main" class="site-page">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</section>
<?php
get_template_part('template-parts/call-to-action');
get_footer();
