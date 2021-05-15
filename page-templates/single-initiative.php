<?php
/*
Template Name: Single Initiative
Template Post Type: page
*/

get_header(); ?>
<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section'); ?>

<section class="text-cta-module">
  <div class="container">
    <?php if ($s_title = get_field('s_title')) : ?>
      <h4><?php echo $s_title; ?></h4>
    <?php endif; ?>
    <div class="content">
      <hr />
      <div class="cta-text__wrapper">
        <?php if ($s_link = get_field('s_link')) : ?>
          <a href="<?php echo $s_link['url']; ?>" class="btn btn-primary btn-cta"><?php echo $s_link['title']; ?></a>
        <?php endif; ?>
        <?php if ($s_desc = get_field('s_desc')) : ?>
          <div class="cta-text"><?php echo $s_desc; ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<section class="slider-section" id="our-values">
  <div class="container-fluid">
    <?php if ($i_title = get_field('i_title')) : ?>
      <h3 class="section-title"><?php echo $i_title; ?></h3>
    <?php endif; ?>
    <?php if (have_rows('slider')) : ?>
    <div class="slider-wrapper">
      <div class="slider-control">
        <button class="btn-slider prev">
          <svg
            width="51"
            height="15"
            viewBox="0 0 51 15"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M50 7.5L2 7.5"
              stroke="#695E4A"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M7.5 1L1 7.5L7.5 14"
              stroke="#695E4A"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
        <div class="slider-navigator">
          <span class="current-num">1</span>&nbsp;/&nbsp;
          <span class="total-num">3</span>
        </div>
        <button class="btn-slider next">
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
        </button>
      </div>
      <div class="our-values slick-carousel" id="values-slider">
        <?php while (have_rows('slider')) : the_row();
        $image = get_sub_field('image');
        $title = get_sub_field('title');
        $desc = get_sub_field('description'); ?>
        <div class="slick-slide__item">
          <div class="our-value">
            <div class="our-value__image">
              <img
                src="<?php echo $image; ?>"
                alt=""
              />
            </div>
            <h5 class="our-value__title">
              <?php echo $title; ?>
            </h5>
            <div class="our-value__desc">
              <?php echo $desc; ?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<section id="news">
  <div class="container-fluid">
    <?php if ($n_title = get_field('n_title')) : ?>
      <h3><?php echo $n_title; ?></h3>
    <?php endif; ?>
    <?php 
    $news = get_field('news'); 
    if ($news) : 
      $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'post__in' => $news
      );
      $news = new WP_Query( $args );
    ?>
    <div class="news-wrapper">
      <?php 
      while ($news->have_posts()) : $news->the_post();
        get_template_part('partials/content-single', 'news', array('news' => $post));
      endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>