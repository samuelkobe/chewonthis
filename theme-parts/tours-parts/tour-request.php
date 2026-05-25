<?php if ( have_rows( 'various_bookings_options' ) ): ?>
  <?php while ( have_rows( 'various_bookings_options' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'by_request' ) : ?>

      <?php
      // Get all tour details for the current tour
      $tour_details = wp_get_object_terms( $tour_id, 'tour-detail' );
      ?>

      <?php $request_form = get_sub_field( 'request_form' ); ?>
      <?php if ( $request_form != '' ) : ?>
      <?php $exp_title = get_the_title(); ?>

        <section id="request_form" class="scroll-m-20 lg:scroll-m-[156px] bg-white">
          <div class="container px-6 py-12 xl:py-28 mx-auto font-semibold font-main">

            <div class="grid grid-cols-12">
              <div class="col-span-12 lg:col-span-4">
                <h1 class="uppercase font-sans font-semibold tracking-widest text-2xl xl:text-[35px] xl:leading-normal w-full mb-4 xl:mb-6 text-paprika" data-exp-title="<?php echo $exp_title; ?>"><?php echo the_sub_field( 'request_form_heading'); ?> for <?php echo $exp_title; ?></h1>
                <p class="w-full font-main font-normal text-sm xl:text-lg xl:leading-[2.5rem] text-dark"><?php echo the_sub_field( 'request_instructions'); ?></p>
                <div class="mt-12 md:mt-16">
                  <p>Questions? Email us at:</p>
                  <a class="hover:text-paprika hover:border-paprika-vivid transition-colors duration-300 border-b-2 md:!border-none md:border-b-transparent border-b-dark w-fit" href="mailto:<?php echo get_field( 'email', 'option' ); ?>" target="_blank"><?php the_field( 'email', 'option' ); ?></a>
                </div>
              </div>
              <div class="col-span-12 lg:col-span-8">
                <?php the_sub_field( 'request_form' ); ?>
              </div>
            </div>

          </div>
        </section>

        <style>
          input[readonly] {
            opacity: 0.5;
            cursor: not-allowed; /* Optional: change cursor to indicate non-interactive */
            border-color: #d1d5db !important; /* Prevent border on focus */
          }
          input[readonly]::selection {
            color: #1D1E24 !important; /* Prevent text selection highlight */
            background-color: transparent; /* Prevent selection highlight */
          }
        </style>

        <script type="module">
          document.addEventListener('DOMContentLoaded', function () {

            // This script will run after the DOM is fully loaded.
            // It will set the value of the input field with name "exp-title" to the
            const h1 = document.querySelector('h1[data-exp-title]');
            const input = document.querySelector('input[name="exp-title"]');

            if (h1 && input) {
              const expTitle = h1.getAttribute('data-exp-title');
              if (expTitle) {
                input.value = expTitle;
              }
            }
            // Smooth scroll for anchor links
            // This will ensure that clicking on anchor links scrolls smoothly to the target section.
            document.querySelectorAll('a.anchor-link').forEach(function (anchor) {
              anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');

                if (href && href.startsWith('#')) {
                  const target = document.querySelector(href);
                  if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                  }
                }
              });
            });
          });
        </script>

      <?php endif; ?>    

    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>
