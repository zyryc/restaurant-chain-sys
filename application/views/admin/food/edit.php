<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Food Edit</h3>
            </div>
			<?php echo form_open('food/edit/'.$food['food_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="available" value="1" <?php echo ($food['available']==1 ? 'checked="checked"' : ''); ?> id='available' />
							<label for="available" class="control-label">Available</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="menuId" class="control-label">Menu List</label>
						<div class="form-group">
							<select name="menuId" class="form-control">
								<option value="">select menu_list</option>
								<?php 
								foreach($all_menu_list as $menu_list)
								{
									$selected = ($menu_list['menu_id'] == $food['menuId']) ? ' selected="selected"' : "";

									echo '<option value="'.$menu_list['menu_id'].'" '.$selected.'>'.$menu_list['menu_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="food_name" class="control-label">Food Name</label>
						<div class="form-group">
							<input type="text" name="food_name" value="<?php echo ($this->input->post('food_name') ? $this->input->post('food_name') : $food['food_name']); ?>" class="form-control" id="food_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="price" class="control-label">Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $food['price']); ?>" class="form-control" id="price" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="food_image" class="control-label">Food Image</label>
						<div class="form-group">
							<input type="text" name="food_image" value="<?php echo ($this->input->post('food_image') ? $this->input->post('food_image') : $food['food_image']); ?>" class="form-control" id="food_image" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="was_price" class="control-label">Was Price</label>
						<div class="form-group">
							<input type="text" name="was_price" value="<?php echo ($this->input->post('was_price') ? $this->input->post('was_price') : $food['was_price']); ?>" class="form-control" id="was_price" />
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