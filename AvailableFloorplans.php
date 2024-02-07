<?php $featured_floorplans = get_field('community_floorplans');
if( $featured_floorplans ): ?>
    <div class="trilister" style="">
    <?php foreach( $featured_floorplans as $floorplan ): 
$status = get_field('status', $floorplan);
            if ($status === true):
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($floorplan); ?>
        <div class="indispec">
			<div class="specheaderimage" style="background-image: url('<?php echo get_field('floorplan_header_image', $floorplan); ?>');">
				<?php if ( $floorplan_promo_callout = get_field( 'floorplan_promo_callout', $floorplan ) ) : ?>
				<div class="promogreen">
				<span><?php echo get_field('floorplan_promo_callout', $floorplan); ?></span>
				</div>
<?php endif; ?>
			</div>
			<h3><?php echo get_field('floorplan_name', $floorplan); ?></h3>
            <span><?php echo get_field('floorplan_square_footage', $floorplan); ?> Sq. Ft. | <?php echo get_field('floorplan_bedrooms', $floorplan); ?> BD, <?php echo get_field('floorplan_bathrooms', $floorplan); ?> BA</span>
			<a href="<?php the_permalink($floorplan); ?>">See More </a>
        </div>
    <?php endif; endforeach; ?>
    </div>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; 
