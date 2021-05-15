    </main>
    <!-- End Content -->

    <!-- Begin Footer -->
    <?php
      $footer_title = get_field('footer_title', 'options');
      $footer_button = get_field('footer_button', 'options');
      $contact_title = get_field('contact_title', 'options');
      $contact_form = get_field('contact_form', 'options');
      $social_links_title = get_field('social_links_title', 'options');
      $copyright = get_field('copyright_text', 'options');
    ?>
    <footer class="footer">
      <div class="container-fluid">
        <div class="footer-left">
          <?php 
            $logo = get_field('logo_original', 'options');
            $logo_retina = get_field('logo_retina', 'options');
            $logo_mobile = get_field('logo_mobile', 'options');
            $logo_mobile_retina = get_field('logo_mobile_retina', 'options'); ?>
            <a href="/" class="logo-link">
              <img class="desktop" src="<?php echo $logo; ?>" srcset="<?php echo $logo_retina; ?> 2x" alt="" />
              <img
                class="mobile"
                src="<?php echo $logo_mobile; ?>"
                srcset="<?php echo $logo_mobile_retina; ?> 2x"
                alt=""
              />
            </a>
        </div>
        <div class="footer-right">
          <?php if ($footer_title) : ?>
            <h5><?php echo $footer_title; ?></h5>
          <?php endif; ?>
          <?php if ($footer_button) : ?>
            <a href="<?php echo $footer_button['url']; ?>" class="btn btn-primary"><?php echo $footer_button['title']; ?></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="container-fluid">
        <div class="footer-left">
          <?php 
          wp_nav_menu( array(
              'menu' => 'Footer Menu',
              'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
              'menu_class'      => 'menu-items',
              'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
              'walker'          => new WP_Bootstrap_Navwalker(),
          ) );
          ?>
        </div>
        <div class="footer-right">
          <div class="footer-right__content">
            <div class="label">
              <?php if ($contact_title) : ?>
                <p><?php echo $contact_title; ?></p>
              <?php endif; ?>
            </div>
            <div class="content">
              <?php 
// 				if ($form = get_field('contact_form', 'options')):
// 				echo do_shortcode($form); 
// 				endif; 
				?>
				<div id="bbox-root-9705ba20-6183-4e55-8258-10942df65040"></div>
				<script type="text/javascript">
					var bboxInit2 = bboxInit2 || [];
					bboxInit2.push(function () {
						bboxApi.showForm('9705ba20-6183-4e55-8258-10942df65040');
					});
					(function () {
						var e = document.createElement('script'); e.async = true;
						e.src = 'https://bbox.blackbaudhosting.com/webforms/bbox-2.0-min.js';
						document.getElementsByTagName('head')[0].appendChild(e);
					} ());
				</script>
            </div>
          </div>
          <div class="footer-right__content">
            <div class="label">
              <?php if ($social_links_title) : ?>
                <p><?php echo $social_links_title; ?></p>
              <?php endif; ?>
            </div>
            <div class="content">
              <?php if (have_rows('social_links', 'options')) : ?>
              <ul class="social-items">
                <?php 
                while (have_rows('social_links', 'options')) : the_row(); 
                  $image = get_sub_field('image');
                  $link = get_sub_field('link');
                ?>
                  <li class="social-item">
                    <a href="<?php echo $link; ?>" class="social-link" target="_blank">
                      <img
                        src="<?php echo $image; ?>"
                        alt=""
                      />
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid footer-bar">
        <div class="footer-left">
          <?php if (have_rows('partners', 'options')) : ?>
          <div class="partners">
            <?php 
            while (have_rows('partners', 'options')) : the_row(); 
            $image = get_sub_field('image');
            $retina = get_sub_field('image_retina');
            $link = get_sub_field('link');
            ?>
              <a href="<?php echo $link; ?>" class="partner-link" target="_blank">
                <img src="<?php echo $image; ?>" srcset="<?php echo $retina; ?> 2x" alt="" />
              </a>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
        <div class="footer-right">
          <div class="copyright">
            <?php if ($copyright) : ?>
              <p><?php echo $copyright; ?></p>
            <?php endif; ?>
            <a href="/privacy-policy">Privacy Policy</a>
          </div>
          
        </div>
      </div>
    </footer>
    <!-- End Footer -->
  </scroll>

<?php wp_footer(); ?>