<?php
    /**
     * Hero Block.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */


     $id = 'hero-' . $block['id'];
     if (!empty($block['anchor'])) {
         $id = $block['anchor'];
     }
 
     $className = 'hero';
     if (!empty($block['className'])) {
         $className .= ' ' . $block['className'];
     }
     if (!empty($block['align'])) {
         $className .= ' align' . $block['align'];
     }

     $background_image = get_field('background_image');
     $hero_heading = get_field('hero_heading');
     $hero_copy = get_field('hero_copy');
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
     <div class="hero__background">
        <?= wp_get_attachment_image( $background_image['id'], 'full', '', array( "class" => 'img-fluid' ) ); ?>
     </div>
     <div class="container">
        <div class="row">
            <div class="col">
                <div class="hero__content text-center">
                    <div class="hero__content-heading">
                        <h1 class="h2"><?= $hero_heading; ?></h1>
                    </div>
                    <div class="hero__content-copy">
                        <p class="body-large"><?= $hero_copy; ?></p>
                    </div>
                    <?php if( have_rows('hero_ctas') ): ?>
                        <div class="hero__content-ctas">
                        <?php while( have_rows('hero_ctas') ): the_row(); 
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
     </div>
</section>