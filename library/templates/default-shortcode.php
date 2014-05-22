
	<?php if($accordeon == 'false'): ?>
		<div class="alle-mitarbeiter no-accordeon">
	<?php else: ?>
		<div class="alle-mitarbeiter">';
	<?php endif; ?>
	
	<?php if(isset($title)): ?>
		<h3><?php echo $title; ?></h3>
	<?php endif; ?>
	
			<div class="accordeon-wrapper">
			<?php while($mitarbeiter->have_posts()) : $mitarbeiter->the_post(); ?>
			
				<?php $pos = wp_get_post_terms(get_the_ID(),'Position'); ?>
			
				<?php $apu = ($accordeon_per_user == 'true') ? 'accorderon-per-user' : ''; ?>
				<?php $trigger = ($show_on == 'hover') ? 'hover' : 'click'; ?>
			
				<div class="mitarbeiter mitarbeiter-<?php the_ID(); ?> position-<?php echo $pos[0]->slug.' '.$apu; ?>" data-trigger="<?php echo $trigger; ?>">
					
					<?php if(get_field('pix_mitarbeiter_bild')): ?>
						<div class="image">
							<?php $large_img = wp_get_attachment_image_src(get_field('pix_mitarbeiter_bild'),'large'); ?>
							<?php $medium_img = wp_get_attachment_image_src(get_field('pix_mitarbeiter_bild'),'medium'); ?>
							
							<a href="<?php echo $large_img[0]; ?>" title="<?php the_title(); ?>">
								<img src="<?php echo $medium_img[0]; ?>" alt="<?php the_title(); ?>" / >
							</a>
						</div>
					<?php endif; ?>
					
					<h4><?php the_title(); ?></h4>
					
					
					<div class="user-content">
						<?php if(get_field('pix_mitarbeiter_funktion')): ?>
							<span class="funktion"><?php the_field('pix_mitarbeiter_funktion'); ?></span>
							<?php endif; ?>
						
						<?php if(get_field('pix_mitarbeiter_sonstiges')): ?>
							<p class="sonstiges"><?php the_field('pix_mitarbeiter_sonstiges'); ?></p>
						<?php endif; ?>
					
						<?php if(get_field('pix_mitarbeiter_email')): ?>
							<a class="mail" href="mailto:<?php echo encode_email_address(get_field('pix_mitarbeiter_email')); ?>" title="<?php the_title(); ?> <?php _e('eine Nachricht schreiben','Pix Mitarbeiter'); ?>">
								<?php echo encode_email_address(get_field('pix_mitarbeiter_email')); ?>
							</a>
						<?php endif; ?>
						
						<?php if(get_field('pix_mitarbeiter_url')): ?>
							<?php $url = str_replace('http://','', get_field('pix_mitarbeiter_url')); ?>
							<?php $url = 'http://'.$url; ?>
							
							<a target="_blank" href="<?php echo $url; ?>" title="<?php the_field('pix_mitarbeiter_url'); ?>">
								<?php the_field('pix_mitarbeiter_url'); ?>
							</a>
						<?php endif; ?>
						
						<?php if(get_field('pix_mitarbeiter_number')): ?>
							<p class="phone"><?php the_field('pix_mitarbeiter_number'); ?></p>
						<?php endif; ?>
						
					</div>
					<div class="clear"></div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>

