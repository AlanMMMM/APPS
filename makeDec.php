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
    $check="SELECT * from applicant A WHERE A.uid='$addingqUID'";
    $checkResult=$conn->query($check) or die("mysql error".$mysqli->error);
    if($checkResult->num_rows==0){
    echo "No Applicant Found";
    }else{
    $aResult = $conn->query($aQuery) or die("mysql error".$mysqli->error);
    if($aResult==TRUE) {
        echo "decision updated successfully";
    }else{
        echo "failed to make decision, please try again";
    }
}}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<form style="text-align: center;" action="cac.php" method="post">
    Now you can go back: <input type="submit" value="GO BACK" />
</form>
<br><br><br><br>
</body>
</html>
