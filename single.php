<?php get_header(); ?>
<article>
    <h1>詳細ページ</h1>
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
</article>
<?php get_footer(); ?>