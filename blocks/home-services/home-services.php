<?php
    /**
     * Home - Services Block.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */


     $id = 'home-services-' . $block['id'];
     if (!empty($block['anchor'])) {
         $id = $block['anchor'];
     }
 
     $className = 'home-services';
     if (!empty($block['className'])) {
         $className .= ' ' . $block['className'];
     }
     if (!empty($block['align'])) {
         $className .= ' align' . $block['align'];
     }
     $services_heading = get_field('services_heading');
     $services_copy = get_field('services_copy');
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
     <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="home-services__heading">
                    <h2><?= $services_heading; ?></h2>
                </div>
                <div class="home-services__copy">
                    <p class="body-medium"><?= $services_copy; ?></p>
                </div>
                <?php if( have_rows('services') ): ?>
                    <div class="home-services__wrapper row justify-content-center">
                    <?php while( have_rows('services') ): the_row(); 
                        $background_image = get_sub_field('background_image');
                        $service_link = get_sub_field('service_link');
                        $additional_service_text = get_sub_field('additional_service_text');
                        ?>
                        <div class="col-md-6 col-xl-4">
                            <a class="home-services__wrapper-service" href="<?= esc_attr($service_link['url']); ?>" <?php if ($service_link['target']) { echo 'target="' . esc_attr($service_link['target']) . '"'; } ?>>
                                <?php if ($background_image) { ?>
                                    <div class="home-services__wrapper-service-image">
                                        <?= wp_get_attachment_image($background_image['id'], 'full', '', array("class" => "img-fluid")); ?>
                                    </div>
                                <?php } ?>
                                <div class="home-services__wrapper-service-title">
                                    <?= $service_link['title']; ?>
                                    <?php if ($additional_service_text) { ?>
                                        <div class="home-services__wrapper-additional-service-text">
                                            <?= $additional_service_text; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('ctas') ): ?>
                    <div class="home-services__ctas">
                    <?php while( have_rows('ctas') ): the_row(); 
                        $cta = get_sub_field('cta');
                        $cta_style = get_sub_field('cta_style');
                        ?>
                        <a class="btn btn-<?= $cta_style; ?>" href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>">
                            <?= $cta['title']; ?>
                        </a>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
     </div>
</section>