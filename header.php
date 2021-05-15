<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php /*<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">*/ ?>
	 <?php if(is_archive('news')): ?>
    <title>Latest News</title>
    <?php else: ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php endif; ?>
	<?php wp_head(); ?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '831441053947454');
	fbq('track', 'PageView');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-49978983-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-49978983-1');
	</script>
	<noscript>
	<img height="1" width="1"
	src="https://www.facebook.com/tr?id=831441053947454&ev=PageView
	&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
</head>

<body <?php body_class(); ?>>
	<!-- Begin Header -->
	<header class="header">
		<nav class="container-fluid">
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
			<button class="hamburger-btn">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<div class="nav-menu">
				<div class="nav-menu__inner">
					<button class="hamburger-close-btn">
						<svg
							width="20"
							height="21"
							viewBox="0 0 20 21"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path d="M1 1.38477L19.3848 19.7695" stroke="#695E4A" />
							<path d="M1 19.3848L19.3848 0.99999" stroke="#695E4A" />
						</svg>
					</button>
					<?php 
					wp_nav_menu( array(
							'menu' => 'Main Menu',
							'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'bs-example-navbar-collapse-1',
							'menu_class'      => 'menu-items',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
					) );
					?>
				</div>
			</div>
		</nav>
	</header>
	<a href="<?php echo esc_url(home_url( '/donate/' )) ?>" class="btn btn-primary sticky-donate-link">Donate</a>
	<!-- End Header -->
	<scroll>
		<!-- Begin Content -->
		<main>