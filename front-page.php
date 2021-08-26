<?php get_header(); ?>
<?php
// TOPスライダー用ウィジェット
if (is_active_sidebar('top-slider')) {
    dynamic_sidebar('top-slider');
}
?>
<article class="content">
    <div class="content__inner">
        <div class="content__detail">
        <?php
        // TOPページ用ウィジェット
        if (is_active_sidebar('top-widget')) {
            dynamic_sidebar('top-widget');
        }
        ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</article>
<?php get_footer(); ?>