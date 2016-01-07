<?php use Roots\Sage\Titles; ?>

<?php
  if(has_post_thumbnail()) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
  } else {
    $thumb_url[0] = "http://localhost:8888/runfurman/wp-content/uploads/2014/01/jumbo-belltower.jpg";
  }
?>
<div class="page-header jumbotron jumbotron-main" style='background-image: url("<?php echo $thumb_url[0]; ?>")'>
  <div class="overlay"></div>
  <div class="container">
    <?php if ( is_author() ) { ?>
      <div class="author-image">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 128); ?>
      </div>
    <?php } ?>

    <div class="details">
      <?php if(is_front_page()) { ?>
        <h1>Run<strong>Furman</strong></h1>
        <h1>Start Small. Think Big.</h1>
      <?php } else { ?>
        <h1><?= Titles\title(); ?></h1>
      <?php } ?>
    </div>
  </div>
</div>
