<section class="slider-section" id="our-team">
  <div class="container-fluid">
    <h3 class="section-title">Our Team</h3>
    <!-- Team Directors -->
    <?php get_template_part( 
      'partials/content', 
      'team-slider', 
      array(
        'title' => 'Board of Directors',
        'category' => 'director'
      )); ?>

    <!-- Team Staffs -->
    <?php 
    get_template_part( 
      'partials/content', 
      'team-slider', 
      array(
        'title' => 'Foundation Staff',
        'category' => 'staff'
      )); 
      ?>

  </div>
</section>