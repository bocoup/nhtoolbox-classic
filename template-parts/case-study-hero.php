<div class="breadcrumb-container">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="<?php esc_url(the_permalink()) ?>" aria-current="page">
                    <?php echo get_the_title(); ?>
                </a></li>
            <li class="is-active"><a href="#" aria-current="page">
                    Case Studies
                </a></li>
        </ul>
    </nav>
</div>
<section class="hero case-study-hero">
    <div class="case-study-hero-body hero-body">
        <h1>
            <?php echo get_the_title(); ?> <span>Case Studies</span>
        </h1>
        <hr />
        <div class="columns">
            <div class="column issues-addressed-text-case-study is-2">
                Issues Addressed:
            </div>
            <div class="column strategy-categories-case-study is-10">
                <?php
                $categories = get_the_category();
                foreach ($categories as $cat):
                    ?>
                    <span class="button category-button-case-study">
                        <?php echo $cat->name; ?>
                    </span>

                <?php endforeach; ?>
            </div>
        </div>
        <hr />

    </div>
</section>