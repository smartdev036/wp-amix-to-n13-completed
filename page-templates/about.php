<?php
/*
Template Name: About
Template Post Type: page
*/

get_header(); ?>
<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section'); ?>

<section id="we-believe">
  <div class="container-fluid">
    <?php if (have_rows('title_image_module')) : 
      while (have_rows('title_image_module')) : the_row(); ?>
      <div class="title-image-content-module">
        <?php if ($title = get_sub_field('title')) : ?>
          <h4><?php echo $title; ?></h4>
        <?php endif; ?>
        <div class="content-wrapper">
          <hr />
          <div class="content">
            <?php if ($image = get_sub_field('image')) : ?>
            <div class="content-image">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
            </div>
            <?php endif; ?>
            <?php if ($content = get_sub_field('content')) : ?>
              <div class="content-text"><?php echo $content; ?></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endwhile;
    endif; ?>
    <?php if ($title_module = get_field('title_module')) : ?>
      <div class="title-module">
        <h4><?php echo $title_module; ?></h4>
      </div>
    <?php endif; ?>
  </div>
</section>
<section id="about-foundation">
  <?php if ($a_image = get_field('a_image')) : ?>
  <div class="image-module">
    <div class="image-module__inner">
      <img src="<?php echo $a_image['url']; ?>" alt="<?php echo $a_image['title']; ?>" />
    </div>
  </div>
  <?php endif; ?>
  <?php if ($a_title = get_field('a_title')) : ?>
  <div class="container-fluid">
    <div class="content">
      <p><?php echo $a_title; ?></p>
    </div>
  </div>
  <?php endif; ?>
</section>
<section class="text-cta-module" id="our-commitment">
  <div class="container">
    <?php if ($c_title = get_field('c_title')) : ?>
      <h4><?php echo $c_title; ?></h4>
    <?php endif; ?>
    <div class="content">
      <hr />
      <div class="cta-text__wrapper">
        <?php if ($c_btn = get_field('c_btn')) : ?>
          <a href="<?php echo $c_btn['url']; ?>" class="btn btn-secondary btn-cta"><?php echo $c_btn['title']; ?></a>
        <?php endif; ?>
        <?php if ($c_desc = get_field('c_desc')) : ?>
          <div class="cta-text"><?php echo $c_desc; ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<section class="slider-section" id="our-values">
  <div class="container-fluid">
    <?php if ($v_title = get_field('v_title')): ?>
      <h3 class="section-title"><?php echo $v_title; ?></h3>
    <?php endif; ?>
    <?php if (have_rows('v_slider')) : ?>
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
        <?php while (have_rows('v_slider')): the_row();
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $content = get_sub_field('content'); ?>
          <div class="slick-slide__item">
            <div class="our-value">
              <div class="our-value__image">
                <img
                  src="<?php echo $image; ?>"
                  alt=""
                />
              </div>
              <?php if ($title) : ?>
                <h5 class="our-value__title"><?php echo $title; ?></h5>
              <?php endif; ?>
              <?php if ($content) : ?>
                <p class="our-value__desc"><?php echo $content; ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<section id="about-city-hospital">
  <?php if ($p_image = get_field('p_image')) : ?>
  <div class="image-module">
    <div class="image-module__inner">
      <img src="<?php echo $p_image['url']; ?>" alt="<?php echo $p_image['title']; ?>" />
    </div>
  </div>
  <?php endif; ?>
  <div class="container-fluid">
    <div class="title-text-module">
      <?php if ($p_title = get_field('p_title')) : ?>
        <h4 class="title"><?php echo $p_title; ?></h4>
      <?php endif; ?>
      <div class="content">
        <hr />
        <?php if ($p_desc = get_field('p_desc')) : echo $p_desc; endif;?>
      </div>
    </div>
  </div>
</section>
<!-- Start Team Slider -->
<?php get_template_part( 'partials/content', 'team'); ?>
<!-- End Team Slider -->
<section id="annual-reports">
  <div class="container-fluid">
    <div class="title-text-module">
      <?php if ($r_title = get_field('r_title')) : ?>
        <h4 class="title"><?php echo $r_title; ?></h4>
      <?php endif; ?>
      <div class="content">
        <hr />
        <?php if ($r_desc = get_field('r_desc')) : echo $r_desc; endif; ?>
      </div>
    </div>
  </div>
</section>
<section class="slider-section" id="financials">
  <div class="container-fluid">
    <?php if ($subtitle = get_field('r_subtitle')) : ?>
      <h3 class="section-title"><?php echo $subtitle; ?></h3>
    <?php endif; ?>
    <?php while (have_rows('reports')) : the_row(); ?>
        <?php if (have_rows('report_images')) : ?>
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
            <div class="slick-carousel financial-slider">
              <?php while (have_rows('report_images')) : the_row(); 
                $image = get_sub_field('image'); ?>
                <div class="slick-slide__item">
                  <div class="financial">
                    <a data-fancybox href="<?php echo $image['url']; ?>">
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
    <?php endwhile; ?>
    <?php if (have_rows('reports')) : ?>
    <!-- <div class="financial-controls">
      <p class="text-caption-lg">Previous Financials</p>
      <div class="financial-years">
        <?php while (have_rows('reports')) : the_row(); ?>
          <a href="#" class="year-link"><?php echo get_sub_field('year'); ?></a>
        <?php endwhile; ?>
      </div>
    </div> -->
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>