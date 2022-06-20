<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?> | ASK FOOD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/css/all.css">

</head>
<style type="text/css">
	
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>">Ask Food</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
	<li class="nav-item <?php if ($this->uri->segment(1)=='menu'){ echo 'active'; } ?>">
			<a class="nav-link" href="<?php echo base_url(''); ?>menu/index">Menus</a>
		</li>
		<li class="nav-item <?php if ($this->uri->segment(1)=='home'){ echo 'active'; } ?>">
			<a class="nav-link"  href="<?php echo base_url(); ?>home">Restaurant list</a>

		</li>
		<li class="nav-item <?php if ($this->uri->segment(2)=='book'){ echo 'active'; } ?>">
			<a class="nav-link"  href="<?php echo base_url(); ?>table/book">Book a table</a>
		</li>
		<li class="nav-item <?php if ($this->uri->segment(1)=='cart'){ echo 'active'; } ?>">
			<a class="nav-link"  href="<?php echo base_url(); ?>cart">My Cart <span class="num badge badge-success"><?php echo $this->cart->total_items() ?></span> </a>
		</li>
		
      
    </ul>
    <ul class="form-inline navbar-nav my-2 my-lg-0">
		<?php if($this->session->userdata('userId') == NULL){ ?>
	<li class="nav-item ">
    <a class="nav-link text-light" href="<?php echo base_url(); ?>auth/login" class="login">Login</a>
	</li>
    	<?php  }else{?>
	<li class="nav-item">
		 <a class="nav-link text-light" href="<?php echo base_url('auth/logout'); ?>" class="logout">Logout</a>
	</li>
    	<?php  }?>

	</ul>
  </div>
</nav>
<main>
	<?php if(isset($_view)){ $this->load->view($_view); } ?>
</main>
<!--     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmXYJhy8ZpuHwjtbEOZbIO0SjFdDohD3I&callback=initMap"
    async defer></script> -->
	</body>
</html>

