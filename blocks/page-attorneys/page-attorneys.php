<?php
    /**
     * Page - Attorneys Block.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */


     $id = 'page-attorneys-' . $block['id'];
     if (!empty($block['anchor'])) {
         $id = $block['anchor'];
     }
 
     $className = 'page-attorneys';
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
            <?php if( have_rows('attorneys') ): ?>
                <div class="page-attorneys__wrapper row">
                <?php while( have_rows('attorneys') ): the_row(); 
                    $headshot = get_sub_field('headshot');
                    $name = get_sub_field('name');
                    $bio = get_sub_field('bio');
                    ?>
                    <div class="col-12 col-md-6 text-center">
                        <div class="page-attorneys__wrapper-attorney">
                            <?php if ($headshot) { ?>
                                <?= wp_get_attachment_image($headshot['id'], 'full', '', array("class" => "img-fluid")); ?>
                            <?php } ?>
                            <h3><?= $name; ?></h3>
                            <?php if ($bio) { ?>
                                <a class="btn btn-outline-secondary" href="<?= $bio['url']; ?>" <?php if ($bio['target']) { echo 'target="'. $bio['target'] .'"'; } ?>>
                                    <?= $bio['title']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>