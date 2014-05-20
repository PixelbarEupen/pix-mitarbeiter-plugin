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
				<tr valign="top">
					<th scope="row">Accordeon JS</th>
					<td>
						<input type="checkbox" value="1" <?php if ( get_option('include_accordeon')) echo 'checked="checked"'; ?> name="include_accordeon" />
						<label for="include_accordeon">Soll das Accordeon JS eingefügt werden?</label>
					</td>
				</tr>
				
			</table>
			<?php submit_button(); ?>
		</form>
		<h3><div class="dashicons dashicons-lightbulb"></div> Dokumentation</h3>
		<table class="form-table">
			<tr valign="top">
				<td>
					<p class="description">
						<a  target="_blank" href="https://github.com/PixelbarEupen/pix-mitarbeiter-plugin/blob/master/README.md">Schaue dir die Readme für eine detaillierte Dokumentation an!</a>
					</p>
				</td>
			</tr>
		</table>
	</div>