<?php
    /**
     * Page - Contact Block.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */


     $id = 'page-contact-' . $block['id'];
     if (!empty($block['anchor'])) {
         $id = $block['anchor'];
     }
 
     $className = 'page-contact';
     if (!empty($block['className'])) {
         $className .= ' ' . $block['className'];
     }
     if (!empty($block['align'])) {
         $className .= ' align' . $block['align'];
     }
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
    <div class="row">
        <div class="col">
            <h3><?= __('Address', 'mmlawllp'); ?></h3>
            <div class="page-contact__address">
                <?php echo get_template_part('images/address-icon'); ?>
                <a href="https://maps.google.com/?q=366%20Main%20Avenue%20De%20Pere,%20WI%2054115" target="_blank">
                    366 Main Avenue<br>
                    De Pere, WI 54115
                </a>
            </div>
            <h3><?= __('Phone', 'mmlawllp'); ?></h3>
            <div class="page-contact__phone">
                <?php echo get_template_part('images/phone-icon'); ?>
                <a href="tel:9203350123">(920) 335-0123</a>
            </div>
            <h3><?= __('Hours', 'mmlawllp'); ?></h3>
            <div class="page-contact__hours">
                <?php echo get_template_part('images/hours-icon'); ?>
                Monday: 8:30 AM - 4:30 PM<br>
                Tuesday: 8:30 AM - 4:30 PM<br>
                Wednesday: 8:30 AM - 4:30 PM<br>
                Thursday: 8:30 AM - 4:30 PM<br>
                Friday: 8:30 AM - 12 PM
            </div>
            <?php if( have_rows('social_media') ): ?>
                <h3><?= __('Follow Us', 'mmlawllp'); ?></h3>
                <div class="page-contact__social">
                <?php while( have_rows('social_media') ): the_row(); 
                    $social_name = get_sub_field('social_name');
                    $social_url = get_sub_field('social_url');
                    ?>
                    <a href="<?= $social_url; ?>" target="_blank" title="Follow <?= get_bloginfo('name'); ?> on <?= $social_name; ?>">
                        <?= file_get_contents( get_template_directory() . '/images/'. strtolower($social_name) .'-logo.php' ); ?>
                    </a>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>