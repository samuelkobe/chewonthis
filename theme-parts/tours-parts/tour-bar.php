<section id="bar_<?php echo $tour_id; ?>" class="scroll-m-20 bg-<?php echo $tour_theme; ?>">
  <div class="container px-6 py-10 lg:py-16 mx-auto lg:px-1/12">
    <h2 class="heading-one w-full mb-1 xl:mb-6 text-white"><?php echo $locations . ": " . $tour_title; ?></h2>
    <span class="font-main italic font-light text-base xl:text-2xl text-white"><?php the_field( 'tour_features' ); ?></span>
  </div>
</section>