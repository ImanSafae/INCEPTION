<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Kindergarten
 */
?>
<div id="footer">
	<div class="container">
    <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
    <?php endif; // end footer widget area ?>

    <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
    <?php endif; // end footer widget area ?>

    <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
    <?php endif; // end footer widget area ?>

    <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
    <?php endif; // end footer widget area ?>
    <div class="clear"></div>
  </div>
  <div class="copywrap">
  	<div class="container">
      <?php echo esc_html(get_theme_mod('kindergarten_school_copyright_text',__('Kindergarten WordPress Theme','classic-kindergarten'))); ?>
    </div>
  </div>
</div>

<?php if(get_theme_mod('kindergarten_school_scroll_hide',false)){ ?>
   <a id="button"><?php esc_html_e('TOP', 'classic-kindergarten'); ?></a>
  <?php } ?>

<?php wp_footer(); ?>
</body>
</html>