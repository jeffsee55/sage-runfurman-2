<?php
/**
 * Template Name: Training Venues Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'venues'); ?>
<?php endwhile; ?>
