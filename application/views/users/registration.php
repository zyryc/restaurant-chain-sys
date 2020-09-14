<div class="container">
<br>
   <div class="row">
   <div class="col-sm-3">
   &nbsp;
   </div>
   <div class="col-sm-4 border bg-light">
   <br>
<div class="container">
    <h2>New Account</h2>
	<hr>
    <br>
    <!-- Status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="alert alert-success">
  <strong>Success!</strong> <?php echo $success_msg; ?>
</div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?php   echo $error_msg; ?>
</div>
 <?php }?>
	
    <!-- Registration form -->
    <div class="regisFrm">
        <form action="" method="post">
        
            <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text fa fa-user "></span>
      </div>
      <input class="form-control" type="text" name="user_name" placeholder="USER NAME" value="<?php echo !empty($user['first_name'])?$user['first_name']:''; ?>" required>
                <?php echo form_error('user_name','<p class="help-block">','</p>'); ?>
            
    </div>
    </div>


            <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text ">@</span>
    </div>
    <input type="email" class="form-control" name="email" placeholder="EMAIL" value="<?php echo !empty($user['email'])?$user['email']:''; ?>" required>
                <?php echo form_error('email','<p class="help-block">','</p>'); ?>
            </div>


            <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text fa fa-key"></span>
    </div>
    <input type="password" class="form-control" name="password" placeholder="PASSWORD" required>
                <?php echo form_error('password','<p class="help-block">','</p>'); ?> 
     </div>
            

            <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text fa fa-key"></span>
    </div>
    <input type="password" class="form-control" name="conf_password" placeholder="CONFIRM PASSWORD" required>
                <?php echo form_error('conf_password','<p class="help-block">','</p>'); ?>
           </div>
            
            <div class="form-group">
                <label>Gender: </label>
                <?php 
                if(!empty($user['gender']) && $user['gender'] == 'Female'){ 
                    $fcheck = 'checked="checked"'; 
                    $mcheck = ''; 
                }else{ 
                    $mcheck = 'checked="checked"'; 
                    $fcheck = ''; 
                } 
                ?>
                <div class="radio">
                    <label>
                        <input class="form-control" type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
						Male
                    </label>
                    <label>
                        <input class="form-control" type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                        Female
                    </label>
                </div>
            </div>


            <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text fa fa-phone "></span>
      </div>
      <input type="text" class="form-control" name="phone" placeholder="PHONE NUMBER" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
                <?php echo form_error('phone','<p class="help-block">','</p>'); ?>
               
    </div>
 
            <div class="send-button">
                <input type="submit" class="btn btn-info" name="signupSubmit" value="CREATE ACCOUNT">
            </div>
        </form>
        <p>Already have an account? <a href="<?php echo base_url(); ?>auth/login">Login here</a></p>
    </div>
    
   </div>
   </div>
   <div class="col-sm-3">
   &nbsp;
   </div>
   </div>
</div>