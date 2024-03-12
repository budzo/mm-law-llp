<?php
    /**
     * Page - Services Block.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */


     $id = 'page-services-' . $block['id'];
     if (!empty($block['anchor'])) {
         $id = $block['anchor'];
     }
 
     $className = 'page-services';
     if (!empty($block['className'])) {
         $className .= ' ' . $block['className'];
     }
     if (!empty($block['align'])) {
         $className .= ' align' . $block['align'];
     }
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
    <div class="row">
        <div class="col text-center">
            <?php if( have_rows('services') ): ?>
                <div class="page-services__wrapper row">
                <?php while( have_rows('services') ): the_row(); 
                    $background_image = get_sub_field('background_image');
                    $service_link = get_sub_field('service_link');
                    $additional_service_text = get_sub_field('additional_service_text');
                    ?>
                    <div class="col-md-6">
                        <a class="page-services__wrapper-service" href="<?= esc_attr($service_link['url']); ?>" <?php if ($service_link['target']) { echo 'target="' . esc_attr($service_link['target']) . '"'; } ?>>
                            <?php if ($background_image) { ?>
                                <div class="page-services__wrapper-service-image">
                                    <?= wp_get_attachment_image($background_image['id'], 'full', '', array("class" => "img-fluid")); ?>
                                </div>
                            <?php } ?>
                            <div class="page-services__wrapper-service-title">
                                <?= $service_link['title']; ?>
                                <?php if ($additional_service_text) { ?>
                                    <div class="page-services__wrapper-additional-service-text">
                                        <?= $additional_service_text; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>