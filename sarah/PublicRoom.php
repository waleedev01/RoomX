      <?php 
     include '../database_connection/connectDB.php';
include '../session/session.php';

$sql="SELECT name,id FROM student"; 

$sql="SELECT country, FROM _ order by country"; 

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select country=_ value=''>Country</option>"; 
// list box select command

foreach ($dbo->query($sql) as $row){//Array or records stored in $row

echo "<option value=$row[id]>$row[name]</option>"; 

/* Option values are added by looping through the array */ 
}
$sql="SELECT country, FROM _ WHERE room='public' order by country ";
echo "</select>";// Closing of list box
        
<html>

    <script>
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
}

</script>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PrivateRoom</title>
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8"></head>
<style>

:root {
 --bs-font-sans-serif: system-ui;
  --bs-body-font-family: var(--bs-font-sans-serif);
  --bs-body-line-height: 1.5;
}

.dropdown-header {
  display: block;
  padding: var(--bs-dropdown-header-padding-y) var(--bs-dropdown-header-padding-x);
  margin-bottom: 0;
  font-size: 0.875rem;
  color: var(--bs-dropdown-header-color);
  white-space: nowrap;
}

    body {
  margin: 0;
  font-family: var(--bs-body-font-family);
  font-size: var(--bs-body-font-size);
  font-weight: var(--bs-body-font-weight);
  line-height: var(--bs-body-line-height);
  color: var(--bs-body-color);
min-height: 100%;
}
  ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    li a {
  padding: 10px 16px;
  
}

a:link {
 color: rebeccapurple;
  text-decoration: none;
}

a:hover {
  color: black;
  background-color: transparent;
    text-decoration: none;
}
hr {
  margin: 1rem 0;
  color: inherit;
  border: 0;
  border-top: 1px solid;
  opacity: 0.25;
}
 p {
  
    position: absolute;

}
    li {
  float: right;
}


    </style>
 <header class= "dropdown-header">
<div class="dropdown-header"> <img src="" alt="logo"/> RoomX </div> 
            <ul>
                <nav>
            <p>
                 <li ><a class="active" href="features.html">Features</a></li>
                <li ><a  class="active" href="#">Help Center</a></li>
                  <li ><a class="active" href="Homepage.html"> Home</a></li>
               

               
                </p>
        </nav>
            </ul> </header>
   

<body>
    <center style = "text-decoration-line: underline; font-weight: bold; font-size: 30px"> Join your Room</center>

        <center style = "margin-top: 10%">
    <label style=" color: black; " for = "city"> Choose your Location:</label>
<select name="city" id="city">
  <option value="london">London</option>
</select><br> 
     <input type="submit" style= "margin-top: 5%"value="Submit">
</center>

    
        </body>
      <footer  style="    background-color: mediumpurple; position: absolute; bottom: 0; width: 100%; ">
                <center>Contact us :<br><br>
                    Email: <a style = "padding-right: 5%; padding-left: 0.5%"href="#"><i class="fa fa-envelope"> </i></a>
            Twitter: <a style = "padding-right: 5%;padding-left: 0.5%" href="#"><i class="fa fa-twitter"></i></a>
          Facebook: <a style = "padding-right: 5%;padding-left: 0.5%" href="#"><i class="fa fa-facebook"></i></a>
          </center> 
          <font style="float: left;  margin: 8px 10px;" size="+1"><i><small>Copyright &copy; 2022 RoomX</small></i>
             </font>
    </footer>
    </html>