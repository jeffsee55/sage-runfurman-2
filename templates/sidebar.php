<div class="row">
  <?php if ( is_author() ) { ?>
    <h3>About <?php the_author_meta('display_name'); ?></h3>
    <div class="well">
      <?php echo nl2br(get_the_author_meta('description')); ?>
    </div>
  <?php } ?>
</div>
<?php if ( is_page('trackback') ) { ?>
  <div class="row">
      <div class="well">
        <?php dynamic_sidebar('sidebar-contact'); ?>
      </div>
  </div>
<?php } else { ?>
  <?php dynamic_sidebar('sidebar-primary'); ?>
<?php }; ?>
