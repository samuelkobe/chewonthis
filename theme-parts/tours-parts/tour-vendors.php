<?php
// Query for vendors associated with the tour
  $args = array(
      'post_type' => 'vendor',
      'posts_per_page' => -1,
      'meta_query' => array(
          'relation' => 'AND',
          array(
              'key' => 'associated_tour_vendor',
              'value' => $tour_id,
              'compare' => 'LIKE'
          )
      )
  );

  $vendors_query = new WP_Query( $args );?>

<style>
    <?php echo '#vendors_' . $tour_id; ?> {
    .swiper-pagination-bullet {
      background-color: #BF4427;
      width: 24px;
      height: 24px;
      opacity: 0;
    }
    .swiper-pagination-bullet-active {
      width: 28px;
      height: 28px;
      opacity: 1;
    }
    .swiper-pagination-bullet-active-prev,
    .swiper-pagination-bullet-active-next {
      opacity: 0.7;
    }
    .swiper-pagination-bullet-active-prev-prev,
    .swiper-pagination-bullet-active-next-next {
      opacity: 0;
    }
  }
</style>

<section id="vendors_<?php echo $tour_id; ?>" class="scroll-m-20 bg-white">

  <div class="py-12 xl:py-24">

    <h2 class="heading-one text-center w-full mb-4 xl:mb-6 text-paprika">Vendors</h2>
    <div class="swiper swiper-<?php echo 'vendors_' .$tour_id; ?> h-full editor-disable !pt-8 xl:!pt-16 !pb-16 xl:!pb-24 relative">

      <?php
        if ( $vendors_query->have_posts() ) : ?>
          <div class="swiper-wrapper w-full h-full">
          <?php while ( $vendors_query->have_posts() ) : $vendors_query->the_post(); ?>
          <div class="swiper-slide !flex flex-col items-center justify-center h-full w-full relative px-6">

            <div class="flex flex-col text-paprika items-start justify-center text-left">
              <h2 class="mb-2 xl:mb-4 font-main font-bold text-lg xl:text-xl uppercase tracking-wide"><?php the_title(); ?>:</h2>
              <p class="font-main text-base font-semibold"><?php echo get_field( 'description' ); ?></p>
            </div>

          </div>
          <?php endwhile; ?>
          </div>
        <?php else :
            echo 'No vendors found for this tour';
        endif;

        wp_reset_postdata();
      ?>

      <div class="absolute bottom-0 left-0 right-0 w-auto mx-auto">
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </div>
  
</section>

<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper-<?php echo 'vendors_' . $tour_id; ?>', {
  // Optional parameters
  loop: true,
  initialSlide: 2,
  slidesPerView: 1,
  centeredSlides: true,
  spaceBetween: 16,
  autoplay: {
    reverseDirection: true,
    delay: 8000,
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
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1280: {
      slidesPerView: 4,
      spaceBetween: 64,
    },
    1920: {
      slidesPerView: 4,
      spaceBetween: 128,
    }
  }
});
</script>