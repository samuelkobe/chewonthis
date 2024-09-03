<?php
// Query for testimonials associated with the tour
  $args = array(
      'post_type' => 'testimonial',
      'posts_per_page' => -1,
      'meta_query' => array(
          'relation' => 'AND',
          array(
              'key' => 'associated_tour',
              'value' => $tour_id,
              'compare' => 'LIKE'
          )
      )
  );

  $testimonials_query = new WP_Query( $args );?>

<style>
    <?php echo '#testimonials_' . $tour_id; ?> {
    .swiper-pagination-bullet {
      background-color: #FFF;
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

<section id="testimonials_<?php echo $tour_id; ?>" class="scroll-m-20 bg-caramel">

  <div class="py-12 xl:py-24">

    <h2 class="heading-one text-center w-full mb-4 xl:mb-6 text-white">Testimonials</h2>
    <div class="swiper swiper-<?php echo 'testimonials_' .$tour_id; ?> h-full editor-disable !pt-8 xl:!pt-16 !pb-16 xl:!pb-24 mb-8 xl:mb-16 relative">

      <?php
        if ( $testimonials_query->have_posts() ) : ?>
          <div class="swiper-wrapper w-full h-full">
          <?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
          <div class="swiper-slide !flex flex-col items-center justify-center h-full w-full relative px-6">

            <?php
              $rating = get_field('rating');
              // Generate the SVG star shapes
              $stars = '';
              for ($i = 1; $i <= $rating; $i++) {
                  $stars .= '<svg class="w-4 fill-white" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.322 2.923c.126-.259.39-.423.678-.423.289 0 .552.164.678.423.974 1.998 2.65 5.44 2.65 5.44s3.811.524 6.022.829c.403.055.65.396.65.747 0 .19-.072.383-.231.536-1.61 1.538-4.382 4.191-4.382 4.191s.677 3.767 1.069 5.952c.083.462-.275.882-.742.882-.122 0-.244-.029-.355-.089-1.968-1.048-5.359-2.851-5.359-2.851s-3.391 1.803-5.359 2.851c-.111.06-.234.089-.356.089-.465 0-.825-.421-.741-.882.393-2.185 1.07-5.952 1.07-5.952s-2.773-2.653-4.382-4.191c-.16-.153-.232-.346-.232-.535 0-.352.249-.694.651-.748 2.211-.305 6.021-.829 6.021-.829s1.677-3.442 2.65-5.44z" fill-rule="nonzero"/></svg>';
              }
            ?>
            <div class="flex flex-row items-center justify-between mb-4">
              <?php echo $stars; ?>
            </div>

            <?php $testimonial_text = wp_trim_words( get_field( 'testimonial' ), 24, '...' ); ?>
            <div class="flex flex-col text-white items-center justify-center text-center">
              <p class="font-main font-normal text-base"><?php echo $testimonial_text; ?></p>
              <span class="mt-2">- <?php echo get_field( 'author' ); ?></span>
            </div>

          </div>
          <?php endwhile; ?>
          </div>
        <?php else :
            echo 'No testimonials found for this tour';
        endif;

        wp_reset_postdata();
      ?>

      <div class="absolute bottom-0 left-0 right-0 w-auto mx-auto">
        <div class="swiper-pagination"></div>
      </div>
    </div>

    <?php $button_testimonials = get_field( 'button_testimonials' ); ?>
    <?php if ( $button_testimonials ) : ?>
      <div class="bg-clip-text w-full flex justify-center">
        <a class="btn alt-tour-<?php echo $tour_theme; ?>" href="<?php echo esc_url( $button_testimonials['url'] ); ?>" target="<?php echo esc_attr( $button_testimonials['target'] ); ?>">
          <?php echo esc_html( $button_testimonials['title'] ); ?>
        </a>
      </div>
    <?php endif; ?>

  </div>
  
</section>

<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper-<?php echo 'testimonials_' . $tour_id; ?>', {
  // Optional parameters
  loop: true,
  initialSlide: 2,
  slidesPerView: 1,
  centeredSlides: true,
  spaceBetween: 64,
  autoplay: {
    delay: 4000,
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
    },
    1920: {
      slidesPerView: 6,
    },
  }
});
</script>