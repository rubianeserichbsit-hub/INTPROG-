<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Result</title>
</head>
<body>

    <h1>Submitted Information</h1>

    <?php
        $name = $_GET['name'];
        $age = $_GET['age'];

        echo "<p>Name: $name</p>";
        echo "<p>Age: $age</p>";
    ?>

</body>
</html> 