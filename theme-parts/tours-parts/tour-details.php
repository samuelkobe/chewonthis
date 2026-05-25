<?php
// Get all tour details for the current tour
$tour_details = wp_get_object_terms( $tour_id, 'tour-detail' );

?>
<section id="details_<?php echo $tour_id; ?>" class="scroll-m-20 bg-white">
  <div class="lg:container px-6 py-6 lg:py-12 2xl:py-20 mx-auto relative">
    <!-- <div class="grid lg:grid-cols-[2fr_1fr] [grid-template-areas:'tag''detail''button'] lg:[grid-template-areas:'detail_detail_button''detail_detail_tag'] w-full"> UNCOMMENT with booking-details-column-content.php 1/3 -->
    <div class="grid lg:grid-cols-[2fr_1fr] [grid-template-areas:'detail'] lg:[grid-template-areas:'detail_detail_detail''detail_detail_detail'] w-full"> <!-- Comment this out if you bring back above booking-details-column-content.php 2/3 -->
      <div class="[grid-area:detail/detail] w-full min-h-32 lg:p-12">

        <?php if ( have_rows( 'details' ) ) : ?>
          <?php while ( have_rows( 'details' ) ) : the_row(); ?>
            <div class="mb-6 xl:mb-8">
              <h2 class="uppercase mb-1 xl:mb-2 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased text-<?php echo $tour_theme; ?>"><?php echo get_sub_field( 'heading' ); ?></h2>
              <div class="wysiwyg text-dark xl:text-xl">
                <?php echo get_sub_field( 'content' ); ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <?php // No rows found ?>
        <?php endif; ?>

      </div>
      <?php // Uncomment below to include booking details column content 3/3 ?>
      <?//php require get_template_directory() . "/theme-parts/tours-parts/booking-details-column-content.php"; // Include the booking details column content ?>

    </div>
    
  </div>
</section>