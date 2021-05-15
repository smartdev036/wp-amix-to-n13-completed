<?php 
// Single Team Member 

get_header();
?>
<?php 
while (have_posts()) : the_post(); 
$category = get_the_category();
$title = get_the_title();
$role = get_field('role');
$image = get_field('image');
$bio = get_field('bio');
?>
  <section id="team-member-profile">
    <div class="container-fluid">
      <div class="back-btn-wrapper">
        <a href="<?php echo esc_url(home_url('/about/')); ?>">
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
          <span class="text">Back</span>
        </a>
      </div>
      <div class="department-wrapper">
        <span class="department text-caption-lg">
          <?php echo ($category == 'directory') ? 'Board of Directors' : 'Foundation Staff'; ?>
        </span>
      </div>
      <div class="profile-content">
        <div class="profile-left">
          <h3 class="profile-name"><?php echo $title; ?></h3>
          <?php if ($role) : ?>
            <p class="profile-role"><?php echo $role; ?></p>
          <?php endif; ?>
          <?php if ($image) : ?>
            <div class="profile-image">
              <img src="<?php echo $image; ?>" alt="" />
            </div>
          <?php endif; ?>
        </div>
        <div class="profile-right">
          <?php echo $bio; ?>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
<!-- Start Team Slider -->
<?php get_template_part( 'partials/content', 'team'); ?>
<!-- End Team Slider -->
<?php get_footer(); ?>