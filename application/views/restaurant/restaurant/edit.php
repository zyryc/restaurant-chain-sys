<div class="container">
<br>
<div class="row">
	<div class="col-sm-4">
&nbsp;
	</div>

<div class="col-sm-4 border bg-light">

	<h2><?php echo $title; ?></h2>
	<br>
	<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
<hr>
	<?php echo validation_errors(); ?>

	<?php echo form_open_multipart('restaurant/create'); ?>

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" placeholder="Name" name="name" class="form-control" id="name">
	</div>
	<div class="form-group">
		<label for="logo">Logo</label>
		<input type="file" name="logo" required class="form-control" id="logo">
	</div>

	<div class="form-group">
		<label for="location">Location</label>
		<input type="text" placeholder="Restaurant Location" name="location" class="form-control" id="location">
	</div>
<div class="btn-group">
<button type="submit" class="btn btn-primary">Submit</button>
	<a class="btn btn-outline-dark" href="<?php echo base_url(); ?>restaurant/">Back</a>	

</div>

	</form>


	<br>

	</div>
</div>


</div>
