<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Kindergarten
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-kindergarten' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'kindergarten_school_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

  <div class="header">
    <div class="container">
      <div class="top-header">
        <div class="inner-header row">
          <div class="col-box-6">
            <?php if ( get_theme_mod('kindergarten_school_phone_number') != "") { ?>
              <span><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('kindergarten_school_phone_number',''));?></span>
            <?php }?>
            <?php if ( get_theme_mod('kindergarten_school_email_address') != "") { ?>
              <span><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('kindergarten_school_email_address',''));?></span>
            <?php }?>
          </div>
          <div class="col-box-7">
            <span class="social-media-box">
              <?php if ( get_theme_mod('kindergarten_school_social_facebook') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_facebook',''));?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_twitter') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_twitter',''));?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_youtube') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_youtube',''));?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_instagram') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_instagram',''));?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_linkdin') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_linkdin',''));?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <?php }?>
            </span>
          </div>
        </div>
      </div>
      <div class="header-box">
        <div class="logo">
          <?php kindergarten_school_the_custom_logo(); ?>
          <div class="site-branding-text <?php if( get_theme_mod( 'kindergarten_school_hide_titledesc' ) ) { ?>hidetitle<?php } ?>">
            <?php if ( get_theme_mod('kindergarten_school_title_enable',true) != "") { ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } ?>
            <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <?php if ( get_theme_mod('kindergarten_school_tagline_enable',false) != "") { ?>
              <span><?php echo esc_html($description); ?></span>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="toggle-nav media-menu">
          <?php if(has_nav_menu('primary')){ ?>
            <button role="tab" onclick="kindergarten_school_nav_open()" class="mobiletoggle"><?php esc_html_e('Menu','classic-kindergarten'); ?><span class="screen-reader-text"><?php esc_html_e('Menu','classic-kindergarten'); ?></span></button>
          <?php }?>
        </div>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-kindergarten' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array(
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="close-button media-menu" onclick="kindergarten_school_nav_close()"><?php esc_html_e('Close','classic-kindergarten'); ?><span class="screen-reader-text"><?php esc_html_e('Close','classic-kindergarten'); ?></span></a>
          </nav>
        </div>
      </div>
    </div>
  </div>
