<div class="columns case-study-main">
    <div class="column is-8">

        <?php
        $field = get_field("case_studies");
        if (!empty($field)): ?>
            <?php foreach ($field as $value): ?>
                <?php $image_orientation = get_field("image_orientation", $value->ID);

                $args = array(
                    "value" => $value
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

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="column is-4">
        <div class="sidebar">
            <?php
            $field = get_field("state_law_repeatable_fields");
            if (!empty($field)): ?>
                <div class="sidebar-container">
                    <h3>State Law</h3>
                    <hr class="sidebar-separator" aria-hidden="true" />
                    <div>
                        <ul>
                        <?php foreach ($field as $value): ?>
                            <li><a target="_blank" href="<?php echo esc_url($value['state_law_url']); ?>"><?php echo $value['state_law_name'] ?> <i class="fa fa-external-link" aria-hidden="true"></i></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            $field = get_field("resource_repeatable_fields");
            if (!empty($field)): ?>
                <div class="sidebar-container">
                    <h3>Resources</h3>
                    <hr class="sidebar-separator" aria-hidden="true" />
                    <div>
                        <ul>
                        <?php foreach ($field as $value): ?>
                            <li><a target="_blank" href="<?php echo esc_url($value['resource_url']); ?>"><?php echo $value['resource_name'] ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>