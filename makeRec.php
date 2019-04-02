
<?php
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['decisionRec'])&& isset($_GET['decisionRecUID'])){
    $addingq=$_POST['decisionRec'];
    $addingqUID=$_POST['decisionRecUID'];
    $aQuery = "UPDATE applicant A SET A.app_rec='$addingq', A.app_status='reviewed' WHERE A.uid='$addingqUID'";
    $aResult = $conn->query($aQuery) or die("mysql error".$mysqli->error);
    if($aResult==TRUE) {
        echo "decision recommendation updated successfully";
    }else{
        echo "failed to make decision recommendation:" . $conn->error;
    }
}else{
    echo "No Applicant Found, decision recommendation not made";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<form style="text-align: center;" action="applicationCompleteList.php" method="post">
    Now you can go back: <input type="submit" value="GO BACK" />
</form>
<br><br><br><br>
</body>
</html>
