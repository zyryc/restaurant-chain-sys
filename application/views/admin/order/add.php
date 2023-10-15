<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Order Add</h3>
            </div>
            <?php echo form_open('order/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="status" value="1"  id="status" />
							<label for="status" class="control-label">Status</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="customer_id" class="control-label">Customer</label>
						<div class="form-group">
							<select name="customer_id" class="form-control">
								<option value="">select customer</option>
								<?php 
								foreach($all_customers as $customer)
								{
									$selected = ($customer['id'] == $this->input->post('customer_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$customer['id'].'" '.$selected.'>'.$customer['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="grand_total" class="control-label">Grand Total</label>
						<div class="form-group">
							<input type="text" name="grand_total" value="<?php echo $this->input->post('grand_total'); ?>" class="form-control" id="grand_total" />
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