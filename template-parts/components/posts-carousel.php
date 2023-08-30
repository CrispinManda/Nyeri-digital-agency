<?php
/**
 * Posts Carousel
 *
 * @package aquila
 */

$args = [
	'posts_per_page'         => 5,
	'post_type'              => 'post',
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
];

$post_query = new \WP_Query( $args );
?>
<div class="container-fluid">
        <div class="container pt-5">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>
                    <h1 class="section-title mb-3">Latest Articles From Our Blog Post</h1>
                </div>
                <div class="col-lg-6">
                    <h4 class="font-weight-normal text-muted mb-3">Eirmod kasd duo eos et magna, diam dolore stet sea clita sit ea erat lorem. Ipsum eos ipsum magna lorem stet</h4>
                </div>
            </div>
			

<div class="posts-carousel">
	<?php
	if ( $post_query->have_posts() ) :
		while ( $post_query->have_posts() ) :
			$post_query->the_post();
			?>
			<div class="card" style="height: 700px; "> <!-- Set the desired fixed height -->
				<?php
				if ( has_post_thumbnail() ) {
					the_post_custom_thumbnail(
						get_the_ID(),
						'featured-thumbnail',
						[
							'class' => 'w-100 card-image', // Add the card-image class
                            'style' => 'height: 200px; object-fit: cover;' // Inline styles for height and aspect ratio

						]
					);
				} else {
					?>
					<img src="https://via.placeholder.com/510x340" class="w-100" alt="Card image cap">
					<?php
				}
				?>
				<div class="card-body">
					<?php the_title( '<h5 class="card-title">', '</h5>' ); ?>
					<?php aquila_the_excerpt(); ?>
					<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-primary">
						<?php esc_html_e( 'View More', 'aquila' ); ?>
					</a>
				</div>
			</div>
		<?php
		endwhile;
	endif;
	wp_reset_postdata();
	?>
	
</div>
</div>
