<br>
<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
<div class="alert alert-success" style="float: right; display: none; align-items: center;" id="alert">
<p>Added to Cart</p>

</div>
<div class="container">
<div class="card bg-light">
<div class="container">
<?php if(! empty($menus)){
    ?>
	<div class="container">
		<h1 class="text-center">
        menu list
		</h1>
	</div>

<br>
<hr>
<br>
<div class="container">
<div class="row">
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Restaurant</th>
            <th>Menu</th>
            <th>Date added</th>
        </tr>
    </thead>
    <tbody>
        
	<?php foreach ($menus as $item): ?>
        <tr>
            <td><?php echo $item['menu_name']; ?></td>
            <td><?php echo $item['menu_name']; ?></td>
            <td><?php echo $item['dateadded']; ?></td>
        </tr>

	<?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
<?php } else{?>
<h3 class="text-center">No menus yet</h3>
	<?php }?>
</div>
</div>
</div>


<script type="text/javascript">

</script>

