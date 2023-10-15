<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Food Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin/food/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Food Id</th>
						<th>Available</th>
						<th>MenuId</th>
						<th>Food Name</th>
						<th>Price</th>
						<th>Food Image</th>
						<th>Was Price</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($food as $f){ ?>
                    <tr>
						<td><?php echo $f['food_id']; ?></td>
						<td><?php echo $f['available']; ?></td>
						<td><?php echo $f['menuId']; ?></td>
						<td><?php echo $f['food_name']; ?></td>
						<td><?php echo $f['price']; ?></td>
						<td><?php echo $f['food_image']; ?></td>
						<td><?php echo $f['was_price']; ?></td>
						<td>
                            <a href="<?php echo site_url('admin/food/edit/'.$f['food_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('admin/food/remove/'.$f['food_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
