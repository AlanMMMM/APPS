
<!DOCTYPE html>
<html>
<body>
<h2 style="text-align:center;"> Welcome </h2>
<h3 style="text-align: center;"> Please Select an Applicant </h3>



<form style="text-align:center;" action="reviewing.php" method="post">
    Only Applicants Who Completed Application <select name="selection" required="required">
        <option disabled selected value> -- select an applicant -- </option>
        <?php
        $servername= "localhost";
        $username = "amstg";
        $password = "seas";
        $dbname = "amstg";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT uid, first_name, last_name FROM applicant WHERE app_status='completed'";
        $result = $conn->query($query) or die("mysql error".$mysqli->error);
        
        while($row = mysqli_fetch_assoc($result)){
            $rowUid=$row['uid'];
            echo "<option value=\"$rowUid\">"."UID: " .$rowUid." First Name: ". $row[first_name]. " Last Name: " .$row[last_name] . "</option>";
        }
        $conn->close();
        ?>
    </select>
    <br><br>
    <input type="submit" name="goSelect" value="select" />
</form>
<br><br><br><br><br>

<form style="text-align: center;" action="reviewing.php" method="post">
    Applicant UID: (please type in numbers) <input type="number" required="required" name="search"><br>
    <input type="submit"  name="goSearch" value="search" />


</form>

</body>
</html>
