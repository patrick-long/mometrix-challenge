<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Mometrix Challenge</title>
</head>
<body>

    <form action="get" method="get" class="form-group">
        <button class="btn btn-success" type="submit">Submit</button>
    </form>

    <?php

        include '.env.php';

        $conn = new mysqli($HOST, $USER, $PASSWORD, $DBNAME);
        
        if ($conn -> connect_error) {
            echo "Connection failed: " . $conn -> connect_error;
        } else {
            echo 'Successfully connected to MySQL<br><br><br>';
        }

        $sqlQuery = 'SELECT * FROM favorite_colors;';
        $queryResult = $conn -> query($sqlQuery);

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