<?php
require_once "settings.php";
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($dbconn) {
    
    $query  = "SELECT * FROM cars";
    $result = mysqli_query($dbconn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<thead><tr>"
               . "<th>ID</th>"
               . "<th>Make</th>"
               . "<th>Model</th>"
               . "<th>Price</th>"
               . "<th>Year</th>"
               . "</tr></thead>";
            echo "<tbody>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make']   . "</td>";
                echo "<td>" . $row['model']  . "</td>";
                echo "<td>" . $row['price']  . "</td>";
                echo "<td>" . $row['yom']    . "</td>";
                echo "</tr>";
            }
            
            echo "</tbody></table>";
        }
        else {
            // No rows found
            echo "<p>There are no cars to display.</p>";
        }

        mysqli_free_result($result);
        mysqli_close($dbconn);
    }
    else {
        echo "Query error: " . mysqli_error($dbconn);
        mysqli_close($dbconn);
        exit;
    }

} 
else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>