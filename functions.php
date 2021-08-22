<?php
/**
 * テーマのセットアップ
 */
function setup() {
    // タイトルタグを自動生成します。
    add_theme_support( 'title-tag' );
    // ヘッダーにfeedのlinkを生成します。
    add_theme_support( 'automatic-feed-links' );
    // アイキャッチ画像を利用できるようにします。
    add_theme_support( 'post-thumbnails' );
    // 出力されるマークアップをHTML5にします。
    add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );
    // エディタ用CSSを有効にします。
    add_editor_style( ['css/editor-style.css'] );
}
add_action( 'after_setup_theme', 'setup' );

/**
 * 読み込むCSSとJavaScriptを設定します。
 */
function common_scripts_css() {
    // リセットCSSの読み込み
    wp_enqueue_style('reset', get_template_directory_uri().'/css/reset.css', [], '1');
    // サイト用CSSの読み込み
    wp_enqueue_style('site-common', get_template_directory_uri().'/css/common.css', [], '1');
    // サイト用スクリプトの読み込み
    wp_enqueue_script('site-common', get_template_directory_uri().'/js/common.js', [], '1', true);
}
add_action( 'wp_enqueue_scripts', 'common_scripts_css' );

/**
 * 記事一覧をarchive.phpテンプレを使用
 */
function post_has_archive( $args, $post_type ) {
    if ( 'post' == $post_type ) {
        // パーマリンクのリライト
        $args['rewrite'] = true;
        // URLとして使いたい文字列
        $args['has_archive'] = 'news';
    }
    return $args;
    }
    add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

// ヘッダーナビゲーションのコンテンツをウィジェットエリア
function header_widgets_init() {
    register_sidebar([
        'name' => 'ヘッダー',
        'id' => 'header-nav',
        'class' => 'header-nav',
        'description' => 'ヘッダーメニューのウィジェット',
        'before_widget' => '<nav id="header__nav %1$s" class="header__nav %2$s">',
        'after_widget' => '</nav>',
    ]);
}
add_action( 'widgets_init', 'header_widgets_init' );

// TOPのコンテンツをウィジェットエリア
function top_widgets_init() {
    register_sidebar([
        'name' => 'TOPコンテンツ',
        'id' => 'top-widget',
        'class' => 'top-widget',
        'description' => 'TOPコンテンツのウィジェット',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget__title">',
        'after_title' => '</h2>',
    ]);
}
add_action( 'widgets_init', 'top_widgets_init' );

// 商品紹介用のウィジェット
require_once __DIR__ . '/widgets/product-widget.php';