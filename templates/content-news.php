<div class="single-news">
  <div class="single-news__img">
    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" /></a>
  </div>
  <?php 
    foreach((get_the_category()) as $category) {
      if ($category->parent) { ?>
        <p class="single-news__category"><?php echo $category->name; ?></p>
      <?php }
    }
  ?>
  <a href="<?php the_permalink() ?>"><h5 class="single-news__title"><?php the_title(); ?></h5></a>
  <a href="<?php the_permalink() ?>" class="btn-link single-news__link">
    Read More
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