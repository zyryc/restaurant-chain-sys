<br>
<div class="container">
<div class="">

<div class="border bg-light p-2">
<br>
<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

<?php if(count($restaurants)){ $count = 0;?>
	<h2 class="text-center"><?php echo $title; ?></h2>
		<div class="row">
			
			<?php foreach ($restaurants as $item): ?>


			<div class="col-md-3">
			<div class="card">
			<div onclick="window.location='<?php echo base_url() . "home/home/" .$item['slug']; ?>'">
				<img src="<?php echo base_url().'assets/images/'.$item['logo'];?>" class="card-img-top" alt="<?php echo $item['name']; ?>" width="20%">
			</div>
			<div class="card-body">
				<h5 class="card-title"><?php echo $item['name']; ?></h5>
				<span><i class="fa fa-map-marker w3-red">&nbsp;</i><?php echo $item['location']; ?></span>
				
			</div>
			</div>
			</div>
			<?php  $count++;  endforeach; ?>
		</div>

	<?php } else { ?>
    <h4>No Restaurant added yet, click here to add <a class="btn-success btn" href="<?php echo base_url(); ?>restaurant/create/">Create</a></h4>            
  <?php } ?>
 
<br>
</div>
</div>
</div>

