<?php 
// Single News

get_header();

if (have_posts()): 
  while(have_posts()) : the_post(); 
?>
<!-- Flex Module -->
<div class="container-fluid">
  <?php 
    $categories = get_the_category(); 
  ?>
  <div class="breadcrumbs">
    <a href="<?php echo esc_url(home_url( '/news/' )); ?>">News</a> 
    <span class="seperator">/</span> 
    <?php foreach($categories as $category) {
        if ($category->parent) { ?>
          <a href="<?php echo esc_url(home_url( '/news/' )) . '?cat=' . $category->term_id; ?>"><?php echo $category->name; ?></a>
          <?php }
    } ?>
    <span class="seperator">/</span>
    <?php the_title(); ?>  
  </div>

  <?php 
    if (! empty($categories)) : ?>
    <div class="text-line-module">
      <p class="category text">
      <?php foreach($categories as $category) {
        if ($category->parent) { ?>
          <span><?php echo $category->name; ?></span>
          <?php }
      } ?>
      </p>
    </div>
  <?php endif; ?>
  <div class="news-page-content">
    <aside class="news-info">
      <h3 class="news-title"><?php the_title(); ?></h3>
      <?php if (get_the_excerpt()) : ?>
        <div class="news-excert"><?php the_excerpt(); ?></div>
      <?php endif; ?>
      <div class="news-image">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="" />
      </div>
      <div class="social-share">
        <p class="text">Share</p>
        <?php echo do_shortcode('[addtoany]'); ?>
      </div>
    </aside>
    <div class="content">
      <div class="news-image image">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="" />
      </div>
      <?php if (have_rows('content')) :
      while (have_rows('content')) : the_row(); ?>
        <!-- Text Module  -->
        <?php if (get_row_layout() == 'text_module') : ?>
          <?php if ($text = get_sub_field('text')) : ?>
            <div class="text"><?php echo $text; ?></div>
          <?php endif; ?>
        <?php endif; ?>
        <!-- Blockquote Module -->
        <?php if (get_row_layout() == 'blockquote_module') : 
          $content = get_sub_field('content');
          $name = get_sub_field('name');
          ?>
          <?php if ($content) : ?>
            <blockquote>
              <?php echo $content; ?>
              <span class="name"><?php echo $name; ?></span>
            </blockquote>
          <?php endif; ?>
        <?php endif; ?>
        <!-- Image Module -->
        <?php if (get_row_layout() == 'image_module') : 
        $image = get_sub_field('image'); 
        if ($image) : ?>
          <div class="image">
            <img src="<?php echo $image['url']; ?>" alt="" />
          </div>
        <?php endif; 
        endif; ?>
      <?php endwhile;
      endif; ?>
    </div>
  </div>
</div>
<!-- Iamge gallery -->
<?php if (have_rows('image_slider')) : ?>
<section class="slider-section" id="image-gallery">
  <div class="container-fluid">
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
          <span class="total-num">5</span>
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
      <div class="slick-carousel" id="single-news-gallery">
        <?php while (have_rows('image_slider')) : the_row(); 
        $image = get_sub_field('image'); ?>
        <div class="slick-slide__item">
          <div class="gallery-image">
            <img src="<?php echo $image['url']; ?>" alt="" />
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="post-navigation">
  <div class="container-fluid">
    <div class="navigation-buttons">
      <?php 
      $prev_post = get_previous_post();
      if( ! empty($prev_post) ) : ?>
        <a href="<?php echo get_permalink( $prev_post ); ?>" class="btn-link prev-post-link">
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
          <span class="text">Previous</span>
        </a>
      <?php endif; ?>
      <?php $next_post = get_next_post();
      if ( ! empty($next_post) ) : ?>
        <a href="<?php echo get_permalink( $next_post ); ?>" class="btn-link next-post-link">
          <span class="text">Next</span>
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
      <?php endif; ?>
    </div>
  </div>
</section>
<?php if (have_rows('title_cta')) :
while (have_rows('title_cta')) : the_row();
  $title = get_sub_field('title');
  $cta = get_sub_field('cta'); ?>
  <section class="title-cta-module">
    <div class="container">
      <hr />
      <?php if ($title) : ?>
        <a><h5><?php echo $title; ?></h5>
      <?php endif; ?>
      <?php if ($cta) : ?>
        <a href="<?php echo $cta['url']; ?>" class="btn btn-primary bt-cta">
          <?php echo $cta['title']; ?>
        </a>
      <?php endif; ?>
    </div>
  </section>
<?php 
  endwhile;
endif; ?>
<section id="related-news">
  <div class="container-fluid">
    <h3>You Might Also Like</h3>
    <div class="news-wrapper">
      <?php 
      $exclude_ids = array($post->ID);
      $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'posts_per_page' => '3',
        'post__not_in' => $exclude_ids
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
  </div>
</section>
<?php 
  endwhile;
endif;
wp_reset_query();
get_footer(); 
?>