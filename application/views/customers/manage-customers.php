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
        <li class="active" ><a href="<?php echo site_url(); ?>manage-customers">Manage Customers</a></li>
        <li><a href="<?php echo site_url(); ?>add-customers">Add Customers</a></li>
      </ul>
  </div>
</nav>
<div class="container">
  <h2>Manage Customers</h2>
  <?php if($this->session->flashdata('success')){ ?>
  <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
                </div>
  <?php } ?>

<?php if(!empty($customerss)) {?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>SL No</th>
        <th>name</th>
       <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($customerss as $customers) { ?>
      <tr>
        <td> <?php echo $i; ?> </td>
        <td> <a href="<?php echo site_url()?>view-customers/<?php echo $customers->id?>" > <?php echo $customers->name ?> </a> </td>

        <td>
        <a href="<?php echo site_url()?>change-status-customers/<?php echo $customers->id ?>" > <?php if($customers->status==0){ echo "Activate"; } else { echo "Deactivate"; } ?></a>
        <a href="<?php echo site_url()?>edit-customers/<?php echo $customers->id?>" >Edit</a>
        <a href="<?php echo site_url()?>delete-customers/<?php echo $customers->id?>" onclick="return confirm('are you sure to delete')">Delete</a>
        </td>

      </tr>
    <?php $i++; } ?>
    </tbody>
  </table>
  <?php } else {?>
  <div class="alert alert-info" role="alert">
                    <strong>No Customerss Found!</strong>
                </div>
  <?php } ?>
</div>

</body>
</html>