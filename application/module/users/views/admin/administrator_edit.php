<div class="content_info" style=" margin: 10px 0 0 10px;">
    <div class="content_pages">
        <div class="form_info">
			<div class="right"><?php echo asset('img', 'application/themes/ictned/images/i_ico.png', 'alt="Info"', FALSE); ?></div>
        </div>
        <div class="clearB"></div>
        <form name="admin_info" method="post">
            <div class="form_field">
                <label><?php echo lang('user_company_name'); ?>*</label>
                <input type="text" class="input" name="company" value="<?php echo $info->company ?>">
            </div>
            <div class="form_field">
                <label><?php echo lang('user_firstname'); ?>*</label>
                <input type="text" class="input" name="first_name" value="<?php echo $info->first_name ?>">
            </div>
            <div class="form_field">
                <label><?php echo lang('user_lastname'); ?>*</label>
                <input type="text" class="input" name="last_name" value="<?php echo $info->last_name ?>">
            </div>
            <div class="radio_option">
                <input type="radio" name="title" value="Dhr" <?php echo ($info->title == 'Dhr') ? 'checked="checked"' : '' ?>><?php echo lang('user_title_mr'); ?>.<input type="radio" name="title" value="Mevr" <?php echo ($info->title == 'Mevr') ? 'checked="checked"' : '' ?>><?php echo lang('user_title_mrs'); ?>.
            </div>
            <div class="submit_btn">
				<div class="right">
					<input type="button" class="button1" rel="admin_info" value="<?php echo lang('save'); ?>">
				</div>
				<div class="clearB"></div>
            </div>
        </form>
        <div class="clearB"></div>
    </div>

    <div class="content_pages">
		<div class="form_info">
			<div class="right"><?php echo asset('img', 'application/themes/ictned/images/i_ico.png', 'alt="Info"', FALSE); ?></div>
		</div>
		<div class="clearB"></div>
		<form name="admin_email" method="post">
			<div class="form_field">
				<label><?php echo lang('user_email_address'); ?>*</label>
				<input type="text" class="input" name="email" value="<?php echo $info->email ?>">
			</div>
			<div class="form_field">
				<label><?php echo lang('user_email_address_repeat'); ?>*</label>
				<input type="text" class="input" name="email_2" value="<?php echo $info->email ?>">
			</div>
			<div class="submit_btn">
				<div class="right">

					<input type="button" class="button1" rel="admin_email" value="<?php echo lang('save'); ?>">
				</div>
				<div class="clearB"></div>
			</div>
		</form>
    </div>

	<div class="content_pages">
		<div class="form_info">
			<div class="right"><?php echo asset('img', 'application/themes/ictned/images/i_ico.png', 'alt="Info"', FALSE); ?></div>
		</div>
		<div class="clearB"></div>
		<form name="admin_password" method="post">
			<div class="form_field">
				<label><?php echo lang('user_password'); ?>*</label>
				<input type="password" class="input" name="password" value="">
			</div>
			<div class="form_field">
				<label><?php echo lang('user_password_new') ?>*</label>
				<input type="password" class="input" name="password_new" id="password_new">
			</div>
			<div class="form_field">
				<label><?php echo lang('user_password_new_repeat'); ?>*</label>
				<input type="password" class="input" name="password_rep" id="password_rep">
			</div>		
			<div class="submit_btn">
				<div class="right">
					<input type="button" class="button1" rel="admin_password" value="<?php echo lang('save'); ?>">
				</div>
				<div class="clearB"></div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	//<!--
	$(document).ready(function(){
		$('input[type="button"]').click(function() {
			var $btn = $(this);
			var $form = $btn.attr('rel');
			var $data = $('form[name="' + $form + '"]').serialize() + '&type=' + $form;
			$.post('<?php echo current_url(); ?>', $data,function(data) {
				
				if (data.status == 'error'){
					$('.show_msg').slideDown();
					$('.show_msg').html(data.message);
					
					$('.show_msg').css('background-color', '#FE2E2E');
				}
				else{
					window.location.href= '<?php echo site_url('admin/users/administrator/edit'); ?>';
				}
			},'json');
		});
		
	});
	//-->
</script>