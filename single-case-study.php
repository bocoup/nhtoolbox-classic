<?php get_header()?>
<div class="breadcrumb-container">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?php echo get_home_url() ?>">Home</a></li>
            <li class="is-active"><a href="<?php esc_url(the_permalink()) ?>" aria-current="page">
                    <?php echo get_the_title(); ?>
                </a></li>
        </ul>
    </nav>
</div>

<main class="hero case-study-hero">
  <div class="columns case-study-main">
    <div class="column is-8">
      <?php $post = get_post();
        $image_orientation = get_field("image_orientation");

        $args = array(
          "value" => $post
        );
        
        if ($image_orientation == "below"):
            get_template_part('template-parts/image-orientation/image-orientation-below', null, $args);
        elseif ($image_orientation == "above"):
            get_template_part('template-parts/image-orientation/image-orientation-above', null, $args);
        elseif ($image_orientation == "left"):
            get_template_part('template-parts/image-orientation/image-orientation-left', null, $args);
        elseif ($image_orientation == "right"):
            get_template_part('template-parts/image-orientation/image-orientation-right', null, $args);
        else:
            get_template_part('template-parts/image-orientation/image-orientation-none', null, $args);
        endif;
      ?>
    </div>
  </div>
</main>

<?php get_footer()?>
