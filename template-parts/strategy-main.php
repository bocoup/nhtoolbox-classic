<div class="columns strategy-main">
    <div class="column is-8">
        <div class="strategy-main-section">
            <h2 class="strategy-main-header">What is it?</h2>
            <div class="strategy-main-section-content">
                <?php
                $field = get_field("what_is_it");
                if (!empty($field)): ?>
                    <?php echo $field ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="strategy-main-section">
            <h2 class="strategy-main-header">How can it help?</h2>
            <div class="strategy-main-section-content dot">
                <?php
                $field = get_field("how_can_it_help");
                if (!empty($field)): ?>
                    <?php echo $field ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="strategy-main-section">
            <h2 class="strategy-main-header">Getting Started</h2>
            <div class="strategy-main-section-content numbered">
                <?php
                $field = get_field("getting_started");
                if (!empty($field)): ?>
                    <?php echo $field ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="strategy-main-section">
            <?php
            $featured_image = get_field("featured_image");
            if (!empty($featured_image)): ?>
                <img class="strategy-featured-image" height="1073px" width="605px"
                    src="<?php echo esc_url($featured_image['url']); ?>"
                    alt="<?php echo esc_attr($featured_image['alt']); ?>" />
                <div class="image-caption">
                    <?php echo $featured_image['caption']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="strategy-main-section">
            <h2 class="strategy-main-header">Considerations</h2>
            <div class="strategy-main-section-content dot">
                <?php
                $field = get_field("considerations");
                if (!empty($field)): ?>
                    <?php echo $field ?>
                <?php endif; ?>
            </div>
        </div>
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
                <h3>Case Studies</h3>
                <hr class="sidebar-separator" />
                <div>
                    <?php
                    $field = get_field("case_studies");
                    $field = array_map(function ($value) {
                        return $value->post_title;
                    }, $field);
                    if (!empty($field)): ?>
                        <?php foreach ($field as $value): ?>
                            <li>
                                <?php echo $value ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="read-more">
                        <a href="?show-case-studies=true">Read more</a>
                    </div>
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