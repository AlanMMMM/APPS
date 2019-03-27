<?php
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = isset($_GET['applicant'])? htmlspecialchars($_GET['applicant']) : '';
$oQuery= "SELECT * FROM applicant A AND application B WHERE B.uid='$q' AND A.uid=B.uid";
$oResult= $conn->query($oQuery);
while($oRow = $oResult->fetch_assoc()){
    echo " - uid". $oRow["uid"];
    echo " - first name". $oRow["first_name"];
    echo " - last name". $oRow["last_name"];
    echo " - address". $oRow["street"]."<br>".$oRow["city"]."<br>".$oRow["state"]."<br>".$oRow["zip"];
    echo " - email". $oRow["email"];
    echo " - admission term". $oRow["app_term"];
    echo " - area of interest". $oRow["area_of_interest"];
    echo " - GRE verbal". $oRow["GRE_verbal"];
    echo " - GRE quantitative". $oRow["GRE_quantitative"];
    echo " - GRE total". $oRow["GRE_total"];
    echo " - bachelor school". $oRow["bachelor_school"];
    echo " - bachelor degree". $oRow["bachelor_degree"];
    echo " - bachelor major". $oRow["bachelor_major"];
    echo " - bachelor year". $oRow["bachelor_year"];
    echo " - bachelor GPA". $oRow["bachelor_GPA"];
    echo " - transcript received?". $oRow["transcript_received"];
    echo " - recommendation letter received?". $oRow["rec_received"];
}



if(isset($_POST['search'])){
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
    $sQuery = "SELECT * FROM applicant A AND application B WHERE 'B.uid'='%$searchq%' AND A.uid=B.uid AND B.app_status='completed' ";
    $sResult = $conn->query($sQuery);
    while($sRow = $sResult->fetch_assoc()) {
        echo " - uid". $sRow["uid"];
        echo " - first name". $sRow["first_name"];
        echo " - last name". $sRow["last_name"];
        echo " - address". $sRow["street"]."<br>".$sRow["city"]."<br>".$sRow["state"]."<br>".$oRow["zip"];
        echo " - email". $sRow["email"];
        echo " - admission term". $sRow["app_term"];
        echo " - area of interest". $sRow["area_of_interest"];
        echo " - GRE verbal". $sRow["GRE_verbal"];
        echo " - GRE quantitative". $sRow["GRE_quantitative"];
        echo " - GRE total". $sRow["GRE_total"];
        echo " - bachelor school". $sRow["bachelor_school"];
        echo " - bachelor degree". $sRow["bachelor_degree"];
        echo " - bachelor major". $sRow["bachelor_major"];
        echo " - bachelor year". $sRow["bachelor_year"];
        echo " - bachelor GPA". $sRow["bachelor_GPA"];
        echo " - transcript received?". $sRow["transcript_received"];
        echo " - recommendation letter received?". $sRow["rec_received"];
    }
} else {
    echo "Applicant Not Found";
}
if(isset($_POST['decisionRec'])){
    $addingq=$_POST['decisionRec'];
    $aQuery = "UPDATE application SET app_rec='$addingq', app_status='reviewed' WHERE uid='$q' OR uid='$searchq'";
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
<h2 style="text-align:center;"> Now please make recommendation</h2>
<form style="text-align: center;" action="" method="post">
    Decision Recommendation: Type 1 for rejection, 2 for borderline, 3 for admission without aid, and 4 for admission with aid  <input type="text" name="decisionRec"><br>
    <input type=""submit" value=">>" />
</form>
<br><br><br><br>
</body>
</html>



