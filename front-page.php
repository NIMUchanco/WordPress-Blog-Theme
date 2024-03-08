<?php get_header(); ?>
    <main>
        <!-- BANNER -->
        <section class="banner" id="banner">
            <div class="overlay"></div>
            <video autoplay muted loop>
                <source src="<?php the_field('section_hero_bg_video_link'); ?>" type="video/mp4">
              </video>
            <article>
                <h1 class="random-text"><?php the_field('section_hero_title'); ?></h1>
            </article>
        </section>

        <!-- SECTION 1 -->
        <section class="slider">
            <h2 class="random-text"><?php the_field('section_kinds_title'); ?></h2>
            <!-- SLIDER 1 -->
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- OPEN LOOP -->
                    <?php
                    // CUSTOM QUERY
                    $frontpageDonut = new WP_Query(array(
                        'posts_per_page' => 10,
                        'post_type' => 'donut'
                    ));

                    $imgNumber = 0;

                    // THE LOOP
                    while ($frontpageDonut->have_posts()) {
                        $frontpageDonut->the_post();
                        $imgNumber++;
                    
                    ?>
                    <div class="swiper-slide">
                        <?php
                            $donutImg = get_field('donut_img');
                        ?>
                        <a href="<?php echo esc_url($donutImg['url']); ?>" data-alt="Image <?php echo $imgNumber ?>" data-caption="<?php the_title(); ?>" class="gallery-link">
                            <figure>
                                <img src="<?php echo esc_url($donutImg['url']); ?>" alt="Slide <?php echo $imgNumber ?>">
                            </figure>
                            <figcaption>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('donut_description'); ?></p>
                            </figcaption>
                        </a>
                    </div>

                    <?php
                    } wp_reset_postdata();
                    ?>
                    <!-- CLOSE LOOP -->
                </div>

                <!-- SLIDER 2 -->
                <div class="swiper2">
                    <div class="swiper-wrapper">
                        <!-- OPEN LOOP -->
                    <?php
                    // CUSTOM QUERY
                    $frontpageDonut = new WP_Query(array(
                        'posts_per_page' => 10,
                        'offset' => 10,
                        'post_type' => 'donut'
                    ));

                    $imgNumber = 10;
                    // THE LOOP
                    while ($frontpageDonut->have_posts()) {
                        $frontpageDonut->the_post();
                        $imgNumber++;
                    
                    ?>
                    <div class="swiper-slide">
                        <?php
                            $donutImg = get_field('donut_img');
                        ?>
                        <a href="<?php echo esc_url($donutImg['url']); ?>" data-alt="Image <?php echo $imgNumber ?>" data-caption="<?php the_title(); ?>" class="gallery-link">
                            <figure>
                                <img src="<?php echo esc_url($donutImg['url']); ?>" alt="Slide <?php echo $imgNumber ?>">
                            </figure>
                            <figcaption>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('donut_description'); ?></p>
                            </figcaption>
                        </a>
                    </div>

                    <?php
                    } wp_reset_postdata();
                    ?>
                    <!-- CLOSE LOOP -->
                </div>
            </div>
        </section>

        <!-- IMAGE GALLERY MODAL -->
        <section class="image-modal">
            <div class="container">
                <article>
                    <div class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <figure>
                        <div class="prev-btn">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="next-btn">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                        <img src="" alt="" class="modal-content">
                    </figure>
                    <figcaption class="caption"></figcaption>
                </article>
            </div>
        </section>

        <!-- SECTION 2 -->
        <section class="blog" id="blog">
            <div class="container">
                <h2 class="random-text"><?php the_field('section_blog_title'); ?></h2>
                <article>
                    <!-- OPEN LOOP -->
                    <?php
                    $frontpageBlog = new WP_Query(array(
                        'posts_per_page' => 3,
                        'post_type' => 'post'
                    ));

                    while ($frontpageBlog->have_posts()) {
                        $frontpageBlog->the_post();
                    
                    ?>
                    <!-- CARD -->
                    <a href="<?php the_permalink(); ?>" class="card-link">
                        <?php
                            $imgBlog = get_field('main_img');
                        ?>
                        <figure>
                            <img src="<?php echo esc_url($imgBlog['url']); ?>" alt="<?php echo esc_attr($imgBlog['alt']); ?>">
                        </figure>
                        <figcaption>
                            <h3><?php the_title(); ?></h3>
                            <div class="categories">
                            <?php $categories = get_the_category();
                            foreach ($categories as $category) : ?>
                            
                            <span href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="btn"><?php echo $category->name; ?></span>
                            <?php endforeach; ?>
                            </div>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 16); ?></p>
                            <div class="card-bottom">
                                <span class="read-more">
                                    <i class="fa-solid fa-hand-pointer"></i>
                                    <p>Read now</p>
                                </span>
                                <b>By <?php the_author(); ?></b>
                            </div>
                        </figcaption>
                    </a>
                    <?php
                    } wp_reset_postdata();
                    ?>
                </article>
            </div>
        </section>

        <!-- SECTION 3 -->
        <section class="contact" id="contact">
            <div class="container">
                <h2 class="random-text"><?php the_field('section_contact_title'); ?></h2>
                <article>
                <?php echo apply_shortcodes('[contact-form-7 id="cb78e33" title="Contact form in Front page"]'); ?>
                </article>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>