<?php 
	if(isset($_POST['submit'])){
		if(empty($_POST['rollno']) or empty($_POST['score_q1']) or empty($_POST['score_q2']) or empty($_POST['letterABC'])){
			echo 'Enter data in all slots <br />';
		}
		else{
			$rollno = $_POST['rollno'];
			$letter = $_POST['letterABC'];
			if(!preg_match("/\d\d[a-zA-Z| \d]\d\d\d\d\d\d/i", $rollno)){
				echo "Invalid rollno <br />";}
			if(!preg_match("/[a-cA-C]/i", $letter)){
					echo "Invalid letter <br />";}
			else{
				// echo "Submitted!";

				$conn = mysqli_connect('localhost','divya','divya123','evaluated_assignments');
				if(!$conn){
					echo 'Connection error: '. mysqli_connect_error();
					}
				else{
					$rollno = mysqli_real_escape_string($conn,$_POST['rollno']);
					$letter = mysqli_real_escape_string($conn,$_POST['letterABC']);
					$score_q1 = mysqli_real_escape_string($conn,$_POST['score_q1']);
					$score_q2 = mysqli_real_escape_string($conn,$_POST['score_q2']);
					$sql = 	"INSERT INTO assignment1(rollno,letter,score_q1,score_q2) VALUES('$rollno','$letter','$score_q1','$score_q2')";
					$result = mysqli_query($conn, $sql);
					if($result){
						header('Location: index.php');
					}else{
						echo "Query error:".mysqli_error($conn);
					}

					// $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
				}

				}
			}

		}
		
 ?>

 <!DOCTYPE html>
 <html>
 	<?php 
 	include('templates/header.php');?>

 	<section class="container grey-text">
 		<h4 class="center">Scores according to the grading norm</h4>
 		<form class="white" action="add.php" method="POST">
 			<label>Your roll number:</label>
 			<input type="text" name="rollno">
 			<label>Present assignment code (A/B/C):</label>
 			<input type="text" name="letterABC">
 			<label>Score for question 1:</label>
 			<input type="number" name="score_q1">
 			<label>Score for question 2:</label>
 			<input type="number" name="score_q2">

 			<div class="center">
 				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
 			</div>
 		</form>
 	</section>

 	<?php  include('templates/footer.php'); ?>

 	</html>