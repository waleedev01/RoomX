<?php
include '../database_connection/connectDB.php';
if (isset($_POST['leave'])){
$room_id = $conn->real_escape_string($_POST['leave']);
$user_id = $conn->real_escape_string($_POST['id']);

$query ="DELETE FROM RoomMembers WHERE room_id='$room_id' AND user_id='$user_id'";
$result = $conn->query($query);

    echo "<script language='javascript'>
                alert('You left the room');
                window.location.href = 'openChat.php';
            </script>";
}
else{
    if (!isset($_POST['send']) && !isset($_POST['image']) ) {
        $room_id = $conn->real_escape_string($_POST['open']);
        $user_id = $conn->real_escape_string($_POST['id']);
    }
    else{
        $user_id = $conn->real_escape_string($_POST['user_id']);
        $room_id = $conn->real_escape_string($_POST['room_id']);
    }
    $query = "SELECT * FROM Message WHERE user_id= '$user_id' and room_id ='$room_id'";
    $result = mysqli_query($conn, $query);
    
    $query_name = "SELECT name FROM User WHERE user_id = '$user_id'";
    $res_name = mysqli_query($conn, $query_name);
    // store the results in $row variable
    $name = mysqli_fetch_row($res_name);
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <title>Chat</title>
            <meta name="description" content="Tuts+ Chat Application" />
            <link rel="stylesheet" href="style.css" />
        </head>
        
        <body>
            <div id="wrapper">
                <div id="menu">
                    <p class="welcome">Welcome, <?php echo $name[0] ?><b></b></p>
                    <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                </div>
    
                <div id="chatbox">            
                    <?php  while( $row = mysqli_fetch_assoc( $result)){
                if(isset($row['file_path']))
                    echo "<div class='msgln'><span class='chat-time'>".$row['time_sent']."</span> <b class='user-name'>".$name[0]."</b><a href=".$row['file_path'].">" .$row['message_body']."</a><br></div>";?>
                <?php if(!isset($row['file_path']))
                    echo "<div class='msgln'><span class='chat-time'>".$row['time_sent']."</span> <b class='user-name'>".$name[0]."</b>".$row['message_body']."<br></div>";}?></div>

                <form action="" method="Post">
                <input type="text"  name="message" placeholder="input message" required>
                    <?php echo "<input type='hidden' name='room_id' value='" . $room_id . "'>";?>
                    <?php echo "<input type='hidden' name='user_id' value='" . $user_id . "'>";?>
                    <td><input type='submit' name='send' value='Send'></td>
                </form>
                <form action="" method="Post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload">
                    <?php echo "<input type='hidden' name='room_id' value='" . $room_id . "'>";?>
                    <?php echo "<input type='hidden' name='user_id' value='" . $user_id . "'>";?>
                    <td><input type='submit' name='image' value='Send Image'></td>
                </form>
            </div>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">
                // jQuery Document 
                $(document).ready(function () {});
            </script>
        </body>
    </html>
    
    <?php
    if (isset($_POST['send'])) {
        $user = $conn->real_escape_string($_POST['user_id']);
        $room = $conn->real_escape_string($_POST['room_id']);
        $message = $conn->real_escape_string($_POST['message']);
        $created_time = date('m/d/Y h:i:s a', time());
    
            //insert message record
        $query =
        'INSERT INTO Message (message_body,room_id,user_id,time_sent) VALUES (?,?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param(
        'siis',
        $message,
        $room,
        $user,
        $created_time
        );
        /* Execute the statement */
        $stmt->execute();
        $row = $stmt->affected_rows;
    
        if ($row > 0) {
            echo '';        }
        else{
            echo "<script language='javascript'>
                            alert('Error. Please retry');
                            window.location.href = 'createPrivateRoom.php';
                        </script>";
            }
    }
    if (isset($_POST['image'])) {
        $user = $conn->real_escape_string($_POST['user_id']);
        $room = $conn->real_escape_string($_POST['room_id']);
        $created_time = date('m/d/Y h:i:s a', time());
        require 'vendor/autoload.php';
        // Instantiate an Amazon S3 client.
        $s3 = new Aws\S3\S3Client([
            'version' => 'latest',
            'region'  => 'us-east-1',
            'credentials' => [
            'key'    => 'AKIA3CXARAT72MUBUPWU',
            'secret' => '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'
        ]
        ]);

            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["fileToUpload"]["name"];
            $filetype = $_FILES["fileToUpload"]["type"];
            $filesize = $_FILES["fileToUpload"]["size"];
            echo $filename;
            echo $filetype;
            echo $filesize;
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        // Validate type of the file
        if(in_array($filetype, $allowed)){
        // Check whether file exists before uploading it
        if(file_exists("upload/" . $filename)){
        echo $filename . " is already exists.";
        } else{
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/" . $filename)){
        $bucket = 'roomx-images';
        $file_Path = __DIR__ . '/upload/'. $filename;
        $key = basename($file_Path);
        try {
        $result = $s3->putObject([
            'Bucket' => 'roomx-images',
            'Key'    => $key,
            'Body'   => fopen($file_Path, 'r'),
        ]);
        echo "Image uploaded successfully. Image path is: ". $result->get('ObjectURL');
        $path = $result->get('ObjectURL');
        $query =
        'INSERT INTO Message (message_body,room_id,user_id,time_sent, file_path) VALUES (?,?,?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param(
        'siiss',
        $filename,
        $room,
        $user,
        $created_time,
        $path
        );
        /* Execute the statement */
        $stmt->execute();
        $row = $stmt->affected_rows;
    
        if ($row > 0) {
            echo '';        }
        else{
            echo "<script language='javascript'>
                            alert('Error. Please retry');
                            window.location.href = 'createPrivateRoom.php';
                        </script>";
            }
        } catch (Aws\S3\Exception\S3Exception $e) {
        echo "There was an error uploading the file.\n";
        echo $e->getMessage();
        }
        echo "Your file was uploaded successfully.";
        }else{
        echo "File is not uploaded";
        }
        } 
        } else{
        echo "Error: There was a problem uploading your file. Please try again."; 
        }
        }
         
    }
     

?>
