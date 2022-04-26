<?php
require "db.php";

$message = "";

/**
* get students **/
$sql = "SELECT * FROM departments";
$st = $mysqli->query($sql);
$departments = array();
if ($st->num_rows > 0) 
{
	// output data of each row
	while($row = $st->fetch_assoc()) 
	{
		$departments[] = $row;
	}
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

</head>
<body>
<div class="container-lg">
    <div class="">
        <div class="table-wrapper">
            <div class="table-title">
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-sm-8">
					<p>&nbsp;</p>
					<h2>All <b>Departments</b></h2> <a href="index.php">Add New</a>
					<p>&nbsp;</p>
					</div>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<div class="col-md-12">
						<table class="table table-bordered src-table1">
							<thead>
								<tr>
									<th>Id</th>
									<th>Department Name</th>
									<th>Job</th>
									<th>City</th>
									<th>Type</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(count($departments) > 0)
								{
									$totaldepartments = count($departments);
									$i = 1;
									foreach($departments as $department)
									{
										?>
										<tr id="check_<?php echo $i;?>" data-total-record="<?php echo $totaldepartments;?>" data-tr-id_<?php echo $i;?>="<?php echo $department['id'];?>" data-name-<?php echo $i;?>="<?php echo $department['name'];?>">
											<td><?php echo $department['id'];?></td>
											<td><a href="index.php?id=<?php echo $department['id'];?>"><?php echo $department['department'];?></a></td>
											<td><?php echo $department['job'];?></td>
											<td><?php echo $department['city'];?></td>
											<td><?php echo $department['type'];?></a></td>
										</tr>
										<?php
										$i++;
									}
								}
								?>
								      
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>  
	</div>
</div>
</body>
</html>