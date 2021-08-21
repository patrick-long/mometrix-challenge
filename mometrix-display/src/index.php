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

    <h1 class="text-center">patrick_test</h1>
    <br>
    <br>
    <br>
    <div>
        <input class="form-control mx-auto w-50" type="text" id="userInput" onkeyup="searchFunction()" placeholder="Search for names or colors...">
    </div>
    <form>
        <div class="form-check d-flex justify-content-center">
            <input class="form-check-input mx-1" type="radio" id="nameCheckbox" name="form-checkbox" checked>
            <label class="form-check-label mx-2" for="nameCheckbox">
                Search names
            </label>
            <input class="form-check-input mx-1" type="radio" id="colorCheckbox" name="form-checkbox">
            <label class="form-check-label mx-2" for="colorCheckbox">
                Search colors
            </label>
        </div>
    </form>
    <hr>

    <?php

        include '.env.php';

        $conn = new mysqli($HOST, $USER, $PASSWORD, $DBNAME);
        
        if ($conn -> connect_error) {
            echo "Connection failed: " . $conn -> connect_error;
        };

        $sqlQuery = 'SELECT * FROM favorite_colors;';
        $queryResult = $conn -> query($sqlQuery);

        if ($queryResult -> num_rows > 0) {
            echo 
                '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Favorite color</th>
                        </tr>
                    </thead>
                    <tbody id="colorsTable">';
            while ($row = $queryResult -> fetch_assoc()) {
                    echo 
                        '<tr class="tableRow" style="background:' . $row["color"] . '"' . '>
                            <td>' . $row["name"] . '</td>
                            <td>' . $row["color"] . '</td>
                        </tr>';
            }
            echo    '</tbody>
                </table>';
        } else {
            echo "No results found";
        };

        $conn -> close();
        
    ?>

    <script>
        const searchFunction = () => {
            let input = document.getElementById('userInput');
            let filter = input.value.toUpperCase();
            let table = document.getElementById('colorsTable');
            let tableRow = table.getElementsByTagName('tr');

            for (let i = 0; i < tableRow.length; i++) {
                if (document.getElementById('nameCheckbox').checked) {
                    let tableData = tableRow[i].getElementsByTagName('td')[0];
                    if (tableData) {
                        let textValue = tableData.textContent || tableData.innerText;
                        if (textValue.toUpperCase().indexOf(filter) > -1) {
                            tableRow[i].style.display = '';
                        } else {
                            tableRow[i].style.display = 'none';
                        }
                    }
                } else if (document.getElementById('colorCheckbox').checked) {
                    let tableData = tableRow[i].getElementsByTagName('td')[1];
                    if (tableData) {
                        let textValue = tableData.textContent || tableData.innerText;
                        if (textValue.toUpperCase().indexOf(filter) > -1) {
                            tableRow[i].style.display = '';
                        } else {
                            tableRow[i].style.display = 'none';
                        }
                    }
                }
            }
        }

    </script>
</body>
</html>