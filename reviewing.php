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
                        <option value=1>Reject</option>
                        <option value=2>borderline</option>   
                        <option value=3>admit without aid</option>
                        <option value=4>admit with aid</option> 
                        </select><br>
    Reason for Rejection: <select name="rejRea">
                           <option disabled selected value> -- Choose A Reason -- </option>
                        <option value="A">Incomplete Record</option>
                        <option value="B">Does not meet minimum Requirements</option>   
                        <option value="C">Problems with Letters</option>
                        <option value="D">Not competitive</option> 
                        <option value="E">Other reasons</option>
                        </select><br>
    Deficiency Courses if Any: (Max:40 Charactors)<input type="text" name="decisionRecDef" maxlength=40><br>
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
          echo "Name: ". $oRow["first_name"]." ".$oRow["last_name"]."<br>";
            echo "Student UID: ". $oRow["uid"]."<br>";
            echo "Semester of Application: ". $oRow["app_term"]."<br>";
            echo "Applying for Degree: ".$oRow["degree_seeking"]."<br>";
            echo "Area of Interest: ". $oRow["area_of_interest"]."<br><br>";
            
            echo "Exams"."<br>";
            echo "GRE &nbsp;&nbsp;&nbsp;"."Verbal: ". $oRow["GRE_verbal"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Quantitative: ".$oRow["GRE_quantitative"]."<br>";
            echo "Year of Exam: ".$oRow["exam_year"]."<br>";
            echo "GRE Advanced &nbsp;&nbsp;&nbsp;"."Score: ".$oRow["GRE_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Subject: ".$oRow["GRE_subject"]."<br>";
            echo "TOEFL Score: ".$oRow["TOEFL_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year of Exam: ".$oRow["TOEFL_year"]."<br><br>";
           
            echo "Prior Degrees"."<br>";
            echo $oRow["bachelor_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$oRow["bachelor_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$oRow["bachelor_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$oRow["bachelor_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$oRow["bachelor_school"]."<br><br>";
    
            echo "Application Material"."<br>";
            echo "Transcript Received: ". $oRow["transcript_received"]."<br>";
            echo "Recommendation Letter Received: ". $oRow["rec_received"]."<br>";
            echo "Recommender: ".$oRow["rec_fname"]." ".$oRow["rec_lname"]."<br>";
            echo "Recommender Tittle: ".$oRow["rec_title"]."<br>";
            echo "Recommendation Letter Content: "."<br>";
            echo $oRow["rec_letter"];
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
             echo "Name: ". $sRow["first_name"]." ".$sRow["last_name"]."<br>";
            echo "Student UID: ". $sRow["uid"]."<br>";
            echo "Semester of Application: ". $sRow["app_term"]."<br>";
            echo "Applying for Degree: ".$sRow["degree_seeking"]."<br>";
            echo "Area of Interest: ". $sRow["area_of_interest"]."<br><br>";
            
            echo "Exams"."<br>";
            echo "GRE &nbsp;&nbsp;&nbsp;"."Verbal: ". $sRow["GRE_verbal"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Quantitative: ".$sRow["GRE_quantitative"]."<br>";
            echo "Year of Exam: ".$sRow["exam_year"]."<br>";
            echo "GRE Advanced &nbsp;&nbsp;&nbsp;"."Score: ".$sRow["GRE_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Subject: ".$sRow["GRE_subject"]."<br>";
            echo "TOEFL Score: ".$sRow["TOEFL_score"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year of Exam: ".$sRow["TOEFL_year"]."<br><br>";
           
            echo "Prior Degrees"."<br>";
            echo $sRow["bachelor_degree"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA: ".$sRow["bachelor_gpa"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major: ".$sRow["bachelor_major"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: ".$sRow["bachelor_year"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University: ".$sRow["bachelor_school"]."<br><br>";
    
            echo "Application Material"."<br>";
            echo "Transcript Received: ". $sRow["transcript_received"]."<br>";
            echo "Recommendation Letter Received: ". $sRow["rec_received"]."<br>";
            echo "Recommender: ".$sRow["rec_fname"]." ".$sRow["rec_lname"]."<br>";
            echo "Recommender Tittle: ".$sRow["rec_title"]."<br>";
            echo "Recommendation Letter Content: "."<br>";
            echo $sRow["rec_letter"];
        }}}
}
$conn->close();
?>


</body>
</html>







