<?php
/*
Template Name: Donate
Template Post Type: page
*/

get_header(); ?>
<section id="page-info">
  <div class="container-fluid">
    <?php if ($title = get_field('title')) : ?>
      <h2><?php echo $title; ?></h2>
    <?php endif; ?>
    <?php if ($content = get_field('content')) : ?>
      <div><?php echo $content; ?></div>
    <?php endif; ?>
<!--     <a href="#donate" class="btn-scroll-link">
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
    </a> -->
  </div>
</section>
<?php if ($code = get_field('code')) : ?>
<section id="donate">
  <div class="container">
    <?php echo $code; ?>
  </div>
</section>
<?php endif; ?>
<?php if ($double_donation = get_field('double_donation')) : ?>
<section id="double-donation">
	<div class="container">
		<?php echo do_shortcode($double_donation); ?>
	</div>
</section>
<?php endif; ?>
<section class="title-cta-module">
  <div class="container">
    <hr />
    <?php if ($cta_title = get_field('cta_title')): ?>
      <h5><?php echo $cta_title; ?></h5>
    <?php endif; ?>
    <?php if ($cta_link = get_field('cta_link')) : ?>
      <a href="<?php echo $cta_link['url']; ?>" class="btn btn-primary bt-cta"><?php echo $cta_link['title']; ?></a>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>