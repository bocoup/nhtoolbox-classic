<section aria-label="Related Tools" class="related-tools-hero hero">
    <div class="related-tools-hero-body hero-body">
        <h4>Related Tools</h4>
        <hr aria-hidden="true" />
        <div class="columns is-multiline">
            <?php
            $field = get_field("related_tools");

            if (!empty($field)): ?>
                <?php foreach ($field as $value):?>
                    <?php
                    $graphic_design = get_field("graphic_design", $value->ID);
                    $permalink = get_permalink($value->ID);
                    ?>
                    <div class="column related-tool-card is-3">
                        <?php if (!empty($graphic_design)): ?>
                            <img height="172px" width="172px" src="<?php echo esc_url($graphic_design['url']); ?>"
                                alt="<?php echo esc_attr($graphic_design['alt']); ?>" />
                        <?php endif; ?>
                        <h5>
                            <a href="<?php echo esc_url($permalink) ?>"><?php echo $value->post_title ?></a>
                        </h5>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>