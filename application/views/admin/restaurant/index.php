<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Restaurants Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin/restaurant/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Restaurant Id</th>
						<th>Name</th>
						<th>Location</th>
						<th>Logo</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($restaurants as $r){ ?>
                    <tr>
						<td><?php echo $r['restaurant_id']; ?></td>
						<td><?php echo $r['name']; ?></td>
						<td><?php echo $r['location']; ?></td>
						<td><?php echo $r['logo']; ?></td>
						<td>
                            <a href="<?php echo site_url('admin/restaurant/edit/'.$r['restaurant_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('admin/restaurant/remove/'.$r['restaurant_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
