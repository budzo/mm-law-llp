<?php
    /**
     * Home - Meet The Team Block.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */


     $id = 'home-meet-the-team-' . $block['id'];
     if (!empty($block['anchor'])) {
         $id = $block['anchor'];
     }
 
     $className = 'home-meet-the-team';
     if (!empty($block['className'])) {
         $className .= ' ' . $block['className'];
     }
     if (!empty($block['align'])) {
         $className .= ' align' . $block['align'];
     }
     $meet_the_team_heading = get_field('meet_the_team_heading');
     $meet_the_team_copy = get_field('meet_the_team_copy');
     $meet_the_team_member_count = count(get_field('team_members'));
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
     <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="home-meet-the-team__heading">
                    <h2><?= $meet_the_team_heading; ?></h2>
                </div>
                <div class="home-meet-the-team__copy">
                    <p class="body-medium"><?= $meet_the_team_copy; ?></p>
                </div>
                <?php $index = 0; if( have_rows('team_members') ): ?>
                    <div class="home-meet-the-team__wrapper">
                    <?php while( have_rows('team_members') ): the_row(); 
                        $headshot = get_sub_field('headshot');
                        $name = get_sub_field('name');
                        $job_title = get_sub_field('job_title');
                        $bio = get_sub_field('bio');
                        ?>
                        <div id="team-member-id-<?= $index; ?>" class="home-meet-the-team__wrapper-member">
                            <?php if ($bio) { ?>
                                <a href="<?= $bio['url']; ?>" <?php if ($bio['target']) { echo 'target="'. $bio['target'] .'"'; } ?>>
                            <?php } ?>
                                <?php if ($headshot) { ?>
                                    <?= wp_get_attachment_image($headshot['id'], 'full', '', array("class" => "img-fluid")); ?>
                                <?php } ?>
                                <h3><?= $name; ?></h3>
                                <h4><?= $job_title; ?></h4>
                            <?php if ($bio) { ?>
                                </a>
                            <?php } ?>
                        </div>
                        <?php if ($index == 1) { ?>
                            <div class="w-100"></div>
                        <?php } ?>
                    <?php $index++; endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('ctas') ): ?>
                    <div class="home-meet-the-team__ctas">
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