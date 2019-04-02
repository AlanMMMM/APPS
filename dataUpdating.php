

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
       
        $sQuery = "SELECT * FROM applicant A,application B WHERE A.uid = $searchq AND A.uid=B.uid";
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
        }}}
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<body>
<h2 style="text-align:center;"> Now please update</h2>
<h3> Update Transcript Status</h3>
<form action="makeUpdate.php" method="post">
    Student UID:please type in numbers <input type="number" required="required" name="transcriptUpdateUID">
    Transcript Status: <select name="transcriptUpdate" required="required">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="Yes">Transcript Received</option>
                        <option value="No">Transcript not received</option>
                       </select><br>
    <input type="submit" name="transcriptSubmit" value="Update" >
</form>
<h3> Update Final Decision</h3>
<form action="makeUpdate.php" method="post">
    Student UID:please type in numbers <input type="number" required="required" name="decisionUpdateUID">
    Final Decision: <select name="decisionUpdate" required="required">
                        <option disabled selected value> -- select an option -- </option>
                        <option value=1>admission with aid</option>
                        <option value=2>admission</option>
                        <option value=3>rejection</option>
                       </select><br>
    <input type="submit" name="decisionSubmit" value="Update" >
</form>
<h3> Update Application Status</h3>
<form action="makeUpdate.php" method="post">
    Student UID:please type in numbers <input type="number" required="required" name="statusUpdateUID">
    Application Status: <select name="statusUpdate" required="required">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="pending">Pending:Missing required materials</option>
                        <option value="completed">Completed:All materials received, under reviewing</option>
                        <option value="reviewed">Reviewed:Reviewed by reviewer, waiting for final decision</option>
                        <option value="decisionMade">Decision Made:Final decision has been made</option>
                       </select><br>
    <input type="submit" name="statusSubmit" value="Update" >
    
    <br><br><br><br><br><br>
</form>
</body>
</html>





