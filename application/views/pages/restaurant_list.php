<br>
<div class="container">
<div class="row">
<div class="col-sm-3">
&nbsp;
</div>
<div class="col-sm-6 border bg-light">
<br>
<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

<?php if(count($restaurants)){ $count = 0;?>
	<h2 class="text-center"><?php echo $title; ?></h2>
	<div class="table" style="max-width:600px">
		<table class="table  table-bordered">
			<thead class="thead-dark">
			<tr >
				<th>#</th>
				<th>Name</th>
				<th>Logo</th>
				<th>Location</th>
			</tr>
			</thead>
			<?php foreach ($restaurants as $item): ?>

			<tbody>
			<tr onclick="window.location='<?php echo base_url() . "home/home/" .$item['slug']; ?>'">
			<td><?php echo $count + 1; ?></td>

				<td><?php echo $item['name']; ?></td>
				<td><img src="<?php echo base_url().'assets/images/'.$item['logo'];?>" class="img-thumbnail" alt="<?php echo $item['name']; ?>" width="20%">
				</td>
				<td><?php echo $item['location']; ?></td>
				
			</tr>
			</tbody>
			<?php  $count++;  endforeach; ?>
		</table>
	</div>
	<?php } else { ?>
    <h4>No Restaurant added yet, click here to add <a class="btn-success btn" href="<?php echo base_url(); ?>restaurant/create/">Create</a></h4>            
  <?php } ?>
 

</div>
</div>
</div>

