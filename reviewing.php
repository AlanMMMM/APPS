<!DOCTYPE html>
<html>
<body>
<h2 style="text-align:center;"> Now please make a decision recommendation</h2>
<form style="text-align: center;" action="makeRec.php" method="post">
    Student UID: <input type="number" name="decisionRecUID"><br>
    Decision Recommendation: Type 1 for rejection, 2 for borderline, 3 for admission without aid, and 4 for admission with aid <br><input type="number" name="decisionRec" min="1" max="4"><br>

    <input type="submit" value=">>" >
</form>
<br><br><br><br>

<?php
$servername= "localhost";
$username = "amstg";
$password = "seas";
$dbname = "amstg";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   
 if(isset($_GET['goSelect'])){
    $selectq=$_GET['selection'];
     
    $oQuery= "SELECT * FROM applicant A, application B WHERE A.uid=$selectq AND A.uid=B.uid";
     
    $oResult= $conn->query($oQuery) or die($mysqli->error);
    
    while($oRow = $oResult->fetch_assoc()){
         echo "Personal Information"."<br>";
            echo " - uid: ". $oRow["uid"]."<br>";
            echo " - first name: ". $oRow["first_name"]."<br>";
            echo " - last name: ". $oRow["last_name"]."<br>";
            echo " - address: ". $oRow["street"]." ".$oRow["city"]." ".$oRow["state"]." ".$oRow["zip"]."<br>";
            echo " - email ". $oRow["email"]."<br>";
            echo "Application Infromation"."<br>";
            echo " - admission term ". $oRow["app_term"]."<br>";
            echo " - area of interest ". $oRow["area_of_interest"]."<br>";
            echo "GRE Score"."<br>";
            echo " - GRE verbal ". $oRow["GRE_verbal"]."<br>";
            echo " - GRE quantitative ". $oRow["GRE_quantitative"]."<br>";
            echo " - GRE total ". $oRow["GRE_total"]."<br>";
            echo "Education Information"."<br>";
            echo " - bachelor school ". $oRow["bachelor_school"]."<br>";
            echo " - bachelor degree ". $oRow["bachelor_degree"]."<br>";
            echo " - bachelor major ". $oRow["bachelor_major"]."<br>";
            echo " - bachelor year ". $oRow["bachelor_year"]."<br>";
            echo " - bachelor GPA ". $oRow["bachelor_GPA"]."<br>";
            echo "Application Material"."<br>";
            echo " - transcript received? ". $oRow["transcript_received"]."<br>";
            echo " - recommendation letter received? ". $oRow["rec_received"]."<br>";
    }
}else if(isset($_GET['goSearch'])){
    if(isset($_POST['search'])){
        $searchq = $_POST['search'];
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        $sQuery = "SELECT * FROM applicant A,application B WHERE CAST(A.uid AS CHAR) = '$searchq' AND A.uid=B.uid AND A.app_status='completed'";
        $sResult = $conn->query($sQuery) or die("mysql error".$mysqli->error);
        if($sResult->num_rows==0)
        {
            echo "No Applicant Found";
        }else{
        while($sRow = $sResult->fetch_assoc()) {
            echo "Personal Information"."<br>";
            echo " - uid: ". $sRow["uid"]."<br>";
            echo " - first name: ". $sRow["first_name"]."<br>";
            echo " - last name: ". $sRow["last_name"]."<br>";
            echo " - address: ". $sRow["street"]." ".$sRow["city"]." ".$sRow["state"]." ".$sRow["zip"]."<br>";
            echo " - email ". $sRow["email"]."<br>";
            echo "Application Infromation"."<br>";
            echo " - admission term ". $sRow["app_term"]."<br>";
            echo " - area of interest ". $sRow["area_of_interest"]."<br>";
            echo "GRE Score"."<br>";
            echo " - GRE verbal ". $sRow["GRE_verbal"]."<br>";
            echo " - GRE quantitative ". $sRow["GRE_quantitative"]."<br>";
            echo " - GRE total ". $sRow["GRE_total"]."<br>";
            echo "Education Information"."<br>";
            echo " - bachelor school ". $sRow["bachelor_school"]."<br>";
            echo " - bachelor degree ". $sRow["bachelor_degree"]."<br>";
            echo " - bachelor major ". $sRow["bachelor_major"]."<br>";
            echo " - bachelor year ". $sRow["bachelor_year"]."<br>";
            echo " - bachelor GPA ". $sRow["bachelor_GPA"]."<br>";
            echo "Application Material"."<br>";
            echo " - transcript received? ". $sRow["transcript_received"]."<br>";
            echo " - recommendation letter received? ". $sRow["rec_received"]."<br>";
        }}}else{
        echo "Applicant Not Found";
    }
}

?>


</body>
</html>







