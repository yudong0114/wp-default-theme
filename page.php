<?php get_header(); ?>
<article class="content">
    <h1 class="content__title">固定ページ</h1>
    <div class="content__detail">
    <?php
    // pagebreak用に詳細記事のループ
    while (have_posts()){
        // メインループに記事をセット
        the_post();
        // コンテンツの出力
        the_content();
        // ページ分割のページネーション
        wp_link_pages([
            'pagelink' => '%ページ',
        ]);
    }
    ?>
    </div>
</article>
<?php get_footer(); ?>