<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Table Booking Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin/table_booking/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Book Id</th>
						<th>Booked By</th>
						<th>Email</th>
						<th>Restaurant Booked</th>
						<th>Book Date</th>
						<th>Book Time</th>
						<th>Dateadded</th>
						<th>Modified When</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($table_booking as $t){ ?>
                    <tr>
						<td><?php echo $t['book_id']; ?></td>
						<td><?php echo $t['booked_by']; ?></td>
						<td><?php echo $t['email']; ?></td>
						<td><?php echo $t['restaurant_booked']; ?></td>
						<td><?php echo $t['book_date']; ?></td>
						<td><?php echo $t['book_time']; ?></td>
						<td><?php echo $t['dateadded']; ?></td>
						<td><?php echo $t['modified_when']; ?></td>
						<td>
                            <a href="<?php echo site_url('admin/table_booking/edit/'.$t['book_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('admin/table_booking/remove/'.$t['book_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
