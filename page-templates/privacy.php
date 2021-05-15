<?php
/*
Template Name: Privacy
Template Post Type: page
*/

get_header(); 
if (have_posts()) :
  while (have_posts()) : the_post(); ?>
  <section class="privacy">
    <div class="container-fluid">
      <h3 class="title"><?php the_title(); ?></h3>
      <div class="content"><?php the_content(); ?></div>
    </div>
  </section>
<?php 
  endwhile;
endif;
wp_reset_query();
get_footer(); 
?>
