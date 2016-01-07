<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
$users = get_users( 'blog_id=1&orderby=nicename' );
// Array of WP_User objects.
foreach ( $users as $user ) {
  if($user->ID == 2) {
  } else {
?>

  <div class="col-sm-3">
    <div class="well">
      <div class="author-image center-block">
        <?php echo get_avatar( $user->ID, 128 ); ?>
      </div>
      <hr class="dark">
      <a href="<?php echo get_author_posts_url( $user->ID ); ?>"><h3><?php echo get_the_author_meta( 'display_name', $user->ID ); ?></h3></a>
    </div>
  </div>

<?php 
  };
}
?>
