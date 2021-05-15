<?php
/*
Template Name: Initiatives
Template Post Type: page
*/

get_header(); ?>

<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section'); ?>


<section class="text-cta-module">
  <div class="container">
    <?php if ($g_title = get_field('g_title')) : ?>
      <h4><?php echo $g_title; ?></h4>
    <?php endif; ?>
    <div class="content">
      <hr />
      <div class="cta-text__wrapper">
        <?php if ($g_link = get_field('g_link')) : ?>
          <a href="<?php echo $g_link['url']; ?>" class="btn btn-primary btn-cta"><?php echo $g_link['title']; ?></a>
        <?php endif; ?>
        <?php if ($g_text = get_field('g_text')) : ?>
          <div class="cta-text"><?php echo $g_text; ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<section id="initiatives">
  <div class="container-fluid">
    <?php if ($z_title = get_field('z_title')): ?>
      <h3><?php echo $z_title; ?></h3>
    <?php endif; ?>
  </div>
  <?php if (have_rows('content_items')): 
    while (have_rows('content_items')) : the_row(); 
    $color = get_sub_field('color');
    $title = get_sub_field('title');
    $desc = get_sub_field('description');
    $avatar = get_sub_field('avatar');
    $image = get_sub_field('image');
    $button = get_sub_field('button'); ?>
    <div class="initiative-module <?php echo $color; ?>">
      <?php if ($image) : ?>
      <div class="image-module">
        <div class="image-module__inner">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
        </div>
      </div>
      <?php endif; ?>
      <div class="container-fluid">
        <div class="content-module">
          <div class="content-module__left">
            <div class="avatar">
              <?php if ($avatar) : ?>
                <img src="<?php echo $avatar; ?>" alt="" />
              <?php endif; ?>
            </div>
          </div>
          <div class="content-module__right">
            <?php if ($title) : ?>
            <h3><?php echo $title; ?></h3>
            <?php endif; ?>
            <hr />
            <?php if ($desc) : ?>
              <div><?php echo $desc; ?></div>
            <?php endif; ?>
            <?php if ($button) : ?>
              <a href="<?php echo $button['url']; ?>" class="btn btn-secondary"><?php echo $button['title']; ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile;
  endif; ?>
  
  <div class="title-cta-module">
    <div class="container">
      <hr />
      <?php if ($s_title = get_field('s_title')) : ?>
        <h5><?php echo $s_title; ?></h5>
      <?php endif; ?>
      <?php if ($s_link = get_field('s_link')) : ?>
        <a href="<?php echo $s_link['url']; ?>" class="btn btn-primary bt-cta"><?php echo $s_link['title']; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="news">
  <div class="container-fluid">
    <?php if($i_title = get_field('i_title')) : ?>
      <h3><?php echo $i_title; ?></h3>
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
