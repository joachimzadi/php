<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conversion</title>
    <style>
        .red {
            color: red;
        }

        .vert {
            color: green;
        }
    </style>
</head>
<body>
<div>
    <form method="post">
        <p>
            <label for="">Temperature en °C :</label>
            <input type="text" id="celcius" name="celsius"/>
            <input type="submit" value="Convertir"/>

            <?php
            $celsius = $_POST['celsius'];
            $farhen = 0;

            if (!empty($celsius) and is_float($celsius)) {
//                $farhen = floatval($celsius) * 9 / 5 + 32;
                $farhen = (float)($celsius) * 9 / 5 + 32;
                echo "<p class='vert'>" . $celsius . " °C = " . $farhen . " °F </p>";
            } else {
                exit("<p class='red'>Programme arreté suit à un soucis</p>");
            }
            ?>
        </p>
    </form>
</div>
</body>
</html>
