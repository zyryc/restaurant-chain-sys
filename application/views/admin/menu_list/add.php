<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Menu List Add</h3>
            </div>
            <?php echo form_open('menu_list/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="for_who" class="control-label">Restaurant</label>
						<div class="form-group">
							<select name="for_who" class="form-control">
								<option value="">select restaurant</option>
								<?php 
								foreach($all_restaurants as $restaurant)
								{
									$selected = ($restaurant['restaurant_id'] == $this->input->post('for_who')) ? ' selected="selected"' : "";

									echo '<option value="'.$restaurant['restaurant_id'].'" '.$selected.'>'.$restaurant['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="menu_name" class="control-label">Menu Name</label>
						<div class="form-group">
							<input type="text" name="menu_name" value="<?php echo $this->input->post('menu_name'); ?>" class="form-control" id="menu_name" />
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