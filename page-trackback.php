<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php

// check if the repeater field has rows of data
if( have_rows('tab_section') ): ?>

<?php while ( have_rows('tab_section') ) : the_row(); ?>

  <div class="well">
    <h2><?php the_sub_field('title'); ?></h2>
    <hr>
    <p><?php  the_sub_field('body'); ?></p>
  </div>

<?php 
  endwhile;
  else :
  endif;
?>
