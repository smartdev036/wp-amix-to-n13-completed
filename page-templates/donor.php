<?php
/*
Template Name: Donor
Template Post Type: page
*/
get_header(); ?>
<section class="page-info">
  <div class="container-fluid">
    <div class="page-info__left">
      <?php if ($title = get_field('title')) : ?>
        <h3><?php echo $title; ?></h3>
      <?php endif; ?>
      <?php if ($desc = get_field('description')) : ?>
        <div><?php echo $desc; ?></div>
      <?php endif ;?>
    </div>
    <div class="page-info__right">
      <?php if ($image = get_field('image')) : ?>
      <div class="image-module">
        <div class="image-module__inner">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<section>
  <div class="container-fluid">
    <div class="accordion-module">
      <?php if ($a_title = get_field('a_title')) : ?>
        <h3><?php echo $a_title; ?></h3>
      <?php endif; ?>
      <?php while (have_rows('accordion')) : the_row(); ?>
        <div class="accordion-item">
          <div class="accordion-item__title">
            <?php if ($title = get_sub_field('title')) : ?>
              <h5><?php echo $title; ?></h5>
            <?php endif; ?>
            <span class="icon">
              <svg
                width="14"
                height="26"
                viewBox="0 0 14 26"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 25L13 13L0.999999 1"
                  stroke="#695E4A"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </div>
          <div class="accordion-item__content">
            <?php if ($desc = get_sub_field('description')) : ?>
              <?php echo $desc; ?>
            <?php endif; ?>
            <?php 
            $button_type = get_sub_field('button_type');
            $button = get_sub_field('button');
            $file = get_sub_field('file');
            if ($button_type == 'link' && $button) : ?>
              <a class="btn btn-primary" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
            <?php elseif ($button_type == 'download' && $file) : ?>
              <a class="btn btn-secondary" href="<?php echo $file['url']; ?>" download>Download</a>
            <?php elseif ($button_type == 'learnmore' && $button) : ?>
              <a href="<?php echo $button['url']; ?>" class="btn btn-secondary">Learn More</a>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<section>
  <div class="title-cta-module">
    <div class="container">
      <hr />
      <?php if ($c_title = get_field('c_title')): ?>
        <h5><?php echo $c_title; ?></h5>
      <?php endif; ?>
      <?php if ($c_btn = get_field('c_btn')) : ?>
        <a href="<?php echo $c_btn['url']; ?>" class="btn btn-primary bt-cta"><?php echo $c_btn['title']; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="news">
  <div class="container-fluid">
    <?php if($s_title = get_field('s_title')) : ?>
      <h3><?php echo $s_title; ?></h3>
    <?php endif; ?>
    <?php 
    $stories = get_field('stories'); 
    if ($stories) : 
      $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'post__in' => $stories
      );
      $stories = new WP_Query( $args );
    ?>
    <div class="news-wrapper">
      <?php 
      while ($stories->have_posts()) : $stories->the_post();
        get_template_part('partials/content-single', 'news', array('news' => $post));
      endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>                 