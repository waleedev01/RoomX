<?php

include '../database_connection/connectDB.php';
include '../session/session.php';
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../room/tables.css">
<?php include '../headerBack.php';?>
<head>

<body style="text-align: center;">
<h1 class='my-5' style="padding-top: 20px;">Your Chats</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
<?php
            $query = "SELECT room_id FROM RoomMembers WHERE user_id= '$row[0]'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0){
            //select all the jobs that has been completed
            while( $row = mysqli_fetch_assoc( $result)){
                $new_array[] = $row; // Inside while loop
            }
            $in_text = implode(',',array_map('implode',$new_array));
            $query_rooms = "SELECT * FROM Room WHERE room_id IN($in_text)";
            $res_rooms = mysqli_query($conn, $query_rooms);
            $query_id = "SELECT user_id FROM User WHERE email = '$email'";
            $res_id = mysqli_query($conn, $query_id);
            // store the results in $row variable
            $a = mysqli_fetch_row($res_id);
        }
            // store the results in $row variable
        //table to show completed jobs
        echo "<div class='container'>";
        echo "<div class='row-fluid'>";
            echo "<div class='col-xs-12'>";
            echo "<div class='table-responsive'>";    
                echo "<table class='table table-hover table-inverse' id='myTable'>";
                
                echo "<tr>";
                echo "<th>Room name</th>";
                echo "<th>Geo Area</th>";
                echo "<th>Type</th>";
                echo "<th>Status</th>";
                echo "<th>Open</th>";
                echo "<th>Leave</th>";
                echo "</tr>";
                if ($res_rooms->num_rows > 0) {
                    // output data of each row
                    while($row = $res_rooms->fetch_assoc()) {
                        echo"<form action = 'processLeaveRoom.php' method='POST'>";  
                        echo "<tr>";
                        echo "<input type='hidden' name='id' value='" . $a[0] . "'>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["geo_area"] . "</td>";
                        echo "<td>" . $row["type"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        if ($row["status"] == "open")
                            echo "<td><input type='submit' name='open' value='" . $row['room_id'] . "' /><br/></td>";
                        else
                            echo "<td>Room is closed</td>";
                        if ($row["user_id"] != $a[0])
                            echo "<td><input type='submit' name='leave' value='" . $row['room_id'] . "' /><br/></td>";
                        else
                            echo "<td>You are the owner</td>";

                        echo "</tr>";
                        echo"</form>";           
                    }
                } else {
                    echo "0 results";
                }
                
                echo "</table>";
    
            echo "</div>";
            echo "</div>";