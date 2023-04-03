<div class="breadcrumb-container">
<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li><a href="/">Home</a></li>
        <li class="is-active"><a href="#" aria-current="page">
                <?php echo get_the_title(); ?>
            </a></li>
    </ul>
</nav>
</div>
<main class="hero strategy-hero">
    <div class="strategy-hero-body hero-body">
        <div class="columns is-vcentered">
            <div class="column is-8">
                <h1 class="strategy-oswald-title title">
                    <?php echo get_the_title(); ?>


                </h1>
                <div class="columns">
                    <div class="column issues-addressed-text is-2">
                        Issues Addressed:
                    </div>
                    <div class="column strategy-categories-strategy is-10">
                        <?php
                        $categories = get_the_category();
                        foreach ($categories as $cat):
                            ?>
                                <span class="button category-button">
                                    <?php echo $cat->name; ?>
                                </span>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <?php
                $graphic_design = get_field("graphic_design");
                if (!empty($graphic_design)): ?>
                        <img height="301px" width="301px" src="<?php echo esc_url($graphic_design['url']); ?>"
                            alt="<?php echo esc_attr($graphic_design['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>