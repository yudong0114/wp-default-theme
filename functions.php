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