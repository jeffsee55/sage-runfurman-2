  <?php
    if( have_rows('announcement') ):
  ?>
    <div class="well announcement-well">
      <div class="announcement-tag">Announcements</div>
      <ul>
      <?php 
        while ( have_rows('announcement') ) : the_row();
      ?>
        <li>
          <img class="announcement-img img-responsive img-circle center-block" src="<?php the_sub_field('announcement_image'); ?>">
          <div class="announcement-text"><?php the_sub_field('announcement_text'); ?></div>
        </li>
    <?php 
      endwhile;
    ?>
      </ul>
  <?php
    else :
    endif;
  ?>
</div>
<div class="clearfix">
  <div class="jumbotron-ads">
    <div class="jumbotron jumbotron-banner col-sm-6">
      <div class="text">
        <?php the_field("text"); ?>
      </div>
      <div class="img">
        <img src="<?php the_field("image"); ?>"/>
      </div>
    </div>
    <div class="jumbotron jumbotron-banner col-sm-6">
      <div class="text">
        <?php the_field("text_2"); ?>
      </div>
      <div class="img">
        <img src="<?php the_field("image_2"); ?>"/>
      </div>
    </div>
  </div>
  <!-- Recent post content query -->
  <h1>Recent Posts</h1>
  <hr class="dark">
  <ul>
  <?php
    $recentPosts = new WP_Query( array( 'posts_per_page' => 3 ) );
  ?>

  <?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>

  <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
    <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  <?php endwhile; ?>
  </ul>

  <?php the_posts_navigation(); ?>

  <ul>
  <?php
    wp_reset_query();
    $videos = new WP_Query( 'category_name=videos' );
  ?>

  <?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>

    <h2>Videos</h2>
    <hr class="dark">

    <div id="carousel-example-generic" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php while ($videos->have_posts()) : $videos->the_post(); ?>
          <div class="item">
            <?php get_template_part('templates/content-video', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
          </div>
        <?php endwhile; ?>
      </div>

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
  </ul>

  <?php wp_reset_query(); ?>

  <div class="jumbotron">
    <h2>Furman Elite wants to thank its sponsors:</h2>
    <hr>
    <div class="jumbotron-sponsors">
      <div class="sponsor-slot">
        <img class="img-responsive" src="<? the_field("slot_1"); ?>">
      </div>
      <div class="sponsor-slot">
        <img class="img-responsive" src="<? the_field("slot_2"); ?>">
      </div>
      <div class="sponsor-slot">
        <img class="img-responsive" src="<? the_field("slot_3"); ?>">
      </div>
      <div class="sponsor-slot">
        <img class="img-responsive" src="<? the_field("slot_4"); ?>">
      </div>
      <div class="sponsor-slot">
        <img class="img-responsive" src="<? the_field("slot_5"); ?>">
      </div>
    </div>
  </div>
</div>

<!-- Home page content query -->
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>


<?php the_posts_navigation(); ?>
