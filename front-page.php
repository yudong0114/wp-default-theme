<?php get_header(); ?>
<article>
    <h1>TOPページ</h1>
    <?php
    // TOPページ用ウィジェット
    if (is_active_sidebar('top-widget')) {
        dynamic_sidebar('top-widget');
    }
    ?>
</article>
<?php get_footer(); ?>