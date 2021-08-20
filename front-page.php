<?php get_header(); ?>
<article class="content">
    <h1 class="content__title">TOPページ</h1>
    <div class="content__detail">
    <?php
    // TOPページ用ウィジェット
    if (is_active_sidebar('top-widget')) {
        dynamic_sidebar('top-widget');
    }
    ?>
    </div>
</article>
<?php get_footer(); ?>