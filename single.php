<?php get_header(); ?>

    <?php 
        if (have_posts()) :
            while (have_posts()) :
                the_post();
    ?>

    <main>
        <?php
            $imgBanner = get_field('main_img');
        ?>
        <section class="blog-banner" style="background-image: url('<?php echo esc_url($imgBanner['url']); ?>');">
            <article>
                <h1 class="random-text">Article about Donuts</h1>
            </article>
        </section>
        <section class="blog-page">
            <div class="container">
                <h3><?php the_title(); ?></h3>
                <article class="blog-content">
                    <figure>
                        <?php
                            $imgBanner = get_field('sm_banner_img');
                        ?>
                        <img src="<?php echo esc_url($imgBanner['url']); ?>" alt="<?php echo esc_attr($imgBanner['alt']); ?>">
                    </figure>
                    <figcaption>
                        <?php the_content(); ?>
                    </figcaption>
                </article>

                <article class="blog-bottom">
                    <div class="author-wrapper">
                        <figure>
                        <?php
                            $author_id = get_the_author_meta('ID');
                            echo get_avatar($author_id, 150, '', 'Author Image', array('class' => 'author-image'));
                        ?>
                        </figure>
                        <figcaption>
                            <h6><?php the_author(); ?></h6>
                            <p><?php the_time('d M Y'); ?></p>
                        </figcaption>
                    </div>
                    <div class="article-wrapper">
                        <?php
                        // Get the ID of the current post being viewed
                        $current_post_id = get_the_ID();

                        // Query blog posts
                        $blog_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                        ));

                        // Loop through blog posts
                        if ($blog_posts->have_posts()) {
                            while ($blog_posts->have_posts()) {
                                $blog_posts->the_post();

                                // Check if the current post is the same as the one being viewed
                                if (get_the_ID() !== $current_post_id) {
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="btn"><?php the_title(); ?></a>
                                    <?php
                                }
                            }
                            wp_reset_postdata(); // Reset post data to restore the original query
                        } else {
                            // No posts found
                            echo 'No blog posts found.';
                        }
                        ?>
                    </div>
                </article>
            </div>
        </section>
    </main>
    
    <?php 
        endwhile;
        endif;
    ?>

<?php get_footer(); ?>