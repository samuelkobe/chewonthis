<?php
  /**
   * The template for displaying all testimonials associated with a specific tour.
   */
  get_header();
  $tour_id = get_the_ID(); // Get the current tour ID. It is set here and used throughout all the templates.
  $tour_theme = get_field( 'tour_theme' ); // Get the tour theme. Options: lg:grid-cols-[1fr] lg:grid-cols-[1fr_1fr] lg:grid-cols-[1fr_1fr_1fr] lg:grid-cols-[1fr_1fr_1fr_1fr] bg-paprika bg-forest bg-honey bg-caramel text-paprika text-forest text-honey text-caramel border-paprika border-forest border-honey border-caramel hover:!bg-paprika hover:!bg-forest hover:!bg-honey hover:!bg-caramel
  $tour_title = get_field( 'title' ); // Get the tour title.
  $tour_features = get_field( 'features' ); // Get the tour features.
  $location_terms = get_the_terms( get_the_ID(), 'location' );  // Get the location terms.
  // Check if there are any location terms
  if ( ! empty( $location_terms ) ) {
    // Display the location terms
    $location_names = array();
    foreach ( $location_terms as $term ) {
        $location_names[] = $term->name;
    }
    $locations = implode(', ', $location_names);
  }
?>

<?php require get_template_directory() . "/theme-parts/tours-parts/tour-hero.php"; // Include the Hero template. ?>

<?php require get_template_directory() . "/theme-parts/tours-parts/tour-info.php"; // Include the Information template. ?>

<?//php require get_template_directory() . "/theme-parts/tours-parts/tour-bar.php"; // Include the Bar template. ?>

<?php require get_template_directory() . "/theme-parts/tours-parts/tour-details.php"; // Include the Details template. ?>

<?php require get_template_directory() . "/theme-parts/tours-parts/tour-booking.php"; // Include the Booking template. ?>

<?php if ( get_field( 'testimonials_toggle' ) == 1 ) : // Check if the testimonials toggle is enabled.
  require get_template_directory() . "/theme-parts/tours-parts/tour-testimonials.php"; // Include the testimonials template.
endif; ?>

<?php require get_template_directory() . "/theme-parts/tours-parts/tour-request.php"; // Include the Request form template. ?>

<?php if ( get_field( 'gallery_toggle' ) == 1 ) : // Check if the gallery toggle is enabled.
  require get_template_directory() . "/theme-parts/tours-parts/tour-gallery.php"; // Include the gallery template.
endif; ?>

<?php if ( get_field( 'faqs_toggle' ) == 1 ) : // Check if the FAQs toggle is enabled.
  require get_template_directory() . "/theme-parts/tours-parts/tour-faq.php"; // Include the FAQs template.
endif; ?>

<?php if ( get_field( 'vendors_toggle' ) == 1 ) : // Check if the vendors toggle is enabled.
  require get_template_directory() . "/theme-parts/tours-parts/tour-vendors.php"; // Include the vendors template.
endif; ?>

<?php require get_template_directory() . "/theme-parts/tours-parts/tour-groups.php"; // Include the groups template. ?>

<?php get_footer(); ?>
