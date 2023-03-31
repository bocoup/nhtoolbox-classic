<?php
				if(function_exists('the_custom_logo')) {
					$custom_logo_id = get_theme_mod('custom_logo');
					$logo = wp_get_attachment_image_src($custom_logo_id);
				}
				?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NH Toolbox">
    <meta name="author" content="NH Toolbox">    
    <link rel="shortcut icon" href="<?= $logo[0]?>"> 
	<?php
    wp_head()
    ?>

</head> 

<body>
    
    <header class="header text-center">	   
	<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
  <a class="navbar-item" href="/">
      <img src="<?= $logo[0] ?>" alt="NH Logo - Go Home">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
	<?php 
					wp_nav_menu(
						array(
							'menu' => "primary",
							'container' => '',
							'theme_location' => 'primary',
							"items_wrap" => '<div class="navbar-end">%3$s</div>'
						)
					)
				?>

</nav> 
	
    </header>