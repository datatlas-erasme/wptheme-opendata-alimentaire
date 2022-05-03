<?php get_template_part( 'templates/partials/document-open' ); ?>

<header>
		<p class="avertissement-message">Ce site est diffusé dans le cadre d’une expérimentation.</p>
			
		<div class="navbar-custom ">
			<!-- Brand bar -->
				<?php
					$custom_logo_id = get_theme_mod( 'custom_logo');
					$logo = wp_get_attachment_image_src( $custom_logo_id );
				
					if ( has_custom_logo() ) :
						echo '
							<div class="nav-brand">
								<a href="' . home_url() .'">
									<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">
									<img src="'.get_theme_mod('mangerlocal_second_logo').'" alt="' . get_bloginfo( 'name' ) . '" class="project-brand">
									
								</a>
								<span>BÊTA</span>
							</div>';
					else :
						echo '<a class="nav-brand" href="' . home_url() .'"><h1>' . get_bloginfo('name') . '</h1></a>';
					endif; 
				?>
			<div>
				<?php wp_nav_menu( 
					array( 
						'theme_location' => 'primary',
						'menu' => 'main-menu',
						'container'       => 'nav',
						'menu_class' => '',
						'menu_id' => 'menu-contact' ) ); 
				?>
			</div>

			<div id="mobileButton" class="mobile-nav-button">
                    <div class="mobile-nav-button__line"></div>
                    <div class="mobile-nav-button__line"></div>
                    <div class="mobile-nav-button__line"></div>
                </div>
			
			<div id="burger" class="toggle-nav">

				<div class="mobile-block" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/fond-mobile.png' ">
					<div>
						<?php
						$completeName = get_bloginfo('name');
						$nameParts = explode(" ", $completeName);
						echo "<h1> ".$nameParts[0] . " ". $nameParts[1]. "<br> <span>" .$nameParts[3]. " " .$nameParts[4]. " " .$nameParts[5]. " " .$nameParts[6]. "</span> </h1>
						<p> ". get_bloginfo('description') . "</p>"
						?>
					</div>
				</div>

				<?php wp_nav_menu(
					array(
						'theme_location' => 'mobile',
						'container'       => 'nav', 
						'menu_class' => 'nav-mobile',
						) ); 
						
						?>
				
				<div class="mobile-footer">

					<?php wp_nav_menu(array(
									'theme_location' => 'secondary',
									'menu' => 'footer-menu',
									'menu_class' => '',
									'menu_id' => 'menu-footer')); 
					?>

					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/main-poireau-line.png" alt="Main poireau" class="lg:hidden" />

					<?php
						$custom_logo_id = get_theme_mod( 'custom_logo');
						$logo = wp_get_attachment_image_src( $custom_logo_id );
						
						if ( has_custom_logo() ) {
							echo '
								<div class="mobile-brand">
									<a class="footer-brand" href="' . home_url() .'">
										<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">
									</a>
									<a class="footer-brand" href="' . home_url() .'">
										<img src="'.get_theme_mod('mangerlocal_footer_logo').'" alt="' . get_bloginfo( 'name' ) . '">
									</a>
								</div>';
						} else {
							echo '<a class="nav-brand" href="' . home_url() .'"><h1>' . get_bloginfo('name') . '</h1></a>';
						}
					?>
						<p>Ce site est diffusé dans le cadre d’une expérimentation avec <br> Bellebouffe, la Métropole de Lyon et ERASME.</p>
						<p>Un site de la Métropole de Lyon</p>
				</div>

			</div>	
		</div>
</header>
		

