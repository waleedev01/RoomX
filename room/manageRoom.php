<?php

include '../database_connection/connectDB.php';
include '../session/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="tableSearch.js"></script>
<link rel="stylesheet" href="tables.css">
<?php include '../headerBack.php';?>
<head>

<body style="text-align: center;">
<h1 class='my-5' style="padding-top: 20px;">Rooms created by you</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<?php
        $query_rooms = "SELECT * FROM Room WHERE user_id='$row[0]'";
        $res_rooms = mysqli_query($conn, $query_rooms);
            // store the results in $row variable
        //table to show completed jobs
        echo "<div class='container'>";
        echo "<div class='row-fluid'>";
            echo "<div class='col-xs-12'>";
            echo "<div class='table-responsive'>";    
                echo "<table id='myTable' class='table table-hover table-inverse'>";
                
                echo "<tr>";
                echo "<th>Room id</th>";
                echo "<th>Room name</th>";
                echo "<th>Geo Area</th>";
                echo "<th>Type</th>";
                echo "<th>Status</th>";
                echo "<th>Password</th>";
                echo "<th>Close</th>";
                echo "</tr>";
                if ($res_rooms->num_rows > 0) {
                    // output data of each row
                    while($row = $res_rooms->fetch_assoc()) {
                        echo"<form action = 'processCloseRoom.php' method='POST'>";  
                        echo "<tr>";
                        echo "<td>" . $row["room_id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["geo_area"] . "</td>";
                        echo "<td>" . $row["type"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        if ($row["status"] == "open"){
                            echo "<td><input type='submit' name='close' value='" . $row['room_id'] . "' /><br/></td>";
                        }
                        else
                            echo "<td>Room is closed</td>";

                        echo "</tr>";
                        echo"</form>";           
                    }
                } else {
                    echo "0 results";
                }
                
                echo "</table>";
    
            echo "</div>";
            echo "</div>";