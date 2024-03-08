<footer>
    <div class="container">
        <article> 
            <?php if ( is_active_sidebar('footer-left')) : ?>
                <?php dynamic_sidebar('footer-left'); ?>
            <?php endif; ?>
        </article>
        <article class="info">
            <?php if ( is_active_sidebar('footer-right')) : ?>
                <?php dynamic_sidebar('footer-right'); ?>
            <?php endif; ?>
        </article>
    </div>
    <?php wp_footer(); ?>
</footer>
<script src="script.js"></script>