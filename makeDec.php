<?php
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['decision'])&& isset($_POST['decisionUID'])){
    $addingq=$_POST['decision'];
    $addingqUID=$_POST['decisionUID'];
    $aQuery = "UPDATE applicant A SET A.decision='$addingq', A.app_status='decisionMade' WHERE A.uid='$addingqUID'";
    $aResult = $conn->query($aQuery) or die("mysql error".$mysqli->error);
    if($aResult==TRUE) {
        echo "decision updated successfully";
    }else{
        echo "failed to make decision:" . $conn->error;
    }
}else{
    echo "decision not made";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<form style="text-align: center;" action="applicationReviewedList.php" method="post">
    Now you can go back: <input type="submit" value="GO BACK" />
</form>
<br><br><br><br>
</body>
</html>
