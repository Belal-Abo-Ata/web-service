<?php
ini_set('display_errors', 1);
ini_set('memory_limit', '-1');

require("vendor/autoload.php");

use Model\Weather as Weather;

$weather = new Weather(__WEATHER_URL__);
$egyption_cities = $weather->get_cities();

// if (isset($_POST["submit"])) {
//     $current_date_time = $weather->get_current_time();
//     $result = $weather->get_weather($_POST["city"]);
//     if (isset($result)) {
//         $city_name = $result["name"];
//         $time = $current_date_time["time"];
//         $date = $current_date_time["date"];
//         $weather_description = $result["weather"][0]["description"];
//         $icon = $result["weather"][0]["icon"];
//         $icon_tag = "<img src='http://openweathermap.org/img/w/$icon.png' alt='Weaher icon'>";
//         $temp = $result["main"]["temp"];
//         $temp_min = $result["main"]["temp_min"];
//         $temp_max = $result["main"]["temp_max"];
//         $humidity = $result["main"]["humidity"];
//         $wind_speed = $result["wind"]["speed"];
//         require_once("weather.php");
//     } else {
//         echo "<h1 class='text-center'>Error fetching data</h1>";
//     }
// }
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Weather Api</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
			crossorigin="anonymous"
		/>
    <link rel="stylesheet" href="./css/style.css">
	</head>
	<body>
		<div class="container mt-5 mx-auto text-center">
			<form action="index.php" method="post">
				<label for="city" class="form-label">Choose City:</label>
				<select name="city" id="city" class="form-select d-inline mx-2 w-25">
          <?php foreach($egyption_cities as $city) {
              $city_name = $city["name"];
              $city_id =
              $city["id"];
              echo "<option value='$city_id'>$city_name</option>";
          }
?>
				</select>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>


<?php
if (isset($_POST["submit"])) {
    $current_date_time = $weather->get_current_time();
    $result = $weather->get_weather($_POST["city"]);
    if (isset($result)) {
        $city_name = $result["name"];
        $time = $current_date_time["time"];
        $date = $current_date_time["date"];
        $weather_description = $result["weather"][0]["description"];
        $icon = $result["weather"][0]["icon"];
        $icon_tag = "<img src='http://openweathermap.org/img/w/$icon.png' alt='Weaher icon'>";
        $temp = $result["main"]["temp"];
        $temp_min = $result["main"]["temp_min"];
        $temp_max = $result["main"]["temp_max"];
        $humidity = $result["main"]["humidity"];
        $wind_speed = $result["wind"]["speed"];
        require_once("weather.php");
    } else {
        echo "<h1 class='text-center'>Error fetching data</h1>";
    }
}
?>


		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
			integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
			crossorigin="anonymous"
		></script>
    <script src="https://kit.fontawesome.com/a692e1c39f.js" crossorigin="anonymous"></script>
	</body>
</html>
