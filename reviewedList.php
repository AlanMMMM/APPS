<!DOCTYPE html>
<html>
<body>
<h2 style="text-align:center;"> Welcome </h2>
<h3 style="text-align: center;"> Please Select an Applicant </h3>



<form style="text-align:center;" action="decisionMaking.php">
    <select name="selection">
        <?php
        $servername= "localhost";
        $username = "amstg";
        $password = "seas";
        $dbname = "amstg";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT uid, first_name, last_name FROM applicant WHERE app_status='reviewed'";
        $result = $conn->query($query) or die("mysql error".$mysqli->error);
        while($row = mysqli_fetch_assoc($result)){
            echo "<option value=\"\">" . $row['uid'] . "</option>";
        }
        $conn->close();
        ?>
    </select>
    <br><br>
    <input type="submit" name="goSelect" value="select" />
</form>
<br><br><br><br><br>

<form style="text-align: center;" action="reviewing.php" method="post">
    Applicant UID: <input type="text" name="search"><br>
    <input type="submit" name="goSearch" value="search" />


</form>

</body>
</html>
