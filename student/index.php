<?php 
	// connect to database
	$conn = mysqli_connect('localhost','divya','divya123','evaluated_assignments');
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

	if(isset($_POST['submit'])){
	if(empty($_POST['rollno'])){
			echo 'Enter your roll number <br />';
		}
		else{
			$rollno = $_POST['rollno'];
			if(!preg_match("/\d\d[a-zA-Z| \d]\d\d\d\d\d\d/i", $rollno)){
				echo "Invalid rollno <br />";
			}else{
			

	$rollno = $_POST['rollno'];

	$sql = 	"SELECT * from files where rollno = ". $rollno;

	$result = mysqli_query($conn, $sql);

	$assignments = mysqli_fetch_assoc($result);
	// }

	// print_r($assignments['student2']);

	mysqli_free_result($result);

	mysqli_close($conn);

			}
		}
	}
	
 ?>

 <!DOCTYPE html>
 <html>
 	<?php 
 	include('templates/header.php'); ?>

 	<section class="container grey-text">
 		<!-- <h4 class="center">Scores according to the grading norm</h4> -->
 		<form class="white" action="index.php" method="POST">
 			<label>Your roll number:</label>
 			<input type="text" name="rollno">
 			<div class="center">
 				<input type="submit" name="submit" value="check assignments" class="btn brand z-depth-0">
 			</div>
 		</form>
 	</section>
<?php if(isset($_POST['submit'])){ ?>
	<h6 class="center grey-text">You must grade the following assignments this week.</h4>

	<div class="container center">
		<div class="row center">
				<div class="col s4 md0">
					<div class="card z-depth-0 center">
						<div class="card-content center">
							<h5>Student A</h5>
							<p>Please ensure you donot perform any biased grading. We will perform random checks</p>
							<form action="<?php echo "" . $assignments['student1'] ?>" method="get"></form>
							<button type="submit" value="Submit">Check assignment</button>
					<ul id="nav-mobile" class="center hide-on-small-and-down">
 					<li><a href="add.php" class="btn brand z-depth-0">Report the final score</a></li>
						</div>
					</div>
				</div>

				<div class="col s4 md0">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5>Student B</h5>
							<p>Please ensure you donot perform any biased grading. We will perform random checks</p>
							<form action="<?php echo "" . $assignments['student2'] ?>" method="get" id="form1"></form>
							<button type="submit" form="form1" value="Submit">Check assignment</button>
							<ul id="nav-mobile" class="center hide-on-small-and-down">
		 					<li><a href="add.php" class="btn brand z-depth-0">Report the final score</a></li>
						</div>
					</div>
				</div>

				<div class="col s4 md0">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5>Student C</h5>
							<p>Please ensure you donot perform any biased grading. We will perform random checks</p>
							<form action="<?php echo "" . $assignments['student3'] ?>" method="get" id="form1"></form>
							<button type="submit" form="form1" value="Submit">Check assignment</button>

					<ul id="nav-mobile" class="center hide-on-small-and-down">
 					<li><a href="add.php" class="btn brand z-depth-0">Report the final score</a></li>
						</div>
					</div>
				</div>

			<?php  ?>

		</div>
	</div>
<?php } ?>

 	<?php include('templates/footer.php');

 	?>

 
 </html>