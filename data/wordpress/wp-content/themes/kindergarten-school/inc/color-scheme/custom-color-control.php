<?php 

$kindergarten_school_color_scheme_one = get_theme_mod('kindergarten_school_color_scheme_one');

$kindergarten_school_color_scheme_css = "";

if($kindergarten_school_color_scheme_one != false){

  $kindergarten_school_color_scheme_css .='.woocommerce span.onsale,
  .woocommerce #respond input#submit,
  .woocommerce a.button,
  .woocommerce button.button,
  .woocommerce input.button,
  .woocommerce #respond input#submit.alt,
  .woocommerce a.button.alt,
  .woocommerce button.button.alt,
  .woocommerce input.button.alt,
  nav.woocommerce-MyAccount-navigation ul li:hover,
  #commentform input#submit:hover{';

  $kindergarten_school_color_scheme_css .='background: '.esc_attr($kindergarten_school_color_scheme_one).' !important;';

  $kindergarten_school_color_scheme_css .='}';

  $kindergarten_school_color_scheme_css .='.header,
  .toggle-nav button,
  nav.woocommerce-MyAccount-navigation ul li{';

  $kindergarten_school_color_scheme_css .='border-color: '.esc_attr($kindergarten_school_color_scheme_one).' !important;';

  $kindergarten_school_color_scheme_css .='}';

  $kindergarten_school_color_scheme_css .='a,.page4box:hover h3 a,
  .page4box:hover .pagemore,
  .logo h1 span,
  .logo a,
  .listarticle h2 a:hover,
  #sidebar ul li a:hover,
  .woocommerce ul.products li.product .price,
  .woocommerce .star-rating span,
  .postmeta a:hover,
  .toggle-nav button,
  .ftr-4-box h5 span{';

  $kindergarten_school_color_scheme_css .='color: '.esc_attr($kindergarten_school_color_scheme_one).';';

  $kindergarten_school_color_scheme_css .='}';
}
