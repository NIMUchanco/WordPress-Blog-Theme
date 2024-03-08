<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charm of Donuts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <?php wp_head(); ?>
</head>
<body id="top">
    <header>
        <div class="container">
            <figure class="logo">
                <?php the_custom_logo(); ?>
            </figure>
            <?php
                $args = array(
                    'theme_location' => 'headerNav',
                    'container' => 'nav',
                    'menu_class' => 'nav-link'
                );
            ?>
            <?php wp_nav_menu($args); ?>
    
            <!-- HAMBURGER MENU -->
            <div class="hamburger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <?php
                $args = array(
                    'theme_location' => 'headerNav',
                    'container_class' => 'nav-menu',
                    'menu_class' => 'nav-link'
                );
            ?>
            <?php wp_nav_menu($args); ?>
            <div class="close-btn">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    </header>