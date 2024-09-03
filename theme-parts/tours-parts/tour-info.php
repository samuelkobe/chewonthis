<?php 
  $inner_wrapper_styles = 'flex flex-row lg:flex-col justify-center items-center text-center w-auto w-full lg:w-40 py-2 sm:px-8 lg:px-0 lg:py-0';
  $icon_styles = 'fill-caramel flex items-center justify-center w-8 h-8 xl:w-12 xl:h-12 overflow-hidden';
  $title_styles = 'hidden lg:block text-dark uppercase font-bold text-base xl:text-xl py-3 !my-3 border-b-2 border-dark';
  $value_styles = 'ml-3 lg:ml-0 text-caramel uppercase font-bold text-sm lg:text-xl';
?>
<section id="info_<?php echo $tour_id; ?>" class="scroll-m-20 bg-bread">
  <div class="container px-6 py-5 lg:py-20 mx-auto">

    <div class="flex flex-row justify-between flex-wrap lg:flex-nowrap lg:px-1/12 xl:px-1/8">

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
        <span class="<?php echo $value_styles; ?>"><?php echo get_field( 'start_time' ); ?></span>
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
        
        <div class="<?php echo $value_styles; ?>"><?php echo get_field( 'tour_type' ); ?></div>
      </div>

      <div class="<?php echo $inner_wrapper_styles; ?>">
        <?php $icon = get_field( 'starting_cost_icon', 'option' ); ?>
        <?php if ( $icon && is_string( $icon ) ) : ?>
          <div class="<?php echo $icon_styles; ?>">
            <?php echo $icon; ?>
          </div>
        <?php endif; ?>
        <span class="<?php echo $title_styles; ?>"><?php echo get_field( 'starting_cost_title', 'option' ); ?></span>
        <span class="<?php echo $value_styles; ?>"><?php echo get_field( 'starting_cost' ); ?></span>
      </div>

    </div>

  </div>
</section>