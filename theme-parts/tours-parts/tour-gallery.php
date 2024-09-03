<?php $tour_gallery_images = get_field( 'tour_gallery' ); ?>

<style>
    <?php echo '#gallery_' . $tour_id; ?> {
    .swiper-pagination-bullet {
      background-color: #FFF;
      width: 24px;
      height: 24px;
      opacity: 0.7;
    }
    .swiper-pagination-bullet-active {
      opacity: 1;
    }
  }
</style>

<section id="gallery_<?php echo $tour_id; ?>" class="scroll-m-20 bg-black">

    <div class="swiper swiper-<?php echo 'gallery_' .$tour_id; ?> relative">

       <?php if ( $tour_gallery_images ) : ?>
          <div class="swiper-wrapper w-full h-full">
          	<?php foreach ( $tour_gallery_images as $tour_gallery_image ): ?>
              <div class="swiper-slide !flex items-center justify-center !h-[35dvh] lg:!h-[80dvh] min-h-24 lg:min-h-[600px] w-full relative">
                <div class="bg-[#000] absolute inset-0 z-1 opacity-25"></div>
                <img class="object-cover w-full h-full aspect-video" src="<?php echo esc_url( $tour_gallery_image['url'] ); ?>" alt="<?php echo esc_attr( $tour_gallery_image['alt'] ); ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        <?php else :
            echo 'No gallery found for this tour';
        endif; ?>

      <div class="absolute bottom-12 left-0 right-0 w-auto mx-auto">
        <div class="swiper-pagination"></div>
      </div>

      <?php if ( get_field( 'booking_type_toggle' ) == 1 ) : ?>

        <?php $button_gallery = get_field( 'digitally_guided_url' ); ?>
        <?php if ( $button_gallery != '' ) : ?>
          <div class="bg-clip-text w-full flex justify-center items-center absolute left-0 right-0 bottom-32 z-10 pointer-events-none">
            <a class="btn alt-tour-<?php echo $tour_theme; ?> h-fit cursor-pointer pointer-events-auto" href="<?php echo $button_gallery; ?>" target="_blank">
              Book Now
            </a>
          </div>
        <?php endif; ?>

      <?php else: ?>

        <?php if ( have_rows( 'various_bookings_options' ) ): ?>
          <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'digitally_guided' ) : ?>
              <?php $button_gallery = get_sub_field( 'digitally_guided_url' ); ?>
              <?php if ( $button_gallery != '' ) : ?>
                <div class="bg-clip-text w-full flex justify-center items-center absolute left-0 right-0 bottom-32 z-10 pointer-events-none">
                  <a class="btn alt-tour-<?php echo $tour_theme; ?> h-fit cursor-pointer pointer-events-auto" href="<?php echo $button_gallery; ?>" target="_blank">
                    Book Now
                  </a>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
        
      <?php endif; ?>

    </div>
  
</section>

<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper-<?php echo 'gallery_' . $tour_id; ?>', {
  // Optional parameters
  loop: true,
  slidesPerView: 1,
  centeredSlides: true,
  autoplay: {
    delay: 5000,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    dynamicBullets: true,
    dynamicMainBullets: 1,
    clickable: true
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 1,
    },
    1280: {
      slidesPerView: 1,
    },
    1920: {
      slidesPerView: 1,
    },
  }
});
</script>