
<div class="container-weather">
        <div class="weather__body">
    <h1 class="weather__city"><?php echo $city_name ?></h1>
            <div class="weather__datetime">
                <?php echo $time ?>,<?php echo $date ?>
            </div>
    <div class="weather__forecast">
        <?php echo $weather_description ?>
    </div>
            <div class="weather__icon">
      <?php echo $icon_tag ?>
            </div>
            <p class="weather__temperature">
          
      <?php echo $temp ?>
            </p>
            <div class="weather__minmax">
                <p>Min: <?php echo $temp_min?>&#176</p>
                <p>Max: <?php echo $temp_max ?>&#176</p>
            </div>
        </div>

        <div class="weather__info">
            <div class="weather__card">
                <i class="fa-solid fa-droplet"></i>
                <div>
                    <p>Humidity</p>
                    <p class="weather__humidity"><?php echo $humidity ?>%</p>
                </div>
            </div>
            <div class="weather__card">
                <i class="fa-solid fa-wind"></i>
                <div>
                    <p>Wind</p>
                    <p class="weather__wind"><?php echo $wind_speed ?> km / h</p>
                </div>
            </div>
                    </div>
    </div>
