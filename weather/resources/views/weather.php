<div>
	<div>Main: <?php echo $weather_object->main; ?></div>
	<div>Description: <?php echo $weather_object->description; ?></div>
	<div>Temperature: <?php echo $weather_object->temperature; ?></div>
	<div>Pressure: <?php echo $weather_object->pressure; ?></div>
	<div>Humidity: <?php echo $weather_object->humidity; ?></div>
	<div>Temperature Minimum: <?php echo $weather_object->temp_min; ?></div>
	<div>Temperature Maximum: <?php echo $weather_object->temp_max; ?></div>
	<div>Temperature SeaLevel: <?php echo $weather_object->sea_level; ?></div>
	<div>Temperature GrandLevel: <?php echo $weather_object->grnd_level; ?></div>
	<div>Temperature Degree: <?php echo $weather_object->degree; ?></div>
	<div>Temperature Sunrise: <?php echo date("Y-m-d h:i:s",$weather_object->sunrise); ?></div>
	<div>Temperature Sunset: <?php echo date("Y-m-d h:i:s", $weather_object->sunset); ?></div>

	<?php if(isset($prev_info)):?>
		<h1>previous</h1>
		<div>Main: <?php echo $prev_info->main; ?></div>
		<div>Description: <?php echo $prev_info->description; ?></div>
		<div>Temperature: <?php echo $prev_info->temperature; ?></div>
		<div>Pressure: <?php echo $prev_info->pressure; ?></div>
		<div>Humidity: <?php echo $prev_info->humidity; ?></div>
		<div>Temperature Minimum: <?php echo $prev_info->temp_min; ?></div>
		<div>Temperature Maximum: <?php echo $prev_info->temp_max; ?></div>
		<div>Temperature SeaLevel: <?php echo $prev_info->sea_level; ?></div>
		<div>Temperature GrandLevel: <?php echo $prev_info->grnd_level; ?></div>
		<div>Temperature Degree: <?php echo $prev_info->degree; ?></div>
		<div>Temperature Sunrise: <?php echo $prev_info->sunrise; ?></div>
		<div>Temperature Sunset: <?php echo $prev_info->sunset; ?></div>
	<?php endif; ?>
</div>