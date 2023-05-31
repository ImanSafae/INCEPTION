<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Puskar
 */
$GLOBALS['puskar_theme_options'] = puskar_get_options_value();
global $puskar_theme_options;
$enable_header = absint($puskar_theme_options['puskar_enable_top_header']);
$enable_menu   = absint($puskar_theme_options['puskar_enable_top_header_menu']);
$enable_social = absint($puskar_theme_options['puskar_enable_top_header_social']);
$search_header = absint($puskar_theme_options['puskar_enable_search']);
$dark_light = absint($puskar_theme_options['puskar_enable_light_dark']);
$dark_logo = esc_url($puskar_theme_options['puskar_dark_light_logo']);
?>

<header>
		<?php if( $enable_header == 1 ){ ?>

			<!-- Float Bar Start -->
		        <span class="floating-icons float-icon icon-right"></span>
		        <div class="floating-bar right">
				<?php if( $enable_social == 1 ){ ?>
		            <div class="floating-share">
		                <?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_id'        => '',
								'menu_class'     => '',
							) );
						?>
		            </div>
					<?php } ?>
		            <?php if($search_header == 1 ){ ?>
					<div class="floating-contact">
		                <ul>
		                    <li>
		                    	<button class="search icon-button">
								    <i class="fa fa-search"></i>
								</button>
		                    </li>
		                </ul>
		            </div>
					<?php } ?>
		        </div>
        <!-- Float Bar End -->

	<?php } ?>		
	<?php $header_image = esc_url(get_header_image());
	$header_class = ($header_image == "") ? '' : 'header-bg';
	?>
	<section class="main-header <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<!--Header Start-->
		<div id="ts-header">
		    <!-- Header Menu Start -->
		    <div class="menu-area  clearfix">
		        <div class="container">
		        	<div class="d-lg-flex justify-content-between align-items-center">
			            <!-- logo include here -->
			            <div class="logo-area">
			                
							<a class="logo-image-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img  src="<?php echo esc_url($dark_logo); ?>"></a>
							<?php the_custom_logo(); ?>
							<?php if ( is_front_page() && is_home() ) :
							?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
							?>
								<h1 class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								</h1>
							<?php
							endif;
							$puskar_description = get_bloginfo( 'description', 'display' );
							if ( $puskar_description || is_customize_preview() ) :
								?>
							<p class="site-description"><?php echo $puskar_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
			            </div>
			            <!-- end logo here -->

			            <!-- Main Menu Start -->
			            <nav class="nav navbar">
			            	<div class="d-flex align-items-center justify-content-between">
				            	<div class="menu-wrap">
				            		<div class="mobile-menu-link">
										<a href="#"  class="nav-menu-link">
											<i class="fa fa-bars" aria-hidden="true"></i>
										</a>
									</div>
					                <div class="navbar-menu">
					                	<div class="main-menu-close" data-focus="#ts-header .mobile-menu-link a">
					                		<a  href="javascript:void(0);"><i class="fa fa-window-close"></i></a>
					                	</div>
					                    <div class="menu-main-menu-container">
					                    	<?php
												wp_nav_menu( array(
													'theme_location' => 'menu-1',
													'menu_id'        => 'primary-menu',
													'container' => 'ul',
													'menu_class'      => 'menu'
												));
											?>
					                    </div>
					                </div>
					            </div>
								<?php if($dark_light === 1 ){ ?>						
									<button id="theme-toggle" class="btn btn-link btn-sm ml-2 small" type="button">
										<span class="d-block-light d-none"><i class="fa fa-moon-o"></i></span>
										<span class="d-block-dark d-none"><i class="fa fa-sun-o" style=""></i></span>
									</button>
								<?php } ?>
							</div>
			            </nav>
		            </div>
		            <!-- Main Menu End -->

		            <!-- Mobile Menu Start -->
		            
		            <!-- Mobile Menu End -->
		        </div>
		    </div>
		    <!-- Header Menu End -->
		</div><!--Header End-->
	</section><!-- #masthead -->
</header>
<?php if( 1 == $search_header ){ ?>
	<div class="search-popup">
		<!-- close button -->
		<button type="button" class="btn-close bg-transparent border-0" aria-label="Close">
			<span class="ti-close"></span>
		</button>
		<!-- content -->
		<div class="search-content">
			<div class="text-center">
				<h3 class="mb-4 mt-0"><?php esc_html_e('Press ESC to close', 'puskar'); ?></h3>
			</div>
			<!-- form -->
			<?php echo get_search_form(); ?>
		</div>
	</div>			
<?php } ?>


