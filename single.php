<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			<div class="row">
				<?php get_sidebar(); ?>

				<div class="col-lg-9">
					<div id="primary" class="content-area">
						<main id="main" class="site-single-page">

							<?php while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/content', 'single');
								// the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile; ?>
						</main><!-- end #main -->
					</div><!-- end #section -->
				</div><!-- end .col-lg-9 -->
			</div><!-- end .row -->
		</div><!-- end .container -->
	</section><!-- end #content -->
<?php
get_footer();