<?php
require "db.php";

$message = "";

/** insert data to table **/
$sql = "";
$msgs = "";
if(isset($_POST['savedepartment']))
{
	$department = $_POST['department'];
	$type = $_POST['type'];
	$job = $_POST['job'];
	$city = $_POST['city'];
	
	if(isset($_POST['action']) && $_POST['action'] == "update")
	{
		$sql = "UPDATE departments SET department = '".$department."', type = '".$type."', city = '".$city."', job = '".$job."' WHERE id = '".$_POST['id']."'";
		$msgs = "updated";
	}else{
	
		$sql = "INSERT INTO departments (department, type, city, job) VALUES ('".$department."', '".$type."', '".$job."', '".$city."')";
		$msgs = "saved";
	}
	if ($mysqli->query($sql) === TRUE)
	{
		$message = "<div class='successmessage'>Department ".$msgs." successfully</div>"; 
	} else {
		$message = "<div class='errormessage'>Error: " .  $exec . "<br>" . $mysqli->error . "</div>";
	}
}

/**
* get students **/
$dptid = isset($_GET['id']) ? $_GET['id'] : "";
$sql = "SELECT * FROM departments WHERE id = '".$dptid."'";
$st = $mysqli->query($sql);
$department = '';
if ($st->num_rows > 0) 
{
	// output data of each row
	$department = $st->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dummy</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.form-group.field_wrapper div {
    clear: both;
    margin-top: 0.5rem;
	height: 40px;
}

img.remove_button {
    position: relative;
    top: -37px;
    left: 34.7rem;
    border-radius: 50%;
	cursor:pointer;
}
.successmessage {
    padding: 0.5rem;
    text-align: center;
    background: #426843ba;
    width: 50%;
    color: #f9f9f9;
    font-weight: 600;
    margin-top: 2rem;
    border-radius: 5px;
}
.errormessage{
	padding: 0.5rem;
    text-align: center;
    background: #d73b22ba;
    width: 50%;
    color: #f9f9f9;
    font-weight: 600;
    margin-top: 2rem;
    border-radius: 5px;
}
</style>

</head>
<body>
<div class="container-lg">
    <div class="">
        <div class="table-wrapper">
            <div class="table-title">
				<?php echo $message;?>
                <div class="row">
					<div class="col-sm-8">
					<p>&nbsp;</p>
					<h2><?php if($dptid != "") { echo "Edit"; }else{ echo "Add"; } ?> <b>Department</b></h2> <a href="listing.php">All Departments</a> 
					</div>
					<p>&nbsp;</p>
					<div class="col-sm-12">
						<form name="phase" action="index.php" id="formtm" method="post">
							<?php if($dptid != "") { ?>
							<input type="hidden" name="id" class="form-control" value="<?php echo $dptid;?>" /> 
							<input type="hidden" name="action" class="form-control" value="update" /> 
							<?php } ?>
							<div class="after-add-more">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group field_wrapper">
											<div>
												<input type="text" name="department" class="form-control" value="<?php if(isset($department['department'])) { echo $department['department']; }else{ echo ''; }?>" placeholder="Department" required  /> 
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group field_wrapper">
											<div>
												<input type="text" name="type" class="form-control" placeholder="Type" value="<?php if(isset($department['type'])) { echo $department['type']; }else{ echo ''; } ?>" required /> 
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group field_wrapper">
											<div>
												<input type="text" name="city" class="form-control" placeholder="City" value="<?php if(isset($department['city'])) { echo $department['city']; }else{ echo ''; } ?>" required /> 
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group field_wrapper">
											<div>
												<input type="text" name="job" class="form-control" placeholder="Job" value="<?php if(isset($department['job'])) { echo $department['job']; }else{ echo '';} ?>" required /> 
											</div>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<button class="btn btn-primary" type="submit" name="savedepartment"><?php if($dptid != "") { echo "Update"; }else{ echo "Submit"; } ?></button>
									</div>
									<div class="col-md-6">
										<button class="btn btn-primary" type="submit" name="savNext">Next</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>  
	</div>
</div>
</body>
</html>