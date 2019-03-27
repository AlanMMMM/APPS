<?php
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

<!DOCTYPE html>
<html>
<body>
<h2 style="text-align:center;"> Welcome </h2>
<h3 style="text-align: center;"> Please Select an Applicant </h3>



<form style="text-align:center;" action="decisionMaking.php">
    <?php
    $query = "SELECT uid, first_name, last_name FROM applicant WHERE app_status='reviewed'";
    $result = mysqli_query($conn, $query);

    $opt = "<select name='applicant'>";

    while($row = mysqli_fetch_assoc($result)){
        $opt .="<option value='{$row['uid']}'>{$row['uid']}</option>";
    }


    $opt .="</select>";
    $conn->close();
    ?>
    <br><br>
    <input type="submit">
</form>
<br><br><br><br><br>

<form style="text-align: center;" action="decisionMaking.php" method="post">
    Applicant UID: <input type="text" name="search"><br>
    <input type=""submit" value=">>" />


</form>

</body>
</html>

