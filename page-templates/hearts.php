<?php
/*
Template Name: Hearts
Template Post Type: page
*/

get_header(); ?>
<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section'); ?>

<section id="heart">
  <div class="container-fluid">
    <div class="title-image-content-module">
      <?php if ($title = get_field('w_title')) : ?>
        <h4><?php echo $title; ?></h4>
      <?php endif; ?>
      <div class="content-wrapper">
        <hr />
        <div class="content">
          <?php if ($image = get_field('w_image')) : ?>
          <div class="content-image">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
          </div>
          <?php endif; ?>
          <?php if ($content = get_field('w_content')) : ?>
            <div class="content-text"><?php echo $content; ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="hearts-gallery">
  <div class="container-fluid">
    <?php if ($g_title = get_field('g_title')) : ?>
      <h3 class="title"><?php echo $g_title; ?></h3>
    <?php endif; ?>
    <div class="news-module">
      <?php if ($g_year = get_field('g_year')) : ?>
        <p class="news-category">
          <span class="text"><?php echo $g_year; ?></span>
          <span class="line"></span>
        </p>
      <?php endif; ?>
      <div class="news-content">
        <div class="news-content__left">
          <?php if ($g_subtitle = get_field('g_subtitle')) : ?>
            <h5><?php echo $g_subtitle; ?></h5>
          <?php endif; ?>
          <?php if ($g_desc = get_field('g_desc')) : ?>
            <div class="news-excerpt">
              <?php echo $g_desc; ?>
            </div>
          <?php endif; ?>
          <?php if ($image = get_field('g_image')) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="mobile-img">
          <?php endif; ?>
          <?php if ($g_button = get_field('g_button')) : ?>
            <a href="<?php echo $g_button['url']; ?>" class="btn btn-secondary">
              <?php echo $g_button['title']; ?>
            </a>
          <?php endif; ?>
        </div>
        <div class="news-content__right">
          <?php if ($image = get_field('g_image')) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="desktop-img">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sponsors-section">
  <div class="container-fluid">
    <?php if ( $s_title = get_field('s_title') ) : ?>
      <h3><?php echo $s_title; ?></h3>
    <?php endif; ?>
    <?php if (have_rows('sponsors')) : ?>
      <div class="sponsors">
        <?php while (have_rows('sponsors')) : the_row(); 
        $logo = get_sub_field('logo'); 
        $link = get_sub_field('link'); ?>
        <a href="<?php echo $link['url']; ?>" class="sponsor">
          <img src="<?php echo $logo; ?>" alt="<?php echo $link['title']; ?>">
        </a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
 