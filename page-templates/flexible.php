<?php
/*
Template Name: Flexible
Template Post Type: page
*/

get_header(); ?>
<!-- Hero Section -->
<?php get_template_part( 'partials/content-hero', 'section'); ?>

<?php if (have_rows('page_content')) : 
while (have_rows('page_content')) : the_row(); ?>
  <?php if (get_row_layout() == 'image_module') : ?>
    <!-- Image Module -->
    <?php if ($image = get_sub_field('image')) : ?>
      <section class="image-module">
        <div class="image-module__inner">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
        </div>
    </section>
    <?php endif; ?>

  <?php elseif (get_row_layout() == 'slider_module') : ?>
    <!-- Slider Module -->  
    <section class="slider-section">
      <div class="container-fluid">
        <?php if ($title = get_sub_field('title')): ?>
          <h3 class="section-title"><?php echo $title; ?></h3>
        <?php endif; ?>
        <?php if (have_rows('slider_items')) : ?>
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
            <div class="slick-carousel">
              <?php while (have_rows('slider_items')): the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $content = get_sub_field('content'); ?>
                <div class="slick-slide__item">
                  <div class="slide">
                    <div class="slide__image">
                      <img
                        src="<?php echo $image['url']; ?>"
                        alt="<?php echo $image['alt']; ?>"
                      />
                    </div>
                    <?php if ($title) : ?>
                      <h5 class="slide__title"><?php echo $title; ?></h5>
                    <?php endif; ?>
                    <?php if ($content) : ?>
                      <p class="slide__desc"><?php echo $content; ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>

  <?php elseif (get_row_layout() == 'text_cta_module') : ?>
    <!-- Text CTA Module -->
    <section class="text-cta-module">
      <div class="container">
        <?php if ($title = get_sub_field('title')) : ?>
          <h4><?php echo $title; ?></h4>
        <?php endif; ?>
        <div class="content">
          <hr />
          <div class="cta-text__wrapper">
            <?php if ($link = get_sub_field('link')) : ?>
              <a href="<?php echo $link['url']; ?>" class="btn btn-secondary btn-cta"><?php echo $link['title']; ?></a>
            <?php endif; ?>
            <?php if ($desc = get_sub_field('desc')) : ?>
              <div class="cta-text"><?php echo $desc; ?></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    
  <?php elseif (get_row_layout() == 'text_line_module') : ?>
    <!-- Text Line Module -->
    <?php if ($text = get_sub_field('text')) : ?>
      <section>
        <div class="container-fluid">
          <div class="text-line-module">
            <p class="category text"><?php echo $text; ?></p>
          </div>  
        </div>
      </section>
    <?php endif; ?>

  <?php elseif (get_row_layout() == 'title_cta_module') : ?>
    <!-- Title CTA Module -->
     <section class="title-cta-module">
      <div class="container">
        <hr />
        <?php if ($title = get_sub_field('title')) : ?>
          <h5><?php echo $title; ?></h5>
        <?php endif; ?>
        <?php if ($cta = get_sub_field('link')) : ?>
          <a href="<?php echo $cta['url']; ?>" class="btn btn-primary bt-cta">
            <?php echo $cta['title']; ?>
          </a>
        <?php endif; ?>
      </div>
    </section>

  <?php elseif (get_row_layout() == 'title_image_content_module') : ?>
    <!-- Title Image Content Module -->
    <section>
      <div class="container-fluid">
        <div class="title-image-content-module <?php echo get_sub_field('direction'); ?>">
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
      </div>
    </section>

  <?php elseif (get_row_layout() == 'title_module') : ?>
    <!-- Title Module -->
    <?php if ($title = get_sub_field('title')) : ?>
      <section>
        <div class="container-fluid">
          <div class="title-module">
            <h4><?php echo $title; ?></h4>
          </div>
        </div>
      </section>
    <?php endif; ?>

  <?php elseif (get_row_layout() == 'title_text_module'): ?>
    <!-- Tile Text Module  -->
    <section>
      <div class="container-fluid">
        <div class="title-text-module">
          <?php if ($title = get_sub_field('title')) : ?>
            <h4 class="title"><?php echo $title; ?></h4>
          <?php endif; ?>
          <div class="content">
            <hr />
            <?php if ($text = get_sub_field('text')) : echo $text; endif;?>
          </div>
        </div>
      </div>
    </section>
  <?php elseif (get_row_layout() == 'news_module') : ?>
    <!-- News Module -->
    <section id="news">
      <div class="container-fluid">
        <?php if($title = get_sub_field('title')) : ?>
          <h3><?php echo $title; ?></h3>
        <?php endif; ?>
        <?php 
        $news = get_sub_field('news'); 
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
        <?php endif; 
        wp_reset_postdata(  )?>
      </div>
    </section>
  <?php elseif (get_row_layout() == 'map_module') : ?>
	<?php 
		$title = get_sub_field('title');
		$code = get_sub_field('code');
	?>
    <!--  Map Module  -->
	<section class="map-module">
			<div class="container">
				<?php if ($title) : ?>
				<h3 class="section-title"><?php echo $title; ?></h3>
				<?php endif; ?>
				<?php if ($code) : ?>
				<div class="map">
					<div class='embed-container'>
						<?php echo $code; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
	</section>
  <?php elseif (get_row_layout() == 'content_image_module') : ?>
	<section class="page-info">
		<div class="container-fluid">
			<div class="page-info__left">
				<?php if ($title = get_sub_field('title')) : ?>
				<h3><?php echo $title; ?></h3>
				<?php endif; ?>
				<?php if ($desc = get_sub_field('content')) : ?>
				<p><?php echo $desc; ?></p>
				<?php endif ;?>
			</div>
			<div class="page-info__right">
				<?php if ($image = get_sub_field('image')) : ?>
				<div class="image-module">
					<div class="image-module__inner">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

  <?php elseif (get_row_layout() == 'image_line_text_module') : ?>
	<section class="image-line-text-module">
	  <?php if ($a_image = get_sub_field('image')) : ?>
	  <div class="image-module">
		<div class="image-module__inner">
		  <img src="<?php echo $a_image['url']; ?>" alt="<?php echo $a_image['title']; ?>" />
		</div>
	  </div>
	  <?php endif; ?>
	  <?php if ($a_title = get_sub_field('text')) : ?>
	  <div class="container-fluid">
		<div class="content">
		  <p><?php echo $a_title; ?></p>
		</div>
	  </div>
	  <?php endif; ?>
	</section>
	<?php elseif (get_row_layout() == 'video_module') : ?>
	<?php
	$full_width = get_sub_field('full_width');
	$external_video = get_sub_field('external_video');
	$video = get_sub_field('video'); 
	$image = get_sub_field('image'); ?>
	<section class="video-module">
		<?php if (!$full_width) : ?><div class="container"><?php endif; ?>
			<div class="video embed-container">
				<?php if ($video) : ?>
				<video muted controls preload="metadata" width="1280" height="720" src="<?php echo $video; ?>" poster="<?php echo $image; ?>" style="width: 100%; height: 56.25vw">
					<source src="<?php echo $video; ?>" type="video/mp4">
				</video>
				<?php endif; ?>
				<?php if ($external_video) : ?>
				<?php 
				if ( preg_match('/src="(.+?)"/', $h_video, $matches) && $h_video) {
					$src = $matches[1];
					$params = array(
						'controls'    => 1,
						'hd'        => 1,
						'autoplay' => 0,
						'loop' => 0,
						'mute' => 1
					);
					$new_src = add_query_arg($params, $src);
					$h_video = str_replace($src, $new_src, $h_video);
					$attributes = 'frameborder="0"';
					$external_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $external_video);
				}
				echo '<div class="video-embed">', $external_video, '</div>';
				?>
				<?php endif; ?>
			</div>
		<?php if (!$full_width) : ?></div><?php endif; ?>
	</section>
  <?php endif; ?>
<?php endwhile; 
endif; ?>

<?php get_footer(); ?>
 