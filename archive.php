<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shift_Business
 */

get_header();
$banner_image = get_field('blog_banner', 'option');
?>
	<section id="page-banner">
		<div class="container">
			<div class="banner-capton" style="background-image: url(<?php echo $banner_image;  ?>)">
			<?php
				the_archive_title( '<h1>', '</h1>' );
				// the_archive_description( '<div class="archive-description">', '</div>' );
			?>
			</div>
		</div>
	</section><!-- end #page-banner -->

	<section id="content" class="site-content">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>

				<div class="col-lg-9">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								numaric_pagination();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</main><!-- end #main -->
					</div><!-- end #section -->
				</div><!-- end .col-lg-9 -->
			</div><!-- end .row -->
		</div><!-- end .container -->
	</section><!-- end #content -->
<?php
get_template_part('template-parts/call-to-action');
get_footer();
