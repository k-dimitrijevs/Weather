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
                <input type="text" class="form-control w-25" id="searchCity" name="searchCity" placeholder="Search by city"><br>

                <button type="submit" name="search" class="btn btn-primary">Search</button><br><br>
            </form>
        </div>

        <div class="row search-city">
            <h3 class="city-name">
                <?php
                if (isset($_POST['search']))
                {
                    echo $_POST['searchCity'];
                } else {
                    echo "Riga";
                }?>
            </h3>
        </div>

        <div class="row weather-cards">
            <?php foreach ($days as $day): ?>
                <div class="col-4 weather-border rounded-3">
                    <h5 class="text-primary"><?php echo $day->getDate() ?></h5>
                    <p class="text-secondary condition"><?php echo $day->getCondition() ?></p>
                    <img src="<?php echo $day->getIcon() ?>" class="float-end" alt="Weather icon">
                    <p class="text-secondary"><?php echo "{$day->getAvgTempC()} °C / {$day->getAvgTempF()} °F" ?></p>
                    <p class="text-secondary"><?php echo "Max Wind: {$day->getMaxWindKph()}(kp/h)"?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>