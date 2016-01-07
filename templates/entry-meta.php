<div class="author-image author-image-small">
  <?php echo get_avatar( get_the_author_meta( 'ID' ) , 32); ?>
</div>
<?php
  echo get_the_category_list(", ")
?>
<br>
<time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>
<p class="byline author vcard"><?= __('By', 'sage'); ?> 
  <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a>
</p>
