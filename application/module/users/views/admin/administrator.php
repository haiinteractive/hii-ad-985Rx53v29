<div class="main-content left beheeders-content" style="width:703px !important;">
        <div class="content_pages">
        <div class="content_info" style=" margin: 10px 0 0 10px;">
       <table style="width:30%"><tr><td>
<?php echo $this->ion_auth->user()->row()->title; ?>.<?php echo $this->ion_auth->user()->row()->first_name; ?> <?php echo $this->ion_auth->user()->row()->last_name; ?></td></tr>
<tr><td>
<?php echo $this->ion_auth->user()->row()->phone; ?></td></tr>
<tr><td>
<?php echo $this->ion_auth->user()->row()->email; ?>
</td></tr>
<tr></tr>
<tr>
<td><?php echo lang('first_name');?></td><td><?php echo $this->ion_auth->user()->row()->username; ?></td></tr>
<tr>
<td><?php echo lang('password');?></td><td>*******</td></tr>
<tr><td>
<div class="button_edit">
<input type="button" value="<?php echo lang('modify');?>" id="btn_edit_1" name="btn_edit_1" class="button_green" onclick="window.location.href='<?php echo base_url()?>en/admin/users/administrator/edit'">
</div>
</td>
</table>
<div style="display:none">
	<style type="text/css">
		.info_msg{ position:absolute; margin-bottom:5px !important;}
		#newform{ padding-left:85px;
		text-align:center;}
	</style>
	<div id="add_new_admin" class="administrator" >
		<div class="box2" >
			<div class="box_content">
				<div class="menubox" id="menubox">
                      <form name="newform" id="newform" method="post"  action="administrator/add"  >
					<div class="clearB"></div>
					<div class="field" id="">
						<div class="msg"></div>
					</div>
					<div class="clearB"></div>
                    
					<div class="label"><?php echo lang('last_name');?></div>
					<div class="field">
						<input type="text" class="input required" name="achternam-beheerders" id="achternam-beheerders" title="<?php echo lang('last_name');?>" />
					</div>
					<div class="clearB"></div>
					<div class="label"><?php echo lang('first_name');?></div>
					<div class="field">
                    <input type="text" class="input required" name="voornaam-beheerders" id="voornaam-beheerders"  title="<?php echo lang('first_name');?>" />
						
					</div>
					<div class="clearB"></div>
					<div class="label "><?php echo lang('title');?></div>
					<div class="field ">
						<input type="radio" name="dhrmevr-beheerders" value="dhr" checked="checked" /> <?php echo lang('mr');?>
                <input type="radio" name="dhrmevr-beheerders" value="mevr" /> <?php echo lang('mrs');?> <br />
					</div>
					<div class="clearB"></div>
                    <div class="label"><?php echo lang('username');?></div>
					<div class="field">
						<input type="text" class="input required" name="username" id="username" title="<?php echo lang('username');?>" />
					</div>
					<div class="clearB"></div>
					<div class="label"><?php echo lang('job_title');?></div>
					<div class="field">
                    <input type="text" class="input required" name="job_title" id="job_title"  />
						
					</div>
                    <div class="clearB"></div>
					<div class="label"><?php echo lang('country');?></div>
					<div class="field">
                    <input type="text" class="input required" name="country" id="country"  />
						
					</div>
                    <div class="clearB"></div>
					<div class="label"><?php echo lang('phone_number'); ?></div>
					<div class="field">
                    <input type="text" class="input required" name="phone_number" id="phone_number"  />
						
					</div>
                    <div class="clearB"></div>
					<div class="label"><?php echo lang('mobile_phone');?></div>
					<div class="field">
                    <input type="text" class="input required" name="mobile_number" id="mobile_number"  />
						
					</div>
                    <div class="clearB"></div>
					<div class="label"><?php echo lang('email');?></div>
					<div class="field">
                    <input type="text"  class="input required" name="email-beheerders" id="email-beheerders" class="input-style" />
						
					</div>
                    <div id="correctemail" style="display:none;color:red; float:left;font-size: 12px;margin-top: 8px;"><?php echo lang('email_valid');?></div>
                    <div class="clearB"></div>
					<div class="label"><?php echo lang('reemail');?></div>
					<div class="field">
                   <input type="text"  class="input required" name="heirhaal-email-beheerders" id="heirhaal-email-beheerders" class="input-style" />
						
					</div>
                    <div id="notmatchemail" style="display:none;color:red; float:left;font-size: 12px;margin-top: 8px;"><?php echo lang('email_match');?></div> 
                    <div class="clearB"></div>
					<div class="label"><?php echo lang('password');?></div>
					<div class="field">
                    <input type="password" class="input required" name="password" id="password"  />
						
					</div>
                    <div class="clearB"></div>
					<div class="label"><?php echo lang('repassword');?></div>
					<div class="field">
                    <input type="password" class="input required" name="repassword" id="repassword"  />
						
					</div>
                    
                    <div id="notmatch" style="display:none;color:red; float:left;font-size: 12px;margin-top: 8px;"><?php echo lang('password_not_match');?></div>
                    <div class="clearB"></div>
					<div class="label"></div>
					<div class="field">
                  <?php echo lang('View_Edit');?>
						
					</div>
                    <div class="clearB"></div>
					<div class="label "><?php echo lang('website'); ?> </div>
					<div class="field ">
						<input type="radio" name="website_confirm" value="1"  style=" margin-right:25px;padding-left:34px;"/> 
                <input type="radio" name="website_confirm" value="2" />
                </div>
                <div class="clearB"></div>
					<div class="label "><?php echo lang('User_Inforamtion');?> </div>
					<div class="field ">
						<input type="radio" name="user_confirm" value="1" style=" margin-right:25px;padding-left:34px;" />
                <input type="radio" name="user_confirm" value="2" />
                </div>
                    <div class="clearB"></div>
					<div class="label "><?php echo lang('Project_Inforamtion');?> </div>
					<div class="field ">
						<input type="radio" name="project_confirm" value="1" style=" margin-right:25px;padding-left:34px;"/> 
                <input type="radio" name="project_confirm" value="2" />
                </div>
                <div class="clearB"></div>
					<div class="label "> <?php echo lang('Admin_Management');?> </div>
					<div class="field ">
						<input type="radio" name="admin_confirm" value="1"style=" margin-right:25px;padding-left:34px;" /> 
                <input type="radio" name="admin_confirm" value="2" />
                </div>
                 
					<div class="clearB"></div>
                    <div class="label "> <input type="checkbox" name="invite" id="invite" value="1" /> <?php echo lang('Sent_invite');?></div>
                    <div class="field">
						
						<input type="submit" value="<?php echo lang('save'); ?>" id="btn_new_menu" name="btn_new_menu" class="button1"   />
					</div>
                   
					<div class="label">&nbsp;</div>
					<div class="clearB"></div>
					</form>
				</div>
				<div class="clearB"></div>
                <div style="display:none">
                <div id="deletewrap">
                                <div id="step1" class="step1">
                                    <p><?php echo lang('delete_message_confirm');?></p>
                                    <ul style="margin-left:135px;" class="btn">
                                        <li><a id="delete_item" class="next" href="#"><?php echo lang('remove');?></a></li>
                                    </ul>
                                    <ul class="btn">
                                        <li><a id="cancel" href="#"><?php echo lang('cancel');?></a></li>
                                    </ul>
                                </div>
                                
                            </div>
                            </div>
<div style="display:none">
                <div id="deleteall">
                                <div id="step1" class="step1">
                                    <p><?php echo lang('delete_message_confirm');?></p>
                                    <ul style="margin-left:135px;" class="btn">
                             <li><a id="delete_itemall" class="next" onclick="javascript:delete_alluser()" href="#"><?php echo lang('remove');?></a></li>
                                    </ul>
                                    <ul class="btn">
                                        <li><a id="cancelall" href=""><?php echo lang('cancel');?></a></li>
                                    </ul>
                                </div>
                                
                            </div>
                            </div>
 			</div>
		</div>
	</div>
    
</div>

 </div>
 
 </div>
 
<?php if($this->lang->lang()=='en') { ?>
				<a class="add_new_admin" id="" href="#add_new_admin" title="Create Administrator"><button type="submit"><img src="<?php echo base_url()?>application/themes/ictned/images/button-administrator.png" alt="submit" /></button></a>
                <?php } else { ?>
                <a class="add_new_admin" id="" href="#add_new_admin" title="Create Administrator"><button type="submit"><img src="<?php echo base_url()?>application/themes/ictned/images/button-beheerder.png" alt="submit" /></button></a>
                <?php } ?>
		<div class="clear"></div>
		
            
			<div class="clear"></div>
           
			<div class="pagination">
			    <?php echo $this->pagination->create_links();?>
			</div><!-- end pagination -->
            <div style="float:left; text-decoration:underline; color:#ccc">
            <?php if($this->uri->segment(5)==""):?>
            <form name="alldelte" id="form_alldelete" action="administrator/alldelete" method="post">
            <?php else:?>
            <form name="alldelte" id="form_alldelete" action="alldelete" method="post">
            <?php endif; ?>
            <img src="<?php echo base_url()?>application/themes/ictned/images/icon-2.png" alt="delete" />
           <?php /*?> <input type="submit" name="alldelete_user" class="alldelete_user" id="alldelete_user" title="<?php echo lang('delete_all'); ?>" value="<?php echo lang('delete_all'); ?>"/><?php */?>
            <a href="#" onclick="JavaScript:document.alldelte.submit();return FALSE" style="font-size:12px; text-decoration:underline; margin-left:8px;">Delete ALL Selected</a>
            </div>
            
				<div class="data">
					<div class="list_title"><ul style="font-weight:bold !important;"><li><input type="checkbox" name="user_all" id="user_all" onclick="user_alldelete()"  /></li>
                    <li><?php echo lang('first_name');?></li>
                    <li><?php echo lang('last_name');?></li>
                    <li><?php echo lang('Mobile');?></li>
                    <li class="links"></li>
                    </ul>
                    </div>
                    <?php $i=0; foreach($get_data as $data){ 
					if($i%2==0){$cls="alter_rw_one";}else {$cls="alter_rw_two";}?>
					<ul class="<?php echo $cls;?>">
                    	<li><input type="checkbox" name="user[]" id="user_<?php echo $i ?>" class="selectone" value="<?php echo $data->id;  ?>"  /></li>
						<li><?php echo $data->first_name; ?></li>
						<li><?php echo $data->last_name; ?></li>
                        <li><?php echo $data->mobile_phone; ?></li>
						<li class="links">
                         <?php if($data->active ==0) { ?>
						<a href="<?php echo site_url('admin/users/administrator/update_status/1/'.$data->id)?>"><img src="<?php echo base_url()?>application/themes/ictned/images/icon-5.png" alt="check" /></a>
                        <?php } 
						 else {?>
                        <a href="<?php echo site_url('admin/users/administrator/update_status/0/'.$data->id)?>"><img src="<?php echo base_url()?>application/themes/ictned/images/deactivate_ico.png" alt="check" /></a>
                       <?php } ?>
                        
           				 <a href=" <?php echo site_url('admin/users/administrator/edit/'.$data->id)?>"><img src="<?php echo base_url()?>application/themes/ictned/images/icon-1.png" alt="check" /></a>
                         
                       <a id="delete" class="delete" href=" <?php echo site_url('admin/users/administrator/delete_one/'.$data->id)?>" onclick="javascript:deactive_user(<?php echo $data->id; ?>)"title="<?php echo lang('User_delete') ?>"><?php echo asset('img', '/application/themes/ictned/images/remove_ico.png', 'alt="Remove"', FALSE); ?></a>
					
                       
                      </li>  
                      </ul>  
         
                    <?php $i++; }?>
                      <input type="hidden" name="total_rec" id="total_rec"  value="<?php echo count($get_data); ?>" />
                      </form> </div>
					
                    
                    
				
				<!-- end data -->
			<div class="pagination">
              <?php echo $this->pagination->create_links();?>
			</div>
            <!-- end pagination -->
	</div><!-- main-content -->
   
    <script type="text/javascript">
	$(document).ready(function() {
		$(".add_new_admin").colorbox({
			inline : true,
			onComplete : function(){
				$("div.box2 .msg .info_msg").remove();
				$('#menu_id2').val(this.id); 
				$("div.box2 .msg .info_msg").remove();
				$('#add_new_page input[type=text]').val(''); 
				$('.field.heading').html($(this).parents('.head_row').find('span').html());
				if(this.id == '2'){ 
					$('.userfile').show(); 
					$('.note_files').show();
					$('.none_menu_name').show();
					$('.second_label').show();
					$(".userfile").addClass('required');
					$(".none_menu_name").addClass('required');
				}else{ 
					$('.note_files').hide();
					$('.userfile').hide();
					$('.none_menu_name').hide();
					$('.second_label').hide();
					$(".userfile").removeClass('required');
					$(".none_menu_name").removeClass('required');
				}
			}
		});
		/*$('#alldelete_user').click(function() {
			$('.alldelete_user').colorbox(
			);
        });*/
		$('form#newform #btn_new_menu').click(function(e){
			$("div.box2 .msg .info_msg").remove();
			$(".required").each(function(){
				if($(this).val()==""){
					$("div.box2 .msg").append('<div class="info_msg">'+$(this).attr('title')+' <?php echo lang('required')?></div>');
					e.preventDefault();
					$.colorbox.resize();
				}
				else{
					this.form.action="<?php echo site_url('admin/users/administrator/add')?>";
					this.form.submit();
				}
			});
		});
		
		/*$('form#updateform #update_menu').click(function(e){
			$("div.box2 .msg .info_msg").remove();
			$(".required2").each(function(){
				if($(this).val()==""){
					$("div.box2 .msg").append('<div class="info_msg">'+$(this).attr('title')+' <?php //echo lang('required')?></div>');
					e.preventDefault();
					$.colorbox.resize();
				}
			});
		});
		$(".#btn").click( function() {
			var href = $(this).attr('href');
			jConfirm('<?php //echo lang('cms_page_confirm_delete'); ?>', '<?php //echo lang('cms_page_confirm_delete_head'); ?>', function(r) {
				if(r == true) location.href = href
			});
			return false;
		});*/
		
		
		
	});
	
	

	function deactive_user(cat_id)
	{
		document.getElementById('delete_item').href="administrator/delete_one/"+cat_id;
		document.getElementById('cancel').href="";
	}
	function delete_alluser()
	{
		document.getElementById('form_alldelete').method;
		document.getElementById('form_alldelete').submit();
		document.getElementById('cancelall').href="";
	}
	function validation_new()
	{/*
		var flag = true;
	var last_name = document.getElementById("achternam-beheerders").value;
	var first_name = document.getElementById("voornaam-beheerders").value;
	var username = document.getElementById("username").value;
	var job_title = document.getElementById("job_title").value;
	var country = document.getElementById("country").value;
		var phone_number = document.getElementById("phone_number").value;
		var mobile_number = document.getElementById("mobile_number").value;
		var email = document.getElementById("email-beheerders").value;
		var reemail = document.getElementById("heirhaal-email-beheerders").value;
		var password = document.getElementById("password").value;
		var repassword = document.getElementById("repassword").value;
		var correctemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(last_name=="")
	{
	document.getElementById("achternam-beheerders").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("achternam-beheerders").className = "no_error";
		
		}
		
	if(first_name=="")
	{
	document.getElementById("voornaam-beheerders").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("voornaam-beheerders").className = "no_error";
		
		}
	if(username=="")
	{
	document.getElementById("username").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("username").className = "no_error";
		
		}
	if(job_title=="")
	{
	document.getElementById("job_title").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("job_title").className = "no_error";
		
		}
	if(country=="")
	{
	document.getElementById("country").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("country").className = "no_error";
		
		}
	if(phone_number=="")
	{
	document.getElementById("phone_number").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("phone_number").className = "no_error";
		
		}
	if(mobile_number=="")
	{
	document.getElementById("mobile_number").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("mobile_number").className = "no_error";
		
		}	
		if(email=="")
	{
	document.getElementById("email-beheerders").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("email-beheerders").className = "no_error";
		if(!correctemail.test(email))
		
	{
	 document.getElementById('correctemail').style.display='inline';
		document.getElementById("email-beheerders").className = "last_error";
		
	flag=false;
	}
	else{
		document.getElementById('correctemail').style.display='none';
		
		}
		}
	if(reemail=="")
	{
	document.getElementById("heirhaal-email-beheerders").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("heirhaal-email-beheerders").className = "no_error";
		
		if(email!=reemail)
	{
	 document.getElementById('notmatchemail').style.display='inline';
		document.getElementById("heirhaal-email-beheerders").className = "last_error";
		
	flag=false;
	}
	else{
		document.getElementById('notmatchemail').style.display='none';
		
		}
		}
	if(password=="")
	{
	document.getElementById("password").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("password").className = "no_error";
		}
		if(repassword=="")
	{
	document.getElementById("repassword").className = "last_error";
	
	flag=false;
	}
	else{
		document.getElementById("repassword").className = "no_error";
		
		if(password!=repassword)
	{
	 document.getElementById('notmatch').style.display='inline';
		document.getElementById("repassword").className = "last_error";
	flag=false;
	}
	else{
		document.getElementById('notmatch').style.display='none';
		
		}
		}
	
	 if(flag==false)
	{
		return false;
	}
	else
	{
		return true;
	} 
		
	*/}
function user_alldelete()
{
	
	var total = document.getElementById('total_rec').value;
	
	for(var i=0;i<total;i++)
	{
		if(document.getElementById('user_all').checked == true)
		{
			document.getElementById('user_'+i).checked = true;
		}
		else
		{
			document.getElementById('user_'+i).checked = false;
		}
	}
}
</script>

<style>
.last_error{
	background-color:#FFEBE8;
	border:1px solid red;
	color: #848383;
    font-size: 12px;
    width: 180px;
	}
.no_error{
	background-color: #F1F1F1;
    border: 1px solid #E2E2E2;
    color: #848383;
    font-size: 12px;
    width: 180px;
}
.white{
	background:#fff;
	text-decoration:underline;
	cursor:pointer;
}
.list_title{
	
}
.list_title ul li{
	
	font-size:14px;
	
}
.alldelete_user{
	cursor:pointer;
	}
#add_new_admin .menubox{
	min-height:650px;	
	}

</style>
