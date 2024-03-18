<?php get_header(); ?>
    <main id="content" class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="page-content">
                        <div class="row justify-content-between">
                            <div class="col-lg-7">
                                <div class="page-content__left">
                                <h1>404 Error: Page Not Found</h1>
                                <p>It seems like you've stumbled upon a page that no longer exists or may have been moved. Don't worry, we're here to help you get back on track.</p>

                                <p>Here are a few options:</p>

                                <ol>
                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Go Back to Homepage</a>: Navigate back to our homepage and explore our range of legal services and resources.</li>
                                    <li><a href="/contact/">Contact Us</a>: If you're unable to find the information you need, feel free to reach out to us directly. Our team is here to assist you with any inquiries or concerns.</li>
                                </ol>

                                <p>While you're here, why not check out some of our popular pages:</p>

                                <ul>
                                    <li><a href="/services/">Services</a> - Discover the comprehensive legal services we offer.</li>
                                    <li><a href="/attorneys">Meet the Team</a> - Get to know the dedicated professionals behind M&M Law, LLP.</li>
                                </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-4 mt-5 mt-lg-0">
                                <div class="page-content__right">
                                    <?= do_shortcode('[contact-form-7 id="51ab17b" title="Contact form 1"]'); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
