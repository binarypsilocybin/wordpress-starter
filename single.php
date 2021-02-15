<?php get_header();?>

<div class="container mt-3 pb-5">
  <div class="col-md-9 m-0 p-0">
    <h2 class="pt-3"><?php the_title();?></h2>
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <p class="mt-3 mb-3 text-muted"><?php the_date(); ?></p>
      <?php if(has_post_thumbnail()):?>
      <img src="<?php the_post_thumbnail_url('largest');?>" class="img-fluid">
      <?php endif;?>
      <div class="content-area">
        <p><?php the_content();?></p>
        <?php endwhile; endif;?>
      </div>
  </div>
</div>

<?php get_footer();?>