<?php 
/*****
 * Archive News Page
 */
get_header(); ?>
<!-- Featured News  -->
<section id="featured-news">
  <div class="container-fluid">
    <h3>Featured News</h3>
    <div class="news-wrapper">
      <?php 
      $featured_news = new WP_Query(array(
        'post_type' => 'news',
        'category_name' => 'featured',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'desc',
      ));
      if ($featured_news->have_posts()) : 
        while ($featured_news->have_posts()) : $featured_news->the_post(); 
          get_template_part('partials/content-single', 'news', array('news' => $post));
        endwhile;
      endif; 
      wp_reset_postdata(  );
      ?>
    </div>
  </div>
</section>
<!-- Search News Section -->
<section id="news" 
    data-search="<?php echo (isset($_GET['search'])) ? $_GET['search'] : '' ; ?>" 
    data-paged="<?php echo (isset($_GET['paged'])) ? $_GET['paged'] : 1; ?>" 
    data-category="<?php echo (isset($_GET['cat'])) ? $_GET['cat'] : ''; ?>">
  <div class="container-fluid">
    <div class="news-controls">
      <form action="" id="search-form">
        <div class="form-control">
          <input
            type="text"
            class="news-search"
            id="news-search"
            placeholder="Enter to search"
          />
          <span class="icon-search">
            <svg
              width="30"
              height="30"
              viewBox="0 0 30 30"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle
                cx="12.5"
                cy="12.5"
                r="11.75"
                stroke="#695E4A"
                stroke-width="1.5"
              />
              <path
                d="M20.3086 20.3105L28.9982 29.0002"
                stroke="#695E4A"
                stroke-width="1.5"
              />
            </svg>
          </span>
        </div>
      </form>
      <div class="categories-filter">
        <?php 
        // News parent category id is 10
        $newsCatId = get_cat_ID( 'news' );
        $categories = get_categories(array('orderby' => 'name',  'child_of' => $newsCatId, 'hide_empty' => 0)) ; 
        foreach($categories as $category) : 
        ?> 
          <a class="btn-category-filter" data-category="<?php echo $category->cat_ID; ?>"><?php echo $category->name; ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="searched-news">
      <!-- Dynamic contents -->
    </div>
    <?php get_template_part( 'templates/pagination', 'news', array('current_page' => 1, 'max_page' => 1) ); ?>
  </div>
</section>
<?php get_footer(); ?>
