<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Customers Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin/customer/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Status</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Image</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($customers as $c){ ?>
                    <tr>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['status']; ?></td>
						<td><?php echo $c['name']; ?></td>
						<td><?php echo $c['email']; ?></td>
						<td><?php echo $c['phone']; ?></td>
						<td><?php echo $c['address']; ?></td>
						<td><?php echo $c['image']; ?></td>
						<td>
                            <a href="<?php echo site_url('admin/customer/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('admin/customer/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
