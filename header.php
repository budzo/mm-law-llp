<!doctype html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if (is_front_page()) { ?>
            <link rel="preload" fetchpriority="high" as="image" href="/wp-content/uploads/2024/02/Mask-group-1.jpg" type="image/jpg">
        <?php } ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <a class="visually-hidden-focusable" href="#content">Skip to main content</a>
        <header class="headerRow fixed-top">
            <nav id="main-nav" class="navbar navbar-expand-xl navbar-dark py-3">
                <div class="container">

                    <div class="headerRow__logo">
                        <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
                            <span class="visually-hidden">
                                Go to the homepage
                            </span>
                            <?php echo get_template_part('images/mm-logo'); ?>
                        </a>
                    </div>

                    <div class="headerRow__phone-mobile d-xl-none">
                        <a href="tel:9203350123" role="button"><?php echo get_template_part('images/phone-icon'); ?> <span class="visually-hidden">Call us at (920) 335-0123</span></a>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="headerRow__nav pt-3 pt-xl-0 ms-lg-auto flex-lg-grow-0 collapse navbar-collapse" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav mx-auto %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                        ?>
                    </div>

                    <div class="headerRow__phone d-none d-xl-block">
                        <a href="tel:9203350123"><?php echo get_template_part('images/phone-icon'); ?> (920) 335-0123</a>
                    </div>

                    <div class="headerRow__social d-none d-xxl-flex">
                        <a href="https://facebook.com/mmlawyerswi" target="_blank">
                            <span class="visually-hidden">
                                Find us on Facebook
                            </span>
                            <?php echo get_template_part('images/facebook-logo'); ?>
                        </a>
                        <a href="https://www.linkedin.com/company/mmlawyerswi" target="_blank">
                            <span class="visually-hidden">
                                Visit us on LinkedIn
                            </span>
                            <?php echo get_template_part('images/linkedin-logo'); ?>
                        </a>
                    </div>

                </div>
            </nav>
        </header>