<div class="columns case-study-main">
    <div class="column is-8">

        <?php
        $field = get_field("case_studies");
        if (!empty($field)): ?>
            <?php foreach ($field as $value): ?>
                <h2><?php echo $value->post_title ?></h2>
                <div><?php echo $value->post_content ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="column is-4">
        <div class="sidebar">
            <div class="sidebar-container">
                <h3>State Law</h3>
                <hr class="sidebar-separator" />
                <div>
                    <?php
                    $field = get_field("state_law_repeatable_fields");
                    if (!empty($field)): ?>
                        <?php foreach ($field as $value): ?>
                            <li><a target="_blank" href="<?php echo esc_url($value['state_law_url']); ?>"><?php echo $value['state_law_name'] ?> <i class="fa fa-external-link" aria-hidden="true"></i></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="sidebar-container">
                <h3>Resources</h3>
                <hr class="sidebar-separator" />
                <div>
                    <?php
                    $field = get_field("resource_repeatable_fields");
                    if (!empty($field)): ?>
                        <?php foreach ($field as $value): ?>
                            <li><a target="_blank" href="<?php echo esc_url($value['resource_url']); ?>"><?php echo $value['resource_name'] ?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>