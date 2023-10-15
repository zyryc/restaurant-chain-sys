<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Table Booking Add</h3>
            </div>
            <?php echo form_open('table_booking/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="booked_by" class="control-label">Booked By</label>
						<div class="form-group">
							<input type="text" name="booked_by" value="<?php echo $this->input->post('booked_by'); ?>" class="form-control" id="booked_by" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="restaurant_booked" class="control-label">Restaurant Booked</label>
						<div class="form-group">
							<input type="text" name="restaurant_booked" value="<?php echo $this->input->post('restaurant_booked'); ?>" class="form-control" id="restaurant_booked" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="book_date" class="control-label">Book Date</label>
						<div class="form-group">
							<input type="text" name="book_date" value="<?php echo $this->input->post('book_date'); ?>" class="form-control" id="book_date" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="book_time" class="control-label">Book Time</label>
						<div class="form-group">
							<input type="text" name="book_time" value="<?php echo $this->input->post('book_time'); ?>" class="form-control" id="book_time" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dateadded" class="control-label">Dateadded</label>
						<div class="form-group">
							<input type="text" name="dateadded" value="<?php echo $this->input->post('dateadded'); ?>" class="form-control" id="dateadded" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="modified_when" class="control-label">Modified When</label>
						<div class="form-group">
							<input type="text" name="modified_when" value="<?php echo $this->input->post('modified_when'); ?>" class="form-control" id="modified_when" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>