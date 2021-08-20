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

        echo $USER;

        $conn = new mysqli($HOST, $USER, $PASSWORD, $DBNAME);
        
        if ($conn -> connect_error) {
            echo "Connection failed: " . $conn -> connect_error;
        } else {
            echo 'Successfully connected to MySQL';
        }


        // $query = 'SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = "BASE TABLE" AND TABLE_SCHEMA="patrick_test"';
        // $result = $conn -> query($query);
        // print_r($result);

        // $sqlQuery = 'SELECT *';
        // $queryResult = $conn -> query($sqlQuery);
        // echo $queryResult;

        // if ($result -> num_rows > 0) {
        //     while ($row = $result -> fetch_assoc()) {
        //         echo "Row " . $row;
        //     }
        // } else {
        //     echo "No results found";
        // }

        // $conn -> close();



        // echo "The user is " .$_ENV['USER'];
    ?>
    
</body>
</html>