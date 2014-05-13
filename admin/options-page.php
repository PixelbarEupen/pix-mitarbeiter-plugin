	<?php
	
	/*
		
		THIS FILE GENERATES THE OUTPUT OF THE SETTINGS PAGE.
	
	*/
	
	?>


	<div class="wrap">
		<h2>Pixelbar Mitarbeiter Plugin</h2>
		<h3><div class="dashicons dashicons-admin-site"></div> Grundeinstellungen</h3>
		<form method="post" action="options.php">
			<?php 
				settings_fields( 'pix-mitarbeiter-settings' ); 
				do_settings_sections( 'pix-mitarbeiter-settings' );
			?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">CSS</th>
					<td>
						<input type="checkbox" value="1" <?php if ( get_option('include_css')) echo 'checked="checked"'; ?> name="include_css" />
						<label for="include_css">Soll vorgefertigtes CSS mit reingeholt werden? (Dieses beschränkt sich auf Floatings und Abstandregelung)</label>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>