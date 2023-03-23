<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); 

$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d');
?>

<main role="main" id="skip_content">

  <?php do_action( 'video_streaming_above_slider' ); ?>

  <?php if( get_theme_mod('video_streaming_slider_hide', false) != '' || get_theme_mod( 'video_streaming_display_slider',false) != ''){ ?>
    <section id="slider" class="pt-5 mw-100">
      <div class="owl-carousel">
        <?php 
        $video_streaming_slider_video_category = get_theme_mod('video_streaming_slider_video_category');
        if($video_streaming_slider_video_category){              
          $page_query = new WP_Query(array( 'category_name' => esc_html( $video_streaming_slider_video_category ,'video-streaming')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="row m-0">
              <div class="col-lg-6 col-md-6 align-self-center text-content px-lg-5">
                <div class="slider-content px-md-5 px-4 py-5">
                  <div class="meta-box">
                    <span class="entry-date me-3"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                    <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></span>
                  </div>
                  <?php if(get_theme_mod('video_streaming_slider_heading',true) != ''){?>
                    <h1><?php the_title(); ?></h1>
                  <?php }?>
                  <?php if(get_theme_mod('video_streaming_slider_text',true) != ''){?>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( video_streaming_string_limit_words( $excerpt, esc_attr(get_theme_mod('video_streaming_slider_excerpt_number','15')))); ?></p>
                  <?php }?>
                  <div class="more-btn mt-3">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html('Read More', 'video-streaming') ?><span class="<?php echo esc_html('Read More', 'video-streaming') ?>"></span></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 px-md-0 pe-0">
                <div class="imagebox">
                  <?php
                    $content = apply_filters( 'the_content', get_the_content() );
                    $video = false;

                    // Only get video from the content if a playlist isn't present.
                    if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                      $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
                    }
                  ?>
                  <?php
                    if ( ! is_single() ) {
                      // If not a single post, highlight the video file.
                      if ( ! empty( $video ) ) {
                        foreach ( $video as $video_html ) {
                          echo '<div class="entry-video">';
                            echo $video_html;
                          echo '</div>';
                        }
                      };
                    }; 
                  ?>
                </div>
              </div>
            </div>
          <?php endwhile; 
          wp_reset_postdata();
        }?>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  
  <?php do_action( 'video_streaming_below_slider' ); ?>

  <?php if( get_theme_mod( 'video_streaming_video_enable') != '') { ?>
    <section id="video-section" class="py-5">
      <div class="container">
        <div class="video-head mb-5">
          <?php if(get_theme_mod('video_streaming_video_section_title') != '') {?>
            <h2><?php echo esc_html(get_theme_mod('video_streaming_video_section_title')); ?></h2>
          <?php }?>
        </div>
        <div class="row">
          <?php 
          $catData=  get_theme_mod('video_streaming_video_category');
          if($catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'video-streaming')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-3 col-md-6">
                <div class="video-box">
                  <?php
                    $content = apply_filters( 'the_content', get_the_content() );
                    $video = false;

                    // Only get video from the content if a playlist isn't present.
                    if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                      $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
                    }
                  ?>
                  <?php
                    if ( ! is_single() ) {
                      // If not a single post, highlight the video file.
                      if ( ! empty( $video ) ) {
                        foreach ( $video as $video_html ) {
                          echo '<div class="entry-video">';
                            echo $video_html;
                          echo '</div>';
                        }
                      };
                    }; 
                  ?>
                  <div class="meta-box">
                    <span class="entry-date me-3"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><i class="fas fa-user me-2"></i><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                    <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><i class="fas fa-calendar-alt me-2"></i><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></span>
                  </div>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          }?>
        </div>
      </div>
    </section>
  <?php } ?> 

  <div class="container front-page-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="new-text"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>