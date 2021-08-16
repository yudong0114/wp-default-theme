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

// TOPのコンテンツをウィジェットエリア
function top_widgets_init() {
    register_sidebar([
        'name' => 'TOP',
        'id' => 'top-widget',
        'class' => 'top-widget',
        'description' => 'TOPのウィジェット',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget__title">',
        'after_title' => '</h2>',
    ]);
}
add_action( 'widgets_init', 'top_widgets_init' );