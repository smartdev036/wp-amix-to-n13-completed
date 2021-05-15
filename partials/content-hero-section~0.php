<?php 
$h_video = get_field('h_video', $post->ID);
$h_image = get_field('h_image', $post->ID);
$h_video_file = get_field('h_video_file', $post->ID);
 ?>
<?php if ($h_video || $h_image) : ?>
<section class="hero-video" id="<?php echo ($args['id']) ? $args['id'] : ''; ?>">
  <?php if ($h_video || $h_video_file) : ?>
  <div class="video-module">
      <div class="video embed-container">
        <?php 
          // Add autoplay functionality to the video code
          if ( preg_match('/src="(.+?)"/', $h_video, $matches) && $h_video) {
            // Video source URL
            $src = $matches[1];
            
            // Add option to hide controls, enable HD, and do autoplay -- depending on provider
            $params = array(
              'controls'    => 0,
              'hd'        => 1,
              'autoplay' => 1,
              'loop' => 1,
              'mute' => 1
            );
            
            $new_src = add_query_arg($params, $src);
            
            $h_video = str_replace($src, $new_src, $h_video);
            
            // add extra attributes to iframe html
            $attributes = 'frameborder="0"';
            
            $h_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $h_video);
          }
        
          echo '<div class="video-embed">', $h_video, '</div>';
        ?>

        <?php 
          if ($h_video_file) {
            $attr = array(
              'mp4' => $h_video_file,
              'poster' => $h_video,
              'preload' => 'auto',
              'loop' => 'loop',
              'autoplay' => 'autoplay'
            );
            echo wp_video_shortcode( $attr );
          }
        ?>
      </div>
      <div class="video-controls">
        <button class="btn-mute btn-sound">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-mute.svg'; ?>" alt="" />
        </button>
        <button class="btn-unmute btn-sound">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-sound.svg'; ?>" alt="" />
        </button>
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