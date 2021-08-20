<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="header__inner">
        <div class="header__logo"><a href="<?php echo home_url(); ?>">ヘッダーロゴ</a></div>
        <?php
        wp_nav_menu( [ 
            'container_class' => 'header__nav-container',
            'menu_class' => 'header__nav-list' 
        ] );
        ?>
    </div>
</header>
<main class="main">

