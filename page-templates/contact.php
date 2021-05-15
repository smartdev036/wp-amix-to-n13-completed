<?php
/*
Template Name: Contact
Template Post Type: page
*/

get_header(); ?>
<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section'); ?>

<section id="connected">
  <div class="container-fluid">
    <?php if ($i_title = get_field('i_title')) : ?>
      <div class="section-left">
        <h4><?php echo $i_title; ?></h4>
      </div>
    <?php endif; ?>
    <?php if (have_rows('contact_item')): ?>
    <div class="section-right">
      <hr>
      <div class="connected-items">
        <?php 
        while (have_rows('contact_item')): the_row(); 
          if (get_row_layout() == 'text_module') : 
            $title = get_sub_field('title');
            $text = get_sub_field('text'); ?>
          <div class="connected-item">
            <?php if ($title) : ?>
              <p class="label"><?php echo $title; ?></p>
            <?php endif; ?>
            <?php if ($text) : ?>
              <div class="content"><?php echo $text; ?></div>
            <?php endif; ?>
          </div>
          <?php 
          elseif (get_row_layout() == 'social_module') : 
            $title = get_sub_field('title');
          ?>
          <div class="connected-item">
            <?php if ($title) : ?>
              <p class="label"><?php echo $title; ?></p>
            <?php endif; ?>
            <?php if (have_rows('social_items')) : ?>
              <div class="social-links">
                <?php 
                while(have_rows('social_items')) : the_row();
                  $link = get_sub_field('link');
                  $image = get_sub_field('image'); ?>
                    <a href="<?php echo $link['url']; ?>" class="social-link">
                      <img src="<?php echo $image; ?>" alt="">
                    </a>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>
          <?php endif; 
        endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<section id="contact-us">
  <div class="container-fluid">
    <?php if ($f_title = get_field('f_title')) : ?>
    <div class="section-left">
      <h4><?php echo $f_title; ?></h4>
    </div>
    <?php endif; ?>
    <div class="section-right">
      <?php if ($form = get_field('form')) : echo do_shortcode($form); endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>