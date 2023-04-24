<?php get_header() ?>
<div class="breadcrumb-container">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?php echo get_home_url() ?>">Home</a></li>
            <li>
              <a href="<?php esc_url(the_permalink()) ?>" aria-current="page">
                    <?php echo get_the_title(); ?>
                </a>
            </li>
        </ul>
    </nav>
</div>

<main class="hero page-content">
  <div class="page-content-body hero-body">
    <h1><?php echo the_title(); ?></h1>
    <?php the_content() ?>
  </div>
</main>

<?php get_footer() ?>