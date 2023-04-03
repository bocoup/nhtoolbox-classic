<main class="hero not-found-hero">
    <div class="not-found-hero-body hero-body">
        This page doesn't exist :/
        <?php
        if (function_exists('the_custom_logo')) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id);
        }
        ?>

        <div>
            <a href="/" class="go-home-link">
                Go Home
            </a>

        </div>
    </div>
</main>