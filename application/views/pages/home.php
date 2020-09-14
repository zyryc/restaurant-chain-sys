<div class="">

<div class="row">
<?php if ($this->session->flashdata('success')): ?>                 
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

<div class="col-sm-6">
	<div class="container">
		<br>
		<h2>Ask Food</h2>
		<div class="clearfix"></div>
		<br>
		<p>Busy? stuck in traffic? At work?
		<br>
	Just Ask Food from your nearest Restaurant</p>
			<?php echo validation_errors(); ?>

			<?php //echo form_open('home/create'); ?>

			<div class="input-group">

				<input type="text" id="autocomplete" placeholder="Enter your Location" name="submit" class="form-control form-control-lg">
				<div class="input-group-append">
					<span class="input-group-text"><span class="fas fa-map-marker"></span></span>
				</div>
				<input type="hidden" id="loc_lat" />
		    <input type="hidden" id="loc_long" />
			<div class="latlong-view">
		</div>
			</div>
			</form>
			<div class="clearfix">
				
			</div>
		<br>
	</div>
</div>
<div class="col-sm-6">
	<img src="<?php echo base_url() . '/assets/images/' ;  ?>image.jpg" alt="New York" width="100%">

</div>
</div>
</div>
<div style="background-color: #995300; min-height: 100px;">
<div class="container">
	<div class="row">

		<div class="col-sm-4">
<br>
<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
<br>
		</div>
		<div class="col-sm-4">
			<br>
			<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

<br>
		</div>
		<div class="col-sm-4">
			<br>
			<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
			<br>
		</div>

	</div>
</div>
</div>
<div  class="bg-light">
	<br>
<div class="container">
<br>
<?php if(count($restaurants)){?>
<h5>List Of Restaurants</h5>
	<div class="">	
			<ul >
			<?php foreach ($restaurants as $item): ?>
    <li><a href="<?php echo base_url() . "home/home/" .$item['slug']; ?>"><?php echo $item['name']; ?></a></li>
			<?php endforeach; ?>
			</ul>
	</div>
	<?php } else { ?>
    <h4>No Restaurant added yet</a></h4>            
  <?php } ?>
</div>
<br>
</div>
<div class="bg-dark">
	<div class="clearfix">
	
	</div>
	<div class="clearfix">
	
	</div>
</div>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  /* background-color: #333333; */
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}


</style>

    <script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmXYJhy8ZpuHwjtbEOZbIO0SjFdDohD3I&libraries=places&callback=initAutocomplete"
        async defer></script>