<?php 
  $inner_wrapper_styles = 'flex flex-row lg:flex-col justify-center items-center text-center w-full lg:col-span-1 py-2 md:px-0 lg:px-8 lg:px-0 lg:py-0';
  $icon_styles = 'fill-caramel flex items-center justify-center w-8 h-8 xl:w-12 xl:h-12 overflow-hidden';
  $title_styles = 'hidden lg:block text-dark uppercase font-bold text-base xl:text-xl py-3 !my-3 border-b-2 border-dark';
  $value_styles = 'ml-3 lg:ml-0 text-caramel uppercase font-bold text-sm lg:text-base';
?>
<section id="info_<?php echo $tour_id; ?>" class="scroll-m-20 bg-bread">
  <div class="container px-6 py-5 lg:py-20 mx-auto">

    <div class="flex flex-row max-md:justify-between max-md:flex-wrap lg:grid lg:grid-cols-5 lg:grid-rows-1 lg:gap-3 lg:mx-auto lg:px-1/12 xl:px-1/8">

      <div class="<?php echo $inner_wrapper_styles; ?>">
        <?php $icon = get_field( 'duration_icon', 'option' ); ?>
        <?php if ( $icon && is_string( $icon ) ) : ?>
          <div class="<?php echo $icon_styles; ?>">
            <?php echo $icon; ?>
          </div>
        <?php endif; ?>
        <span class="<?php echo $title_styles; ?>"><?php echo get_field( 'duration_title', 'option' ); ?></span>
        <span class="<?php echo $value_styles; ?>"><?php echo get_field( 'duration' ); ?></span>
      </div>

      <div class="<?php echo $inner_wrapper_styles; ?>">
        <?php $icon = get_field( 'start_time_icon', 'option' ); ?>
        <?php if ( $icon && is_string( $icon ) ) : ?>
          <div class="<?php echo $icon_styles; ?>">
            <?php echo $icon; ?>
          </div>
        <?php endif; ?>
        <span class="<?php echo $title_styles; ?>"><?php echo get_field( 'start_time_title', 'option' ); ?></span>
        	<?php if ( get_field( 'flexible_time_toggle' ) ) : ?>
		  <span class="<?php echo $value_styles; ?>"><?php echo get_field( 'flexible_time_label'); ?></span>
			<?php else: ?>
        		<span class="<?php echo $value_styles; ?>"><?php echo get_field( 'start_time' ); ?></span>
			<?php endif; ?>
      </div>

      <div class="<?php echo $inner_wrapper_styles; ?>">
        <?php $icon = get_field( 'dates_icon', 'option' ); ?>
        <?php if ( $icon && is_string( $icon ) ) : ?>
          <div class="<?php echo $icon_styles; ?>">
            <?php echo $icon; ?>
          </div>
        <?php endif; ?>
        <span class="<?php echo $title_styles; ?>"><?php echo get_field( 'dates_title', 'option' ); ?></span>
        <span class="<?php echo $value_styles; ?>"><?php echo get_field( 'dates' ); ?></span>
      </div>

      <div class="<?php echo $inner_wrapper_styles; ?>">
        <?php $icon = get_field( 'tour_type_icon', 'option' ); ?>
        <?php if ( $icon && is_string( $icon ) ) : ?>
          <div class="<?php echo $icon_styles; ?>">
            <?php echo $icon; ?>
          </div>
        <?php endif; ?>
        <span class="<?php echo $title_styles; ?>"><?php echo get_field( 'tour_type_title', 'option' ); ?></span>
        
        <div class="<?php echo $value_styles; ?>">
        <?php $tour_type_checked_options = get_field( 'tour_type' ); ?>
        <?php if ( $tour_type_checked_options ): ?>
          <?php foreach ( $tour_type_checked_options as $tour_type_checked_option ): ?>
            <ul>
              <li><?php echo esc_html( $tour_type_checked_option['label'] ); ?></li>
            </ul>
            <?//php echo esc_html( $tour_type_checked_option['value'] ); ?>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>
      </div>

      <div class="<?php echo $inner_wrapper_styles; ?>">
        <?php $icon = get_field( 'starting_cost_icon', 'option' ); ?>
        <?php if ( $icon && is_string( $icon ) ) : ?>
          <div class="<?php echo $icon_styles; ?>">
            <?php echo $icon; ?>
          </div>
        <?php endif; ?>
        <span class="<?php echo $title_styles; ?>"><?php echo get_field( 'starting_cost_title', 'option' ); ?></span>
        <?php if ( get_field( 'cost_type_toggle' ) == 1 ) : ?>
            <span class="<?php echo $value_styles; ?>">$<?php echo get_field( 'starting_cost' ); ?></span>
          <?php else : ?>
            <span class="<?php echo $value_styles; ?>"><?php echo get_field( 'starting_cost_text' ); ?></span>
        <?php endif; ?>

      </div>

    </div>

  </div>
</section>