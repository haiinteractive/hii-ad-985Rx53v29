<?php echo form_open('', array('id' => 'create_administrator_form', 'name' => 'create_administrator_form')); ?>
<input type="hidden" value="0" id="updete_administrator_by_id" name="administator_id"/>
<div class="content_pages">
	<div class="head_row head_top"><?php echo lang('user_manage_admin_create_administrators'); ?></div>
    <div class="content_info">

        <div class="information_box">
            <div class="page_info_icon left"><?php echo asset('img', 'application/themes/ictned/images/i_ico.png', 'alt="Info"', FALSE); ?></div>
            <div class="info_content left"><?php echo lang('user_admin_info_create_administrator'); ?></div>
            <div class="clearB"></div>
        </div>

        <h2><?php echo lang('gen_info'); ?></h2>
        <div class="page_form_fields">
            <div class="label"></div>
            <div class="clearB"></div>
           	<input type="radio" name="dhrmevr_beheerders" value="<?php echo lang('mr'); ?>" checked="checked" /> <?php echo lang('mr'); ?> <input type="radio" name="dhrmevr_beheerders" value="<?php echo lang('mrs'); ?>" /> <?php echo lang('mrs'); ?> <br />
        </div>
        <div class="clearB"></div>
        <div class="page_form_fields">
            <div class="label"><?php echo lang('first_name'); ?> *</div>
            <div class="clearB"></div>
            <input type="text" name="voornaam_beheerders" id="voornaam_beheerders" class="text_field" value="" title="<?php echo lang('first_name'); ?>" />
        </div>
        <div class="page_form_fields">
            <div class="label"><?php echo lang('last_name'); ?> *</div>
            <div class="clearB"></div>
            <input type="text" name="achternam_beheerders" id="achternam_beheerders" class="text_field" value="" title="<?php echo lang('last_name'); ?>" />
        </div>
        <div class="clearB"></div>
        <div class="page_form_fields">
            <div class="label"><?php echo lang('email_address'); ?> *</div>
            <div class="clearB"></div>
            <input type="text" name="email_beheerders" id="email_beheerders" class="text_field" value="" title="<?php echo lang('email_address'); ?>" />
        </div>
        <div class="page_form_fields">
            <div class="label"><?php echo lang('repeat_email_address'); ?> *</div>
            <div class="clearB"></div>
            <input type="text" name="heirhaal_email_beheerders" id="heirhaal_email_beheerders" class="text_field" value="" title="<?php echo lang('repeat_email_address'); ?>" />
        </div>
        <div class="clearB"></div>
         <div class="page_form_fields">
            <div class="label"></div>
            <div class="clearB"></div>
           	<input type="checkbox" name="rights[]" value="beheerders_aanmaken" title="<?php echo lang('rights'); ?>" /> Beheerders(s) aanmaken<br />
			<input type="checkbox" name="rights[]" value="beheerders_text" title="<?php echo lang('rights'); ?>" /> Text content beheren<br />
			<input type="checkbox" name="rights[]" value="beheerders_project" title="<?php echo lang('rights'); ?>" /> Projecten beheren<br />
        </div>
        <div class="clearB"></div>
    </div>
    <div class="line_break"></div>
</div>
<div class="manage_page_button">
    <div class="padding_5">
		<input type="submit" name="btn_save_administrator" id="btn_save_administrator" value="<?php echo lang('save'); ?>" class="button_green" />
		<input type="reset" name="btn_cancel" id="btn_cancel" value="<?php echo lang('cancel'); ?>" class="button_green" />
    </div>
</div>
<?php echo form_close(); ?>
<div class="line_break"></div>

<div class="content_pages">
    <div class="content_info">
        <div class="information_box">
            <div class="page_info_icon left"><?php echo asset('img', 'application/themes/ictned/images/i_ico.png', 'alt="Info"', FALSE); ?></div>
            <div class="info_content left"><?php echo lang('user_admin_info_administrators_list'); ?></div>
            <div class="clearB"></div>
            <div class="info_note"><span>*Note: </span><?php echo lang('user_admin_note_administrators_list'); ?></div>
        </div>

        <div id="select_content">
            <div>
                <select title="Select page" class="select" id="page" name="page" style="z-index: 10; opacity: 0;">
                    <option label="" value="" class="manage_administrator_action_multiple"> </option>
                    <option value="manage_administrator_action_active" class="manage_administrator_action_multiple"><?php echo lang('activate'); ?></option>
                    <option value="manage_administrator_action_inactive" class="manage_administrator_action_multiple"><?php echo lang('inactivate'); ?></option>
                    <option value="manage_administrator_action_delete" class="manage_administrator_action_multiple"><?php echo lang('delete'); ?></option>
                </select>
                <span class="select">Select Action</span>
            </div>
        </div>
        <div class="line_break"></div>

        <div class="table_list">
            <div class="head_row head_top">
                <input type="checkbox" id="select_all_checkbox"/>
                &nbsp;<?php echo lang('user_manage_admin_administrators_list'); ?>
            </div>
            <?php foreach ($administrators_list as $k => $v) { ?>
            <?php $add_or_even = ((int)$k % 2 == 0) ? 'row_1' : 'row_2'; ?>
            <?php $id = $v->id; ?>
            
            <div class="row <?php echo $add_or_even; ?>">
                <div class="row_options width_106">
                    <?php if ($v->active == 1) { ?>
                        <a href="inactivate_user_<?php echo $id; ?>" title="<?php echo lang('inactivate_admin_info'); ?>" class="manage_administrator_action_single manage_administrator_action_inactive"><?php echo asset('img', 'application/themes/ictned/images/activate_ico.png', 'alt="In-Activate"', FALSE); ?></a>
                    <?php } else { ?>
                        <a href="activate_user_<?php echo $id ?>" title="<?php echo lang('activate_admin_info'); ?>" class="manage_administrator_action_single manage_administrator_action_active"><?php echo asset('img', 'application/themes/ictned/images/deactivate_ico.png', 'alt="Activate"', FALSE); ?></a>
                    <?php } ?>
                    <a href="viewinfo_user_<?php echo $id; ?>" title="<?php echo lang('view_admin_info'); ?>" class="manage_administrator_action_single manage_administrator_action_view"><?php echo asset('img', 'application/themes/ictned/images/view_ico.png', 'alt="View"', FALSE); ?></a>
                    <a href="editinfo_user_<?php echo $id; ?>" title="<?php echo lang('edit_admin_info'); ?>" class="manage_administrator_action_single manage_administrator_action_edit"><?php echo asset('img', 'application/themes/ictned/images/edit_ico.png', 'alt="Edit"', FALSE); ?></a>
                    <a href="delete_user_<?php echo $id; ?>" title="<?php echo lang('delete_admin_info'); ?>" class="manage_administrator_action_single manage_administrator_action_delete"><?php echo asset('img', 'application/themes/ictned/images/remove_ico.png', 'alt="Remove"', FALSE); ?></a>
                </div>
                &nbsp;<input type="checkbox" name="manage_administrator_multiple_select[]"/>
                &nbsp;<?php echo $v->title.' '.$v->first_name.' '.$v->last_name; ?>
            </div>

            <?php } ?>
        </div>
        
        <div><?php echo $this->pagination->create_links(); ?></div>
        <div class="clearB"></div>

    </div>
</div>
<div id="hidde_colorbox" style="display: none;"></div>

<script type="text/javascript">
	jQuery(function ($) {
		var lang = new Array();

		lang['required'] = "<?php echo lang('required'); ?>";
		lang['please_review'] = "<?php echo lang('please_review'); ?>";
        lang['message_alert'] = "<?php echo lang('message_alert'); ?>";
		lang['comfirmation_dialog'] = "<?php echo lang('comfirmation_dialog'); ?>";
        lang['please_contact_the_site_administrator'] = "<?php echo lang('please_contact_the_site_administrator'); ?>";  
        lang['your_are_now_activating_the_adminstrator'] = "<?php echo lang('your_are_now_activating_the_adminstrator'); ?>";
        lang['your_are_now_inactivating_the_adminstrator'] = "<?php echo lang('your_are_now_inactivating_the_adminstrator'); ?>";
        lang['your_are_now_deleting_the_adminstrator'] = "<?php echo lang('your_are_now_deleting_the_adminstrator'); ?>";
        lang['user_admin_please_select_admin_to_render_action'] = "<?php echo lang('user_admin_please_select_admin_to_render_action'); ?>";
        lang['multiple_administrators_was_successfully_activated'] = "<?php echo lang('multiple_administrators_was_successfully_activated'); ?>";
        lang['multiple_administrators_was_successfully_inactivated'] = "<?php echo lang('multiple_administrators_was_successfully_inactivated'); ?>";
        lang['multiple_administrators_was_successfully_deleted'] = "<?php echo lang('multiple_administrators_was_successfully_deleted'); ?>";
        lang['you_are_now_activating'] = "<?php echo lang('you_are_now_activating'); ?>";
        lang['you_are_now_inactivating'] = "<?php echo lang('you_are_now_inactivating'); ?>";
        lang['you_are_now_deleting'] = "<?php echo lang('you_are_now_deleting'); ?>";

		administrators.init(lang);
	});
</script>
<?php echo asset('js', '/application/themes/ictned/js/cms-manage-administrators', '', FALSE); ?>