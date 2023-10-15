<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codeigniter Crud By PHP Code Builder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://crudegenerator.in">Codeigniter Crud By PHP Code Builder</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url(); ?>manage-customers">Manage Customers</a></li>
        <li><a href="<?php echo site_url(); ?>add-customers">Add Customers</a></li>
      </ul>
  </div>
</nav>

<div class="container">

  <h2>Update Customers</h2>  
<form role="form" method="post" action="<?php echo site_url()?>edit-customers-post" enctype="multipart/form-data">

 <input type="hidden" value="<?php echo $customers[0]->id ?>"   name="customers_id">


      <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" value="<?php echo $customers[0]->name ?>" class="form-control" id="name" name="name">
  </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" value="<?php echo $customers[0]->email ?>" class="form-control" id="email" name="email">
  </div>
    <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" value="<?php echo $customers[0]->phone ?>" class="form-control" id="phone" name="phone">
  </div>
    <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" value="<?php echo $customers[0]->address ?>" class="form-control" id="address" name="address">
  </div>
    <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="btn btn-primary" id="image" name="image">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>