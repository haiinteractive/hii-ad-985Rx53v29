<div class="inside">
<div class="main-content left beheeders-content" style="width:645px !important; font-size:16px !important;">
		<!--<span class="url"><a href="<?php //echo base_url();?>/admin">Dashboard</a> &gt; <b><?php //echo lang('Update_Adminstration');?></b></span>
		
		<h2 class="green-underline"><?php //echo lang('Update_Adminstration');?></h2>-->
        <div class="clear"></div>
			<form action="<?php  echo site_url('admin/users/administrator/update_info/'.$get_data[0]->id)?>" method="post">
            <table style="margin-left: 5%;width: 48%;" id="information" class="information">
              <tr><td>
				<label for="voornaam-beheerders">*<?php echo lang('first_name');?></label>
                </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->first_name ?>" name="voornaam-beheerders" id="voornaam-beheerders" class="input-style" />
                </td></tr>
                <tr><td></td>
                <td>
				<input align="middle" type="radio" name="dhrmevr-beheerders" value="dhr" <?php if($get_data[0]->gender=='dhr'){?> checked="checked" <?php }?> /> <?php echo lang('mr');?>
                <input align="middle" type="radio" name="dhrmevr-beheerders" value="mevr" <?php if($get_data[0]->gender=='mevr'){?> checked="checked" <?php }?> /><?php echo lang('mrs');?></td>
                </tr><tr>
                <td>
				<label for="username">*<?php echo lang('username') ?></label>
                </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->last_name ?>" name="username" id="username" class="input-style" />
                </td></tr>
                <tr><td>
                <label for="company">*<?php echo lang('job_title');?></label>
                </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->home_phone ?>" name="job_title" id="job_title" class="input-style" />
                </td></tr>
                <tr><td>
                 <label for="company">*<?php echo lang('phone_number'); ?></label>
                 </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->mobile_phone ?>" name="phone_number" id="phone_number" class="input-style" /></td></tr>
                 <tr><td>
				<label for="achternam-beheerders">*<?php echo lang('last_name');?></label>
                </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->username ?>" name="achternam-beheerders" id="achternam-beheerders" class="input-style" /></td></tr>
                <tr><td>
				<label for="email"><?php echo lang('email_address');?></label>
                </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->email ?>" name="email-beheerders" id="email-beheerders" class="input-style" /></td></tr>
                <tr><td>
                <label for="country">*<?php echo lang('country'); ?></label>
                </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->country ?>" name="country" id="country" class="input-style" /></td></tr>
                <tr><td>
                 <label for="mobile_number">*<?php echo lang('mobile_phone');?></label>
                 </td><td>
				<input align="middle" type="text" value="<?php echo $get_data[0]->mobile_phone ?>" name="mobile_number" id="mobile_number" class="input-style" /></td></tr>
                <!--<tr><td>
                <label for="achternam-beheerders"></label></td>
                <td>
                <span>View</span><span style="margin-left:10px;"> Edit</span></td></tr>-->
               <!-- 
                <input align="middle" type="radio" name="website_confirm" value="1" <?php //if($get_data[0]->security_answer==1){?> checked="checked" <?php //}?> style=" margin-right:25px;padding-left:34px;"/> 
                <input align="middle" type="radio" name="website_confirm" value="2" <?php //if($get_data[0]->security_answer==2){?> checked="checked" <?php //}?> /><br/><br/>
                <input align="middle" type="radio" name="user_confirm" value="1" <?php //if($get_data[0]->email==1){?> checked="checked" <?php //}?> style=" margin-right:25px;padding-left:34px;"/> 
                <input align="middle" type="radio" name="user_confirm" value="2" <?php //if($get_data[0]->email==2){?> checked="checked" <?php //}?> /><br/><br/>
                <input align="middle" type="radio" name="project_confirm" value="1" <?php //if($get_data[0]->work_phone==1){?> checked="checked" <?php //}?> style=" margin-right:25px;padding-left:34px;"/> 
                <input align="middle" type="radio" name="project_confirm" value="2" <?php //if($get_data[0]->work_phone==2){?> checked="checked" <?php //}?> /><br/><br/>
                <input align="middle" type="radio" name="admin_confirm" value="1" <?php //if($get_data[0]->administrators_create==1){?> checked="checked" <?php //}?> style=" margin-right:25px;padding-left:34px;"/> 
                <input align="middle" type="radio" name="admin_confirm" value="2" <?php //if($get_data[0]->administrators_create==2){?> checked="checked" <?php //}?> />
            --> <tr><td colspan="2"></td></tr>
            	<tr><td></td>			
                <td>
                <?php if($this->lang->lang()=='en') { ?>
                <ul class="btn"><li>
				<input type="submit" value="Submit"><!--<img src="<?php //echo base_url()?>application/themes/ictned/images/bg-btnleft.gif" alt="submit" />-->
                <?php } else { ?>
                <input type="submit" value="opslaan"><!--<img src="<?php //echo base_url()?>application/themes/ictned/images/button-BIJWERKEN.png" alt="submit" />-->
                <?php } ?>
                </li></ul>
                </td>
                </tr>
              </table>      
			</form>
           </div> 
				</div><!-- main-content -->
               
