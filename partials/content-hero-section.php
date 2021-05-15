<?php 
$h_image = get_field('h_image', $post->ID);
$h_video = get_field('hero_video', $post->ID);
$h_poster = get_field('video_poster_image', $post->ID);
 ?>
<?php if ($h_video || $h_image) : ?>
<section class="hero-video" id="<?php echo (isset($args['id'])) ? $args['id'] : ''; ?>">
  <?php if ($h_video) : ?>
  <div class="video-module">
      <div class="video embed-container">
        <?php 
          $attr = array(
            'mp4' => $h_video,
            'poster' => $h_video,
            'loop' => 'loop',
            'muted' => 'muted',
          );
//           echo wp_video_shortcode( $attr );
        ?>
		 <video muted controls preload="metadata" width="1280" height="720" src="<?php echo $h_video; ?>" poster="<?php echo $h_poster; ?>" style="width: 100%; height: 56.25vw">
			 <source src="<?php echo $h_video; ?>" type="video/mp4">
		  </video>
      </div>
      <div class="video-controls">
<!-- 		<button class="btn-play">
			<svg
                id="Player"
                xmlns="http://www.w3.org/2000/svg"
                width="113"
                height="113"
                viewBox="0 0 113 113"
              >
                <path
                  id="Icon_ionic-md-play"
                  data-name="Icon ionic-md-play"
                  d="M6.75,3.656V34.245L30.741,18.951Z"
                  transform="translate(39.848 37.549)"
                  fill="#fff"
                />
                <g
                  id="Ellipse_82"
                  data-name="Ellipse 82"
                  fill="none"
                  stroke="#fff"
                  stroke-width="2"
                >
                  <circle cx="56.5" cy="56.5" r="56.5" stroke="none" />
                  <circle cx="56.5" cy="56.5" r="54.5" fill="none" />
                </g>
              </svg>
		  </button>
        <button class="btn-mute btn-sound">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-mute.svg'; ?>" alt="" />
        </button>
        <button class="btn-unmute btn-sound">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-sound.svg'; ?>" alt="" />
        </button> -->
      </div>
  </div>
  <?php elseif ($h_image) : ?>
    <div class="image-module">
      <div class="image-module__inner">
        <img src="<?php echo $h_image; ?>" alt="">
      </div>
    </div>
  <?php endif; ?>
</section>
<?php endif; ?>