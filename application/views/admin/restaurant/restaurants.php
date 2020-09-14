<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title  ?></title>
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/js/angular.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/angular-route.js"></script>
</head>
<body>
<div ng-app="myApp" ng-controller="namesCtrl">

<ul>
  <li ng-repeat="x in names">
    {{ x.name + ', ' + x.country }}
  </li>
</ul>

</div>
	<script src="<?php echo base_url() ?>angular/restaurant.js"></script>
    
</body>
</html>