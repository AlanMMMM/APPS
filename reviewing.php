<!DOCTYPE html>
<html>
<body>
<h2 style="text-align:center;"> Now please make a decision recommendation</h2>
<form style="text-align: center;" action="makeRec.php" method="post">
    Student UID: (please type in numbers) <input type="number" required="required" name="decisionRecUID"><br>
    
    Recommendation Letter Rating: (Worst=1, Best=5) <select name="recRating" required="required">
                        <option disabled selected value> -- select a score -- </option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=1>3</option>
                        <option value=2>4</option>
                        <option value=1>5</option>
                       </select><br>
    Is the Recommendation Letter Generic? <select name="recGen" required="required">
                        <option disabled selected value> -- select YES or NO -- </option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>                 
                        </select><br>
    Is the Recommendation Letter Credible? <select name="recCre" required="required">
                        <option disabled selected value> -- select YES or NO -- </option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>                 
                        </select><br>
    Decision Recommendation: <select name="decisionRec" required="required">
                        <option disabled selected value> -- Make A Recommendation -- </option>
                        <option value="A">Incomplete Record</option>
                        <option value="B">Does not meet minimum Requirements</option>   
                        <option value="C">Problems with Letters</option>
                        <option value="D">Not competitive</option> 
                        <option value="E">Other reasons</option>
                        </select><br>
    Reason for Rejection: <select name="rejRea">
                        <option disabled selected value> -- Make A Recommendation -- </option>
                        <option value=1>Reject</option>
                        <option value=2>borderline</option>   
                        <option value=3>admit without aid</option>
                        <option value=4>admit with aid</option> 
                        </select><br>
    Deficiency Courses if Any: (Max:25 Charactors)<input type="text" name="decisionRecDef" maxlength=25><br>
    Reviewer Comment: (Max:40 Charactors) <input type="text" name="decisionRecCom" maxlength=40><br>
    
    <input type="submit" value="Submit" >
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
   
 if(isset($_POST['goSelect'])){
    $selectq=$_POST['selection'];
     
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
}else if(isset($_POST['goSearch'])){
    if(isset($_POST['search'])){
        $searchq = $_POST['search'];
        
        $sQuery = "SELECT * FROM applicant A,application B WHERE A.uid = '$searchq' AND A.uid=B.uid AND A.app_status='completed'";
        $sResult = $conn->query($sQuery) or die("mysql error".$mysqli->error);
        if($sResult->num_rows==0)
        {
            echo "No Applicant Found or Applicant Doesn't Complete Application";
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
        }}}
}
$conn->close();
?>


</body>
</html>







