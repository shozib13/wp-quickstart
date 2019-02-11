<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package greenapple
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<?php if(has_post_thumbnail()): ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail('post-thumbnails'); ?>
		</a>
	<?php endif; ?>

	<div class="entry-content">
		<?php echo excerpt(30); ?>
	</div><!-- end .entry-content -->

	<div class="entry-meta">
		<?php the_author_posts_link(); ?>  on <?php echo the_time('M d, YY'); ?>
	</div>

	<a href="<?php the_permalink(); ?>" class="readmore-blog">Read more...</a>

</article><!-- end article -->
