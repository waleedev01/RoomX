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
<head>
<style>
        body{text-align: center; }
</style> 
<body> 


<?php

            $query = "SELECT room_id FROM RoomMembers WHERE user_id= '$row[0]'";
            $result = mysqli_query($conn, $query);
            //select all the jobs that has been completed
            while( $row = mysqli_fetch_assoc( $result)){
                $new_array[] = $row; // Inside while loop
            }
            $in_text = implode(',',array_map('implode',$new_array));
            $query_rooms = "SELECT * FROM Room WHERE room_id IN($in_text)";
            $res_rooms = mysqli_query($conn, $query_rooms);
            // store the results in $row variable
        //table to show completed jobs
        echo "<h3 class='my-5'>Your chats</h1>";
        echo "<div class='container'>";
        echo "<div class='row-fluid'>";
            echo "<div class='col-xs-12'>";
            echo "<div class='table-responsive'>";    
                echo "<table class='table table-hover table-inverse'>";
                
                echo "<tr>";
                echo "<th>Room name</th>";
                echo "<th>Geo Area</th>";
                echo "<th>Type</th>";
                echo "<th>Status</th>";

                echo "<th>Open</th>";

                echo "</tr>";
                if ($res_rooms->num_rows > 0) {
                    // output data of each row
                    while($row = $res_rooms->fetch_assoc()) {
                        echo"<form action = 'processJoinPublicRoom.php' method='POST'>";  
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["geo_area"] . "</td>";
                        echo "<td>" . $row["type"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";

                        echo "</tr>";
                        echo"</form>";           
                    }
                } else {
                    echo "0 results";
                }
                
                echo "</table>";
    
            echo "</div>";
            echo "</div>";