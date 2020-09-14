<br>
<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

<?php if(! empty($food)){?>
	<div class="container">
		<h1>
			<img rel="icon" src="<?php echo base_url().'assets/images/'.$restaurant['logo'];?>" class="img-thumbnail" alt="<?php echo $restaurant['name']; ?>" width="100" height="100">
			<?php echo $restaurant['name']; ?></td>
		</h1>
	</div>

<br>
<hr>
<br>
<div class="container">
<div class="row">
	<?php foreach ($food as $item): ?>
<div class="col-6 col-sm-3">

<div class="card bg-light" style="margin-bottom: 15px;">
<div class="">
	<img src="<?php echo base_url().'assets/images/'.$item['food_image'];?>" class="card-img-top" alt="<?php echo $item['food_name']; ?>" width="100%">
	<div class="container" style="margin-top: 5px;">

		<p class="text-center"><b>Price $<?php echo $item['price']; ?></b></p> 
	<p>
		<div class="clearfix">
		<div class="float-left">
			<?php echo $item['food_name']; ?>
		</div>
		<div class="float-right">
			<button class="add_cart btn btn-small btn-success " data-productid="<?php echo $item['food_id'];?>" data-productname="<?php echo $item['food_name'];?>" data-productprice="<?php echo $item['price'];?>" id="buys"><span class="fas fa-plus"> &nbsp; buy</button>
		</div>
		</div>
	</p>
	</div>
</div>

</div>
</div>
	<?php endforeach; ?>

</div>
</div>
<?php } ?>