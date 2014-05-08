<?php get_header(); ?>

<?php get_template_part( 'view', is_photochrom_post_type() ? 'set' : 'article' ); ?>

<?php get_footer(); ?>