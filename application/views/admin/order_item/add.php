<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Order Item Add</h3>
            </div>
            <?php echo form_open('order_item/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="order_id" class="control-label">Order</label>
						<div class="form-group">
							<select name="order_id" class="form-control">
								<option value="">select order</option>
								<?php 
								foreach($all_orders as $order)
								{
									$selected = ($order['id'] == $this->input->post('order_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$order['id'].'" '.$selected.'>'.$order['id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="food_id" class="control-label">Food</label>
						<div class="form-group">
							<select name="food_id" class="form-control">
								<option value="">select food</option>
								<?php 
								foreach($all_food as $food)
								{
									$selected = ($food['food_id'] == $this->input->post('food_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$food['food_id'].'" '.$selected.'>'.$food['food_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="quantity" class="control-label">Quantity</label>
						<div class="form-group">
							<input type="text" name="quantity" value="<?php echo $this->input->post('quantity'); ?>" class="form-control" id="quantity" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sub_total" class="control-label">Sub Total</label>
						<div class="form-group">
							<input type="text" name="sub_total" value="<?php echo $this->input->post('sub_total'); ?>" class="form-control" id="sub_total" />
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