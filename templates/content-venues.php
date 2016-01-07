<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <?php if( have_rows('venue_slider') ): ?>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php while ( have_rows('venue_slider') ) : the_row(); ?>
      <div class="item">
        <div class="venue-img">
          <img src="<?php the_sub_field('venue_image'); ?>">
        </div>
        <div class="venue-description">
          <h1><?php the_sub_field('venue_title'); ?></h1>
          <hr>
          <p><?php the_sub_field('venue_description'); ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <?php 
    else :
      
    endif;
  ?>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
