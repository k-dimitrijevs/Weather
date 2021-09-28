<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Weather Application</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h2>Weather Application</h2>
        <hr>
    </div>

    <div class="row search-city">
        <form method="post">
            <label for="searchCity" class="form-label">City:</label>
            <input type="text" class="form-control w-25" id="searchCity" name="searchCity" value="Riga"><br>

            <button type="submit" name="search" class="btn btn-primary">Search</button><br><br>
        </form>
    </div>

    <div class="row search-city">
        <h4 class="city-name"><?php echo $_POST['searchCity'] ?></h4>
    </div>

    <div class="row weather-cards">
        <div class="col-4 weather-border rounded-3">
            <h5 class="text-primary title"><?php echo $today->getDate() ?></h5>
            <p class="text-secondary"><?php echo $today->getCondition() ?></p>
            <img src="<?php echo $today->getIcon() ?>" class="float-end" alt="Weather icon">
            <p class="text-secondary"><?php echo "{$today->getAvgTempC()} °C / {$today->getAvgTempF()} °F" ?></p>
            <p class="text-secondary"><?php echo "{$today->getMaxWindKph()} Max Wind (kp/h)"?></p>
        </div>

        <div class="col-4 weather-border rounded-3">
            <h5 class="text-primary title"><?php echo $tomorrow->getDate() ?></h5>
            <p class="text-secondary"><?php echo $tomorrow->getCondition() ?></p>
            <img src="<?php echo $tomorrow->getIcon() ?>" class="float-end" alt="Weather icon">
            <p class="text-secondary"><?php echo "{$tomorrow->getAvgTempC()} °C / {$tomorrow->getAvgTempF()} °F" ?></p>
            <p class="text-secondary"><?php echo "{$tomorrow->getMaxWindKph()} Max Wind (kp/h)"?></p>
        </div>

        <div class="col-4 weather-border rounded-3">
            <h5 class="text-primary title"><?php echo $dayAfterTomorrow->getDate() ?></h5>
            <p class="text-secondary"><?php echo $dayAfterTomorrow->getCondition() ?></p>
            <img src="<?php echo $dayAfterTomorrow->getIcon() ?>" class="float-end" alt="Weather icon">
            <p class="text-secondary"><?php echo "{$dayAfterTomorrow->getAvgTempC()} °C / {$dayAfterTomorrow->getAvgTempF()} °F" ?></p>
            <p class="text-secondary"><?php echo "{$dayAfterTomorrow->getMaxWindKph()} Max Wind (kp/h)"?></p>
        </div>
    </div>
</div>
</body>
</html>