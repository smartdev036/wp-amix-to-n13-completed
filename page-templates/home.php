<?php
/*
Template Name: Home
Template Post Type: page
*/

get_header(); ?>
<section class="hero">
  <div class="container">
    <?php if ($title = get_field('h_title')) : ?>
      <h2><?php echo $title; ?></h2>
    <?php endif; ?>
    <?php if ($link = get_field('h_btn')) : ?>
      <a href="<?php echo $link['url']; ?>" class="btn btn-primary btn-donate"><?php echo $link['title']; ?></a>
    <?php endif; ?>
    <a href="#hero-video" class="btn-scroll-link">
      <svg
        width="15"
        height="51"
        viewBox="0 0 15 51"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M7.5 1L7.5 49"
          stroke="#695E4A"
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path
          d="M1 43.5L7.5 50L14 43.5"
          stroke="#695E4A"
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </a>
  </div>
</section>

<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section', array('id' => 'hero-video')); ?>


<section class="text-cta-module">
  <div class="container">
    <?php if ($s_title = get_field('s_title')) : ?>
      <h4><?php echo $s_title; ?></h4>
    <?php endif; ?>
    <div class="content">
      <hr />
      <div class="cta-text__wrapper">
        <?php if ($s_btn = get_field('s_btn')) : ?>
          <a href="<?php echo $s_btn['url']; ?>" class="btn btn-secondary btn-cta"><?php echo $s_btn['title']; ?></a>
        <?php endif; ?>
        <?php if ($s_text = get_field('s_desc')) : ?>
          <div class="cta-text"><?php echo $s_text; ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section id="hearts">
  <?php if ($t_image = get_field('t_image')) : ?> 
    <div class="image-module">
      <div class="image-module__inner">
        <img src="<?php echo $t_image['url']; ?>" alt="<?php echo $t_image['title']; ?>" />
      </div>
    </div>
  <?php endif; ?>
  <div class="text-cta-module half">
    <div class="container">
      <?php if ($t_title = get_field('t_title')) : ?>
        <h3><?php echo $t_title; ?></h3>
      <?php endif; ?>
      <hr />
      <div class="cta-text__wrapper">
        <?php if ($t_btn = get_field('t_btn')) : ?>
          <a href="<?php echo $t_btn['url']; ?>" class="btn btn-secondary btn-cta"><?php echo $t_btn['title']; ?></a>
        <?php endif; ?>
        <?php if ($t_desc = get_field('t_desc')) : ?>
          <div class="cta-text"><?php echo $t_desc; ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="title-cta-module">
    <div class="container">
      <hr />
      <?php if ($g_title = get_field('g_title')) : ?>
        <h5><?php echo $g_title; ?></h5>
      <?php endif; ?>
      <?php if ($g_btn = get_field('g_btn')) : ?>
        <a href="<?php echo $g_btn['url']; ?>" class="btn btn-primary bt-cta"><?php echo $g_btn['title']; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="news">
  <div class="container-fluid">
    <h3>Foundation News</h3>
    <div class="news-wrapper">
      <?php 
      $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'posts_per_page' => '3',
      );
      $related = new WP_Query( $args );
      if ($related->have_posts()) :
        while ($related->have_posts()) : $related->the_post();
          get_template_part('partials/content-single', 'news', array('news' => $post));
        endwhile;
      endif;
      wp_reset_query();
      ?>
    </div>
    <div class="news-link__wrapper">
      <hr>
      <a href="<?php echo esc_url(home_url( '/news/' )) ?>" class="btn-link">
        <span class="text">Visit all news</span>
        <svg
          width="51"
          height="15"
          viewBox="0 0 51 15"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M1 7.5L49 7.5"
            stroke="#695E4A"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M43.5 14L50 7.5L43.5 1"
            stroke="#695E4A"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </a>
    </div>
  </div>
</section>
<?php get_footer(); ?>