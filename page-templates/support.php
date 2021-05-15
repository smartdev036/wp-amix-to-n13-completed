<?php
/*
Template Name: Support
Template Post Type: page
*/

get_header(); ?>

<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section'); ?>

<section>
  <div class="container-fluid">
    <?php if ($title = get_field('title')) : ?>
      <div class="title-module">
        <h4><?php echo $title; ?></h4>
      </div>
    <?php endif; ?>
    <?php while (have_rows('support_module')) : the_row(); ?>
    <div class="support-module">
      <div class="support-module__left">
        <?php if ($title = get_sub_field('title')) : ?>
          <h5><?php echo $title; ?></h5>
        <?php endif; ?>
        <?php if ($desc = get_sub_field('desc')) : ?>
          <p><?php echo $desc; ?></p>
        <?php endif; ?>
        <?php if ($image = get_sub_field('image')) : ?>
        <div class="image-module">
          <div class="image-module__inner">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
          </div>
        </div>
        <?php endif; ?>
        <?php if ($button = get_sub_field('button')) : ?>
          <a href="<?php echo $button['url']; ?>" class="btn btn-secondary"><?php echo $button['title']; ?></a>
        <?php endif; ?>
      </div>
      <div class="support-module__right">
        <?php if ($image) : ?>
        <div class="image-module">
          <div class="image-module__inner">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</section>
<section>
  <div class="title-cta-module">
    <div class="container">
      <hr />
      <?php if ($cta_title = get_field('cta_title')) : ?>
        <h5><?php echo $cta_title; ?></h5>
      <?php endif; ?>
      <?php if ($cta_link = get_field('cta_link')) : ?>
        <a href="<?php echo $cta_link['url']; ?>" class="btn btn-primary bt-cta"><?php echo $cta_link['title']; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>