<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="wrapper">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shift_Business
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv-printshiv.js"></script>
<![endif]-->

<?php if(get_field('favicon','option')): ?>
  <link rel="icon" href="<?php the_field('favicon','option'); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="wrapper">
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-6">
						<div class="logo">
							<a href="<?php echo home_url(); ?>"><img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name') ?>"></a>
						</div>
					</div><!-- end .col-md-3 -->
					<div class="col-lg-9 col-6">
						<nav id="nav">
							<?php wp_nav_menu( array( 'name' => 'primary-menu', 'container' => false) ); ?>
						</nav>

						<div id="mobile-menu">
							<a href="#"><i class="fa fa-bars"></i></a>
						</div>

						<div id="sidr"></div>
					</div>
				</div><!-- end .row -->
			</div><!-- end .container -->
		</header><!-- end #header -->
