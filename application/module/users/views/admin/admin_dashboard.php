<div class="main_content_dashboard">
	<?php
	$ctr = 1;
	?>
	
	<?php foreach ($result as $row) : ?>
	
		<?php if ($row->id > 1) : ?>
			<div class="dashboard_icons left">
				<a href="<?php echo site_url('admin/administrator'); ?>">
					<?php echo asset('img', '/application/themes/ictned/images/icon_' . $row->name . '.png', 'alt="' . $row->name . '"', FALSE); ?> </a>
				<div class="clearB"></div>
				<div class="icon_text"><a href="<?php echo site_url('admin/administrator'); ?>"><?php echo lang('cms_menu_' . $row->name); ?></a></div>
			</div>
			<?php if ($ctr % 4 == 0) : ?>
				<div class="clearB"></div>
			<?php endif; ?>
		<?php endif; ?>
		<?php $ctr++; ?>
	<?php endforeach; ?>

	<div class="clearB"></div>
</div>