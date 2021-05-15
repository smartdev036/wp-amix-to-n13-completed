<?php
$news = $args['news'];
?>
<div class="news-module">
  <p class="news-category">
      <span class="text">
      <?php 
        $news_category_id = get_terms( 'category', array( 'name__like' => 'news' ) );
        $categories = get_categories( array('child_ob' => $news_category_id) ); 
        foreach((get_the_category()) as $category) {
          if ($category->parent) { 
             echo '<text>' .$category->name . '</text>'; 
          }
      } ?>
      </span>
      <span class="line"></span>
  </p>
  <div class="news-content">
    <div class="news-content__left">
      <a href="<?php the_permalink($news->ID) ?>" class="news-title">
        <h5><?php the_title(); ?></h5>
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
      <div class="news-excerpt">
        <?php echo the_excerpt($news->ID); ?>
      </div>
    </div>
    <div class="news-content__right">
      <div
        class="news-image"
        style="background-image: url(<?php echo get_the_post_thumbnail_url($news->ID); ?>);"
      >
        <a href="<?php echo get_the_permalink($news->ID); ?>"></a>
      </div>
    </div>
  </div>
</div>