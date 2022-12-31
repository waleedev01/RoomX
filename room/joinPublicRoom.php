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
<head>

<body>
<h1 class='my-5'>Join Public Rooms</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<?php
//select all the jobs that has been completed
            $query_id = "SELECT user_id FROM User WHERE email = '$email'";
            $res_id = mysqli_query($conn, $query_id);
            $a = mysqli_fetch_row($res_id);
            $query_rooms = "SELECT room_id FROM RoomMembers WHERE user_id = '$a[0]'";
            $res_rooms = mysqli_query($conn, $query_rooms);
            while( $row = mysqli_fetch_assoc( $res_rooms)){
                $new_array[] = $row; // Inside while loop
            }
            $in_text = implode(',',array_map('implode',$new_array));

            //select all the jobs that has been completed
            $query = "SELECT * FROM Room WHERE type='public' and status='open' and room_id NOT IN ($in_text) ";
            $result = mysqli_query($conn, $query);

            // store the results in $row variable
        //table to show completed jobs
//         echo "<h3 class='my-5'>Join Public Rooms</h1>";
        echo "<div class='container'>";
        echo "<div class='row-fluid'>";
            echo "<div class='col-xs-12'>";
            echo "<div class='table-responsive'>";    
                echo "<table class='table table-hover table-inverse' id='myTable'>";
                
                echo "<tr>";
                echo "<th>Room name</th>";
                echo "<th>Geo Area</th>";
                echo "<th>Join</th>";

                echo "</tr>";
          
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo"<form action = 'processJoinPublicRoom.php' method='POST'>";  
                        echo "<tr>";
                        echo "<input type='hidden' name='id' value='" . $a[0] . "'>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["geo_area"] . "</td>";
                        echo "<td><input type='submit' name='join' value='" . $row['room_id'] . "' /><br/></td>";
                        echo "</tr>";
                        echo"</form>";           
                    }
                } else {
                    echo "0 results";
                }
                
                echo "</table>";
    
            echo "</div>";
            echo "</div>";