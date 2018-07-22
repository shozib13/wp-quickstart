<?php
/**
* Template Name: Home
*/
get_header();
?>

<?php if( have_rows('sections') ): while ( have_rows('sections') ) : the_row();

if( get_row_layout() == 'slider' ): ?>


<?php elseif( get_row_layout() == 'cloud_solution_section' ):  ?>

<?php elseif( get_row_layout() == 'why_cloud_section' ):  ?>


<?php elseif( get_row_layout() == 'industry_reference_section' ):  ?>


<?php elseif( get_row_layout() == 'default_article_section' ):  ?>



<?php endif; endwhile; endif; ?>
<?php get_footer(); ?>