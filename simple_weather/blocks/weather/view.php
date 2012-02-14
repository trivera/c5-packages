<style type="text/css" media="screen">
	.utility { width: auto; margin-right: 10px; }
	.utility form {float: right; }
	#weather {
		clear: both;
		position: relative; 
		right: 0px;
		float: right;
		background: #f8f8f8;
		padding: 0 10px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	#weather div { float: left; color: #333; }
	#weather-icon {
		width: 52px;
		height: 52px;
	}
	#weather-temp {
		margin-left: 5px;
		font-size: 30px;
		font-weight: 500;
		line-height: 52px;
	}
	#weather-details span { display: block; }
	#weather-details {
		margin: 11px 0 0 10px;
		font-size: 11px;
	}
</style>
<div id="weather" style="display: none;">
	<div id="weather-icon">
		<img id="icon-image" />
	</div>
	<div id="weather-temp"></div>
	<div id="weather-details">
		<span id="weather-text"></span>
		<span id="weather-high"></span>
		<span id="weather-low"></span>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	var url = '<?php echo $weatherUrl ?>';
	$.getJSON(url, function(data){
		$('#icon-image').attr('src', data.icon);
		$('#weather-temp').html(data.weather.condition.temp + '&deg;');
		$('#weather-text').html(data.weather.condition.text);
		$('#weather-high').html('High: ' + data.weather.forecast[0].high + '&deg;');
		$('#weather-low').html('Low: ' + data.weather.forecast[0].low + '&deg;');
		$('#weather').fadeIn();
	});
</script>