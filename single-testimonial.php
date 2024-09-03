<h1>This is a testimonial page.</h1>

<?php $associated_tour = get_field( 'associated_tour' ); ?>
<?php if ( $associated_tour ) : ?>
	<?php foreach ( $associated_tour as $post_ids ) : ?>
		<a href="<?php echo get_permalink( $post_ids ); ?>"><?php echo get_the_title( $post_ids ); ?></a>
	<?php endforeach; ?>
<?php endif; ?>