<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mometrix Challenge</title>
</head>
<body>

    <?php

        include '.env.php';

        $conn = new mysqli($HOST, $USER, $PASSWORD, $DBNAME);
        
        if ($conn -> connect_error) {
            echo "Connection failed: " . $conn -> connect_error;
        } else {
            echo 'Successfully connected to MySQL<br><br><br>';
        }

        $sqlQuery = 'SELECT * FROM favorite_colors;';
        $queryResult = $conn -> query('SELECT * FROM favorite_colors;');

        if ($queryResult -> num_rows > 0) {
            while ($row = $queryResult -> fetch_assoc()) {
                echo "Name: " . $row['name'] . '; Favorite color: ' . $row['color'] . '<br>';
            }
        } else {
            echo "No results found";
        }

        $conn -> close();
        
    ?>
    
</body>
</html>