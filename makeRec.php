
<?php
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['decisionRec']&& $_POST['decisionRecUID'])){
    $addingq=$_POST['decisionRec'];
    $addingqUID=$_POST['decisionRecUID'];
    $aQuery = "UPDATE applicant A SET A.app_rec=$addingq, A.app_status='reviewed' WHERE A.uid=$addingqUID";
    if($conn->query($aQuery)==TRUE) {
        echo "decision recommendation updated successfully";
    }else{
        echo "failed to make decision recommendation:" . $conn->error;
    }
}else{
    echo "decision recommendation not made";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<form style="text-align: center;" action="applicationList.php" method="post">
    Now you can go back: <input type="submit" value="GO BACK" />
</form>
<br><br><br><br>
</body>
</html>
