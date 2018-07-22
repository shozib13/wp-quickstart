<?php

/**
 * Theme Options
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options'
    ));
}

/*Post Category And Tags*/
function post_tags_categories() {
    if ( 'post' === get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'shift-business' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'shift-business' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'shift-business' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'shift-business' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }
}

/**
* Numaric Pagination
*/

function numaric_pagination() { 

    global $wp_query; 
    
    $big = 12345678; 
    $page_format = paginate_links( array( 
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ), 
        'format' => '?paged=%#%', 
        'prev_text'          => __('<'),
        'next_text'          => __('>'),
        'current' => max( 1, get_query_var('paged') ), 
        'total' => $wp_query->max_num_pages, 
        'type'  => 'array' 
    ) ); 
 
    if( is_array($page_format) ) { 
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged'); 
            echo '<div class="numaric-pagination"><ul>'; 
            foreach ( $page_format as $page ) { 
                    echo "<li>$page</li>"; 
            } 
           echo '</ul></div>'; 
    } 
} 

/**
 * Remove Excerpt Quote
 */
function nebulr_excerpt_more( $more ) {
    return '';
}

add_filter('excerpt_more', 'nebulr_excerpt_more');


/**
 * Custom Excerpt Length
 */
function excerpt($limit) {
  $content = explode(' ', get_the_excerpt(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 *  Entry Footer
 */

 if ( ! function_exists( 'hs_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hs_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'shift-business' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'shift-business' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'shift-business' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'shift-business' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'shift-business' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'shift-business' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Address Widget
 */
class Shift_Location extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'location_widget', 
			esc_html__( 'Location', 'shift-business' ), 
			array( 'description' => esc_html__( 'Shift Location Fields', 'shift-business' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
 
        $widget_id = 'widget_' . $args['widget_id'];

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
    ?>
        <div class="row">
            <div class="col-md-7">
                <?php 
                    the_field('location_1', $widget_id);
                ?>
            </div>

            <div class="col-md-5">
                <?php 
                    the_field('location_2', $widget_id);
                ?>
            </div>
        </div>
    <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} 

function shift_location() {
    register_widget( 'Shift_Location' );
}
add_action( 'widgets_init', 'shift_location' );



/**
 * Social Link Widget
 */
class Social_Icon extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'social_widget', 
			esc_html__( 'Social Links', 'shift-business' ), 
			array( 'description' => esc_html__( 'Add Social Links', 'shift-business' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
 
        $widget_id = 'widget_' . $args['widget_id'];

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
    ?>
    <?php if(have_rows('social_links', $widget_id)):  ?>
    <div class="social-links">
        <?php while(have_rows('social_links', $widget_id)): the_row(); ?>
        <a href="<?php the_sub_field('link'); ?>" target="_blank">
           <?php the_sub_field('icon'); ?>
        </a>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} 

function social_icon() {
    register_widget( 'Social_Icon' );
}
add_action( 'widgets_init', 'social_icon' );

