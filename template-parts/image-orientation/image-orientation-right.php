<?php
$value = $args['value'];
?>


<div class="case-study-main-section">
    <div class="columns">
        <div class="column">
            <h2>
                <?php echo $value->post_title ?>
            </h2>
            <div>
                <?php echo $value->post_content ?>
            </div>

        </div>
        <div class="column">
                <?php
                $image_1 = get_field("image_1", $value->ID);
                $image_2 = get_field("image_2", $value->ID);
                ?>
                <?php if (!empty($image_1)): ?>
                    <div>
                        <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>" />
                    </div>
                <?php endif; ?>
                <?php if (!empty($image_2)): ?>
                    <div>
                        <img src="<?php echo esc_url($image_2['url']); ?>" alt="<?php echo esc_attr($image_2['alt']); ?>" />
                    </div>
                <?php endif; ?>

            <div class="image-caption-case-study">
                <?php
                $images_caption = get_field("images_caption", $value->ID);
                ?>
                <?php if (!empty($images_caption)): ?>
                    <?php echo $images_caption ?>
                <?php endif; ?>
            </div>

        </div>

    </div>

</div>