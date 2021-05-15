<div class="slider-wrapper">
  <p class="text-caption-lg"><?php echo $args['title']; ?></p>
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
  <div
    class="slick-carousel person-slider"
  >
    <?php 
    $directors = new WP_Query([
      'post_type' => 'Team',
      'category_name' => $args['category'], 
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC'
    ]);
    if ($directors->have_posts()) : 
      while ($directors->have_posts()) : $directors->the_post(); 
      $name = get_the_title();
      $role = get_field('role', $post->ID);
      $image = get_field('image', $post->ID);
      $bio = get_field('bio', $post->ID);
      ?>
      <div class="slick-slide__item">
        <div class="person-wrapper">
          <div class="person <?php echo ($image) ? '' : 'no-image'; ?>">
            <div class="person-front">
              <?php if ($image) : ?>
              <div class="person-image">
                <img
                  src="<?php echo $image; ?>"
                  alt=""
                />
              </div>
              <?php endif; ?>
              <div class="person-info">
                <p class="person-name"><?php echo $name; ?></p>
                <p class="person-role"><?php echo $role  ?></p>
              </div>
            </div>
            <div class="person-back">
              <div class="person-bio">
                <?php echo wp_trim_words($bio, 50, '...');; ?>
              </div>
              <a href="<?php echo get_permalink($post->ID); ?>" class="btn-link">
                <span class="text">Read More</span>
                <svg
                  width="51"
                  height="15"
                  viewBox="0 0 51 15"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M1 7.5L49 7.5"
                    stroke="#fff"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M43.5 14L50 7.5L43.5 1"
                    stroke="#fff"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile;
    endif; 
    wp_reset_query(); ?>
  </div>
</div>