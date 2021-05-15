<?php
/*
Template Name: Form Submit
Template Post Type: page
*/

get_header(); ?>
<section>
  <div class="container">
    <div class="thank-you">
      <?php if ($title = get_field('title')) : ?>
        <h2><?php echo $title; ?></h2>
      <?php endif; ?>
      <?php if ($desc = get_field('description')) : ?>
        <p><?php echo $desc; ?></p>
      <?php endif; ?>
    </div>
    <hr>
    <div class="social">
      <?php if ($social_title = get_field('social_title')) : ?>
        <h5><?php echo $social_title; ?></h5>
      <?php endif; ?>
      <?php if (have_rows('social_links', 'options')) : ?>
        <ul class="social-items">
          <?php 
          while (have_rows('social_links', 'options')) : the_row(); 
            $image = get_sub_field('image');
            $link = get_sub_field('link');
          ?>
            <li class="social-item">
              <a href="<?php echo $link; ?>" class="social-link" target="_blank">
                <img
                  src="<?php echo $image; ?>"
                  alt=""
                />
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </div>
  </div>
</section>
<?php get_footer(); ?>
