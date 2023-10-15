<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Order Items Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin/order_item/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Order Id</th>
						<th>Food Id</th>
						<th>Quantity</th>
						<th>Sub Total</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($order_items as $o){ ?>
                    <tr>
						<td><?php echo $o['id']; ?></td>
						<td><?php echo $o['order_id']; ?></td>
						<td><?php echo $o['food_id']; ?></td>
						<td><?php echo $o['quantity']; ?></td>
						<td><?php echo $o['sub_total']; ?></td>
						<td>
                            <a href="<?php echo site_url('admin/order_item/edit/'.$o['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('admin/order_item/remove/'.$o['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
