<?php
    /**
     * Buttons Block.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */


     $id = 'buttonsBlock-' . $block['id'];
     if (!empty($block['anchor'])) {
         $id = $block['anchor'];
     }
 
     $className = 'buttonsBlock';
     if (!empty($block['className'])) {
         $className .= ' ' . $block['className'];
     }
     if (!empty($block['align'])) {
         $className .= ' align' . $block['align'];
     }
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
    <?php if( have_rows('buttons') ): ?>
        <div class="buttonsBlock__buttons">
        <?php while( have_rows('buttons') ): the_row(); 
            $cta = get_sub_field('cta');
            $cta_style = get_sub_field('cta_style');
            ?>
            <a class="btn btn-<?= $cta_style; ?>" href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>">
                <?= $cta['title']; ?>
            </a>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>