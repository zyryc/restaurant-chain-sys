<div class="container">
<br>
<div class="row">
   <div class="col-sm-3">
   &nbsp;
   </div>
   <div class="col-sm-4 border bg-light">

<div class="container">

    <h2>Login</h2>
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
	
    <!-- Login form -->
    <div class="regisFrm">
        <form action="" method="post">
        <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">@</span>
    </div>
    <input class="form-control" type="email" name="email" placeholder="EMAIL" required="">
  </div>
           
            <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text fa fa-key"></span>
    </div>
    <input class="form-control" type="password" name="password" placeholder="PASSWORD" required="">
 </div>
            <div class="send-button center">
                <input class="btn btn-primary" type="submit" name="loginSubmit" value="LOGIN">
            </div>
            <br>
        </form>
        <p>Don't have an account? <a href="<?php echo base_url(); ?>auth/registration">Register</a></p>
        </div>
        <br>
</div> 
</div>
<div class="col-sm-3">
   &nbsp;
   </div>
</div>
</div>