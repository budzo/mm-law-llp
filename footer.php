        <footer>
            <div class="footerTop">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Office Hours</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>Contact Information</h3>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                                'menu_class' => '',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="footerTop__nav list-unstyled %2$s">%3$s</ul>'
                            ));
                            ?>
                            <div class="footerTop__social d-flex justify-content-end">
                                <a href="https://facebook.com/mmlawyerswi" target="_blank">
                                    <?php echo get_template_part('images/facebook-logo'); ?>
                                </a>
                                <a href="https://www.linkedin.com/company/mmlawyerswi" target="_blank">
                                    <?php echo get_template_part('images/linkedin-logo'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footerMiddle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start text-center text-xl-start mb-lg-3 mb-xl-0">
                            &copy; <?= date('Y'); ?> <?= get_bloginfo('name'); ?>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'legal-menu',
                                'container' => false,
                                'menu_class' => '',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="footerMiddle__nav list-inline %2$s">%3$s</ul>',
                                'add_li_class' => 'list-inline-item'
                            ));
                            ?>
                        </div>
                        <div class="col-xl-6 text-center text-xl-end">
                            <span class="footerMiddle__by-line d-block d-md-inline">
                                Website Development by
                            </span>
                            <span class="footerMiddle__feldspar-creative">
                                <a href="https://feldsparcreative.com" target="_blank" title="Website by Feldspar Creative">
                                    <?php get_template_part('images/feldspar-creative-logo'); ?>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footerBottom text-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p>
                                The information you obtain on this website is not, nor intended to be, legal advice. The content on this website is general information only. <br>You should not take any legal actions or make any legal decisions solely based on the information in this website.
                            </p>
                            <p>
                                Navigating this website and any communications herein, does not and cannot create an attorney-client relationship. <br>You should consult with an attorney in regards to legal advice for your individual situation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <?php wp_footer(); ?>
    </body>
</html>
