<?php
/**
 * Header Navigation template.
 *
 * @package Aquila
 */

$menu_class     = \Aquila_Theme\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'aquila-header-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );
?>

 <!-- Header Start -->
 <div class="container-fluid ">
        <div class="row">

            
       
                <nav class="navbar navbar-expand-lg bg-white navbar-light p-0 fixed-top">
                    <a href="" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary mx-5">				    <?php
		            if ( function_exists( 'the_custom_logo' ) ) {
		            	the_custom_logo();
		            }
		            ?></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
					<?php
			if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
				?>
				<ul class="navbar-nav mr-auto">
					<?php
					foreach ( $header_menus as $menu_item ) {
						if ( ! $menu_item->menu_item_parent ) {

							$child_menu_items   = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
							$has_children       = ! empty( $child_menu_items ) && is_array( $child_menu_items );
							$has_sub_menu_class = ! empty( $has_children ) ? 'has-submenu' : '';
							$link_target        = ! empty( $menu_item->target ) && '_blank' === $menu_item->target ? '_blank' : '_self';

							// Note_: Similar to $menu_item->target, there are other keys available in the $menu_item, such as classes. You can more key values if you need.

							if ( ! $has_children ) {
								?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>"
									   target="<?php echo esc_attr( $link_target ); ?>"
									   title="<?php echo esc_attr( $menu_item->title ); ?>">
										<?php echo esc_html( $menu_item->title ); ?>
									</a>
								</li>
								<?php
							} else {
								?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>"
									   id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
									   aria-expanded="false" target="<?php echo esc_attr( $link_target ); ?>"
									   title="<?php echo esc_attr( $menu_item->title ); ?>">>
										<?php echo esc_html( $menu_item->title ); ?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<?php
										foreach ( $child_menu_items as $child_menu_item ) {
											$link_target = ! empty( $child_menu_item->target ) && '_blank' === $child_menu_item->target ? '_blank' : '_self';
											?>
											<a class="dropdown-item"
											   href="<?php echo esc_url( $child_menu_item->url ); ?>"
											   target="<?php echo esc_attr( $link_target ); ?>"
											   title="<?php echo esc_attr( $child_menu_item->title ); ?>">>
												<?php echo esc_html( $child_menu_item->title ); ?>
											</a>
											<?php
										}
										?>
									</div>
								</li>
								<?php
							}
							?>
							<?php
						}
					}
					?>
				</ul>
				<?php
			}
			?>
			<!-- <a href="" class="btn btn-primary mr-3 d-none d-lg-block">Get A Quote</a> -->
			<?php get_search_form(); ?>
		</div>
        </div>
    </div>
    <!-- Header End -->
