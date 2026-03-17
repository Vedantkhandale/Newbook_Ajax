<?php
require_once('includes/config.php');
if(!isset($_SESSION['Auth']['id']))
{
	header("Location: index.html");
	exit;
}
	  $guests = new guests;
	  $row= $guests->select($guests->table,'',"id=".$_GET['id']);
	  $_POST = $row[0];
	  $_POST['hobbies'] = explode(', ',$_POST['hobbies']);

?>
<form action="update.php" method="post" class="form" enctype="multipart/form-data" onsubmit="return form_control();">
                <div class="group">
                  <label class="label">Name<span class="mandatory">*</span></label>
		 
                  <input type="text" class="text_field" name="name" id="name" value="<?php echo isset($_POST['name'])?$_POST['name']:''; ?>" />
                  <span class="description">Ex: a simple text</span>
		  <div class="error" id="errorname" style="display:none">Please enter name.</div>
                </div>
                <div class="group">
                  <div class="fieldWithErrors">
                    <label class="label" for="post_title">Email Id</label>                    
                  </div>
                  <input type="text" class="text_field" name="email"  id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>"/>
                  <span class="description">Ex: a simple text</span>
                  <div class="error" id="erroremail" style="display:none"></div>
                </div>
                <div class="group">
                  <label class="label">Address</label>
                  <textarea class="text_area" name="address" id="address" rows="5" cols="80"><?php echo isset($_POST['address'])?$_POST['address']:''; ?></textarea>
                  <span class="description">Write here a long text</span>
                  <div class="error" id="erroradd" style="display:none"></div>
                </div>
		<div class="group">
                  <div class="fieldWithErrors">
                    <label class="label" for="post_title">Phone No.</label>                    
                  </div>
                  <input type="text" class="text_field" id="phone" value="<?php echo isset($_POST['phone'])?$_POST['phone']:''; ?>"/>
                  <span class="description">Ex: a simple text</span>
                  <div class="error" id="errorphone" style="display:none"></div>
                </div>
		<div class="group">
                  <div class="fieldWithErrors">
                    <label class="label" for="post_title">Gender</label>                    
                  </div>
		  <div>
		          <input type="radio" class="text_field" name="gender" id="gender1" value="Male" <?php echo isset($_POST['gender']) && $_POST['gender']=='male'?'checked':''; ?> />
		          <label class="radio">Male</label>&nbsp;
			  <input type="radio" class="text_field" name="gender" id="gender2" value="Female" <?php echo isset($_POST['gender']) && $_POST['gender']=='female'?'checked':''; ?> />
		          <label class="radio">Female</label>
                  <div class="error" id="errorgender" style="display:none"></div>
		  </div>	
                </div>
		<div class="group">
                  <div class="fieldWithErrors">
                    <label class="label" for="post_title">Avatar</label>                    
                  </div>
                  <input type="file" class="text_field" name="photo" id="photo" value="<?php echo isset($_POST['photo'])?$_POST['photo']:''; ?>" />
                  <span class="description">jpeg or png</span>
                  <div class="error" id="errorphoto" style="display:none"></div>
                </div>
		<div class="group">
                  <div class="fieldWithErrors">
                    <label class="label" for="post_title">Hobbies</label>                    
                  </div>
                   <div>
		          <input type="checkbox" class="text_field" name="hobbies[]" id="hobbies1" value="Reading" <?php echo (isset($_POST['hobbies']) && in_array('reading',$_POST['hobbies'])) ?'checked':''; ?> />
		          <label class="checkbox">Reading Books</label>&nbsp;
			  <input type="checkbox" class="text_field" name="hobbies[]" id="hobbies2" value="Listening" <?php echo (isset($_POST['hobbies']) && in_array('listening',$_POST['hobbies'])) ?'checked':''; ?>/>
		          <label class="checkbox">Listening to Music</label>
		          <?php if(isset($errors['hobbies'])){?><div class="error"><?php echo $errors['hobbies']; ?></div><?php } ?>
		  </div>
		  <div><input type="text" class="text_field" name="getid"  id="getid" value="<?php echo isset($_GET['id'])?$_GET['id']:''; ?> " style="display:none"/></div>
                </div>
                <div class="group navform wat-cf">
                  <button class="button" type="submit" name="update" id="update">
                    <img src="images/icons/tick.png" alt="" /> Save
                  </button>
                  <span class="text_button_padding">or</span>
                  <a class="text_button_padding link_button" href="guests.html">Cancel</a>
                </div>
              </form>