<?php
	// Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	add_action( 'customize_register', 'atmospheres__header_top_customize_register' );
	function atmospheres__header_top_customize_register( $wp_customize ) {
		/***********************************************************************************
			* Back to top button Options
		***********************************************************************************/
		$wp_customize->add_section( 'header_top' , array(
		'title'       => __( 'Header Top', 'atmospheres' ),
		'priority'   => 2,
		) );
		$wp_customize->add_setting( 'activate_header_top', array (
		'sanitize_callback' => 'atmospheres__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_header_top', array(
		'priority'    => 1,
		'label'    => __( 'Deactivate Header Top', 'atmospheres' ),
		'section'  => 'header_top',
		'settings' => 'activate_header_top',
		'type' => 'checkbox',
		) ) );
		
 	    $wp_customize->add_setting( 'header_email', array (
		'default' => 'email@myemail.com',	
		'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_email', array(
		'label'    => __( 'E-mail', 'atmospheres' ),
		'priority'    => 3,
		'section'  => 'header_top',
		'settings' => 'header_email',
		'type' => 'text',
		) ) );
 	    $wp_customize->add_setting( 'header_address', array (
		'default' => 'Str. 368',
		'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_address', array(
		'label'    => __( 'Address', 'atmospheres' ),
		'priority'    => 3,
		'section'  => 'header_top',
		'settings' => 'header_address',
		'type' => 'text',
		) ) );
 	    $wp_customize->add_setting( 'header_phone', array (
		'default' => '+01234567890',		
		'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_phone', array(
		'label'    => __( 'Phone', 'atmospheres' ),
		'priority'    => 3,
		'section'  => 'header_top',
		'settings' => 'header_phone',
		'type' => 'text',
		) ) );
			
	}	
	
	/**
		* Search Top
	*/
	add_action( 'atmospheres_header_search_top', 'atmospheres_search_top' );
	function atmospheres_search_top()
	{
		if ( get_theme_mod( 'atmospheres_header_search' ) ) {
			echo  '<div class="s-search-top">
			<i onclick="fastSearch()" id="search-top-ico" class="dashicons dashicons-search"></i>
			<div id="big-search" style="display:none;">
			<form method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div style="position: relative;">
			<button class="button-primary button-search"><span class="screen-reader-text">' . esc_html( 'Search for:', 'atmospheres' ) . '</span></button>
			<span class="screen-reader-text">' . esc_html( 'Search for:', 'atmospheres' ) . '</span>
			<div class="s-search-show">
			<input id="s-search-field"  type="search" class="search-field"
			placeholder="' . esc_html( 'Search ...', 'atmospheres' ) . '"
			value="' . esc_html(get_search_query()) . '" name="s"
			title="' . esc_html( 'Search for:', 'atmospheres' ) . '" />
			<input type="submit" id="stss" class="search-submit" value="' . esc_html( 'Search', 'atmospheres' ) . '" />
			<div onclick="fastCloseSearch()" id="s-close">X</div>
			</div>	
			</div>
			</form>
			</div>	
			</div>' ;
		}
		return;
	}
	
	function atmospheres__header () {

	?>
	<header class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<!-- Before Header  -->	
		<?php if ( !get_theme_mod( 'activate_header_top' ) ) { ?>
			<div class="header-top">
				<div id="top-contacts" class="before-header">
					<div class="my-contacts">
						<?php if (get_theme_mod('header_email', 'email@myemail.com')) { ?>
							<div class="h-email" itemprop="email"><a href="mailto:<?php echo esc_html( get_theme_mod( 'header_email', 'email@myemail.com') ); ?>"><span class="dashicons dashicons-email-alt"> </span> <?php echo esc_html( get_theme_mod( 'header_email', 'email@myemail.com') ); ?></a></div>
						<?php } ?>
						<?php if (get_theme_mod('header_address','Str. 368')) { ?>
							<div class="h-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span class="dashicons dashicons-location"></span><?php echo esc_html( get_theme_mod( 'header_address','Str. 368') ); ?></div>
						<?php } ?>
						<?php if (get_theme_mod('header_phone','+01234567890')) { ?>
							<div class="h-phone" itemprop="telephone"><a href="tel:<?php echo esc_html( get_theme_mod( 'header_phone','+01234567890') ); ?>"><span class="dashicons dashicons-phone"> </span> <?php echo esc_html( get_theme_mod( 'header_phone','+01234567890') ); ?></a></div>
						<?php } ?>
					</div>	
					<?php do_action( 'atmospheres_login' ); ?>
				</div>
			</div>
			<?php } ?>
			<?php if( has_custom_logo() ) { ?>
			<div class="mobile-cont">
				<div class="mobile-logo" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
					<?php the_custom_logo(); ?>
				</div>
			</div>
			<?php } ?>			
		<!-- Header Menu Top  -->	
		<div style="position: relative;">
		<?php if( !get_theme_mod( 'hide_menu' ) ) {
  
			 if(get_theme_mod( 'menu_position') == "left") { ?>
				<div id="menu-top" class="menu-cont rp-menu">
					<div class="grid-menu">
						<div id="grid-top" class="grid-top">
							<!-- Site Navigation  -->
					<div class="menu-and-detiles">		
							<div class="left-detiles">
								<?php 
								do_action( 'atmospheres_header_search_top' );
								do_action( 'atmospheres_header_woo_cart' );
								?>
							</div>	

							<button id="s-button-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img alt="mobile" src="<?php echo esc_url(get_template_directory_uri() ) . '/images/mobile.jpg'; ?>"/></button>
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle"><?php esc_html_e( 'Menu', 'atmospheres' ); ?></button>
								<?php  wp_nav_menu( array( 
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu',
									'container_class' => 'menu-top-container',
								) ); ?>
							</nav><!-- #site-navigation -->
					</div>		
						<?php if( has_custom_logo() ) { ?>
							<div class="header-right" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
								<?php the_custom_logo(); ?>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			<?php }
			
			 if(get_theme_mod( 'menu_position') == "right" or get_theme_mod( 'menu_position') == "" ) { ?>
				<div id="menu-top" class="menu-cont rp-menu">
					<div class="grid-menu">
						<div id="grid-top" class="grid-top">
						<!-- Site Navigation  -->
							
							<?php if( has_custom_logo() ) { ?>
								<div class="header-right" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
									<?php the_custom_logo(); ?>
								</div>	
							<?php } ?>					
						<div class="menu-and-detiles">
							<button id="s-button-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img alt="mobile" src="<?php echo esc_url(get_template_directory_uri() ) . '/images/mobile.jpg'; ?>"/></button>
								<div class="left-detiles">
									<?php 
									do_action( 'atmospheres_header_search_top' );
									do_action( 'atmospheres_header_woo_cart' );
									?>
								</div>	
						
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle"><?php esc_html_e( 'Menu', 'atmospheres' ); ?></button>
								<?php  wp_nav_menu( array( 
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu',
									'container_class' => 'menu-top-container',
								) ); ?>
							</nav><!-- #site-navigation -->		
							</div>	
						</div>
					</div>
				</div>
			<?php } 			

			 if(get_theme_mod( 'menu_position') == "center" ) { ?>
				<div id="menu-top" class="menu-cont rp-menu">
					<div class="grid-menu">
						<div id="grid-top" class="grid-top">
						<!-- Site Navigation  -->
						<?php if( has_custom_logo() ) { ?>
							<div class="header-right" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
								<?php the_custom_logo(); ?>
							</div>	
						<?php } ?>
							<button id="s-button-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img alt="mobile" src="<?php echo esc_url(get_template_directory_uri() ) . '/images/mobile.jpg'; ?>"/></button>
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle"><?php esc_html_e( 'Menu', 'atmospheres' ); ?></button>
								<?php  wp_nav_menu( array( 
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu',
									'container_class' => 'menu-top-container',
								) ); ?>
							</nav><!-- #site-navigation -->
							<div class="left-detiles center-detiles">
								<?php 
								do_action( 'atmospheres_header_search_top' );
								do_action( 'atmospheres_header_woo_cart' );
								?>
							</div>						
						</div>
					</div>
				</div>
			<?php } 
		} ?>
			
			<div class="clear"></div>
		</div>
		<!-- Header Image  -->	
		<?php if ( !get_post_meta( get_the_ID(),'atmospheres_value_header_image', true ) ) { ?>	
			<?php if( (has_header_image() or get_theme_mod('video_upload')) and (is_front_page() or is_home() ) and get_theme_mod( 'header_image_show', "home" ) == 'home' ) { ?>	
				<div class="all-header">
					<div class="s-shadow"></div>
					<div class="dotted"></div>
					<div class="s-hidden">
						<?php
							if(!get_theme_mod('video_upload') ) { ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'default' ) { ?>
								<img id="masthead" style="<?php atmospheres__heade_image_zoom_speed (); ?>" class="header-image" src='<?php echo esc_url(get_template_directory_uri() ) . '/images/header.webp'; ?>' alt="<?php esc_attr_e( 'header image','atmospheres' ); ?>"/>	
							<?php } ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'real' ) { ?>
								<img id="masthead" style="<?php atmospheres__heade_image_zoom_speed (); ?>" class="header-image" src='<?php if ( !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'atmospheres__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' alt="<?php esc_attr_e( 'header image','atmospheres' ); ?>"/>	
								<?php } else { ?>
								<div id="masthead" class="header-image" style="<?php atmospheres__heade_image_zoom_speed (); ?> background-image: url( '<?php if (  !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'atmospheres__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' );"></div>
								<?php } 
							} elseif( get_theme_mod('video_upload') ) { ?>
							<video <?php if( get_theme_mod( 'atmospheres_loop', true ) ) { echo "loop"; } ?> muted autoplay preload="auto" id="masthead">
								<source src="<?php echo esc_url(wp_get_attachment_url( get_theme_mod('video_upload') )); ?>" type="video/mp4">
							</video>
						<?php } ?>
					</div>
					<div class="site-branding">
						<?php if ( display_header_text() == true ) { ?>
							<?php
								if ( is_front_page() or is_home() ) :
							?>
							<h1 id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2"><?php bloginfo( 'name' ); ?></span></a></h1>
							<?php
								else :
							?>
							<p id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<span class="ml2"><?php if( get_theme_mod('atmospheres_header_single') ) { if( !is_singular() ) { the_archive_title(); } else { the_title(); } } else { bloginfo( 'name' ); } ?></span>
								</a>
							</p>
							<?php
								endif;
								$atmospheres__description = esc_html(get_bloginfo( 'description', 'display' ) );
								if ( $atmospheres__description || is_customize_preview() ) :
							?>    
							<p class="site-description" itemprop="headline">
								<span class="word"><?php echo esc_html($atmospheres__description); ?></span>
							</p>
							<?php endif; ?>	
							<?php }
							if ( is_front_page() or is_home() ) {
							    do_action('atmospheres_buttons_header');
							} ?>
					</div>
					<!-- .site-branding -->
				</div>
			<?php } ?>
			<?php if ((has_header_image() or get_theme_mod('video_upload')) and get_theme_mod( 'header_image_show', "home"  ) == 'all' ) { ?>	
				<div class="all-header">
					<div class="s-shadow"></div>
					<div class="dotted"></div>
					<div class="s-hidden">
						<?php
							if(!get_theme_mod('video_upload') ) { ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'default' ) { ?>
								<img id="masthead" style="<?php atmospheres__heade_image_zoom_speed (); ?>" class="header-image" src='<?php echo esc_url(get_template_directory_uri() ) . '/images/header.webp'; ?>' alt="<?php esc_attr_e( 'header image','atmospheres' ); ?>"/>	
							<?php } ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'real' ) { ?>
								<img id="masthead" style="<?php atmospheres__heade_image_zoom_speed (); ?>" class="header-image" src='<?php if ( !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'atmospheres__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' alt="<?php esc_attr_e( 'header image','atmospheres' ); ?>"/>	
								<?php } else { ?>
								<div id="masthead" class="header-image" style="<?php atmospheres__heade_image_zoom_speed (); ?> background-image: url( '<?php if (  !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'atmospheres__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' );"></div>
							<?php }
							} elseif( get_theme_mod('video_upload') ) { ?>
							<video <?php if( get_theme_mod( 'atmospheres_loop' , true ) ) { echo "loop"; } ?> muted  autoplay  id="masthead" >
								<source src="<?php echo esc_url(wp_get_attachment_url( get_theme_mod('video_upload') )); ?>" type="video/mp4">
							</video>
						<?php } ?>
					</div>
					<div class="site-branding">
						<?php if ( display_header_text() == true ) { ?>
							<?php
								if ( is_front_page() or is_home() ) :
							?>
							<h1 id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2 letter"><?php bloginfo( 'name' ); ?></span></a></h1>
							<?php
								else :
							?>
							<p id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<span class="ml2 letter"><?php if( get_theme_mod('atmospheres_header_single') ) { if( !is_singular() ) { the_archive_title(); } else { the_title(); } } else { bloginfo( 'name' ); } ?></span>
								</a>
							</p>
							<?php
								endif;
								$atmospheres__description = esc_html(get_bloginfo( 'description', 'display' ) );
								if ( $atmospheres__description || is_customize_preview() ) :
							?>    
							<p class="site-description" itemprop="headline">
								<span class="word"><?php echo esc_html($atmospheres__description); ?></span>
							</p>
							<?php endif; ?>	
							<?php } 
							if ( is_front_page() or is_home() ) {
							    do_action('atmospheres_buttons_header');
							}
						?>	
					</div>
					<!-- .site-branding -->
				</div>
				<?php } 
			} ?>
				
	</header>
		<?php }									