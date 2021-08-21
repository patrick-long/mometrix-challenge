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

    <?php

        include '.env.php';

        $conn = new mysqli($HOST, $USER, $PASSWORD, $DBNAME);
        
        if ($conn -> connect_error) {
            echo "Connection failed: " . $conn -> connect_error;
        } else {
            echo '
                <h1 class="text-center">patrick_test</h1>
                <br>
                <br>
                <br>
            ';
        }

        $sqlQuery = 'SELECT * FROM favorite_colors;';
        $queryResult = $conn -> query($sqlQuery);

        if ($queryResult -> num_rows > 0) {
            echo 
                '<div>
                    <input class="form-control mx-auto w-50" type="text" id="userInput" onkeyup="searchFunction()" placeholder="Search for names or colors...">
                </div>
                <hr>';

            echo 
                '<table class="table" id="colorsTable">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Favorite color</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = $queryResult -> fetch_assoc()) {
                    echo 
                        '<tr style="background:' . $row["color"] . '"' . '>
                            <th scope="row">' . $row["name"] . '</th>
                            <td>' . $row["color"] . '</td>
                        </tr>';
            }
            echo    '</tbody>
                </table>';
        } else {
            echo "No results found";
        }

        $conn -> close();
        
    ?>
    
</body>
</html>