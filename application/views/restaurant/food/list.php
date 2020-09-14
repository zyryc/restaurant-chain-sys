<div class="container">
<div class="row">
<div class="col-sm-3">
&nbsp;
</div>
<div class="col">
<?php if(count($restaurants)){?>
	<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

	<a class="btn-success btn" href="<?php echo base_url(); ?>restaurant/create/">Create</a>
	<h2><?php echo $title; ?></h2>
	<div class="table-responsive" style="max-width:600px">
		<table class="table  table-bordered">
			<thead class="thead-dark">
			<tr >
				<th>Name</th>
				<th>Logo</th>
				<th>Location</th>
				<th>Action</th>
			</tr>
			</thead>
			<?php foreach ($restaurants as $item): ?>

			<tbody>
			<tr>

				<td><?php echo $item['name']; ?></td>
				<td><img src="<?php echo base_url().'assets/images/'.$item['logo'];?>" class="img-thumbnail" alt="<?php echo $item['name']; ?>" width="20%">
				</td>
				<td><?php echo $item['location']; ?></td>
				<td> <a href="<?php echo base_url() . "restaurant/view/" .$item['slug']; ?>">View restaurant</td>
			</tr>
			</tbody>
			<?php endforeach; ?>
		</table>
	</div>
	<?php } else { ?>
    <h4>No Restaurant added yet, click here to add <a class="btn-success btn" href="<?php echo base_url(); ?>restaurant/create/">Create</a></h4>            
  <?php } ?>
 

</div>
</div>
</div>

