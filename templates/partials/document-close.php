        <footer>
            <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>

            <?php
				$custom_logo_id = get_theme_mod( 'custom_logo');
				$logo = wp_get_attachment_image_src( $custom_logo_id );
				 
				if ( has_custom_logo() ) {
					echo '
						<div>
							<a class="footer-brand" href="' . home_url() .'">
								<img src="'.get_theme_mod('mangerlocal_footer_logo').'" alt="' . get_bloginfo( 'name' ) . '">
							</a>
							<a class="nav-brand" href="' . home_url() .'">
								<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">
							</a>
						</div>';
				} else {
					echo '<a class="nav-brand" href="' . home_url() .'"><h1>' . get_bloginfo('name') . '</h1></a>';
				}
			?>
        </footer>
		<div class="post-footer">
			<div>
				<p>Ce site est diffusé dans le cadre d’une expérimentation avec Bellebouffe, la Métropole de Lyon et ERASME.</p>
                <a href="http://www.grandlyon.com" title="Accéder au site de la Métropole de Lyon" target="_blank"><p>Un site de la Métropole de Lyon</p></a>
			</div>
        </div>
        <?php wp_footer() ?>
    </body>
</html>