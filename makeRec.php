
<?php
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['decisionRec'])){
    $addingq=$_POST['decisionRec'];
    $aQuery = "UPDATE application SET app_rec=$addingq, app_status='reviewed' WHERE uid='$q' OR uid='$searchq'";
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
