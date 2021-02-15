<?php get_header();?>

<div class="container mt-5 pb-5">

  <h2 class="pt-3 pb-3"><?php single_cat_title();?></h2>
<div class="col-md-9 p-0">
  
  <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="card mb-4">
     
       <img src="<?php the_post_thumbnail_url('smallest');?>" class="img-fluid">

     
      <div class="card-body">

      <?php if(has_post_thumbnail()):?>

     

      <?php endif;?>
        <div class="card-content pt-3">
          <h4><?php the_title();?></h4>  
          <?php the_excerpt();?>

        </div>
      <a href="<?php the_permalink();?>" class="btn btn-success">Ler mais</a>

      </div>
    </div>
  <?php endwhile; endif;?>

</div>

</div>


<?php get_footer();?>