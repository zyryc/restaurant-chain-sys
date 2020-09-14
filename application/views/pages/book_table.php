<div class="container">
<br>
<div class="row">
<div class="col-sm-3">
&nbsp;
</div>
<div class="col-sm-7 border bg-light">
<div class="container">
<br>
<h2 class="float-center"><?php echo $title; ?></h2>
<hr>
<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        
<?php echo validation_errors(); ?>
<?php echo form_open('table/book_table'); ?>
  <div class="form-group">
 
    <label for="exampleFormControlInput1">Name</label>
    <input name="booked_by"  type="text" required class="form-control" id="exampleFormControlInput1" placeholder="Your name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Your Email Address</label>
    <input name="email" type="email"  required class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select your Prefered restaurant</label>
    <select name="restaurant_booked" class="form-control" id="exampleFormControlSelect1">
      <option>Pick a Restaurant</option>
      <?php foreach ($restaurant as $item): ?>
      <option value="<?php echo $item['restaurant_id']; ?>"><?php echo $item['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Date</label>
    <input name="book_date" type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Time</label>
    <input name="book_time" type="time" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Number of Friends, If Any</label>
    <input name="no_of_friends" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Number of Friends, If Any">
  </div>
  <input  type="submit" class="btn-primary btn" href="<?php echo base_url(); ?>table/create/" value="Book">
	
</form>
<br>
</div>
</div>
</div>
</div>

