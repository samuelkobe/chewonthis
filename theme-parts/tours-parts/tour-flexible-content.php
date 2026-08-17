<?php if ( have_rows( 'flexible_experience_information' ) ) : ?>
  <?php while ( have_rows( 'flexible_experience_information' ) ) : the_row(); ?>

    <?php if ( get_row_layout() === 'linked_badge' ) : ?>
      <?php
        $badge_title   = get_sub_field( 'badge_title' );
        $badge_content = get_sub_field( 'badge_content' );
        $badge_image   = get_sub_field( 'badge_image' );
        $badge_url     = get_sub_field( 'badge_url' );
      ?>


      <div class="flex flex-col items-center justify-center my-8 xl:my-12 px-6">

        <?php if ( $badge_image && $badge_url ) :
          $link_url    = esc_url( $badge_url['url'] );
          $link_target = ! empty( $badge_url['target'] ) ? esc_attr( $badge_url['target'] ) : '_blank';
          $link_text   = ! empty( $badge_url['title'] ) ? esc_html( $badge_url['title'] ) : 'Learn more about ' . esc_html( get_the_title() );
        ?>
          <div class="flex flex-col items-center text-center">
            <a href="<?php echo $link_url; ?>" target="_blank" rel="noopener noreferrer" class="inline-block transition-opacity hover:opacity-80">
              <img src="<?php echo esc_url( $badge_image['url'] ); ?>" alt="<?php echo esc_attr( $badge_image['alt'] ); ?>" class="w-auto max-w-48 mb-2 xl:mb-4">
            </a>
          </div>
        <?php endif; ?>

        <?php if ( $badge_title ) : ?>
          <h3 class="uppercase mb-1 xl:mb-2 text-xl xl:text-3xl tracking-wide font-main font-bold antialiased text-center sm:text-left text-<?php echo $tour_theme; ?>"><?php echo esc_html( $badge_title ); ?></h3>
        <?php endif; ?>
        <?php if ( $badge_content ) : ?>
          <p class="text-dark xl:text-xl mb-3 text-center sm:text-left"><?php echo nl2br( esc_html( $badge_content ) ); ?></p>
        <?php endif; ?>

        <?php if ( $badge_image && $badge_url ) :
          $link_url    = esc_url( $badge_url['url'] );
          $link_target = ! empty( $badge_url['target'] ) ? esc_attr( $badge_url['target'] ) : '_blank';
          $link_text   = ! empty( $badge_url['title'] ) ? esc_html( $badge_url['title'] ) : 'Learn more about ' . esc_html( get_the_title() );
        ?>
          <div class="flex flex-col items-center text-center">
            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" rel="noopener noreferrer" class="flex flex-col xl:flex-row items-center justify-center gap-1 mt-0 uppercase text-xs px-24 xl:px-12 xl:text-sm tracking-wide text-<?php echo $tour_theme; ?> font-main font-bold underline underline-offset-2 hover:opacity-70 transition-opacity">
              <?php echo $link_text; ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true" style="display:inline-block;width:18px;height:18px;flex-shrink:0;padding-left:3px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
              </svg>
            </a>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

  <?php endwhile; ?>
<?php endif; ?>