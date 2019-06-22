<?php if( get_theme_mod('enable_footer', false) ) { ?>
<section class="bottom">
    <div class="container">
        <!-- Widgets -->
        <div class="row">
            <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
        </div>
    </div>
</section>
<?php } ?>

<!-- Start Footer -->
<section itemtype="https://schema.org/WPFooter" itemscope="itemscope" class="footer text-center text-md-left">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="copyright">
                    <?php echo get_theme_mod('copyright_text', 'Copyright © 2019, MT Blog. by <a href="https://www.mightythemes.com" target="_blank">Mighty Themes</a>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="social-icons float-md-right">
                    <?php get_template_part( 'template-parts/social', 'profiles' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

<?php if (get_theme_mod('space_before_body') ) : ?>
    <div class="space-before-body-code">
        <?php echo get_theme_mod('space_before_body'); ?>
    </div>
<?php endif; ?>

</body>

<?php 
    if (get_theme_mod('tracking_code') ) :
        echo get_theme_mod('tracking_code'); 
    endif;
?>

</html>