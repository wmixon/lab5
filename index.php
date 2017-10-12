<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SQL</title>
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('./img/database.png'), url('./img/database.png');
            }
        </style>
    </head>
    <h1>Database Search</h1>
    <body>
        <div id="footer">
            
        
        
        <?php
              // connect to our mysql database server
              
              // make a query 
              
            $servername = "localhost";
            $username = "wesmixon";
            $password = "qwer1234";
            $dbname = "tech_devices_app";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // make a query 
            if($_GET['filter'] == "NAME"){
                $sql = "SELECT *  FROM `Device` ORDER BY `deviceName` " . $_GET['up'];
            }
            if($_GET['filter'] == "PRICE"){
                $sql = "SELECT *  FROM `Device` ORDER BY `price` " . $_GET['up'];
            }
            if($_GET['filter2'] == "AVAILABILITY" and $_GET['filter'] == "NAME"){
                $sql = "SELECT *  FROM `Device` WHERE `status` LIKE '%" . $_GET['wfilter'] . "%'" . "ORDER BY `deviceName` " . $_GET['up'];
            }
            if($_GET['filter2'] == "NAME2" and $_GET['filter'] == "NAME"){
                $sql = "SELECT *  FROM `Device` WHERE `deviceName` LIKE '%" . $_GET['wfilter'] . "%'" . "ORDER BY `deviceName` " . $_GET['up'];
            }
            if($_GET['filter2'] == "TYPE" and $_GET['filter'] == "NAME"){
                $sql = "SELECT *  FROM `Device` WHERE `deviceType` LIKE '%" . $_GET['wfilter'] . "%'" . "ORDER BY `deviceName` " . $_GET['up'];
            }
            if($_GET['filter2'] == "AVAILABILITY" and $_GET['filter'] == "PRICE"){
                $sql = "SELECT *  FROM `Device` WHERE `status` LIKE '%" . $_GET['wfilter'] . "%'" . "ORDER BY `price` " . $_GET['up'];
            }
            if($_GET['filter2'] == "NAME2" and $_GET['filter'] == "PRICE"){
                $sql = "SELECT *  FROM `Device` WHERE `deviceName` LIKE '%" . $_GET['wfilter'] . "%'" . "ORDER BY `price` " . $_GET['up'];
            }
            if($_GET['filter2'] == "TYPE" and $_GET['filter'] == "PRICE"){
                $sql = "SELECT *  FROM `Device` WHERE `deviceType` LIKE '%" . $_GET['wfilter'] . "%'" . "ORDER BY `price` " . $_GET['up'];
            }
            
            $result = $conn->query($sql);
        ?>
        
        <form>
            <label>Order By: </label>
            <input type="radio" name="filter" value="NAME" checked="checked">Name
            <input type="radio" name="filter" value="PRICE">Price
            <br>
            <label></label>
            <input type="radio" name="up" value="ASC" checked="checked">Ascending
            <input type="radio" name="up" value="DESC">Descending
            <br><br>
            <label>Filter By: </label>
            <input type="radio" name="filter2" value="TYPE">Type
            <input type="radio" name="filter2" value="NAME2">Name
            <input type="radio" name="filter2" value="AVAILABILITY">Availability
            
            <br>
            
            <input type="text" name="wfilter">
            <input type="submit"  value="Order/Filter">
        </form>
        
        <?php
        
        
        //$sql = "SELECT id, firstName, lastName FROM User WHERE role = 'student' AND deptId = 1";
        $result = $conn->query($sql);
        ?>
        <table style="width:100%">
            <tr>
                <td><b>Name</b></td>
                <td><b>Type</b></td>
                <td><b>Price</b></td>
                <td><b>Status</b></td>
            </tr>

        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["deviceName"] . "</td><td>" . $row["deviceType"] . "</td><td>" . $row["price"] . "</td><td>" . $row["status"] . "</td></tr>";
            }
        } else {
            echo "0 results";
        }
        
        $conn->close();
        
        ?>
        </div>
    </body>
</html>