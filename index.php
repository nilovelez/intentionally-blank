<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head><body <?php body_class(); ?>><div id="page">

<div class="site-title"><div class="site-title-bg">
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php $description = get_bloginfo( 'description', 'display' );
if ( $description || is_customize_preview() ) : ?>
	<p class="site-description"><?php echo $description; ?></p>
<?php endif; ?>
</div></div>
<?php echo blank_custom_logo() ?>

<footer id="colophon" class="site-footer"><div class="site-info">
	<?php _e('Intentionally Blank') ?> - <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'intentionally-blank' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'intentionally-blank' ), 'WordPress' ); ?></a>
</div></footer>
</div><!-- #page -->
<?php wp_footer(); ?></body></html>