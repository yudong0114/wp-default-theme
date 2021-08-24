<?php get_header(); ?>
<article class="content">
    <h1 class="content__title">ニュース一覧</h1>
    <div class="content__inner">
        <ul class="content__detail posts">
        <?php
        // pagebreak用に詳細記事のループ
        while (have_posts()){
            // メインループに記事をセット
            the_post();
            
            // 投稿日付
            $post_date = get_the_time('Y/m/d');
            // 投稿タイトル
            $post_title = get_the_title();
            // 投稿リンク
            $post_permalink = get_the_permalink();
            // 記事の抜粋
            $post_excerpt = get_the_excerpt();
            // 記事一覧リンクの出力
            echo <<<___HTML___
                <li class="post">
                    <p class="post__date">{$post_date}</p>
                    <h2 class="post__title">
                        <a href="{$post_permalink}" class="post__link">{$post_title}</a>
                    </h2>
                    <p class="post__excerpt">{$post_excerpt}</p>
                </li>
            ___HTML___;
        }
        ?>
        </ul>
        <?php get_sidebar(); ?>
    </div>
</article>
<?php get_footer(); ?>