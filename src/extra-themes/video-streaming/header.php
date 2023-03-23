<?php
/**
 * The Header for our theme.
 * @package Video Streaming
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('video_streaming_preloader',false) != '' || get_theme_mod( 'video_streaming_display_preloader',false) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner" class="header-box">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'video-streaming' ); ?></a>
    
    <div id="header">
      <div class="topbar text-md-start text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-md-6 align-self-center">
              <?php if( get_theme_mod('video_streaming_topbar_text') != '' ) {?>
                <p class="topbar-text"><?php echo esc_html(get_theme_mod('video_streaming_topbar_text')); ?></p>
              <?php }?>
            </div>
            <div class="col-lg-5 col-md-6 align-self-center text-md-end text-center">
              <div class="social-icon">
                <?php if(get_theme_mod('video_streaming_facebook_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('video_streaming_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'video-streaming'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('video_streaming_twitter_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('video_streaming_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'video-streaming'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('video_streaming_instagram_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('video_streaming_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'video-streaming'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('video_streaming_linkedin_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('video_streaming_linkedin_url')); ?>"><i class="fab fa-linkedin"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'video-streaming'); ?></span></a>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-header">
        <div class="container">
          <div class="menu-section">
            <div class="row">
              <div class="col-lg-3 col-md-4 align-self-center">
                <div class="logo align-self-center text-md-start text-center">
                  <div class="row">
                    <div class="<?php if( get_theme_mod( 'video_streaming_site_logo_inline') != '') { ?>col-lg-5 col-md-5 col-5<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                      <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="<?php if( get_theme_mod( 'video_streaming_site_logo_inline') != '') { ?>col-lg-7 col-md-7 col-7 site-logo-inline"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                      <?php $blog_info = get_bloginfo( 'name' ); ?>
                      <?php if ( ! empty( $blog_info ) ) : ?>
                        <?php if( get_theme_mod('video_streaming_site_title_enable',true) != ''){ ?>
                          <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                          <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                          <?php endif; ?>
                        <?php }?>
                      <?php endif; ?>
                      <?php
                      $description = get_bloginfo( 'description', 'display' );
                      if ( $description || is_customize_preview() ) : ?>
                        <?php if( get_theme_mod('video_streaming_site_tagline_enable',true) != ''){ ?>
                          <p class="site-description"><?php echo esc_html($description); ?></p>
                        <?php }?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-4 col-6 align-self-center">
                <?php
                if(has_nav_menu('primary')){ ?>
                  <div class="toggle-menu responsive-menu">
                    <button role="tab" onclick="video_streaming_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('video_streaming_responsive_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','video-streaming'); ?></span>
                    </button>
                  </div>
                <?php }?>
                <div id="navbar-header text-center" class="menu-brand primary-nav">
                  <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'video-streaming' ); ?>">
                    <?php
                      if(has_nav_menu('primary')){
                        wp_nav_menu( array( 
                          'theme_location' => 'primary',
                          'container_class' => 'main-menu-navigation clearfix' ,
                          'menu_class' => 'clearfix',
                          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0 text-start">%3$s</ul>',
                          'fallback_cb' => 'wp_page_menu',
                        ) );
                      } 
                    ?>
                  </nav>
                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="video_streaming_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('video_streaming_responsive_menu_close_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','video-streaming'); ?></span></a>
                </div>
              </div>
              <div class="col-lg-1 col-md-1 col-6 align-self-center text-md-center">
                <div class="main-search">
                  <span><a href="#"><i class="fas fa-search"></i></a></span>
                </div>
              </div>
              <div class="searchform_page w-100 h-100">
                <div class="close w-100 text-end me-4"><a href="#maincontent"><i class="fa fa-times"></i></a></div>
                <div class="search_input">
                  <?php get_search_form(); ?>
                </div>
              </div>
              <div class="col-lg-2 col-md-3 align-self-center text-md-end text-center">
                <?php if(get_theme_mod('video_streaming_header_button_text') != '' || get_theme_mod('video_streaming_header_button_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('video_streaming_header_button_url')); ?>" class="video-btn"><?php echo esc_html(get_theme_mod('video_streaming_header_button_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('video_streaming_header_button_text')); ?></span></a>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>