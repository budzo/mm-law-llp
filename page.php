<?php get_header(); ?>
    <main id="content" class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="page-content">
                        <div class="row justify-content-between">
                            <div class="col-lg-7">
                                <div class="page-content__left">
                                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                        <h1><?php the_title(); ?></h1>
                                        <?php the_content(); ?>
                                    <?php endwhile; else : ?>
                                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                                    <?php endif; ?>
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
